<?php

namespace App\Http\Controllers;

use App\Porcent;
use Illuminate\Http\Request;

class PorcentController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Porcent  $porcent
     * @return \Illuminate\Http\Response
     */
    public function show(Porcent $porcent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Porcent  $porcent
     * @return \Illuminate\Http\Response
     */
    public function edit(Porcent $porcent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Porcent  $porcent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Porcent $porcent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Porcent  $porcent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Porcent $porcent)
    {
        //
    }
}
