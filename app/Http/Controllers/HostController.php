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

class HostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if (Auth::check()){
            $user = Auth::user()->id;
            $user_name =  Auth::user()->name;
            $user_icon =  Auth::user()->user_icon;
            $status_names = DB::table('users')
                                ->join('mem_statuses', 'users.memstatus_id', '=', 'mem_statuses.id')
                                ->select('name', 'status_name')
                                ->get();
            $status_name = $status_names[1]->status_name;
            
            // user_idが$userとなっているジムをピックアップする
            $gyms = Gym::where('user_id', '=', $user)
                ->get();
            
            $search_amount = count($gyms);
            
            // dd($search_amount);
            
            if($search_amount == 0){
                return view('manage_gyms',[
                        'search_amount' => $search_amount,
                        'gyms'=>"",
                        'gym_info'=>"",
                        'user_name'=>$user_name,
                        'user_icon'=>"https://s3-ap-northeast-1.amazonaws.com/fandelion/".$user_icon,
                        'status_name'=>$status_name,
                        'gym_id'=>"",
                        'gym_titles'=>"",
                        'gym_addr'=>"",
                        'review_amount' =>"",
                        'review_average'=>"",
                        'guest_gender' =>"",
                        'gym_latitude' =>"",
                        'gym_longitude' =>"",
                        'gym_equipment' =>"",
                        ]);
            }else {
                foreach($gyms as $gym){
                        $gym_id[] = $gym->id;
                        $gym_titles[] = $gym->gym_title;
                        $gym_addr[] = $gym->addr;
                        $gym_latitude[] = $gym->latitude;
                        $gym_longitude[] = $gym->longitude;
                        $guest_gender[] = DB::table('gyms')
                                    ->join('guest_genders', 'guest_genders.id', '=', 'gyms.guest_gender')
                                    ->select('guest_genders.guest_gender', 'gyms.id')
                                    ->where('gyms.id',$gym->id)
                                    ->get()[0]->guest_gender;
                        
                        
                        
                        // innerjoinでbooking_id経由でtotal_starsを取得する
                        $reviews[] =  DB::table('bookings')
                                        ->join('gyms', 'gyms.id', '=', 'bookings.gym_id')
                                        ->join('guest_to_host_reviews', 'booking_id', '=', 'bookings.id')
                                        ->select('total_stars')
                                        ->where('gyms.id',$gym->id)
                                        ->get();
                        
                        
                        // dd($reviews[0][0]->total_stars);
                        
                        
                        
                        $review_counts = count($reviews[0]);
                        
                        
                        
                        
                        
                        
                        
                        
                        $gym_info[] = DB::table('gyms')
                                    ->join('gym_images', 'gyms.id', '=', 'gym_id')
                                    ->join('gym_types', 'gymType_id', '=', 'gym_types.id')
                                    ->join('gym_areas', 'area', "=", 'gym_areas.id')
                                    ->join('guest_genders', 'gyms.guest_gender', "=", 'guest_genders.id')
                                    ->where('gyms.id',$gym->id)
                                    ->get()[0];
                        // dd($gym_info);
                        
                        
                        // ジムのスケジュールを取得する
                        $gym_schedule = DB::table('gyms')
                                    ->join('gym_schedules', 'gyms.id', '=', 'gym_id')
                                    ->select('gym_id','from_time', 'to_time', 'price', 'status', 'day', 'booking_id')
                                    ->where('gyms.id',$gym->id)
                                    ->get();
                                    
                        // ジムの設備を取得する
                        $gym_equipment = DB::table('gyms')
                                    ->join('equipment', 'gyms.id', '=', 'gym_id')
                                    ->select('gyms.id', 'equipment_name', 'max_weight', 'min_weight', 'review_average', 'guest_limit', 'area')
                                    ->where('gyms.id',$gym->id)
                                    ->get();
                                    
                        
                        
                        // ジムの最低価格と最高価格を取得する
                        $max_price = $gym_schedule   -> max('price');
                        $min_price = $gym_schedule -> min('price');
                        
                        //画面上に表示する価格レンジを定義する 
                        if($max_price == $min_price){
                            $price_range[] = $min_price . "円";
                        } else {
                            $price_range[] = $min_price . "円〜" . $max_price. "円";
                        }
                        
                    }
                    
                    // dd($gym_info);
                    
                    // dd($reviews);
                    // 各ジムのレビュー数をカウントする
                        $gym_count = count($gym_id);
                        
                        for($i=0; $i<$gym_count; $i++){
                            $review_count[] = count($reviews[$i]);
                            $review_counts = count($reviews[$i]);
                            $total_review = 0;
                            for($j=0; $j<$review_counts; $j++){
                                $total_review += $reviews[$i][$j]->total_stars;
                            }
                            if($review_counts != 0){
                                $review_average[] = round($total_review / $review_counts, 1);
                            }else{
                                $review_average[] = "-";
                            }
                        }
                        // dd($review_count);
                        // dd($review_average);
                    
                    
                        
                        
                    
                // dd($guest_gender);
                // dd($gym_id);
                
                
                
                
                    
                    
                    
                    return view('manage_gyms',[
                        'gyms'=>$gyms,
                        'gym_info'=>$gym_info,
                        'user_name'=>$user_name,
                        'user_icon'=>"https://s3-ap-northeast-1.amazonaws.com/fandelion/".$user_icon,
                        'status_name'=>$status_name,
                        'gym_id'=>$gym_id,
                        'gym_titles'=>$gym_titles,
                        'gym_addr'=>$gym_addr,
                        'review_amount' => $review_count,
                        'review_average'=>$review_average,
                        'search_amount' => $search_amount,
                        'guest_gender' => $guest_gender,
                        'gym_latitude' => $gym_latitude,
                        'gym_longitude' => $gym_longitude,
                        'gym_equipment' => $gym_equipment,
                        ]);
                    }
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
