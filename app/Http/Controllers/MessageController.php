<?php

namespace App\Http\Controllers;

use App\Message;
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

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_messages()
    {
        $user_name =  Auth::user()->name;
        $user_id =  Auth::user()->id;
        // $user_memstatus_id = Auth::user()->memstatus_id;
        $status_names = DB::table('users')
                            ->join('mem_statuses', 'users.memstatus_id', '=', 'mem_statuses.id')
                            ->select('name', 'status_name')
                            ->get();
        $status_name = $status_names[1]->status_name;
        
        $messages = DB::table('messages')
                    ->where('messages.guest_id',$user_id)
                    ->join('users', 'users.id', '=', 'messages.host_id')
                    ->select('guest_id', 'gym_id', 'host_id', 'sender', 'message', 'status_flg', 'name')
                    ->get();
                    
        
        // dd($messages[1]->name);
        
        // Message::where('guest_id',$user_id)
        //             ->get();
        $messages_count = count($messages);
        
        // dd($messages);
        
        $guest_id[] = "";
        $host_name[] = "";
        $gym_id[] = "";
        $host_id[] = "";
        $sender[] = "";
        $message[] = "";
        $status_flg[] = "";
        
        // dd($messages);
        
        if($messages_count!=0){
            foreach($messages as $ms){
                $guest_id[] = $ms->guest_id;
                $gym_id[] = $ms->gym_id;
                $host_id[] = $ms->host_id;
                $host_name[] = $ms->name;
                $sender[] = $ms->sender;
                $message[] = $ms->message;
                $status_flg[] = $ms->status_flg;
            }
        }
        
        // dd($host_name);
        
        //
        return view('messages',[
                'user_name'=>$user_name,
                'status_name'=>$status_name,
                'guest_id'=>$guest_id,
                'gym_id'=>$gym_id,
                'host_id'=>$host_id,
                'host_name'=>$host_name,
                'sender'=>$sender,
                'message'=>$message,
                'status_flg'=>$status_flg,
            ]);
    }
    
    
    public function index_conversation()
    {
        $user_name =  Auth::user()->name;
        // $user_memstatus_id = Auth::user()->memstatus_id;
        $status_names = DB::table('users')
                            ->join('mem_statuses', 'users.memstatus_id', '=', 'mem_statuses.id')
                            ->select('name', 'status_name')
                            ->get();
        $status_name = $status_names[1]->status_name;
        
        //
        return view('messages_conversation',[
                'user_name'=>$user_name,
                'status_name'=>$status_name,
            ]);
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
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        //
    }
}
