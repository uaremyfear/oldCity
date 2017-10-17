<?php

namespace App\Http\Controllers;

use App\Founder;
use Illuminate\Http\Request;

class FounderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $founders = Founder::orderBy('name')->get();
        return view('admin.founder.index',compact('founders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.founder.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,['name'=>'required']);
        Founder::create($request->all());
        return redirect()->route('founder.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Founder  $founder
     * @return \Illuminate\Http\Response
     */
    public function show(Founder $founder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Founder  $founder
     * @return \Illuminate\Http\Response
     */
    public function edit(Founder $founder)
    {
        return view('admin.founder.edit',compact('founder'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Founder  $founder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Founder $founder)
    {
        $this->validate($request,['name'=>'required']);
        $founder->update($request->all());
        return redirect()->route('founder.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Founder  $founder
     * @return \Illuminate\Http\Response
     */
    public function destroy(Founder $founder)
    {
        $founder->delete();
        return redirect()->back();
    }
}
