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

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        // $gym_images = DB::table('gyms')
        //                     ->join('gym_images', 'gyms.id', '=', 'gym_id')
        //                     ->select('gym_id','img_url')
        //                     ->get();
        // dd($gym_images);
        
        //ジム情報の入手
            // $gyms_all = Gym::all();
            $gyms = Gym::orderBy('user_id', 'DESC')->take(4)->get();
            $gyms_count = count($gyms);
                    // ->where('pref', "群馬県");
            // $gyms = $gyms_all->sortBy('id', 'DESC');
            // dd($gyms_count);
            
            foreach($gyms as $gym){
                $gym_id[] = $gym->id;
                $gym_titles[] = $gym->gym_title;
                $gym_descs[] = $gym->gym_desc;
                $gym_addr[] = $gym->addr;
                $review_average[] = $gym->review_average;
                $gym_image_url[] = DB::table('gyms')
                            ->join('gym_images', 'gyms.id', '=', 'gym_id')
                            ->select('img_url')
                            ->where('gym_id',$gym->id)
                            ->get()[0]->img_url;
                
            }
            
            // dd($review_average[0]);
            // dd($gym_image_url[0]);
            
        
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
            
            
            return view('search',[
                'user_name'=>$user_name,
                'status_name'=>$status_name,
                'gym_id'=>$gym_id,
                'gym_titles'=>$gym_titles,
                'gym_descs'=>$gym_descs,
                'gym_addr'=>$gym_addr,
                'review_average'=>$review_average,
                'gym_image_url'=>$gym_image_url,
                'gyms_count' => $gyms_count,
                // 'gym_title'=>$gym_title,
                // 'gym_status_name'=>$gym_status_name,
                ]);
            } else{
            return view('search',[
                'gym_id'=>$gym_id,
                'gym_titles'=>$gym_titles,
                'gym_descs'=>$gym_descs,
                'gym_addr'=>$gym_addr,
                'review_average'=>$review_average,
                'gym_image_url'=>$gym_image_url,
                'gyms_count' => $gyms_count,
                // 'gym_title'=>$gym_title,
                // 'gym_status_name'=>$gym_status_name,
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
