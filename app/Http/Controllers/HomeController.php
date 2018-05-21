<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Question;
use App\Result;
use App\Test;
use App\User;
use App\Mulai;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $waktu = Mulai::find(1);
        $mulai = $waktu->mulai;
        $selesai = $waktu->selesai;
        
        $sekarang = Carbon::now();
        $carbon = Carbon::now()->format('Y-m-d H:i');

        $date=Carbon::createFromTimeString($mulai,'Asia/Jakarta');
        $jos = $date->diffInSeconds('01-01-1970 07:00:00');
        $jos =$jos*1000;
        
        $dat = Carbon::createFromTimeString($selesai,'Asia/Jakarta');
        $jo = $dat->diffInSeconds('01-01-1970 07:00:00');
        $jo = $jo*1000;
        $good = $date<=$sekarang;
        
        $questions = Question::count();
        $users = User::whereNull('role_id')->count();
        $quizzes = Test::count();
        $average = Test::avg('result');
        return view('home', compact('questions', 'users', 'quizzes', 'average','mulai','selesai','date','carbon','jos','jo','sekarang','dat','good'));
    }
}
