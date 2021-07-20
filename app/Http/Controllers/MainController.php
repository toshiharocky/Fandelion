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
        
        //ジム情報の入手（広い順）
            // $gyms_all = Gym::all();
            // $gyms = Gym::orderBy('user_id', 'DESC')->take(16)->get();
            $area_gyms = Gym::orderBy('area', 'DESC')->take(4)->get();
            
            
            $area_gyms_count = count($area_gyms);
                    // ->where('pref', "群馬県");
            // $gyms = $gyms_all->sortBy('id', 'DESC');
            // dd($gyms_count);
            
            foreach($area_gyms as $area_gym){
                $area_gym_id[] = $area_gym->id;
                $area_gym_titles[] = $area_gym->gym_title;
                $area_gym_descs[] = $area_gym->gym_desc;
                $area_gym_addr[] = $area_gym->addr;
                $area_review_average[] = $area_gym->review_average;
                $area_gym_image_url[] = DB::table('gyms')
                            ->join('gym_images', 'gyms.id', '=', 'gym_id')
                            ->select('img_url')
                            ->where('gym_id',$area_gym->id)
                            ->get()[0]->img_url;
                
            }
            // dd($area_gym_id);
            // dd($review_average[0]);
            // dd($gym_image_url[0]);
    
    
    //ジム情報の入手（住宅まるごと）
            $whole_gyms = Gym::where('gymType_id',2)
                    ->orderBy('area', 'DESC')->take(4)->get();
            
            
            $whole_gyms_count = count($whole_gyms);
                    
            
            foreach($whole_gyms as $whole_gym){
                $whole_gym_id[] = $whole_gym->id;
                $whole_gym_titles[] = $whole_gym->gym_title;
                $whole_gym_descs[] = $whole_gym->gym_desc;
                $whole_gym_addr[] = $whole_gym->addr;
                $whole_review_average[] = $whole_gym->review_average;
                $whole_gym_image_url[] = DB::table('gyms')
                            ->join('gym_images', 'gyms.id', '=', 'gym_id')
                            ->select('img_url')
                            ->where('gym_id',$whole_gym->id)
                            ->get()[0]->img_url;
                
            }
            
    
        
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
                // 'gym_id'=>$gym_id,
                // 'gym_titles'=>$gym_titles,
                // 'gym_descs'=>$gym_descs,
                // 'gym_addr'=>$gym_addr,
                // 'review_average'=>$review_average,
                // 'gym_image_url'=>$gym_image_url,
                // 'gyms_count' => $gyms_count,
                'area_gym_id'=>$area_gym_id,
                'area_gym_titles'=>$area_gym_titles,
                'area_gym_descs'=>$area_gym_descs,
                'area_gym_addr'=>$area_gym_addr,
                'area_review_average'=>$area_review_average,
                'area_gym_image_url'=>$area_gym_image_url,
                'area_gyms_count' => $area_gyms_count,
                'whole_gym_id'=>$whole_gym_id,
                'whole_gym_titles'=>$whole_gym_titles,
                'whole_gym_descs'=>$whole_gym_descs,
                'whole_gym_addr'=>$whole_gym_addr,
                'whole_review_average'=>$whole_review_average,
                'whole_gym_image_url'=>$whole_gym_image_url,
                'whole_gyms_count' => $whole_gyms_count,
                // 'gym_title'=>$gym_title,
                // 'gym_status_name'=>$gym_status_name,
                ]);
            } else{
            return view('search',[
                'area_gym_id'=>$area_gym_id,
                'area_gym_titles'=>$area_gym_titles,
                'area_gym_descs'=>$area_gym_descs,
                'area_gym_addr'=>$area_gym_addr,
                'area_review_average'=>$area_review_average,
                'area_gym_image_url'=>$area_gym_image_url,
                'area_gyms_count' => $area_gyms_count,
                'whole_gym_id'=>$whole_gym_id,
                'whole_gym_titles'=>$whole_gym_titles,
                'whole_gym_descs'=>$whole_gym_descs,
                'whole_gym_addr'=>$whole_gym_addr,
                'whole_review_average'=>$whole_review_average,
                'whole_gym_image_url'=>$whole_gym_image_url,
                'whole_gyms_count' => $whole_gyms_count,
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
    
    
    public function does_not_exist()
    {
        //
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
            
            
            return view('pages-404',[
                'user_name'=>$user_name,
                'status_name'=>$status_name,
                ]);
            } else{
            return view('pages-404');
            }
        
        
        
    }
}
