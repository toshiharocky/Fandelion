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

class BookConfirmController extends Controller
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
        // ログインユーザー取得
        $user = Auth::user()->id;
        
        $user_name =  Auth::user()->name;
        
        $gym_id = $request->session()->get('gym_id');
        // dd($gym_id);
        
        $gym_infos = Gym::where('id', $gym_id)->get();
        // dd($gym_infos);
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
        
        $gym_image_url = DB::table('gyms')
                    ->join('gym_images', 'gyms.id', '=', 'gym_id')
                    ->select('img_url')
                    ->where('gym_id',$gym_id)
                    ->get();
        
        $all = $request->all();
        // dd($all);
        
        
        $booking_from_time_array = $request->booking_from_times;
        $booking_from_time = array_values($booking_from_time_array)[0];
        $booking_to_time_array = $request->booking_to_times;
        $booking_to_time = end($booking_to_time_array);
        
        // dd($booking_from_time);
        
        
        $request->session()->put('total_time', $request->total_time);
        $request->session()->put('from_to', $request->from_to);
        $request->session()->put('number_of_users', $request->number_of_users);
        $request->session()->put('number_of_men', $request->number_of_men);
        $request->session()->put('number_of_women', $request->number_of_women);
        $request->session()->put('number_of_others', $request->number_of_others);
        $request->session()->put('gym_price', $request->gym_price);
        $request->session()->put('service_price', $request->service_price);
        $request->session()->put('tax', $request->tax);
        $request->session()->put('total_price', $request->total_price);
        $request->session()->put('slots', $request->slots);
        $request->session()->put('schedule_ids', $request->schedule_ids);
        $request->session()->put('booking_from_time', $request->booking_from_time);
        $request->session()->put('date', $request->date);
        $request->session()->put('booking_from_time', $booking_from_time);
        $request->session()->put('booking_to_time', $booking_to_time);
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
        
        
        
        
        
        return view('booking_confirm',[
            'user_name'=>$user_name,
            'gym_id' => $gym_id,
            'addr' => $addr,
            'gym_title' => $gym_title,
            'host_name' => $host_name,
            'total_time' => $total_time,
            'from_to' => $from_to,
            'number_of_users' => $number_of_users,
            'number_of_men' => $number_of_men,
            'number_of_women' => $number_of_women,
            'number_of_others' => $number_of_others,
            'total_price' => $total_price,
            'gym_price' => $gym_price,
            'service_price' => $service_price,
            'tax' => $tax,
            'slots' => $slots,
            'schedule_ids' => $schedule_ids,
            'gym_image_url' => $gym_image_url,
            'date' => $date,
            'booking_from_time' => $booking_from_time,
            'booking_from_time' => $booking_to_time,
            ]);
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
