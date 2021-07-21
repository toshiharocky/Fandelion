@extends('layouts.menu_mobnav')

@push('css')
    <!--<link href="{{ asset('css/〇〇.css') }}" rel="stylesheet">-->
    <style>
        .button.gray{
            margin-top:10px;
        }
        .active{
            background-color: #FED85D;
        }
        .list-box-listing{
            width:100%;
        }
        
        @media (max-width: 991px){
            .list-box-listing{
                display: flex;
                flex-direction: column;
            }
        }
    </style>
@endpush

@section('content')

<div id="history-wrapper" style="display:flex;flex-direction:column;align-items: center;">
    <div class="col-lg-8 col-md-12">
        <!-- Listing Nav -->
		<div id="history-nav" class="listing-nav-container" style="margin-top:50px">
			<ul class="listing-nav">
			    <button id="future_bookings" class="active">今後の予約</button>
			    <button id="past_bookings">過去の予約</button>
			</ul>
		</div>
    	<div class="dashboard-list-box margin-top-0">
	    <!--<div class="margin-top-0">-->
    		<ul>
    		    <div id="history_list">
        		</div>
			</ul>
    	</div>
    </div>
</div>


</div>


@push('js')
<!--<script src="{{ asset('js/〇〇.js') }}"></script>-->



<script>
let booking_check = "{{$booking_check}}";
// console.log(booking_check == 0);
// 現在の日付を取得する
let now = new Date();





let booking_id = @json($booking_id);
let booking_count = booking_id.length;
let gym_title = @json($gym_title);
let addr = @json($addr);
let booking_from_time = @json($booking_from_time);
let booking_to_time = @json($booking_to_time);
let gym_id = @json($gym_id);
let bookingstatus_id = @json($bookingstatus_id);
let cancel_policy_id = @json($cancel_policy_id);
let cancel_policy = @json($cancel_policy);
let gym_image_url = @json($gym_image_url);


</script>



<script>
function future(){
    let future_bookings_flg = {{$future_bookings_flg}};
    if($("#future_bookings").hasClass("active")){
        let eq_num = 0;
        $("#history_list").empty();
        console.log(booking_check == 0);
        if(future_bookings_flg == 1){
                for($i=0; $i<booking_count; $i++){
                    
                    
                    
                    let booking_date_from = new Date(booking_from_time[$i]).toISOString();
                    let booking_date_to = new Date(Date.parse(booking_to_time[$i])).toISOString();
                    
                    
                    
                    let from_time_y = ("0"+new Date(booking_from_time[$i]).getFullYear()).slice(-4);
        			let from_time_m = ("0"+new Date(booking_from_time[$i]).getMonth()).slice(-2);
        			from_time_m ++;
        			let from_time_d = ("0"+new Date(booking_from_time[$i]).getDate()).slice(-2);
        			let date = from_time_y + "/" + from_time_m + "/" + from_time_d;
                    
                    
                    
        			let from_time_h = ("0"+new Date(booking_from_time[$i]).getHours()).slice(-2);
        			let from_time_i = ("0"+new Date(booking_from_time[$i]).getMinutes()).slice(-2);
        			let from_time = from_time_h + ":" + from_time_i;
        			let to_time_h = ("0"+new Date(booking_to_time[$i]).getHours()).slice(-2);
        			let to_time_i = ("0"+new Date(booking_to_time[$i]).getMinutes()).slice(-2);
        			let to_time = to_time_h + ":" + to_time_i;
        			
                    
                    
                    console.log(date);
                    
                    
                    let id = $i;
                    let history_buttons = "history_buttons_"+$i;
                    let check_in_out = "check_in_out_"+$i;
                    let cancel = "cancel_"+$i;
                    
                    let history_buttons_id = "#"+"history_buttons_"+$i;
                    let check_in_out_id = "#"+"check_in_out_"+$i;
                    let cancel_id = "#"+"cancel_"+$i;
                    
                    
                    <!--console.log(booking_date_from);-->
                    <!--console.log(booking_date_to);-->
                    
                    // cancel_policy_idに応じて、キャンセル期限を設定する（時間単位）。
                    let cancel_limit_time = "";
                    switch(cancel_policy_id[$i]){
                        case "1":{
                            cancel_limit_time = 1;
                            break;
                            }
                        case "2":{
                            cancel_limit_time = 24;
                            break;
                            }
                        case "3":{
                            cancel_limit_time = 72;
                            break;
                            }
                        case "4":{
                            cancel_limit_time = 168;
                            break;
                            }
                    }
                    
                    let cancel_limit = new Date(new Date(booking_from_time[$i]));
                    cancel_limit.setHours(cancel_limit.getHours() - cancel_limit_time);
                    console.log(cancel_limit);
                    
                    let checkin_open = new Date(new Date(booking_from_time[$i]));
                    checkin_open.setMinutes(checkin_open.getMinutes() - 15);
                    
                    let cancel_time_y = ("0"+new Date(cancel_limit).getFullYear()).slice(-4);
                    let cancel_time_m = ("0"+new Date(cancel_limit).getMonth()).slice(-2);
                    cancel_time_m ++; 
        			let cancel_time_d = ("0"+new Date(cancel_limit).getDate()).slice(-2);
        			let cancel_date = cancel_time_y + "/" + cancel_time_m + "/" + cancel_time_d;
        			console.log(cancel_date);
                    let cancel_time_h = ("0"+new Date(cancel_limit).getHours()).slice(-2);
        			let cancel_time_i = ("0"+new Date(cancel_limit).getMinutes()).slice(-2);
        			let cancel_time = cancel_time_h + ":" + cancel_time_i;
        			console.log(cancel_time);
                    
                    <!--let cancel_date = formatDate(cancel_limit);-->
                    <!--let cancel_time = formatTime(cancel_limit);-->
                    
                    
                    
                    function history_list(){
                        $("#history_list").append(
                    
                		`
            		    <li>
            		        <h3>${date}　   ${from_time}〜${to_time}</h3>
                    		<div class="list-box-listing">
                    		    <div class="list-box-listing-img" style="display:flex;flex-direction:column;justify-content: center;">
                    			    <img src="images/gym_images/${gym_image_url[$i]}" alt="">
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
                    		    <div id=${history_buttons}  style="width:30%; text-align:center;">
                        		    <div id=${check_in_out}></div>
                        			<div id=${cancel}></div>
                        		</div>
                    		</div>
                		</li>
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
                		    $(check_in_out_id).append(
                    			`
                    			<form id="check_out" method="put" action="check_out">
                    		        <input type="hidden" name="gym_id" value=${gym_id[$i]}>
                    		        <input type="hidden" name="booking_id" value=${booking_id[$i]}>
                    		        <h5>現在トレーニング中です<h5>
                    			    <input type="submit" class="button gray" style="width:100%; height:35px;" value="トレーニング終了">
                			    </form>
                    			`
                		    );
                        }else{
                		
                    		if(now < cancel_limit){
                    		    $(cancel_id).append(
                    		        `
                    		        <form method="post" action="booking_update">
                    		        @csrf
                        		        <input type="hidden" name="gym_id" value=${gym_id[$i]}>
                        		        <input type="hidden" name="booking_id" value=${booking_id[$i]}>
                        		        <input type="submit" class="button gray" style="width:100%; height:35px;" value="予約の修正">
                    		        </from>
                    		        <form method="post" action="booking_cancel">
                    		        @csrf
                        		        <input type="hidden" name="gym_id" value=${gym_id[$i]}>
                        		        <input type="hidden" name="booking_id" value=${booking_id[$i]}>
                            			<input type="submit" class="button gray" style="width:100%; height:35px;" value="予約のキャンセル">
                        			</from>
                        			<h5>予約の修正・キャンセルは<br>${cancel_date} ${cancel_time}までです。<h5>
                        			`
                    		    )
                    		    
                    		}else{
                    		    if(now < checkin_open){
                        		    $(cancel_id).append(
                        		        `
                        		        <h5>チェックインは<br>開始時間15分前から可能です。<h5>
                            			<form id="check_in" method="put" action="check_in">
                            			    <input type="submit" class="button gray" style="width:100%; height:35px; background-color:#dcdcdc; color:white;" value="トレーニング開始" disabled>
                        			    </form>
                            			<h5>予約の修正・キャンセル期間は<br>終了しました。<h5>
                            			`
                        		    )
                    		    }
                    		}
                    		
                          
                    		
                    		　
                    		<!--予約の修正ボタンを押すと、修正画面へ移る-->
                    		<!--予約のキャンセルを押すと、「予約をキャンセルしますか？（この処理は取り消すことができません）」のconfirmが出てキャンセルする-->
                    		
                    		
                    		
                    		<!--// nowが開始15分前の場合、history_buttonsに「トレーニング開始」ボタンを表示-->
                    		if(now > checkin_open){
                        		<!--// dateが開始時間を超過し、bookingstatus_idが「1」「5」の場合、history_buttonsに「トレーニング開始時間を超過しています」というアナウンスと-->
                        		<!--　「トレーニング終了」ボタンを表示-->
                        		if(now > booking_date_from){
                        		    if(bookingstatus_id[$i] == "1" || bookingstatus_id[$i] == "5"){
                    		                if(now < booking_date_to){
                                    		    $(check_in_out_id).append(
                                        			`
                                        			<h5>トレーニング開始時間を超過しています。<h5>
                                        			<form id="check_out" method="put" action="check_out">
                                        		        <input type="hidden" name="gym_id" value=${gym_id[$i]}>
                                        		        <input type="hidden" name="booking_id" value=${booking_id[$i]}>
                                        			    <input type="submit" class="button gray" style="width:100%; height:35px;" value="トレーニング終了">
                                    			    </form>
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
                                			    <input type="submit" class="button gray" style="width:100%; height:35px;" value="トレーニング開始">
                            			    </form>
                                			`
                            		    )
                        		    }
                    		    eq_num ++;
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
                
                    }
                    
                    
            
                }
            
            
            }else {
                $("#history_list").append(
                    `<h4>現在の予約はありません<h4>`
                )
            }
        }
};
</script>


<script>
function past(){
    let past_bookings_flg = {{$past_bookings_flg}};
    if($("#past_bookings").hasClass("active")){
        let eq_num = 0;
        $("#history_list").empty();
        if(past_bookings_flg == 1){
                for($i=0; $i<booking_count; $i++){
                    
                    
                    let booking_date_from = new Date(booking_from_time[$i]).toISOString();
                    let booking_date_to = new Date(Date.parse(booking_to_time[$i])).toISOString();
                    
                    
                    let from_time_y = ("0"+new Date(booking_from_time[$i]).getFullYear()).slice(-4);
        			let from_time_m = ("0"+new Date(booking_from_time[$i]).getMonth()).slice(-2);
                    from_time_m ++;
        			let from_time_d = ("0"+new Date(booking_from_time[$i]).getDate()).slice(-2);
        			let date = from_time_y + "/" + from_time_m + "/" + from_time_d;
                    
                    
                    
        			let from_time_h = ("0"+new Date(booking_from_time[$i]).getHours()).slice(-2);
        			let from_time_i = ("0"+new Date(booking_from_time[$i]).getMinutes()).slice(-2);
        			let from_time = from_time_h + ":" + from_time_i;
        			let to_time_h = ("0"+new Date(booking_to_time[$i]).getHours()).slice(-2);
        			let to_time_i = ("0"+new Date(booking_to_time[$i]).getMinutes()).slice(-2);
        			let to_time = to_time_h + ":" + to_time_i;
        			
                    
                    
                    function history_list(){
                        $("#history_list").append(
                    
                		`
            		    <li>
            		        <h3>${date}　   ${from_time}〜${to_time}</h3>
                    		<div class="list-box-listing">
                    		    <div class="list-box-listing-img" style="display:flex;flex-direction:column;justify-content: center;">
                    			    <img src="images/gym_images/${gym_image_url[$i]}" alt="">
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
                    		    <div class="history_buttons" style="width:30%; text-align:center;">
                        			<div class="review"></div>
                        		</div>
                    		</div>
                		</li>
                		`)
                    }
                    
                    
                    
                    if(bookingstatus_id[$i]=='25' || bookingstatus_id[$i]=='30' || bookingstatus_id[$i]=='35'){ //1はあとでとる
                        
                        
                        history_list();
                        
                		<!--// nowがキャンセル期間よりも前の場合、#cancelに「予約の修正」「予約のキャンセル」ボタンを表示し、-->
                		<!--//「予約の修正・キャンセルはyyyy/mm/dd H:iまでです」と表示-->
                		<!--// nowがキャンセル期間を超過した場合、#cancelに「予約の修正・キャンセル期間は終了しました」と表示-->let cancel_id = "cancel_"+$i;
                        if(bookingstatus_id[$i]=='25'){
                		    $(".history_buttons").eq(eq_num).children('div').eq(0).append(
                    			`
                    			<form id="review" method="put" action="review_to_host">
                    		        <input type="hidden" name="gym_id" value=${gym_id[$i]}>
                    		        <input type="hidden" name="booking_id" value=${booking_id[$i]}>
                    		        <h5>レビューをしてください<h5>
                    			    <input type="submit" class="button gray" style="width:100%;" value="レビューをする">
                			    </form>
                    			`
                		    );
                		    eq_num ++;
                        }else{
                		    $(".history_buttons").eq(eq_num).children('div').eq(0).append(
                    			`
                    			<form id="review" method="post" action="review">
                    			@csrf
                    		        <input type="hidden" name="gym_id" value=${gym_id[$i]}>
                    		        <input type="hidden" name="booking_id" value=${booking_id[$i]}>
                    		        <h5>レビュー済みです<h5>
                    			    <input type="submit" class="button gray" style="width:100%;" value="レビュー内容を確認する">
                			    </form>
                    			`
                		    );
                		    eq_num ++;
                		
                    	
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
                
                    }
                    
                    
            
                }
            
            
            }else {
                $("#history_list").append(
                    `<h4>過去の予約はありません<h4>`
                )
            }
    }
};
</script>


<script>
    future();
</script>



<script>

    // 「過去の予約」をクリックすると、#future_bookingsのactiveクラスが覗かれ、#past_bookingsにactiveクラスがつく
    $('#past_bookings').on('click',function(){
        $('#past_bookings').addClass('active');
        $('#future_bookings').removeClass('active');
        console.log($("#future_bookings").hasClass("active"));
        console.log($("#past_bookings").hasClass("active"));
        past();
    });
    // 「現在の予約」をクリックすると、#past_bookingsのactiveクラスが覗かれ、#future_bookingsにactiveクラスがつく
    $("#future_bookings").on("click",function(){
        $("#future_bookings").addClass("active");
        $("#past_bookings").removeClass("active");
        console.log($("#future_bookings").hasClass("active"));
        console.log($("#past_bookings").hasClass("active"));
        future();
    });
</script>


@endpush
@endsection
