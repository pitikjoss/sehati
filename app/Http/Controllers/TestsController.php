<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\Test;
use App\TestAnswer;
use App\Topic;
use App\Question;
use App\QuestionsOption;
use App\Mulai;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTestRequest;
use DateTime;
use Illuminate\Support\Facades\Session;

class TestsController extends Controller
{
    /**
     * Display a new test.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $topics = Topic::inRandomOrder()->limit(3)->get();
        $waktu = Mulai::find(1);
        $mulai = $waktu->mulai;
        $selesai = $waktu->selesai;
        // $jos = Carbon::now();
        $sekarang = Carbon::now();
        $carbon = Carbon::now()->format('Y-m-d H:i');

        $date=Carbon::createFromTimeString($mulai,'Asia/Jakarta');
        $jos = $date->diffInSeconds('01-01-1970 07:00:00');
        $jos =$jos*1000;
        // dd($jos);

        $dat = Carbon::createFromTimeString($selesai,'Asia/Jakarta');
        $jo = $dat->diffInSeconds('01-01-1970 07:00:00');
        $jo = $jo*1000;


        $questions = Question::inRandomOrder()->limit(100)->get();
        foreach ($questions as &$question) {
            $question->options = QuestionsOption::where('question_id', $question->id)->inRandomOrder()->get();
        }

        
        // foreach ($topics as $topic) {
        //     if ($topic->questions->count()) {
        //         $questions[$topic->id]['topic'] = $topic->title;
        //         $questions[$topic->id]['questions'] = $topic->questions()->inRandomOrder()->first()->load('options')->toArray();
        //         shuffle($questions[$topic->id]['questions']['options']);
        //     }
        // }
        

        return view('tests.create', compact('questions','mulai','carbon','selesai','jos','date','sekarang','jo'));
    }

    /**
     * Store a newly solved Test in storage with results.
     *
     * @param  \App\Http\Requests\StoreResultsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $result = 0;

        $test = Test::create([
            'user_id' => Auth::id(),
            'result'  => $result,
        ]);

        foreach ($request->input('questions', []) as $key => $question) {
            $status = 0;

            if ($request->input('answers.'.$question) != null
                && QuestionsOption::find($request->input('answers.'.$question))->correct
            ) {
                $status = 1;
                $result++;
            }
            TestAnswer::create([
                'user_id'     => Auth::id(),
                'test_id'     => $test->id,
                'question_id' => $question,
                'option_id'   => $request->input('answers.'.$question),
                'correct'     => $status,
            ]);
        }

        $test->update(['result' => $result]);

        return redirect('/home');
    }
}
