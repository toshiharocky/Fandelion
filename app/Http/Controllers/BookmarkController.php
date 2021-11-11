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
use App\Bookmark;

class BookmarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //user_idを取得する
        $user = Auth::user()->id;
        $user_name =  Auth::user()->name;
        $user_icon =  Auth::user()->user_icon;
        $status_names = DB::table('users')
                            ->join('mem_statuses', 'users.memstatus_id', '=', 'mem_statuses.id')
                            ->select('name', 'status_name')
                            ->get();
        $status_name = $status_names[1]->status_name;
        
        // bookmarksテーブルのuser_idが$userであるテーブルのgym_idを取得し、gymsテーブルから当該gym_idがidとなるテーブルを取得する
        $gyms = DB::table('bookmarks')
                ->join('users', 'users.id', '=', 'bookmarks.user_id')
                ->join('gyms', 'gyms.id', '=', 'bookmarks.gym_id')
                ->where('users.id',$user)
                ->get();
        
        $search_amount = count($gyms);
        // dd($search_amount);
        
        if($search_amount == 0){
            $gym_info = 0;
        }else{
           foreach($gyms as $gym){
                $gym_info[] = DB::table('gyms')
                                ->join('gym_images', 'gyms.id', '=', 'gym_id')
                                ->join('gym_types', 'gymType_id', '=', 'gym_types.id')
                                ->join('gym_areas', 'area', "=", 'gym_areas.id')
                                ->join('guest_genders', 'gyms.guest_gender', "=", 'guest_genders.id')
                                // ->join('bookmarks', 'gyms.id',  "=", 'bookmarks.gym_id')
                                ->where('gyms.id',$gym->id)
                                ->get()[0];
                
                   
           }
        }
       
    //   dd($gym_info);
       
       return view('bookmark',[
                'gyms'=>$gyms,
                'gym_info'=>$gym_info,
                'user_name'=>$user_name,
                'user_icon'=>"https://s3-ap-northeast-1.amazonaws.com/fandelion/".$user_icon,
                'status_name'=>$status_name,
                'search_amount' => $search_amount,
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
        
        //user_idを取得
        $user_id = Auth::user()->id;
        // dd($user_id);
        
        // セッションIDの再発行
        $request->session()->regenerate();
        
        
        //gym_idを取得        
        // dd($request->session()->get('gym_id'));
        $gym_id = $request->session()->get('gym_id');
        // dd($gym_id);
        
        
        $bookmark_check = Bookmark::where('user_id', $user_id)
                ->where('gym_id', $gym_id)
                ->first();
        
        if($bookmark_check == null){
            $bookmarks = new Bookmark;
            $bookmarks -> user_id = $user_id;
            $bookmarks -> gym_id = $gym_id;
            $bookmarks -> save();
        }else{
            Bookmark::where('user_id', $user_id)
                ->where('gym_id', $gym_id)
                -> delete();
        }
        
        
        
        return back();
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bookmark  $bookmark
     * @return \Illuminate\Http\Response
     */
    public function show(Bookmark $bookmark)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bookmark  $bookmark
     * @return \Illuminate\Http\Response
     */
    public function edit(Bookmark $bookmark)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bookmark  $bookmark
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bookmark $bookmark)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bookmark  $bookmark
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bookmark $bookmark)
    {
        //
    }
}
