@extends('layouts.menu_mobnav_3')

@push('css')
    <!--<link href="{{ asset('css/〇〇.css') }}" rel="stylesheet">-->
    <style>
        .button.gray{
            margin: 5px auto;
            width: 100%;
            height: 35px;
            box-sizing: border-box;
            padding: 0;
        }
        .inner{
            width:100%;
            
        }
        .list-box-listing{
            width:100%;
        }
        .dashboard-list-box .button.gray{
            background-color:#FED85D;
        }
        .tab-content{
            padding:5px;
        }
        .check_in_out_cancel_review{
            width:30%; 
            text-align:center;
        }
        .history-nav_items{
            border-bottom: thin solid gray;
        }
        #review{
            text-align:center;
        }
        .list-box-listing{
            height:180px;
            align-items:center;
        }
        .gym_his_img{
            object-fit: cover;
            width: 150px !important;
            height: 120px !important;
        }
        
        @media (max-width: 991px){
            .list-box-listing{
                display: flex;
                flex-direction: column;
                height:auto;
            }
            .list-box-listing-content{
                width:80%;
            }
            .tabs-nav{
                display:flex;
            }
            .check_in_out_cancel_review{
                width:100%; 
            }
            .tabs-wrapper {
                width:100%;
            }
        }
    </style>
@endpush

@section('content')

<div id="history-wrapper" style="display:flex;flex-direction:column;align-items: center;">
    <div class="col-lg-8 col-md-12 tabs-wrapper">
        <!-- Listing Nav -->
        <ul class="tabs-nav">
			<li id="future_bookings" class="active"><a href="#history-nav1">今後の予約</a></li>
			<li id="past_bookings"><a  href="#history-nav2">過去の予約</a></li>
		</ul>
		<!--<div id="history-nav" class="listing-nav-container" style="margin-top:50px">-->
			<!--<ul class="listing-nav">-->
		<!--	    <button id="future_bookings" class="active history_btn">今後の予約</button>-->
		<!--	    <button id="past_bookings" class="history_btn">過去の予約</button>-->
			<!--</ul>-->
		<!--</div>-->
    	<div class="tabs-container alt">
	    <!--<div class="margin-top-0">-->
    		<!--<ul>-->
		    <div class="tab-content" id="history-nav1"></div>
		    <div class="tab-content" id="history-nav2"></div>
			<!--</ul>-->
    	</div>
    </div>
</div>


</div>


@push('js')
<!--<script src="{{ asset('js/〇〇.js') }}"></script>-->



<script>
let booking_check = "{{$booking_check}}";
// console.log(booking_check == 0);



let booking_id = @json($booking_id);
let booking_count = booking_id.length;
let gym_title = @json($gym_title);
let addr = @json($addr);
let booking_from_time = @json($booking_from_time);
let booking_from_time_2 = @json($booking_from_time_2);
let booking_to_time = @json($booking_to_time);
let booking_to_time_2 = @json($booking_to_time_2);
let gym_id = @json($gym_id);
let bookingstatus_id = @json($bookingstatus_id);
let cancel_policy_id = @json($cancel_policy_id);
let cancel_limit_time = @json($cancel_limit_time);
let cancel_policy = @json($cancel_policy);
let checkin_time = @json($checkin_open);
let gym_image_url = @json($gym_image_url);
let now = @json($now);

console.log("now: "+now);
console.log(cancel_limit_time);
console.log(checkin_time);
console.log(booking_from_time_2);
</script>

<script>
// 日付をYYYY/MM/DDの書式で返すメソッド
function formatDate(dt) {
  var y = ('0'+new Date(dt).getFullYear()).slice(-4);
  var m = ('0' + new Date(dt).getMonth()).slice(-2);
  m ++;
  var d = ('0' + new Date(dt).getDate()).slice(-2);
  return (y + '/' + m + '/' + d);
}
// 日付をhh:iiの書式で返すメソッド
function formatTime(dt) {
  var h = ('00' + new Date(dt).getHours()).slice(-2);
  var i = ('00' + new Date(dt).getMinutes()).slice(-2);
  return (h + ':' + i);
}

function plus_minitues(m){
    
}

<!--function formatDate(a){-->
<!--    let from_time_y = ("0"+new Date(a).getFullYear()).slice(-4);-->
<!--    let from_time_m = ("0"+new Date(a).getMonth()).slice(-2);-->
<!--    from_time_m ++;-->
<!--	let from_time_d = ("0"+new Date(a).getDate()).slice(-2);-->
<!--	let date = from_time_y + "/" + from_time_m + "/" + from_time_d;-->
<!--    console.log(date);-->
<!--}-->
    
<!--function formatTime(a){-->
<!--	let from_time_h = ("0"+new Date(a).getHours()).slice(-2);-->
<!--	let from_time_i = ("0"+new Date(a).getMinutes()).slice(-2);-->
<!--	let from_time = from_time_h + ":" + from_time_i;-->
<!--	retrun from_time;-->
<!--}-->
</script>

<script>
$(document).ready(function(){
    let future_bookings_flg = {{$future_bookings_flg}};
    
        let eq_num = 0;
        console.log(booking_check == 0);
        if(future_bookings_flg == 1){
                for($i=0; $i<booking_count; $i++){
                    
                    
                    let booking_from_time_str = booking_from_time[$i];
                    let booking_to_time_str = booking_to_time[$i];
                    console.log(booking_from_time_str);
                    
                    let booking_date_from = booking_from_time_str.replace(/-/g,"/");
                    let booking_date_to = booking_to_time_str.replace(/-/g,"/");
                    
                    
                    
                    let checkin_open = checkin_time[$i];
                    console.log(checkin_open);
                    
                    let date = formatDate(booking_date_from);
                    let from_time = formatTime(booking_date_from);
                    let to_time = formatTime(booking_date_to);
                    
                    
                    
                    
                    
                    let id = $i;
                    let history_buttons = "history_buttons_"+$i;
                    let check_in_out = "check_in_out_"+$i;
                    let cancel = "cancel_"+$i;
                    
                    let history_buttons_id = "#"+"history_buttons_"+$i;
                    let check_in_out_id = "#"+"check_in_out_"+$i;
                    let cancel_id = "#"+"cancel_"+$i;
                    
                    
                    
                    // cancel_policy_idに応じて、キャンセル期限を設定する（時間単位）。
                    let cancel_limit = cancel_limit_time[$i];
                    
                    
                    
                    let cancel_date = formatDate(cancel_limit);
                    let cancel_time = formatTime(cancel_limit);
                    // 参考 後で消す
                    
                    
                    function history_list(){
                        $("#history-nav1").append(
                    
                		`
            		    <div class="history-nav_items">
            		        <h3>${date}　   ${from_time}〜${to_time}</h3>
                    		<div class="list-box-listing">
                    		    <div class="list-box-listing-img" style="display:flex;flex-direction:column;justify-content: center;">
                    			    <img class="gym_his_img" src="https://s3-ap-northeast-1.amazonaws.com/fandelion/${gym_image_url[$i]}" alt="">
                			    </div>
                    			<div class="list-box-listing-content">
                    				<div class="inner">
                    					<h3>${gym_title[$i]}</h3>
                    					<span>${addr[$i]}</span>
                    					<form method="post" action="booked_gym_introduction">
                    					@csrf
                            		        <input type="hidden" name="gym_id" value=${gym_id[$i]}>
                            		        <input type="hidden" name="booking_id" value=${booking_id[$i]}>
                        					<div style="text-align:center;">
                        					    <input type="submit" class="button gray" style="width:50%; background-color:#f91942; color:white;" value="ジムの詳細を確認">
                        				    </div>
                    			        </form>
                    				</div>
                    			</div>
                    		    <div id=${history_buttons} class="check_in_out_cancel_review">
                        		    <div id=${check_in_out}></div>
                        			<div id=${cancel}></div>
                        		</div>
                    		</div>
                		</div>
                		`)
                    }
                    
                    <!--let cancel_check = ;-->
                    
                    <!--let checkInTime_check= ;-->
                    <!--console.log(bookingstatus_id[$i]);-->
                    <!--console.log(bookingstatus_id[$i]);-->
                    
                    if(bookingstatus_id[$i]=='1' || bookingstatus_id[$i]=='5' || bookingstatus_id[$i]=='20'){ //1はあとでとる
                        
                        
                        history_list();
                        
                		<!--// nowがキャンセル期間よりも前の場合、#cancelに「予約の修正」「予約のキャンセル」ボタンを表示し、-->
                		<!--//「予約の修正・キャンセルはyyyy/mm/dd H:iまでです」と表示-->
                		<!--// nowがキャンセル期間を超過した場合、#cancelに「予約の修正・キャンセル期間は終了しました」と表示-->let cancel_id = "cancel_"+$i;
                         if(bookingstatus_id[$i]=='20'){
                            if(now < booking_to_time_2[$i]){
                    		    $(check_in_out_id).append(
                        			`
                        			<form id="check_out" method="put" action="check_out">
                        		        <input type="hidden" name="gym_id" value=${gym_id[$i]}>
                        		        <input type="hidden" name="booking_id" value=${booking_id[$i]}>
                        		        <h5>現在トレーニング中です<h5>
                        			    <input type="submit" class="button gray"  value="トレーニング終了">
                    			    </form>
                        			`
                    		    );
                		    }else{
                		        $(check_in_out_id).append(
                        			`
                        			<form id="check_out" method="put" action="check_out">
                        		        <input type="hidden" name="gym_id" value=${gym_id[$i]}>
                        		        <input type="hidden" name="booking_id" value=${booking_id[$i]}>
                        		        <h5>トレーニング時間は終了しました。<h5>
                        			    <input type="submit" class="button gray"  value="トレーニング終了">
                    			    </form>
                        			`
                        			)
                		    }
                        }else{
                		
                    		if(now < cancel_limit){
                    		    $(cancel_id).append(
                    		        `
                    		        <form method="post" action="booking_update">
                    		        @csrf
                        		        <input type="hidden" name="gym_id" value=${gym_id[$i]}>
                        		        <input type="hidden" name="booking_id" value=${booking_id[$i]}>
                        		        <input type="submit" class="button gray"  value="予約の修正">
                    		        </from>
                    		        <form method="post" action="booking_cancel">
                    		        @csrf
                        		        <input type="hidden" name="gym_id" value=${gym_id[$i]}>
                        		        <input type="hidden" name="booking_id" value=${booking_id[$i]}>
                            			<input type="submit" class="button gray" value="予約のキャンセル">
                        			</from>
                        			<h5>予約の修正・キャンセルは<br>${cancel_date} ${cancel_time}までです。<h5>
                        			`
                    		    )
                    		    
                    		}else{
                    		    if(now < booking_from_time_2[$i]){
                        		    $(cancel_id).append(
                        		        `
                        		        <h5>開始時間になりましたら<br>チェックインしてください。<h5>
                            			<form id="check_in" method="put" action="check_in">
                            			    <input type="submit" class="button gray" style="background-color:#dcdcdc; color:white;" value="トレーニング開始" disabled>
                        			    </form>
                            			<h5>予約の修正・キャンセル期間は<br>終了しました。<h5>
                            			`
                        		    )
                    		    }
                    		}
                    		
                          
                    		
                    		　
                    		<!--予約の修正ボタンを押すと、修正画面へ移る-->
                    		<!--予約のキャンセルを押すと、「予約をキャンセルしますか？（この処理は取り消すことができません）」のconfirmが出てキャンセルする-->
                    		
                    		
                    		<!--// nowが開始15分前の場合、history_buttonsに「トレーニング開始」ボタンを表示-->
                    		if(now > booking_from_time_2[$i]){
                        		<!--// dateが開始時間を超過し、bookingstatus_idが「1」「5」の場合、history_buttonsに「トレーニング開始時間を超過しています」というアナウンスと-->
                        		<!--　「トレーニング終了」ボタンを表示-->
                        		if(now > booking_from_time_2[$i]){
                        		    if(bookingstatus_id[$i] == "1" || bookingstatus_id[$i] == "5"){
                    		                if(now < booking_to_time_2[$i]){
                                    		    $(check_in_out_id).append(
                                        			`
                                        			<h5>トレーニング開始時間を<br>超過しています。<h5>
                                        			<form id="check_in" method="put" action="check_in">
                                        		        <input type="hidden" name="gym_id" value=${gym_id[$i]}>
                                        		        <input type="hidden" name="booking_id" value=${booking_id[$i]}>
                                        			    <input type="submit" class="button gray" value="トレーニング開始">
                                    			    </form>
                                        			<!--<form id="check_out" method="put" action="check_out">-->
                                        		 <!--       <input type="hidden" name="gym_id" value=${gym_id[$i]}>-->
                                        		 <!--       <input type="hidden" name="booking_id" value=${booking_id[$i]}>-->
                                        			<!--    <input type="submit" class="button gray" value="トレーニング終了">-->
                                    			    <!--</form>-->
                                        			`
                                    		    )
                                		    }else {
                                		        $(check_in_out_id).append(
                                        			`
                                        			<h5>トレーニング時間は終了しました。<h5>
                                        			`
                                        			)
                                		    }
                            		    }
                            		}else{
                            		    $(check_in_out_id).append(
                                			`
                                			<form id="check_in" method="put" action="check_in">
                                		        <input type="hidden" name="gym_id" value=${gym_id[$i]}>
                                		        <input type="hidden" name="booking_id" value=${booking_id[$i]}>
                                			    <input type="submit" class="button gray" value="トレーニング開始">
                            			    </form>
                                			`
                            		    )
                        		    }
                    		    eq_num ++;
                    		}
                		}
                		
                		
                
                    }
                    
                    
            
                }
                
        		<!--// 「トレーニング開始」ボタンを押したら、「トレーニングを開始しますか？（この処理は取り消すことができません）」というconfirmを出した上で、-->
        		<!--    check_in.blade.phpに遷移し、bookingsテーブルのbookingstatus_idを「20」に変更する（ルーティングが必要）-->
        		$("#check_in").submit(function(){
        		    if(window.confirm('トレーニングを開始しますか？（この処理は取り消すことができません）')){ // 確認ダイアログを表示
                		return true; // 「OK」時は送信を実行
                	}else{ // 「キャンセル」時の処理
                		return false; // 送信を中止
    		        }
        		});
        		
        		
        		<!--// 「トレーニング終了」ボタンを押したら、「トレーニングを終了しますか？（この処理は取り消すことができません）」というconfirmを出した上で、-->
        		<!--    checked_out.blade.phpに遷移し、bookingsテーブルのbookingstatus_idを「25」に変更する（ルーティングが必要）-->
        		$("#check_out").submit(function(){
        		    if(window.confirm('トレーニングを終了しますか？（この処理は取り消すことができません）')){ // 確認ダイアログを表示
                		return true; // 「OK」時は送信を実行
                	}else{ // 「キャンセル」時の処理
                		return false; // 送信を中止
    		        }
        		});
            
            }else {
                $("#history-nav1").append(
                    `<h3>現在の予約はありません<h3>`
                )
            }
        
});
</script>


<script>
$(document).ready(function(){
    let past_bookings_flg = {{$past_bookings_flg}};
    console.log(past_bookings_flg);
        
        let eq_num = 0;
        if(past_bookings_flg == 1){
                for($i=0; $i<booking_count; $i++){
                    
                    
                    let booking_from_time_str = booking_from_time[$i];
                    let booking_to_time_str = booking_to_time[$i];
                    
                    let booking_date_from = booking_from_time_str.replace(/-/g,"/");
                    let booking_date_to = booking_to_time_str.replace(/-/g,"/");
                    
                    
                    let date = formatDate(booking_date_from);
                    let from_time = formatTime(booking_date_from);
                    let to_time = formatTime(booking_date_to);
                    
                    
                    function history_list(){
                        $("#history-nav2").append(
                    
                		`
            		    <div class="history-nav_items">
            		        <h3>${date}　   ${from_time}〜${to_time}</h3>
                    		<div class="list-box-listing">
                    		    <div class="list-box-listing-img" style="display:flex;flex-direction:column;justify-content: center;">
                    			    <img class="gym_his_img" src="https://s3-ap-northeast-1.amazonaws.com/fandelion/${gym_image_url[$i]}" alt="">
                			    </div>
                    			<div class="list-box-listing-content">
                    				<div class="inner">
                    					<h3>${gym_title[$i]}</h3>
                    					<span>${addr[$i]}</span>
                    					<form method="post" action="booked_gym_introduction">
                    					@csrf
                            		        <input type="hidden" name="gym_id" value=${gym_id[$i]}>
                            		        <input type="hidden" name="booking_id" value=${booking_id[$i]}>
                        					<div style="text-align:center;">
                        					    <input type="submit" class="button gray" style="width:50%; background-color:#f91942; color:white;" value="ジムの詳細を確認">
                        				    </div>
                    			        </form>
                    				</div>
                    			</div>
                    		    <div class="history_buttons check_in_out_cancel_review">
                        			
                        		</div>
                    		</div>
                		</div>
                		`)
                    }
                    
                    
                    
                    if(bookingstatus_id[$i]=='25' || bookingstatus_id[$i]=='30' || bookingstatus_id[$i]=='35'){ //1はあとでとる
                        
                        
                        history_list();
                        
                		<!--// nowがキャンセル期間よりも前の場合、#cancelに「予約の修正」「予約のキャンセル」ボタンを表示し、-->
                		<!--//「予約の修正・キャンセルはyyyy/mm/dd H:iまでです」と表示-->
                		<!--// nowがキャンセル期間を超過した場合、#cancelに「予約の修正・キャンセル期間は終了しました」と表示-->let cancel_id = "cancel_"+$i;
                        if(bookingstatus_id[$i]=='25'){
                		    $(".history_buttons").eq(eq_num).append(
                    			`
                    			<form id="review" method="put" action="review_to_host">
                    		        <input type="hidden" name="gym_id" value=${gym_id[$i]}>
                    		        <input type="hidden" name="booking_id" value=${booking_id[$i]}>
                    		        <h5>レビューをしてください<h5>
                    			    <input type="submit" class="button gray"  value="レビューをする">
                			    </form>
                    			`
                		    );
                		    eq_num ++;
                        }else{
                		    $(".history_buttons").eq(eq_num).append(
                    			`
                    			<form id="review" method="post" action="review">
                    			@csrf
                    		        <input type="hidden" name="gym_id" value=${gym_id[$i]}>
                    		        <input type="hidden" name="booking_id" value=${booking_id[$i]}>
                    		        <h5>レビュー済みです<h5>
                    			    <input type="submit" class="button gray"  value="レビュー内容を確認する">
                			    </form>
                    			`
                		    );
                		    eq_num ++;
                		
                    	
                		}
                		
                
                    }
                    
                    
            
                }
            
            
            }else {
                $("#history-nav2").append(
                    `<h3>過去の予約はありません<h3>`
                )
            }
    
});
</script>





<script>
    
                		
	<!--// 「トレーニング開始」ボタンを押したら、「トレーニングを開始しますか？（この処理は取り消すことができません）」というconfirmを出した上で、-->
	<!--    check_in.blade.phpに遷移し、bookingsテーブルのbookingstatus_idを「20」に変更する（ルーティングが必要）-->
	

    // 「過去の予約」をクリックすると、#future_bookingsのactiveクラスが覗かれ、#past_bookingsにactiveクラスがつく
    $("#history-nav1").on('click',function(){
        $('#past_bookings').addClass('active');
        $('#future_bookings').removeClass('active');
        console.log($("#future_bookings").hasClass("active"));
        console.log($("#past_bookings").hasClass("active"));
        past();
    });
    
    
    // 「現在の予約」をクリックすると、#past_bookingsのactiveクラスが覗かれ、#future_bookingsにactiveクラスがつく
    $("#history-nav2").on("click",function(){
        $("#future_bookings").addClass("active");
        $("#past_bookings").removeClass("active");
        console.log($("#future_bookings").hasClass("active"));
        console.log($("#past_bookings").hasClass("active"));
        future();
    });
</script>


@endpush
@endsection
