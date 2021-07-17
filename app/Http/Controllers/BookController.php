<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
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

class BookController extends Controller
{
    //
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
        $user_name =  Auth::user()->name;
        
                
        $gym_id = $request->session()->get('gym_id');
        // dd($gym_id);
        
        $gym_infos = Gym::where('id', $gym_id)->get();
        // dd($gym_infos);
        
        // guest_limitを取得
        $guest_limit  = $gym_infos[0]->guest_limit;
        
        
        // guest_genderの希望を表示
        $guest_gender_flg  = $gym_infos[0]->guest_gender;
        $guest_gender_title = DB::table('guest_genders')
                        ->join('gyms', 'guest_genders.id', '=', 'gyms.guest_gender')
                        ->select('guest_genders.guest_gender')
                        ->where('gyms.id',$gym_id)
                        ->get();
        $guest_gender = $guest_gender_title[0]->guest_gender;
        // dd($guest_gender);
        
        
        $gym_title = $gym_infos[0]->gym_title;
        $addr  = $gym_infos[0]->addr;
        
        $host_user_id  = $gym_infos[0]->user_id;
        // inner joinでホスト名を取得
        $host_name_array = DB::table('gyms')
                    ->join('users', 'gyms.user_id', '=', 'users.id')
                    ->select('users.name')
                    ->where('gyms.id',$gym_id)
                    ->get();
        $host_name = $host_name_array[0]->name;
        
        // ジムのスケジュールを取得する
        $gym_schedule = DB::table('gyms')
                    ->join('gym_schedules', 'gyms.id', '=', 'gym_id')
                    ->select('gym_schedules.id', 'gym_id','from_time', 'to_time', 'price', 'status', 'day', 'booking_id')
                    ->where('gym_id',$gym_id)
                    ->get();
        
        
        // dd($gym_schedule[0]->id);
        
        
        
        $gymType_id  = $gym_infos[0]->gymType_id;
        // ジムタイプを取得する
        $gym_type = DB::table('gym_types')
                    ->join('gyms', 'gym_types.id', '=', 'gyms.gymType_id')
                    ->select('gym_type')
                    ->where('gyms.id',$gym_id)
                    ->get();
        
        
        // inner joinでarea情報を取得
        $area = DB::table('gym_areas')
                    ->join('gyms', 'gym_areas.id', '=', 'gyms.area')
                    ->select('gym_area')
                    ->where('gyms.id',$gym_id)
                    ->get();
        
        
        $gym_schedule_count = count($gym_schedule);
        $today = date('Y-m-d H:i', strtotime("today"));
        $min_from_time = date('Y-m-d H:i', strtotime($gym_schedule -> min('from_time')));
        // dd(gettype($gym_schedule));
        $max_from_time = date('Y-m-d H:i', strtotime($gym_schedule -> max('from_time')));
        $max_from_time_plus = date("Y-m-d H:i", strtotime('+1 days',strtotime($max_from_time)));
        // $gym_schedule_fromtime = array_column($gym_schedule, 'from_time');
        // dd($max_from_time_plus);
        
        for($i=0; $i<$gym_schedule_count; $i++){
            $gym_from_time_list[] = array('gym_schedules_id' => $gym_schedule[$i]->id, 'from_time' => date('Y-m-d H:i', strtotime($gym_schedule[$i]->from_time)));
        }
        
        // dd($today);
        // dd($min_from_time);
        // dd($max_from_time_plus);
        // dd($gym_from_time_list);
        
        // dd(in_array($min_from_time, array_column($gym_from_time_list, 'from_time')));
        $array = array_column($gym_from_time_list, 'from_time');
        // dd(array_search($max_from_time, $array));
        // dd($array);
        // dd($max_from_time);
        
        $from_time = $today;
            
        while($from_time <= $max_from_time_plus){
            
            // $from_timeが配列$gym_from_time_listの'from_time'に含まれている場合は、$gym_from_times_str、$gym_to_times_str、$gym_status 、$priceを記入する
            if(in_array($from_time, array_column($gym_from_time_list, 'from_time'))){
                $gym_from_times_str = $from_time;
                $gym_to_times_str = date("H:i", strtotime('+15 minute',strtotime($from_time)));
                
                
                $i = (array_search($from_time, $array));
                // dd($i);
                // $gym_from_times_str = [$gym_schedule[$i]->from_time][0];
                // $gym_to_times_str = [$gym_schedule[$i]->to_time][0];
                if([$gym_schedule[$i]->booking_id][0] == ""){
                    $gym_schedule_id = [$gym_schedule[$i]->id][0];
                    // dd($gym_schedule[$i]->id);
                    $gym_status = "○";
                    $price = [$gym_schedule[$i]->price][0];
                }else{
                    $gym_schedule_id = [$gym_schedule[$i]->id][0];
                    $gym_status = "×";
                    $price = "-";
                }
                
            }else{
                $gym_schedule_id = "";
                $gym_from_times_str = $from_time;
                $gym_to_times_str = date("Y-m-d H:i", strtotime('+15 minute',strtotime($from_time)));
                $gym_status = "×";
                $price = "-";
            }
            
            
            
            $gym_open_times[] = array('gym_id' => $gym_id, 'gym_schedule_id' => $gym_schedule_id, 'date' => date("m/d/Y", strtotime($gym_from_times_str)), 'from_time' => date("m/d/Y H:i", strtotime($gym_from_times_str))
            , 'to_time' => date("m/d/Y H:i", strtotime('+15 minute',strtotime($gym_from_times_str))), 'status' => $gym_status,  'price' => $price);
            
            
            $from_time = date("Y-m-d H:i", strtotime('+15 minute',strtotime($from_time)));
        }
        
        // $last = end($gym_open_times);
        // dd($gym_open_times);
        // dd($last);
        
        return view('booking',[
            'user_name'=>$user_name,
            'gym_id' => $gym_id,
            'addr' => $addr,
            'gym_infos' => $gym_infos,
            'gym_title' => $gym_title,
            'gym_open_times' => $gym_open_times,
            'host_name' => $host_name,
            'guest_gender_flg' => $guest_gender_flg,
            'guest_gender' => $guest_gender,
            'guest_limit' => $guest_limit,
            'gym_type' => $gym_type,
            'area' => $area,
            ]);

        
        
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
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
    public function update(Request $request, Book $book)
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
}
