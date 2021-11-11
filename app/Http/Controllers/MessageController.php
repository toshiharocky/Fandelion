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
        $user_icon =  Auth::user()->user_icon;
        
        $user_id =  Auth::user()->id;
        // $user_memstatus_id = Auth::user()->memstatus_id;
        $status_names = DB::table('users')
                            ->join('mem_statuses', 'users.memstatus_id', '=', 'mem_statuses.id')
                            ->select('name', 'status_name')
                            ->get();
        $status_name = $status_names[1]->status_name;
        
        
        $now = date("m/d/Y H:i:s");
        
        $messages = DB::table('message_lists')
                    ->where('guest_id',$user_id)
                    ->join('users', 'users.id', '=', 'message_lists.host_id')
                    ->orderBy('message_lists.updated_at','desc')
                    ->select('guest_id', 'gym_id', 'host_id', 'sender', 'last_message', 'name', 'message_lists.updated_at', 'user_icon')
                    ->get();
                    
        
        // dd($messages);
        
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
        
        // if($messages_count!=0){
        //     foreach($messages as $ms){
        //         $guest_id[] = $ms->guest_id;
        //         $gym_id[] = $ms->gym_id;
        //         $host_id[] = $ms->host_id;
        //         $host_name[] = $ms->name;
        //         $sender[] = $ms->sender;
        //         $message[] = $ms->message;
        //         $status_flg[] = $ms->status_flg;
        //     }
        // }
        
        // dd($host_name);
        
        //
        return view('messages',[
                'user_name'=>$user_name,
                'user_icon'=>"https://s3-ap-northeast-1.amazonaws.com/fandelion/".$user_icon,
                'status_name'=>$status_name,
                'messages'=>$messages,
                // 'guest_id'=>$guest_id,
                // 'gym_id'=>$gym_id,
                // 'host_id'=>$host_id,
                // 'host_name'=>$host_name,
                // 'sender'=>$sender,
                // 'message'=>$message,
                // 'status_flg'=>$status_flg,
            ]);
    }
    
    
    public function index_conversation(Request $request)
    {
        $user_name = Auth::user()->name;
        $user_icon =  Auth::user()->user_icon;
        $guest_id = Auth::user()->id;
        // dd($guest_id);
        // $user_memstatus_id = Auth::user()->memstatus_id;
        
        $message_list = DB::table('message_lists')
                    ->where('message_lists.guest_id',$guest_id)
                    ->join('users', 'users.id', '=', 'message_lists.host_id')
                    ->orderBy('message_lists.updated_at','desc')
                    ->select('guest_id', 'gym_id', 'host_id', 'sender', 'last_message', 'name', 'message_lists.updated_at', 'user_icon')
                    ->get();
        // dd($message_list);
        
        $messages = DB::table('messages')
                    ->where('messages.guest_id',$guest_id)
                    ->join('users', 'users.id', '=', 'messages.host_id')
                    ->join('gym_images', 'gym_images.gym_id', '=', 'messages.gym_id')
                    ->join('gyms', 'gyms.id', '=', 'messages.gym_id')
                    ->orderBy('messages.updated_at','desc')
                    ->select('guest_id', 'messages.gym_id', 'host_id', 'sender', 'message', 'messages.updated_at', 'status_flg', 'name', 'thumbnail', 'user_icon')
                    ->get();
        // dd($messages);
        
        $status_names = DB::table('users')
                            ->join('mem_statuses', 'users.memstatus_id', '=', 'mem_statuses.id')
                            ->select('name', 'status_name')
                            ->get();
        $status_name = $status_names[1]->status_name;
        $gym_id = $request->gym_id;
        
        $gym_info = GYM::where('id', $gym_id)->get();
        $host_id = $gym_info[0]->user_id;
        $host_info = USER::where('id', $host_id)->get();
        $host_name = $host_info[0]->name;
        // dd($host_name);
        $gym_title = $gym_info[0]->gym_title;
        $message_info = DB::table('messages')
                        ->where('gym_id', $gym_id)
                        ->where('guest_id', $guest_id)
                        ->get();
        // dd($message_info);
        
        //
        return view('messages_conversation',[
                'user_name'=>$user_name,
                'user_icon'=>"https://s3-ap-northeast-1.amazonaws.com/fandelion/".$user_icon,
                'status_name'=>$status_name,
                'message_info'=>$message_info,
                'message_list'=>$message_list,
                'host_name'=>$host_name,
                'guest_id'=>$guest_id,
                'host_id'=>$host_id,
                'gym_id'=>$gym_id,
                'gym_title'=>$gym_title,
                'messages'=>$messages
            ]);
    }
    
    
    // jsonでデータを返す
    public function getData()
    {
        $guest_id = Auth::user()->id;
        $messages = DB::table('messages')
                    ->where('messages.guest_id',$guest_id)
                    ->join('users', 'users.id', '=', 'messages.host_id')
                    ->join('gyms', 'gyms.id', '=', 'messages.gym_id')
                    ->orderBy('messages.updated_at','asc')
                    ->select('guest_id', 'messages.gym_id', 'host_id', 'sender', 'message', 'status_flg', 'name', 'messages.updated_at', 'thumbnail', 'gym_title', 'addr', 'user_icon')
                    ->get();
        $json = ["messages" => $messages];
        return response()->json($json);
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
        $user_name = Auth::user()->name;
        $user_icon =  Auth::user()->user_icon;
        $status_names = DB::table('users')
                            ->join('mem_statuses', 'users.memstatus_id', '=', 'mem_statuses.id')
                            ->select('name', 'status_name')
                            ->get();
        $status_name = $status_names[1]->status_name;
        $guest_id = Auth::user()->id;
        
        $message = $request->message;
        $gym_id = $request->gym_id;
        $guest_id = $request->guest_id;
        $host_id = $request->host_id;
        
        DB::table('messages')->insert([
                    'guest_id' => $guest_id,
                    'gym_id' => $gym_id,
                    'host_id' => $host_id,
                    'sender' => $guest_id,
                    'message' => $message,
                    'status_flg' => 1,
                ]);
        
        
        
        $message_list_2 = MessageList::where('guest_id', $guest_id)
                        ->where('gym_id', $gym_id)
                        ->get();
        $message_list_count = count($message_list_2);
        if($message_list_count==0){
            DB::table('message_lists')->insert([
                    'guest_id' => $guest_id,
                    'gym_id' => $gym_id,
                    'host_id' => $host_id,
                    'sender' => $guest_id,
                    'last_message' => $message,
                    // 'status_flg' => 1,
                ]);
        }else{
            $message_list_id = $message_list_2[0]->id;
            $message_list_update = MessageList::find($message_list_id);
            $message_list_update->last_message = $message;
            $message_list_update->save();
        }
        
        $message_list = DB::table('message_lists')
                    ->where('message_lists.guest_id',$guest_id)
                    ->join('users', 'users.id', '=', 'message_lists.host_id')
                    ->orderBy('message_lists.updated_at','desc')
                    ->select('guest_id', 'gym_id', 'host_id', 'sender', 'last_message', 'name', 'message_lists.updated_at', 'user_icon')
                    ->get();
        $gym_info = GYM::where('id', $gym_id)->get();
        
        $host_info = USER::where('id', $host_id)->get();
        $host_name = $host_info[0]->name;
        // dd($host_name);
        $gym_title = $gym_info[0]->gym_title;
        $message_info = DB::table('messages')
                        ->where('gym_id', $gym_id)
                        ->where('guest_id', $guest_id)
                        ->get();
        $messages = DB::table('messages')
                    ->where('messages.guest_id',$guest_id)
                    ->join('users', 'users.id', '=', 'messages.host_id')
                    ->select('guest_id', 'gym_id', 'host_id', 'sender', 'message', 'status_flg', 'name')
                    ->get();
        
        // return view('messages_conversation', [
        //         'user_name'=>$user_name,
        //         'status_name'=>$status_name,
        //         'message_info'=>$message_info,
        //         'message_list'=>$message_list,
        //         'host_name'=>$host_name,
        //         'guest_id'=>$guest_id,
        //         'host_id'=>$host_id,
        //         'gym_id'=>$gym_id,
        //         'gym_title'=>$gym_title,
        //         'messages'=>$messages
        //     ]);
        
        return redirect()->route('messages_conversation', [
                'user_name'=>$user_name,
                'user_icon'=>"https://s3-ap-northeast-1.amazonaws.com/fandelion/".$user_icon,
                'status_name'=>$status_name,
                'message_info'=>$message_info,
                'message_list'=>$message_list,
                'host_name'=>$host_name,
                'guest_id'=>$guest_id,
                'host_id'=>$host_id,
                'gym_id'=>$gym_id,
                'gym_title'=>$gym_title,
                'messages'=>$messages
            ]);
        
    }


public function direct_messages(Request $request)
    {
        //
        $user_name = Auth::user()->name;
        $user_icon =  Auth::user()->user_icon;
        $status_names = DB::table('users')
                            ->join('mem_statuses', 'users.memstatus_id', '=', 'mem_statuses.id')
                            ->select('name', 'status_name')
                            ->get();
        $status_name = $status_names[1]->status_name;
        $guest_id = Auth::user()->id;
        
        $message = $request->message;
        $gym_id = $request->gym_id;
        $guest_id = $request->guest_id;
        $host_id = $request->host_id;
        
        
        
        DB::table('messages')->insert([
                    'guest_id' => $guest_id,
                    'gym_id' => $gym_id,
                    'host_id' => $host_id,
                    'sender' => $guest_id,
                    'message' => $message,
                    'status_flg' => 1,
                ]);
        
        
        
        $message_list_2 = MessageList::where('guest_id', $guest_id)
                        ->where('gym_id', $gym_id)
                        ->get();
        $message_list_count = count($message_list_2);
        if($message_list_count==0){
            DB::table('message_lists')->insert([
                    'guest_id' => $guest_id,
                    'gym_id' => $gym_id,
                    'host_id' => $host_id,
                    'sender' => $guest_id,
                    'last_message' => $message,
                    // 'status_flg' => 1,
                ]);
        }else{
            $message_list_id = $message_list_2[0]->id;
            $message_list_update = MessageList::find($message_list_id);
            $message_list_update->last_message = $message;
            $message_list_update->save();
        }
        
        $message_list = DB::table('message_lists')
                    ->where('message_lists.guest_id',$guest_id)
                    ->join('users', 'users.id', '=', 'message_lists.host_id')
                    ->orderBy('message_lists.updated_at','desc')
                    ->select('guest_id', 'gym_id', 'host_id', 'sender', 'last_message', 'name', 'message_lists.updated_at', 'user_icon')
                    ->get();
        $gym_info = GYM::where('id', $gym_id)->get();
        
        $host_info = USER::where('id', $host_id)->get();
        $host_name = $host_info[0]->name;
        // dd($host_name);
        $gym_title = $gym_info[0]->gym_title;
        $message_info = DB::table('messages')
                        ->where('gym_id', $gym_id)
                        ->where('guest_id', $guest_id)
                        ->get();
        $messages = DB::table('messages')
                    ->where('messages.guest_id',$guest_id)
                    ->join('users', 'users.id', '=', 'messages.host_id')
                    ->select('guest_id', 'gym_id', 'host_id', 'sender', 'message', 'status_flg', 'name')
                    ->get();
        
        // return view('messages_conversation', [
        //         'user_name'=>$user_name,
        //         'status_name'=>$status_name,
        //         'message_info'=>$message_info,
        //         'message_list'=>$message_list,
        //         'host_name'=>$host_name,
        //         'guest_id'=>$guest_id,
        //         'host_id'=>$host_id,
        //         'gym_id'=>$gym_id,
        //         'gym_title'=>$gym_title,
        //         'messages'=>$messages
        //     ]);
        
        return redirect()->route('messages_conversation', [
                'user_name'=>$user_name,
                'user_icon'=>"https://s3-ap-northeast-1.amazonaws.com/fandelion/".$user_icon,
                'status_name'=>$status_name,
                'message_info'=>$message_info,
                'message_list'=>$message_list,
                'host_name'=>$host_name,
                'guest_id'=>$guest_id,
                'host_id'=>$host_id,
                'gym_id'=>$gym_id,
                'gym_title'=>$gym_title,
                'messages'=>$messages
            ]);
        
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
