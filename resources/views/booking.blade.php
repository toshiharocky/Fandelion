@extends('layouts.menu')

@push('css')
    <!--<link href="{{ asset('css/〇〇.css') }}" rel="stylesheet">-->
    <style>
    	#booking_header {
			  display:flex; 
    		  justify-content:space-between;
    		  border-bottom: 1px solid black;
    		  margin-bottom: 20px;
    	}
    	
    	#booking_overview{
    		display:flex;
    		justify-content:space-around;
    	}
    	
    	
    	
    	.element_details{
    		text-align:right;
    	}
    	
    	.booking_price{
    		background-color: #fff0c1;
    		<!--color:white;-->
    		text-align:center;
    		padding:5px;
    		display:flex;
    		flex-direction:row;
    		justify-content:center;
    	}
    	
    	#submit_button	 {
    		text-align:right;
    		margin-top:15px;
    	}
    	.cursor {
    		cursor: pointer !important;
    	}
    	
    </style>
@endpush

@section('content')
<!-- Content
================================================== -->
<div class="container">
	<div id="booking_header">
		<!-- Titlebar -->
			<div id="titlebar" class="listing-titlebar" style="display:flex; flex-direction:row; justify-content:space-between; max-width:50%;">
				<div class="listing-titlebar-title">
					<h2>{{$gym_title}} 
						<div id=gym_tags></div>
					</h2>
					<span>
						<a href="#listing-location" class="listing-address">
							<i class="fa fa-map-marker"></i>
							{{$addr}}
						</a>
					</span>
				</div>
			</div>
			
			<!-- Book Now -->
			<div id="booking-widget-anchor" class="boxed-widget booking-widget margin-top-35" style="width:50%; margin-bottom:10px;">
				<h3><i class="fa fa-calendar-check-o "></i>現在の予約内容</h3>
				<form method=post action='booking_confirm'>
				@csrf
					<div id="booking_overview">
						<div id="time" class="booking_elements" style="width:25%;">
							<div id="total_time">
								<h4>時間</h4>
							</div>
							<div id="selected_date"></div>
							<div id="selected_slot"></div>
							<div id="slot_caution"></div>
						</div>
						<div id="guest" class="booking_elements" style="width:20%;">
							<div id="guest_details">
								<h4>人数</h4>
							</div>
							<div id="guest_caution"></div>
						</div>
						<div id="price" class="booking_elements" style="width:30%;">
							<h4>総計</h4>
						</div>
						
					</div>
					
					<!-- Book Now -->
					<div id="submit_button">
						<input type="submit" class="button book-now fullwidth margin-top-5" value="予約内容の確認" style="background-color:#dcdcdc; color:white;" disabled>
					</div>
				</form>
			</div>
			<!-- Book Now / End -->
	</div>
			
	<div class="row sticky-wrapper">
		<div class="col-lg-8 col-md-8 padding-right-30">
		
			
			
			<!--booking_information-->
			<h3 class="listing-desc-headline margin-top-0 margin-bottom-30">予約をする</h3>
			
			<div style="display:flex; justify-content:space-between; align-items:middle ;">
    			<div>
    			    <h4 class="listing-desc-headline margin-top-0 margin-bottom-30">人数</h4>
			    </div>
    			<div class="main-search-input-item" style="display:flex; justify-content:flex-start; border-right:none; ">
        			<div class="panel-dropdown" style="width:50%;">
        				<a href="#"  style="width:100%; text-align:center; font-size:20px;">合計 <span class="qtyTotal" name="qtyTotal" style="background-color:#f91942; font-size:20px">1</span></a>
        				<div class="panel-dropdown-content">
        
        					<!-- Quantity Buttons -->
        					<div class="qtyButtons">
        						<div class="qtyTitle">Men</div>
        						<input type="text" name="qtyInput" value="0">
        					</div>
        
        					<div class="qtyButtons">
        						<div class="qtyTitle">Women</div>
        						<input type="text" name="qtyInput" value="0">
        					</div>
        
        					<div class="qtyButtons">
        						<div class="qtyTitle">Others</div>
        						<input type="text" name="qtyInput" value="0">
        					</div>
    					
        			</div>
    			</div>
			</div>
    			
    		</div>
			<h4 class="listing-desc-headline margin-top-0 margin-bottom-30">日程</h4>
			<div class="row with-forms  margin-top-0">
					<!-- Date Range Picker - docs: https://www.daterangepicker.com/ -->
					<div id="select_time_range">
						<div class="col-lg-4">
							<h4 style="text-align:center;">日付を選択</h4>
							<input type="text" id="date-picker" placeholder="Date" readonly="readonly">
						
							<h4 style="text-align:center;">表示時間を選択</h4>
							<div class="row" style="display:flex; justify-content:center; align-items:middle;">
								<div class="col-md-6">
									<select type="text" id="start_time" data-placeholder="Opening Time">
										
										<!--<option>Closed</option>-->
										<option value="00:00">00:00</option>
										<option value="01:00">01:00</option>
										<option value="02:00">02:00</option>
										<option value="03:00">03:00</option>
										<option value="04:00">04:00</option>
										<option value="05:00">05:00</option>
										<option value="06:00">06:00</option>
										<option value="07:00">07:00</option>
										<option value="08:00">08:00</option>
										<option value="09:00">09:00</option>
										<option value="10:00" selected>10:00</option>
										<option value="11:00">11:00</option>
										<option value="12:00">12:00</option>	
										<option value="13:00">13:00</option>
										<option value="14:00">14:00</option>
										<option value="15:00">15:00</option>
										<option value="16:00">16:00</option>
										<option value="17:00">17:00</option>
										<option value="18:00">18:00</option>
										<option value="19:00">19:00</option>
										<option value="20:00">20:00</option>
										<option value="21:00">21:00</option>
										<option value="22:00">22:00</option>
										<option value="23:00">23:00</option>
										<option value="24:00">24:00</option>
									</select>
								</div>
								<div class="col-md-2" style="text-align:center;"><h5> 〜 </h5></div>
								<div class="col-md-6">
									<select id="end_time" data-placeholder="Closing Time">
										
										<!--<option>Closed</option>-->
										<option value="00:00">00:00</option>
										<option value="01:00">01:00</option>
										<option value="02:00">02:00</option>
										<option value="03:00">03:00</option>
										<option value="04:00">04:00</option>
										<option value="05:00">05:00</option>
										<option value="06:00">06:00</option>
										<option value="07:00">07:00</option>
										<option value="08:00">08:00</option>
										<option value="09:00">09:00</option>
										<option value="10:00">10:00</option>
										<option value="11:00">11:00</option>
										<option value="12:00">12:00</option>	
										<option value="13:00">13:00</option>
										<option value="14:00">14:00</option>
										<option value="15:00">15:00</option>
										<option value="16:00">16:00</option>
										<option value="17:00">17:00</option>
										<option value="18:00" selected>18:00</option>
										<option value="19:00">19:00</option>
										<option value="20:00">20:00</option>
										<option value="21:00">21:00</option>
										<option value="22:00">22:00</option>
										<option value="23:00">23:00</option>
										<option value="24:00">24:00</option>
									</select>
								</div>
							</div>
							<div style="text-align:center;">
								<button id="display_slots" class="button">時間を表示</button>
							</div>
						</div>
					</div>
					<!-- Panel Dropdown -->
					<div class="col-lg-8">
						
						<div id="action_suggest" style="text-align:center;">
						
						</div>
						<div class="row" style="display:flex; justify-content:center; align-items:middle;">
							<div class="col-lg-6">
								<div id="start-time-slot">
									
								</div>
							</div>
						</div>	
					</div>
				</div>

		</div>


		<!-- Sidebar-->
		<!--================================================== -->
		<div class="col-lg-4 col-md-4 margin-top-75 sticky">

				
			


			<!-- Contact -->
			<div class="boxed-widget margin-top-35">
				<div class="hosted-by-title">
					<h4><span>Hosted by</span> {{$host_name}}</h4>
					<a href="pages-user-profile.html" class="hosted-by-avatar"><img src="images/dashboard-avatar.jpg" alt=""></a>
				</div>
				<!--<ul class="listing-details-sidebar">-->
				<!--	<li><i class="sl sl-icon-phone"></i> (123) 123-456</li>-->
					<!-- <li><i class="sl sl-icon-globe"></i> <a href="#">https://example.com</a></li> -->
				<!--	<li><i class="fa fa-envelope-o"></i> <a href="#">tom@example.com</a></li>-->
				<!--</ul>-->

				<!--<ul class="listing-details-sidebar social-profiles">-->
				<!--	<li><a href="#" class="facebook-profile"><i class="fa fa-facebook-square"></i> Facebook</a></li>-->
				<!--	<li><a href="#" class="twitter-profile"><i class="fa fa-twitter"></i> Twitter</a></li>-->
					<!-- <li><a href="#" class="gplus-profile"><i class="fa fa-google-plus"></i> Google Plus</a></li> -->
				<!--</ul>-->

				<!-- Reply to review popup -->
				<div id="small-dialog" class="zoom-anim-dialog mfp-hide">
					<div class="small-dialog-header">
						<h3>Send Message</h3>
					</div>
					<div class="message-reply margin-top-0">
						<textarea cols="40" rows="3" placeholder="Your message to Tom"></textarea>
						<button class="button">Send Message</button>
					</div>
				</div>

				<a href="#small-dialog" class="send-message-to-owner button popup-with-zoom-anim"><i class="sl sl-icon-envelope-open"></i> Send Message</a>
			</div>
			<!-- Contact / End-->


			<!-- Share / Like -->
			<div class="listing-share margin-top-40 margin-bottom-40 no-border">
				<button class="like-button"><span class="like-icon"></span> Bookmark this listing</button> 
				<span>159 people bookmarked this place</span>

					<!-- Share Buttons -->
					<!--<ul class="share-buttons margin-top-40 margin-bottom-0">-->
					<!--	<li><a class="fb-share" href="#"><i class="fa fa-facebook"></i> Share</a></li>-->
					<!--	<li><a class="twitter-share" href="#"><i class="fa fa-twitter"></i> Tweet</a></li>-->
					<!--	<li><a class="gplus-share" href="#"><i class="fa fa-google-plus"></i> Share</a></li>-->
						<!-- <li><a class="pinterest-share" href="#"><i class="fa fa-pinterest-p"></i> Pin</a></li> -->
					<!--</ul>-->
					<div class="clearfix"></div>
			</div>

		</div>
		<!-- Sidebar / End -->

	</div>
</div>


<!-- Footer
================================================== -->
<div id="footer" class="margin-top-15">
	<!-- Main -->
	<div class="container">
		<div class="row">
			<div class="col-md-5 col-sm-6">
				<img class="footer-logo" src="images/logo.png" alt="">
				<br><br>
				<p>Morbi convallis bibendum urna ut viverra. Maecenas quis consequat libero, a feugiat eros. Nunc ut lacinia tortor morbi ultricies laoreet ullamcorper phasellus semper.</p>
			</div>

			<div class="col-md-4 col-sm-6 ">
				<h4>Helpful Links</h4>
				<ul class="footer-links">
					<li><a href="#">Login</a></li>
					<li><a href="#">Sign Up</a></li>
					<li><a href="#">My Account</a></li>
					<li><a href="#">Add Listing</a></li>
					<li><a href="#">Pricing</a></li>
					<li><a href="#">Privacy Policy</a></li>
				</ul>

				<ul class="footer-links">
					<li><a href="#">FAQ</a></li>
					<li><a href="#">Blog</a></li>
					<li><a href="#">Our Partners</a></li>
					<li><a href="#">How It Works</a></li>
					<li><a href="#">Contact</a></li>
				</ul>
				<div class="clearfix"></div>
			</div>		

			<div class="col-md-3  col-sm-12">
				<h4>Contact Us</h4>
				<div class="text-widget">
					<span>12345 Little Lonsdale St, Melbourne</span> <br>
					Phone: <span>(123) 123-456 </span><br>
					E-Mail:<span> <a href="#">office@example.com</a> </span><br>
				</div>

				<ul class="social-icons margin-top-20">
					<li><a class="facebook" href="#"><i class="icon-facebook"></i></a></li>
					<li><a class="twitter" href="#"><i class="icon-twitter"></i></a></li>
					<li><a class="gplus" href="#"><i class="icon-gplus"></i></a></li>
					<li><a class="vimeo" href="#"><i class="icon-vimeo"></i></a></li>
				</ul>

			</div>

		</div>
		
		<!-- Copyright -->
		<div class="row">
			<div class="col-md-12">
				<div class="copyrights">© 2021 Listeo. All Rights Reserved.</div>
			</div>
		</div>

	</div>

</div>
<!-- Footer / End -->


<!-- Back To Top Button -->
<div id="backtotop"><a href="#"></a></div>

<!-- Booking Sticky Footer -->
<div class="booking-sticky-footer">
	<div class="container">
		<div class="bsf-left">
			<h4>Starting from $29</h4>
			<div class="star-rating" data-rating="5">
				<div class="rating-counter"></div>
			</div>
		</div>
		<div class="bsf-right">
			<a href="#booking-widget-anchor" class="button">Book Now</a>
		</div>
	</div>
</div>

</div>
<!-- Wrapper / End -->






<!-- Content / End -->
@push('js')
<!--<script src="{{ asset('js/〇〇.js') }}"></script>-->

<!-- Booking Widget - Quantity Buttons -->
<script src="{{ asset('js/quantityButtons.js')}}"></script>


<script>
// Calendar Init
$(function() {
	$('#date-picker').daterangepicker({
		"opens": "left",
		singleDatePicker: true,

		// Disabling Date Ranges
		isInvalidDate: function(date) {
		// Disabling Date Range
		var disabled_start = moment('09/02/2018', 'MM/DD/YYYY');
		var disabled_end = moment('09/06/2018', 'MM/DD/YYYY');
		return date.isAfter(disabled_start) && date.isBefore(disabled_end);

		// Disabling Single Day
		// if (date.format('MM/DD/YYYY') == '08/08/2018') {
		//     return true; 
		// }
		}
	});
});

// Calendar animation
$('#date-picker').on('showCalendar.daterangepicker', function(ev, picker) {
	$('.daterangepicker').addClass('calendar-animated');
});
$('#date-picker').on('show.daterangepicker', function(ev, picker) {
	$('.daterangepicker').addClass('calendar-visible');
	$('.daterangepicker').removeClass('calendar-hidden');
});
$('#date-picker').on('hide.daterangepicker', function(ev, picker) {
	$('.daterangepicker').removeClass('calendar-visible');
	$('.daterangepicker').addClass('calendar-hidden');
});
</script>

<script>
	let guest_gender = '{{$guest_gender}}';
	if(guest_gender != "特になし"){
		$(document).ready(function(){
			$('#gym_tags').append(
				`<span class="listing-tag" style="margin:10px 10px 0 0; font-size:14px;">{{$gym_type[0]->gym_type}}</span>`,
				`<span class="listing-tag" style="margin:10px 10px 0 0; font-size:14px;">{{$area[0]->gym_area}}</span>`,
				`<span class="listing-tag" style="margin:10px 10px 0 0; font-size:14px;">〜{{$guest_limit}}名</span>`,
				`<span class="listing-tag" style="margin:10px 10px 0 0; font-size:14px;">${guest_gender}</span>`)
		})
		} else {
		$(document).ready(function(){
			$('#gym_tags').append(
				`<span class="listing-tag" style="margin:10px 10px 0 0; font-size:14px;">{{$gym_type[0]->gym_type}}</span>`,
				`<span class="listing-tag" style="margin:10px 10px 0 0; font-size:14px;">{{$area[0]->gym_area}}</span>`,
				`<span class="listing-tag" style="margin:10px 10px 0 0; font-size:14px;">〜{{$guest_limit}}名</span>`)
		});
		
	}
</script>


<script>
	
	function submit(){
		// console.log($("#guest_caution > h5").length);
		// console.log($("#slot_caution > h5").length);
		// console.log($("#selected_slot > div > h5").length);
		// console.log($("#guest_details > h5").length);
		
		
		
		if($("#guest_caution > h5").length==0 && $("#slot_caution > h5").length==0 && 
		$("#selected_slot > div > h5").length>0 && $("#guest_details > h5").length>0) {
			$("#submit_button").empty();
			$("#submit_button").append(
				`<input type="submit" class="button book-now fullwidth margin-top-5" value="予約内容の確認" style="background-color:#f91942; color:white;">`
			);
		}else {
			$("#submit_button").empty();
			$("#submit_button").append(
				`<input type="submit" class="button book-now fullwidth margin-top-5" value="予約内容の確認" style="background-color:#dcdcdc; color:white;" disabled>`
			);
		}
	}
</script>


<script>
	let gym_open_times = @json($gym_open_times);
	console.log(gym_open_times);
	
	let guest_gender_flg = {{$guest_gender_flg}};
	let guest_limit = {{$guest_limit}};
	
	
	$(".qtyButtons").on("click",function(){
		let men = parseInt($(".qtyButtons").eq(0).children('input').val());
		let women = parseInt($(".qtyButtons").eq(1).children('input').val());
		let others = parseInt($(".qtyButtons").eq(2).children('input').val());
		let total_people = men + women + others;
		
		let gender_check = "OK";
		
		switch(guest_gender_flg){
			case 2:
				if(men != 0){
					gender_check = "NG";
				}
				break;
			case 3:
				if(women != 0){
					gender_check = "NG";
				}
				break;
			case 4:
				if(men != 0 && women == 0){
					gender_check = "NG";
				}
				break;
			case 5:
				if(women != 0 && men == 0){
					gender_check = "NG";
				}
				break;
		}
		
		// genderの希望と合っていない時にアラート
		if(gender_check == "OK"){
			$("#guest_details").empty();
			$("#guest_caution").empty();
			$("#guest_details").append(
				`
				<h4 name="number_of_users">人数：${total_people}名</h4>
				<input name="number_of_users" type="hidden" value="${total_people}">
				<h5 name="number_of_men" class="element_details">男性 ${men}名</h5>
				<input name="number_of_men"  type="hidden" value="${men}">
				<h5 name="number_of_women" class="element_details">女性 ${women}名</h5>
				<input name="number_of_women" type="hidden" value="${women}">
				<h5 name="number_of_others" class="element_details">その他 ${others}名</h5>
				<input name="number_of_others" type="hidden" value="${others}">
				`
			);
		}else{
			$("#guest_details").empty();
			$("#guest_caution").empty();
			$("#guest_caution").append(
				`
				<h4 name="number_of_users">人数</h4>
				<h5 style="color:#f91942;">${guest_gender}です</h5>`
			);
		}
		
		// 定員超えした際にアラート
		if(total_people > guest_limit){
			$("#guest_details").empty();
			$("#guest_caution").empty();
			$("#guest_caution").append(
				`
				<h4 name="number_of_users">人数</h4>
				<h5 style="color:#f91942;">定員は${guest_limit}名です</h5>`
			);
		}
		
		// total_peopleがゼロの場合にクリアする
		if(total_people == 0){
			$("#guest_details").empty();
			$("#guest_caution").empty();
			$("#guest_details").append(
				`
				<h4 name="number_of_users">人数</h4>
				`
			)
			};
		
	submit();
	})
	
</script>	
	
<script>
	// date-pickerが変わったらslot-changer()を発火
	$('#display_slots').on("click",function(){
		
		if($("#selected_slot > div > h5").length>0){
			let date_check = window.confirm('これまでの内容はクリアされます。よろしいですか？');
				if(date_check){
					$("#selected_date").empty();
					$("#selected_slot").empty();
					$("#total_time").empty();
					$("#total_time").append(
						`<h4>時間</h4>`
					);
				}else{
					return;
				}
		}
		
		$("#start-time-slot").empty();
		$("#end-time-slot").empty();
		
		
		let date = $("#date-picker").val();
		let showing_date = $("#showing_date").attr("value");
		
		
		
		
		let start_time = $("#start_time").val();
		let end_time = $("#end_time").val();
		
		
		let openingtimes = $.grep(gym_open_times, function(elem,index){
			return (elem.date == date);
		});
		
		$("#action_suggest").empty();
		$("#action_suggest").append(
			`<h4 style="text-align:center;">利用時間を選択してください</h4>
			<h4 style="text-align:center;">${date}</h4>`
		)
		
		
		
		$.each(openingtimes, function(index,openingtime){
			let from_time_h = ("0"+new Date(openingtime.from_time).getHours()).slice(-2);
			let from_time_i = ("0"+new Date(openingtime.from_time).getMinutes()).slice(-2);
			let from_time_hi = from_time_h + ":" + from_time_i;
			let to_time_h = ("0"+new Date(openingtime.to_time).getHours()).slice(-2);
			let to_time_i = ("0"+new Date(openingtime.to_time).getMinutes()).slice(-2);
			let to_time_hi = to_time_h + ":" + to_time_i;
			if(from_time_hi >= start_time && from_time_hi < end_time ){
				if(openingtime.status == "○"){
				$("#start-time-slot").append(
					`
					<div class="time-slot">
						<p id="time-slot-1" >
						<a class="start_slot">
							<label id="${openingtime.gym_schedule_id}" value="${from_time_hi}" for="time-slot-1" class="booking_price booking_price_start" style="background-color:#fff0c1; cursor:pointer;">
								<strong value="${openingtime.price}"> ${from_time_hi} - ${to_time_hi} ：　${openingtime.price}円</strong>
							</label>
							<input type="hidden" value="${to_time_hi}" >
						</a>
						</p>
					</div>`);
				} else {
					$("#start-time-slot").append(
					`<div class="time-slot">
						<p id="time-slot-1" >
						<label for="time-slot-1" style="text-align:center; padding:5px; display:flex; flex-direction:row; justify-content:center;">
							<strong class="booking_status" value="${openingtime.status}">${from_time_hi} - ${to_time_hi}　：　${openingtime.status}</strong>
						</label>
						</p>
					</div>`);
				}
			}
		});
		
		// 開始時刻のスロットをクリックした場合の処理
		$(".start_slot").on("click",function(){
			// #showing_dateとdateが一緒の場合は「日付が変わる場合、これまでの内容はクリアされます。よろしいですか？」というアラートをだす。
			let date = $("#date-picker").val();
			let showing_date = $("#showing_date").attr("value");
			
			
			
			if($(this).children('label').hasClass("active")){
				// 当該箇所のlabelタグのactiveクラスを外す
				$(this).children('label').removeClass("active");
				
				// 選択した箇所のみ背景色を元に戻す
				$(this).children('label').css('background-color', '#fff0c1');
				// 選択した箇所のみ文字色を元に戻す
				$(this).children('label').css('color', '#333333');
				
				// 予約内容から削除するスケジュールIDを取得する
				let schedule_id = $(this).children('label').attr('id');
				
				// 指定したスケジュールIDの予約内容を表示画面から削除する
				$("."+schedule_id).remove();
				
				
			
				
			}else{
			
			// 当該箇所のlabelタグにactiveクラスをつける
			$(this).children('label').addClass("active");
			
			
			
			// 選択した箇所のみ背景色を変える
			$(this).children('label').css('background-color', '#f91942');
			// 選択した箇所のみ文字色を変える
			$(this).children('label').css('color', 'white');
			
			
			let id_labels = $("#selected_slot > div").length;
			
			
			$("#selected_date").empty();
			$("#selected_date").append(
				`<h4 id="showing_date" class="element_details" style="text-align:left; margin-bottom:0;" name="booking_from_time" >${date}</h4>
				<input type="hidden" name="date" value="${date}">
				`
			);
			
			
			}
			
			// #selected_dateと#slot_cautionをいったん空にする
			$("#selected_slot").empty();
			$("#slot_caution").empty();
			
			
			// activeクラスがついているstart-slotタグを取得
			// activeクラスがついているstart-slotタグのstart_timeとto_timeを#selected_dateにappendする。
			let startSlots = $("#start-time-slot > div").length;
			let schedule_id_array = [];
			
			
			let id_array = 0;
			let num = 0;
			
			for($i=0; $i<startSlots; $i++){
				let activeCheck = $(".time-slot").eq($i).children('p').children('a').children('label').hasClass("active");
				
				
				// 開始時間を取得する
				let schedule_id = $(".time-slot").eq($i).children('p').children('a').children('label').attr("id");
				let from_time_set = $(".time-slot").eq($i).children('p').children('a').children('label').attr("value");
				let to_time_set = $(".time-slot").eq($i).children('p').children('a').children('input').attr("value");
				
				// schedule_id_arrayにschedule_idを追加する
				schedule_id_array.push(schedule_id);
				
				
				
				
				if(activeCheck){
					$("#selected_slot").append(
						`
						<div style="display:flex; justify-content:flex-end;" class="${schedule_id}">
							<input type="hidden" name="schedule_ids[${id_array}]"  value="${schedule_id}">
							<h5 hidden class="element_details" name="booking_from_time_${num}" value="${from_time_set}">${from_time_set} 〜 ${to_time_set}</h5>
							<p hidden value="${to_time_set}"></p>
							<input type="hidden" name="booking_from_times[${num}]" value="${from_time_set}">
							<input type="hidden" name="booking_to_times[${num}]" value="${to_time_set}">
						</div>`
					);
					num ++;
					id_array ++;
				};
				
			}
			
			
			
			
			
			// labelの数を取得する
			let labels = parseInt($("#selected_slot > div").length);
			
			// selected_slot内の最後のdevのclassの値と、最初ののdevのclassの値の差と、labelsの値を比較して、飛び石でスロットを選択しているかどうかを判断する。
			let first_dev_class = $("#selected_slot").children("div").eq(0).attr("class");
			let last_dev_class = $("#selected_slot").children("div").eq(-1).attr("class");
			let dev_class_amount = last_dev_class - first_dev_class + 1;
			
			
			
			
			
			// 最初の値と最後の値を入手する
			let first_from_time = $("#selected_slot").children("div").eq(0).children("h5").attr("value");
			let last_to_time = $("#selected_slot").children("div").eq(-1).children("p").attr("value");
			
			// 飛び石で選択している場合は、#slot_cautionに「連続したスロットを選択してください」と表示する。
			if(labels != dev_class_amount){
				if($("#selected_slot > div > h5").length){
					$("#slot_caution").append(
						`<h5 style="color:#f91942;">連続したスロットを選択してください</h5>`
						
					)
					}
			}else {
				$("#selected_slot").append(
						`
						<div style="display:flex; justify-content:flex-end;" >
							<h5 class="element_details">${first_from_time} 〜 ${last_to_time}</h5>
							<input type="hidden" name="from_to" value="${first_from_time} 〜 ${last_to_time}">
							<input type="hidden" name="slots" value="${labels}">
						</div>`
					);
			}
			;
			
			
			
			
			
			// labelの数（表示されたスロットの数）から、総利用時間を計算する（15分×スロット数）
			let total_time = labels * 15;
			
			$("#total_time").empty();
			$("#total_time").append(
				`<h4>時間：${total_time}分</h4>
				<input type="hidden"  name="total_time" value="${total_time}">`
			);
			
			// スロットのpriceを取得し、サービス料・消費税・総計を算出する
			let gym_price = 0;
			let price_before_tax = 0;
			let tax = 0;
			let total_price = 0;
			
			for($i=0; $i<labels; $i++){
				let getScheduleId = $("#selected_slot").children('div').eq($i).attr('class');
				let slot_price = $.grep(gym_open_times, function(elem,index){
						return (elem.gym_schedule_id == getScheduleId);
					});
				let price_plus = parseInt(slot_price[0].price, 10);
				gym_price += price_plus;
				service_price = gym_price*0.1;
				price_before_tax = gym_price + service_price;
				tax = parseInt(price_before_tax * 0.1, 10);
				total_price = price_before_tax + tax;
				
			}
			$("#price").empty();
			$("#price").append(
				`
				<h4 name="total_price" value="${total_price}" >総計：${total_price}円</h4>
				<input name="total_price" type="hidden" value="${total_price}">
				<h5 name="gym_price"  value="gym_price" class="element_details">ジム使用料 ${gym_price}円</h5>
				<input name="gym_price" type="hidden" value="${gym_price}">
				<h5 name="service_price"  value="service_price" class="element_details">サービス料 ${service_price}円</h5>
				<input name="service_price" type="hidden" value="${service_price}">
				<h5 name="tax"  value="tax" class="element_details">VAT ${tax}円</h5>
				<input name="tax" type="hidden" value="${tax}">
				`
			);
			
			submit();
		});
		
	
	
		
		})
</script>

@endpush
@endsection

