<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Peraturan;
use Auth;
use Session;

class PeraturanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peraturans = Peraturan::all();

        return view('peraturans.index', compact('peraturans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Peraturans.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['peraturan'=>'required']);
        Peraturan::create($request->all());

        return redirect()->route('peraturans.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $peraturan = Peraturan::findOrFail($id);

        return view('peraturans.show', compact('peraturan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $peraturan = Peraturan::findOrFail($id);

        return view('peraturans.edit', compact('peraturan'));
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
        $this->validate($request, ['peraturan'=>'required']);
        $peraturan = Peraturan::findOrFail($id);
        $peraturan->update($request->all());

        return redirect()->route('peraturans.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $peraturan = Peraturan::findOrFail($id);
        $peraturan->delete();

        return redirect()->route('peraturans.index');
    }
}
