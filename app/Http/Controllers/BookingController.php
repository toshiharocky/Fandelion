<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\MemStatus;
use Illuminate\Http\Request;
use App\User;//この行を上に追加
use Auth;//この行を上に追加
use Validator;//この行を上に追加
use App\GymStatus;
use App\Booking;
use App\Gym;
use App\GymImage;
use App\Equipment;
use App\GymSchedule;
use Illuminate\Support\Str;
use DateTime;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // ログインユーザー取得
        $user = Auth::user()->id;
        
        $user_name =  Auth::user()->name;
        
        
        // Bookingsテーブルから$userの予約を抽出する
        // 当該予約の日時情報（booking_from_timeとbooking_to time）とgym_id、bookingstatus_idを抽出する
        $user_histories = DB::table('bookings')
                    ->join('users', 'bookings.user_id', '=','users.id')
                    // $userの予約に表示されているgym_idから、cancel_policy_id、gym_title、img_url[1]を抽出する
                    ->join('gyms', 'bookings.gym_id', '=','gyms.id')
                    // ->join('gym_images', 'bookings.gym_id', '=','gym_images.gym_id')
                    ->select('bookings.id','bookings.user_id','gym_title','addr','booking_from_time', 'booking_to_time', 'bookings.gym_id', 'bookingstatus_id', 'cancel_policy_id')
                    ->where('users.id',$user)
                    ->orderBy('booking_from_time', 'asc')
                    ->get();
        
        
        
        
        
        foreach($user_histories as $user_history){
                $booking_id[] = $user_history->id;
                $booking_from_time[] = $user_history->booking_from_time;
                $booking_to_time[] = $user_history->booking_to_time;
                $gym_id[] = $user_history->gym_id;
                $gym_title[] = $user_history->gym_title;
                $addr[] = $user_history->addr;
                $bookingstatus_id[] = $user_history->bookingstatus_id;
                $cancel_policy_id[] = $user_history->cancel_policy_id;
                $cancel_policy = DB::table('cancel_policies')
                            ->join('gyms', 'cancel_policies.id', '=', 'gyms.cancel_policy_id')
                            ->select('policy_name', 'policy_desc')
                            ->where('gyms.id',$user_history->gym_id)
                            ->get();
                $gym_image_url[] = DB::table('gyms')
                            ->join('gym_images', 'gyms.id', '=', 'gym_id')
                            ->select('img_url')
                            ->where('gym_id',$user_history->gym_id)
                            ->get()[0]->img_url;
                            
            }
        
        
        
        //$booking_idが存在しない（＝予約がゼロ）かどうかによって、history.blade.phpに渡す値を変える
        if(isset($booking_id)){
        return view('history',[
            
                'booking_check'=>0,
                'user_id'=>$user,
                'user_name'=>$user_name,
                'booking_id'=>$booking_id,
                'gym_title'=>$gym_title,
                'addr'=>$addr,
                'booking_from_time'=>$booking_from_time,
                'booking_to_time'=>$booking_to_time,
                'gym_id'=>$gym_id,
                'bookingstatus_id'=>$bookingstatus_id,
                'cancel_policy_id'=>$cancel_policy_id,
                'cancel_policy'=>$cancel_policy,
                'gym_image_url'=>$gym_image_url,
                
                ]
                );
        } else {
         return view('history',[
                'booking_check'=>1,
                'user_id'=>$user,
                'user_name'=>$user_name,
                'gym_title'=>"none",
                'addr'=>"none",
                'booking_id'=>"none",
                'booking_from_time'=>"none",
                'booking_to_time'=>"none",
                'gym_id'=>"none",
                'bookingstatus_id'=>"none",
                'cancel_policy_id'=>"none",
                'cancel_policy'=>"none",
                'gym_image_url'=>"none",
                ]
                );   
        }
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
        // ログインユーザー取得
        $user = Auth::user()->id;
        
        $user_name =  Auth::user()->name;
        
        $gym_id = $request->session()->get('gym_id');
        
        // $request->session()->put('total_time', $request->total_time);
        // $request->session()->put('from_to', $request->from_to);
        // $request->session()->put('number_of_users', $request->number_of_users);
        // $request->session()->put('number_of_men', $request->number_of_men);
        // $request->session()->put('number_of_women', $request->number_of_women);
        // $request->session()->put('number_of_others', $request->number_of_others);
        // $request->session()->put('gym_price', $request->gym_price);
        // $request->session()->put('service_price', $request->service_price);
        // $request->session()->put('tax', $request->tax);
        // $request->session()->put('total_price', $request->total_price);
        // $request->session()->put('slots', $request->slots);
        // $request->session()->put('schedule_ids', $request->schedule_ids);
        // $request->session()->put('booking_from_time', $request->booking_from_time);
        // $request->session()->put('booking_from_time', $booking_from_time);
        // $request->session()->put('booking_to_time', $booking_to_time);
        $total_time = $request->session()->get('total_time');
        $from_to = $request->session()->get('from_to');
        $number_of_users = $request->session()->get('number_of_users');
        $number_of_men = $request->session()->get('number_of_men');
        $number_of_women = $request->session()->get('number_of_women');
        $number_of_others = $request->session()->get('number_of_others');
        $total_price = $request->session()->get('total_price');
        $gym_price = $request->session()->get('gym_price');
        $service_price = $request->session()->get('service_price');
        $tax = $request->session()->get('tax');
        $slots = $request->session()->get('slots');
        $schedule_ids = $request->session()->get('schedule_ids');
        $date = $request->session()->get('date');
        $booking_from_time = $request->session()->get('booking_from_time');
        $booking_to_time = $request->session()->get('booking_to_time');
        // dd($booking_from_time);
        // dd($schedule_ids);   
        
        $from_time = date("Y-m-d H:i", strtotime($date." ".$booking_from_time));
        $to_time = date("Y-m-d H:i", strtotime('+15 minute',strtotime($from_time)));
        // dd($from_time);
        
        // Bookingテーブルに作成
        $booking = new Booking;
        $booking->user_id  = $user;
        $booking->gym_id  = $gym_id;
        $booking->bookingstatus_id = 1;
        $booking->booking_from_time  = $from_time;
        $booking->booking_to_time  = $to_time;
        $booking->number_of_users  = $number_of_users;
        $booking->number_of_men  = $number_of_men;
        $booking->number_of_women  = $number_of_women;
        $booking->number_of_others  = $number_of_others;
        $booking->total_price  = $total_price;
        $booking->gym_price  = $gym_price;
        $booking->service_price  = $service_price;
        $booking->tax  = $tax;
        $booking->save(); 
        $booking_id = $booking->id;
        
        // それぞれのGym Scheduleテーブルを更新
        $schedule_id = count($schedule_ids);
        
        for($i = 0; $i < $schedule_id; $i++){
            
                $schedule_id_int = (int)$schedule_ids[$i];
                $gym_schedule = GymSchedule::find($schedule_ids[$i]);
                $gym_schedule->booking_id = $booking_id;
                $gym_schedule->status = 2;
                $gym_schedule->save();
            }
        
        return view('booking_completed',[
                'user_name'=>$user_name,]
                );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        //
    }
    
    public function check_in(Request $request){
        // ログインユーザー取得
        $user = Auth::user()->id;
        
        $user_name =  Auth::user()->name;
        
        // bookingsテーブルのbookingstatus_idを「20」に変更する（ルーティングが必要
        $booking_id = $request->booking_id;
        $booking = Booking::find($booking_id);
        $booking->bookingstatus_id = 20;
        $booking->save();   
        
        return view('check_in',[
                'user_name'=>$user_name,]
                );
    }
    
    public function check_out(Request $request){
        // ログインユーザー取得
        $user = Auth::user()->id;
        
        $user_name =  Auth::user()->name;
        
        // bookingsテーブルのbookingstatus_idを「25」に変更する（ルーティングが必要
        $booking_id = $request->booking_id;
        $booking = Booking::find($booking_id);
        $booking->bookingstatus_id = 25;
        $booking->save();   
        
        return view('check_out',[
                'user_name'=>$user_name,]
                );
    }
}
