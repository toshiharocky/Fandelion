<?php

namespace App\Http\Controllers;

use App\Message;
use App\MessageList;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\MemStatus;
use Illuminate\Http\Request;
use App\User;//この行を上に追加
use Auth;//この行を上に追加
use Validator;//この行を上に追加
use App\GymStatus;
use App\Gym;
use App\GymImage;
use App\Equipment;
use App\GymSchedule;
use Illuminate\Support\Str;
use DateTime;
use App\Bookmark;

class ProfileController extends Controller
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
    
    
    public function index_guest_mode()
    {
        //
        $user_name = Auth::user()->name;
        $user_icon =  Auth::user()->user_icon;
        $status_names = DB::table('users')
                            ->join('mem_statuses', 'users.memstatus_id', '=', 'mem_statuses.id')
                            ->select('name', 'status_name')
                            ->get();
        $status_name = $status_names[1]->status_name;
        
        return view('profile_guest',[
                'user_name'=>$user_name,
                'user_icon'=>"https://s3-ap-northeast-1.amazonaws.com/fandelion/".$user_icon,
                'status_name'=>$status_name,
            ]);
    }
    
    public function index_host_mode()
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
