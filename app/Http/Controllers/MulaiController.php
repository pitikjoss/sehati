<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mulai;
use App\User;
use Auth;
use App\Role;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use DateTime;

class MulaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $time = Mulai::find(1);
         $mulai = $time->mulai;
         $selesai = $time->selesai;
         // $jos = Carbon::now();
        $date=Carbon::createFromTimeString($mulai,'Asia/Jakarta');
        $jos = $date->diffInSeconds('01-01-1970 07:00:00');
        $jos =$jos*1000;
// dd($jos);
        $dat = Carbon::createFromTimeString($selesai,'Asia/Jakarta');
        $jo = $dat->diffInSeconds('01-01-1970 07:00:00');
        $jo = $jo*1000;

        return view('mulais.index')->with(compact('time','date','jos','jo'));
    }
    public function atur(Request $request)
    {
        $time=Mulai::find(1);
        $this->validate($request, ['mulai'=>'required','selesai'=>'required']);
        $time->update($request->all());

        $time->update($request->only('mulai','selesai'));
        


        Session::flash("flash_notification",[
            "level"=>"success",
            "message"=>"Berhasil mengatur waktu mulai $time->mulai"
            ]);
        return redirect()->route('mulais.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
