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



// ログインユーザーのみadd_gym.blade.phpを表示
Route::group(['middleware' => 'auth'], function() {
   Route::get('/add_gym', 'AddGymController@index');
});

        

// ログインユーザーのみgym登録処理が可能
Route::group(['middleware' => 'auth'], function() {
   Route::post('/gym_register', 'GymController@store');
});


Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// ユーザー登録
Route::post('auth/register','Auth\RegisterController@create');

// ジム登録
Route::post('/add_gym','GymController@store');

// ジム情報表示
Route::post('/gym_introduction','GymController@index');

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

// ログインユーザーのみ、履歴画面を表示する
Route::group(['middleware' => 'auth'], function() {
   Route::get('/history','BookingController@index');
});

// ログインユーザーのみ、お気に入り画面を表示する
Route::group(['middleware' => 'auth'], function() {
   Route::get('/bookmarks','BookmarksController@index'); // コントローラー未作成
});

// ログインユーザーのみ、予約したジム情報の画面を表示する
Route::group(['middleware' => 'auth'], function() {
   Route::get('/booked_gym_introduction','GymController@index'); // コントローラー未作成
});


// ログインユーザーのみ、チェックインを実行する
Route::group(['middleware' => 'auth'], function() {
   Route::get('/check_in','BookingController@check_in'); // コントローラー未作成
});

// ログインユーザーのみ、チェックアウトを実行する
Route::group(['middleware' => 'auth'], function() {
   Route::get('/check_out','BookingController@check_out'); // コントローラー未作成
});

// ログインユーザーのみ、ホストに対するレビュー入力画面を開く
Route::group(['middleware' => 'auth'], function() {
   Route::get('/review_to_host','ReviewController@guestToHost_create'); // コントローラー未作成
});



// ログインユーザーのみ、ホストに対するレビューを登録する
Route::group(['middleware' => 'auth'], function() {
   Route::post('/review_submit','ReviewController@guestToHost_store'); // コントローラー未作成
});

// ログインユーザーのみ、ブックマークを登録 or 削除する
Route::group(['middleware' => 'auth'], function() {
   Route::post('/bookmark','BookmarkController@store'); // コントローラー未作成
});
