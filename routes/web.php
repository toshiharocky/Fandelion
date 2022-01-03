<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// search.blade.phpを表示
Route::get('/', 'MainController@index');



        
// ログインユーザーのみgym登録確認画面を表示
Route::group(['middleware' => 'auth'], function() {
   Route::post('/gym_register_confirm', 'GymController@store'); //のちにGymController@confirmに変える
});


// ログインユーザーのみgym登録処理が可能
Route::group(['middleware' => 'auth'], function() {
   Route::post('/gym_register', 'GymController@store');
});


Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// ユーザー登録
Route::post('/register','Auth\RegisterController@create');

// ジム登録
Route::post('/add_gym','GymController@store');

// ジム情報表示
Route::get('/gym_introduction','GymController@index');

// 検索結果の表示
Route::get('/search_results','SearchController@index');


// ログインユーザーのみ、ジム予約画面に遷移
Route::group(['middleware' => 'auth'], function() {
   Route::get('/gym_booking','BookController@store');
});

// ログインユーザーのみ、ジム予約確認画面に遷移
Route::group(['middleware' => 'auth'], function() {
   Route::post('/booking_confirm','BookConfirmController@store');
});


// ログインユーザーのみ、ジム予約を実行
Route::group(['middleware' => 'auth'], function() {
   Route::get('/booking_completed','BookingController@store');
});

// ログインユーザーのみ、ゲストプロフィール画面を表示する
Route::group(['middleware' => 'auth'], function() {
   Route::get('/guest_profile','ProfileController@index_guest_mode'); 
});

// ログインユーザーのみ、会員情報変更画面を表示する
Route::group(['middleware' => 'auth'], function() {
   Route::get('/profile_update','MainController@does_not_exist'); // page404へ
});

// ログインユーザーのみ、支払情報変更画面を表示する
Route::group(['middleware' => 'auth'], function() {
   Route::get('/payment_update','MainController@does_not_exist'); // page404へ
});


// ログインユーザーのみ、履歴画面を表示する
Route::group(['middleware' => 'auth'], function() {
   Route::get('/history','BookingController@index');
});

// ログインユーザーのみ、お気に入り画面を表示する
Route::group(['middleware' => 'auth'], function() {
   Route::get('/bookmarks','BookmarkController@index');
});

// ログインユーザーのみ、予約したジム情報の画面を表示する
Route::group(['middleware' => 'auth'], function() {
   Route::post('/booked_gym_introduction','GymController@booked_gym_index');
});


// ログインユーザーのみ、チェックインを実行する
Route::group(['middleware' => 'auth'], function() {
   Route::get('/check_in','BookingController@check_in'); 
});

// ログインユーザーのみ、チェックアウトを実行する
Route::group(['middleware' => 'auth'], function() {
   Route::get('/check_out','BookingController@check_out'); 
});

// ログインユーザーのみ、ホストに対するレビュー入力画面を開く
Route::group(['middleware' => 'auth'], function() {
   Route::get('/review_to_host','ReviewController@guestToHost_create');
});



// ログインユーザーのみ、ホストに対するレビューを登録する
Route::group(['middleware' => 'auth'], function() {
   Route::post('/review_submit','ReviewController@guestToHost_store'); 
});

// ログインユーザーのみ、ブックマークを登録 or 削除する
Route::group(['middleware' => 'auth'], function() {
   Route::get('/bookmark','BookmarkController@store'); 
   Route::post('/bookmark','BookmarkController@store'); 
});

// ログインユーザーのみ、予約を更新する
Route::group(['middleware' => 'auth'], function() {
   Route::post('/booking_update','MainController@does_not_exist'); // page404へ
});


// ログインユーザーのみ、予約を更新する
Route::group(['middleware' => 'auth'], function() {
   Route::post('/booking_cancel','MainController@does_not_exist'); // page404へ
});

// ログインユーザーのみ、レビュー内容を確認する
Route::group(['middleware' => 'auth'], function() {
   Route::post('/review','MainController@does_not_exist'); // page404へ
});

// ログインユーザーのみ、メッセージ一覧を表示する
Route::group(['middleware' => 'auth'], function() {
   Route::get('/messages','MessageController@index_messages'); // page404へ
});

// ログインユーザーのみ、メッセージを表示する
Route::group(['middleware' => 'auth'], function() {
   Route::get('/messages_conversation','MessageController@index_conversation')->name('messages_conversation');
});

// ログインユーザーのみ、メッセージを送信する
Route::group(['middleware' => 'auth'], function() {
   Route::get('/send_messages','MessageController@store');
});

// ログインユーザーのみ、introduction画面から直接メッセージを送信する
Route::group(['middleware' => 'auth'], function() {
   Route::get('/send_direct_messages','MessageController@direct_messages'); 
});

// メッセージデータをjsonで取得する
Route::get('/result/ajax', 'MessageController@getData');

// ログインユーザーのみ、お気に入りを表示する
// Route::group(['middleware' => 'auth'], function() {
//    Route::get('/bookmarks','MainController@does_not_exist'); // page404へ
// });



// ログインユーザーのみ、お気に入りを表示する
Route::group(['middleware' => 'auth'], function() {
   Route::get('/profile','MainController@does_not_exist'); // page404へ
});



// ホストモード
// ログインユーザーのみ、ホスト予約一覧画面を表示する
Route::group(['middleware' => 'auth'], function() {
   Route::get('/hosting','BookingController@hosting_history');
});

// ログインユーザーのみ、ホストメッセージ画面を表示する
Route::group(['middleware' => 'auth'], function() {
   Route::get('/host_messages','MainController@does_not_exist_host'); // page404（ホスト）へ
});

// ログインユーザーのみ、ジム管理画面を表示する
Route::group(['middleware' => 'auth'], function() {
   Route::get('/manage_gyms','HostController@index');
});

// ログインユーザーのみ、ジムスケジュール画面を表示する
Route::group(['middleware' => 'auth'], function() {
   Route::get('/gym_schedule','MainController@does_not_exist_host'); // page404（ホスト）へ
});

// ログインユーザーのみ、ジム編集画面を表示する
Route::group(['middleware' => 'auth'], function() {
   Route::get('/gym_edit','MainController@does_not_exist_host'); // page404（ホスト）へ
});

// ログインユーザーのみ、ジム実績画面を表示する
Route::group(['middleware' => 'auth'], function() {
   Route::get('/earnings','MainController@does_not_exist_host'); // page404（ホスト）へ
});

// ログインユーザーのみ、ホストプロフィール画面を表示する
Route::group(['middleware' => 'auth'], function() {
   Route::get('/host_profile','MainController@does_not_exist_host'); // page404（ホスト）へ
});

// ログインユーザーのみadd_gym.blade.phpを表示
Route::group(['middleware' => 'auth'], function() {
   Route::get('/add_gym', 'AddGymController@index');
});
