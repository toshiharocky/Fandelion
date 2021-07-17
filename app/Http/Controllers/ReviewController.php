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
use App\GuestToHostReview;
use Illuminate\Support\Str;
use DateTime;

class ReviewController extends Controller
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
    public function guestToHost_create(Request $request)
    {
        //
        // ログインユーザー取得
        $user = Auth::user()->id;
        
        $user_name =  Auth::user()->name;
        
        $request->session()->put('gym_id', $request->gym_id);
        $request->session()->put('booking_id', $request->booking_id);
        
        $gym_id = $request->session()->get('gym_id');
        $booking_id = $request->session()->get('booking_id');
        
        $gym_infos = Gym::where('id', $gym_id)->get();
        // dd($gym_infos);
        
        $gym_title = $gym_infos[0]->gym_title;
        $host_user_id  = $gym_infos[0]->user_id;
        // inner joinでホスト名を取得
        $host_name_array = DB::table('gyms')
                    ->join('users', 'gyms.user_id', '=', 'users.id')
                    ->select('users.name')
                    ->where('gyms.id',$gym_id)
                    ->get();
        $host_name = $host_name_array[0]->name;
        $addr  = $gym_infos[0]->addr;
        
        // inner joinで写真のURLを呼び出す
        $gym_image_url = DB::table('gyms')
                    ->join('gym_images', 'gyms.id', '=', 'gym_id')
                    ->select('img_url')
                    ->where('gym_id',$gym_id)
                    ->get();
        
        
        
        
        // $number_of_users、$number_of_men、$number_of_women、$number_of_others、$total_price、$gym_price、$service_price、$tax
        $booking_details = Booking::where('id', $booking_id)->get();
        // dd($booking_details);
        $booking_from_time= $booking_details[0]->booking_from_time;
        $booking_to_time= $booking_details[0]->booking_to_time;
        $date =  date('m/d', strtotime("$booking_from_time"));
        $from_time = date('H:i', strtotime("$booking_from_time"));
        $to_time = date('H:i', strtotime("$booking_to_time"));
        $from_to = $from_time.' 〜 '.$to_time;
        
        
        $total_time_hour = date('H', strtotime($to_time) - strtotime($from_time));
        $total_time_minute = date('i', strtotime($to_time) - strtotime($from_time));
        
        if($total_time_hour == 0){
            $total_time = $total_time_minute.'分';
        }else {
            $total_time = $total_time_hour.'時間'.$total_time_minute.'分';
        }
        
        // dd($total_time);
        
        $number_of_users = $booking_details[0]->number_of_users;
        $number_of_men = $booking_details[0]->number_of_men;
        $number_of_women = $booking_details[0]->number_of_women;
        $number_of_others = $booking_details[0]->number_of_others;
        $total_price = $booking_details[0]->total_price;
        $gym_price = $booking_details[0]->gym_price;
        $service_price = $booking_details[0]->service_price;
        $tax = $booking_details[0]->tax;
        
        
        return view('review_guestToHost',[
                'user'=>$user,
                'user_name'=>$user_name,
                'gym_id'=>$gym_id,
                'booking_id'=>$booking_id,
                'gym_title'=>$gym_title,
                'host_user_id'=>$host_user_id,
                'host_name'=>$host_name,
                'addr'=>$addr,
                'gym_image_url'=>$gym_image_url,
                'date'=>$date,
                'from_to'=>$from_to,
                'total_time'=>$total_time,
                'number_of_users'=>$number_of_users,
                'number_of_men'=>$number_of_men,
                'number_of_women'=>$number_of_women,
                'number_of_others'=>$number_of_others,
                'total_price'=>$total_price,
                'gym_price'=>$gym_price,
                'service_price'=>$service_price,
                'tax'=>$tax,
            ]); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guestToHost_store(Request $request)
    {
        //
        $gym_id = $request->session()->get('gym_id');
        $booking_id = $request->session()->get('booking_id');
        
        
        
        $total_stars = $request->total_stars;
        $equipment_stars = $request->equipment_stars;
        $cleanliness_stars = $request->cleanliness_stars;
        $accuracy_stars = $request->accuracy_stars;
        $communication_stars = $request->communication_stars;
        $note = $request->note;
        
        // dd($request->all());
        
        // GuestToHostReviewテーブルを登録する
        $g2h_review = new GuestToHostReview;
        $g2h_review->booking_id =$booking_id;
        $g2h_review->total_stars =$total_stars;
        $g2h_review->equipment_stars =$equipment_stars;
        $g2h_review->cleanliness_stars =$cleanliness_stars;
        $g2h_review->accuracy_stars =$accuracy_stars;
        $g2h_review->communication_stars =$communication_stars;
        $g2h_review->note =$note;
        $g2h_review->save();
        
        
        // Bookingテーブルのbookingstatus_idが25なら、bookingstatus_idを30にする
        // Bookingテーブルのbookingstatus_idが30なら、bookingstatus_idを35にする
        $booking = Booking::find($booking_id);
        $bookingstatus_id = Booking::find($booking_id)->bookingstatus_id;
        
        if($bookingstatus_id == '25'){
            $booking->bookingstatus_id = '30';
        }elseif($bookingstatus_id == '30'){
            $booking->bookingstatus_id = '35';
        }
        $booking->save();
        
        return redirect('/history');
    }
    
    public function hostToGuest_store(Request $request)
    {
        //
        
        // review_guestToHost
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
