<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bantuan;
use Auth;
use Session;

class BantuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bantuans = Bantuan::all();

        return view('bantuans.index', compact('bantuans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bantuans.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['name'=>'required','no'=>'required','line'=>'required']);
        Bantuan::create($request->all());

        return redirect()->route('bantuans.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bantuan = Bantuan::findOrFail($id);

        return view('bantuans.show', compact('bantuan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bantuan = Bantuan::findOrFail($id);

        return view('bantuans.edit', compact('bantuan'));
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
        $this->validate($request, ['name'=>'required','no'=>'required','line'=>'required']);
        $bantuan = Bantuan::findOrFail($id);
        $bantuan->update($request->all());

        return redirect()->route('bantuans.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bantuan = Bantuan::findOrFail($id);
        $bantuan->delete();

        return redirect()->route('bantuans.index');
    }
}
