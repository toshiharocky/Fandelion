<?php

namespace App\Http\Controllers;

use App\MemStatus;
use Illuminate\Http\Request;
use App\User;//この行を上に追加
use Auth;//この行を上に追加
use Validator;//この行を上に追加
use App\GymStatus;
use App\Gym;

class MemStatusController extends Controller
{
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
     * @param  \App\MemStatus  $memStatus
     * @return \Illuminate\Http\Response
     */
    public function show(MemStatus $memStatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MemStatus  $memStatus
     * @return \Illuminate\Http\Response
     */
    public function edit(MemStatus $memStatus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MemStatus  $memStatus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MemStatus $memStatus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MemStatus  $memStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(MemStatus $memStatus)
    {
        //
    }
}
