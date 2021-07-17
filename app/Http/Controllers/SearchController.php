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

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        // dd($request->all());
        
        $city2 = $request->city2;
        $cityLat = $request->cityLat;
        $cityLng = $request->cityLng;
        $men = $request->men;
        $women = $request->women;
        $total_guest = $request->total_guest;
        $others = $request->others;
        
        $latitude_from = $cityLat - 0.03;
        $latitude_to = $cityLat + 0.03;
        $longitude_from = $cityLng  - 0.03;
        $longitude_to = $cityLng  + 0.03;
        
        // dd($latitude_to);
        
        
        
        
        // $menあり、$womenなし⇨guest_genderは1,3,5
        // $menあり、$womenあり⇨guest_genderは1,4,5
        // $menなし、$womenあり⇨guest_genderは1,2,4
        // $menなし、$womenなし⇨guest_genderはすべて
        if($men != 0){
            if($women == 0){
                $guest_gender_select = [1, 3, 5];
            }else{
                $guest_gender_select = [1, 4, 5];
            }
        }else if($women != 0){
                $guest_gender_select = [1, 2, 4];
            }else{
                $guest_gender_select = [1, 2, 3, 4, 5];
            }
        
        // dd($guest_gender);
        
        // LatitudeとLongitudeがcityLatとcityLngの±0.1した範囲内にあるジムをピックアップする
        // 定員がtotal_guest以下のジムをピックアップする
        $gyms = Gym::where('guest_limit', '>=', $total_guest)
            ->whereIn('guest_gender',$guest_gender_select)
            ->where('latitude', '>', $latitude_from)
            ->where('latitude', '<', $latitude_to)
            ->where('longitude', '>', $longitude_from)
            ->where('longitude', '<', $longitude_to)
            ->get();
        
        // dd($gyms);
        
        $search_amount = count($gyms);
        // dd($search_amount);
        
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
                
                
                
                
                
                
                
                
                $gym_image_url[] = DB::table('gyms')
                            ->join('gym_images', 'gyms.id', '=', 'gym_id')
                            ->select('img_url')
                            ->where('gyms.id',$gym->id)
                            ->get()[0]->img_url;
                // ジムのスケジュールを取得する
                $gym_schedule = DB::table('gyms')
                            ->join('gym_schedules', 'gyms.id', '=', 'gym_id')
                            ->select('gym_id','from_time', 'to_time', 'price', 'status', 'day', 'booking_id')
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
        
        
        
        if (Auth::check()){
            $user = Auth::user()->id;
            // dd($user);
            // $gym_title = Gym::where('user_id',$user)->first()->title;
            // $gym_title = DB::table('gyms')
            //                 ->join('users', 'gyms.user_id', '=', 'users.id')
            //                 // ->select('user_id','email','title', 'gym_desc')
            //                 ->where('user_id', $user)
            //                 ->first()->email;
            // dd($gym_title);
            $user_name =  Auth::user()->name;
            // $user_memstatus_id = Auth::user()->memstatus_id;
            $status_names = DB::table('users')
                                ->join('mem_statuses', 'users.memstatus_id', '=', 'mem_statuses.id')
                                ->select('name', 'status_name')
                                ->get();
            $status_name = $status_names[1]->status_name;
            
            // dd($status_name);
            
            
            return view('search_results',[
                'user_name'=>$user_name,
                'status_name'=>$status_name,
                'gym_id'=>$gym_id,
                'gym_titles'=>$gym_titles,
                'gym_addr'=>$gym_addr,
                'review_amount' => $review_count,
                'review_average'=>$review_average,
                'gym_image_url'=>$gym_image_url,
                'search_amount' => $search_amount,
                'guest_gender' => $guest_gender,
                'cityLat' => $cityLat,
                'cityLng' => $cityLng,
                'gym_latitude' => $gym_latitude,
                'gym_longitude' => $gym_longitude,
                // 'gym_schedule'=>$gym_schedule,
                // 'price_range'=>$price_range,
                ]);
            } else{
            return view('search_results',[
                'gym_id'=>$gym_id,
                'gym_titles'=>$gym_titles,
                'gym_addr'=>$gym_addr,
                'review_amount' => $review_count,
                'review_average'=>$review_average,
                'gym_image_url'=>$gym_image_url,
                'search_amount' => $search_amount,
                'guest_gender' => $guest_gender,
                'cityLat' => $cityLat,
                'cityLng' => $cityLng,
                'gym_latitude' => $gym_latitude,
                'gym_longitude' => $gym_longitude,
                // 'gym_schedule'=>$gym_schedule,
                // 'price_range'=>$price_range,
                ]);
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
