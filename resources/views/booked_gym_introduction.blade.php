@extends('layouts.menu_mobnav')

@push('css')
    <!--<link href="{{ asset('css/〇〇.css') }}" rel="stylesheet">-->
<style>
	.booking-sticky-footer{
		background-color:#f6f6f6;
	}
	.hosted-by-avatar{
		width:56px;
		height:56px;
	}
	.host_icon{
	    width: 100%;
	    height: 100%;
	    object-fit: contain;
	    border: 3px solid #fff;
	    box-shadow: 0 2px 3px rgb(0 0 0 / 10%);
	    box-sizing: content-box;
	    display: inline-block;
	    border-radius: 50%;
	    image-rendering: -webkit-optimize-contrast;
	}
	.to_message_box{
		text-align: center;
		border-color: #f91942;
    	height:70px;
    	display:flex;
    	flex-direction:column;
    	background-color:#fbdee3;
    	justify-content: space-around;
    	border-radius: 10px;
	}
	.to_message_box h4{
		color: #f91942;
		margin-bottom:0;
	}
	.to_message_box h5{
		<!--color: #f91942;-->
		margin-top:0;
	}
	@media (min-width: 991px){
		.listing-titlebar-title{
			max-width:70%;
		}
	}
	@media (max-width: 991px){
		.book_request{
			display:none !important;
		}
		.price_range{
			display:none;
		}
		.listing-titlebar-title{
			width:100%;
		}
		.cancel_policy{
			padding: 10px !important;
		}
		.equipment_note{
			width:80% !important;
		}
		.equipment_weight{
			font-size:14px !important;
		}
		#contact{
			margin-bottom:150px;
		}
		.to_message_box h4{
			font-size: 16px;
		}
		.to_message_box h5{
			font-size: 12px;
		}
	}
</style>
@endpush

@section('content')





<!-- Slider
================================================== -->
<div class="listing-slider mfp-gallery-container margin-bottom-0">
    @for ($i = 0; $i < $gym_images_count; $i++)
	<a href="https://s3-ap-northeast-1.amazonaws.com/fandelion/{{$gym_image_url[$i]->img_url}}" data-background-image="https://s3-ap-northeast-1.amazonaws.com/fandelion/{{$gym_image_url[$i]->img_url}}" class="item mfp-gallery" title="Title 1"></a>
	@endfor
</div>


<!-- Content
================================================== -->
<div class="container">
	<div class="row sticky-wrapper">
		<div class="col-lg-8 col-md-8 padding-right-30">
		
			<!-- Titlebar -->
			<div id="titlebar" class="listing-titlebar" style="display:flex; flex-direction:row; justify-content:space-between;">
				<div class="listing-titlebar-title">
					<h2>{{$gym_title}} </h2>
					<h5>
						<a href="#listing-location" class="listing-address">
							<i class="fa fa-map-marker"></i>
							{{$addr}}
						</a>
					</h5>
					<div id=gym_tags></div>
					<div class="star-rating" data-rating="5">
						<div class="rating-counter"><a href="#listing-reviews">({{$review_amount}} reviews)</a></div>
					</div>
				</div>
				<div class="listing-titlebar-title price_range" style="text-align:right;">
					<h2>{{$price_range}} 
						<!--<span class="listing-tag">Eat & Drink</span>-->
					</h2>
					<span>
						<a href="#listing-location" class="listing-address">
							(15分あたり)
						</a>
					</span>
				</div>
			</div>



			<!-- Listing Nav -->
			<div id="listing-nav" class="listing-nav-container">
				<ul class="listing-nav">
					<li><a href="#listing-location" class="active">場所</a></li>
					<li><a href="#listing-cancel_policy">キャンセルポリシー</a></li>
					<li><a href="#listing-overview">ジムの概要</a></li>
					<li><a href="#listing-equipment-list">設備</a></li>
					<li><a href="#listing-reviews">レビュー</a></li>
					
				</ul>
			</div>
			
			
			<!-- Location -->
			<div id="listing-location" class="listing-section">
				<h3 class="listing-desc-headline margin-top-60 margin-bottom-30">場所</h3>
				<h4>{{$pref}}{{$addr}}{{$strt}}</h4>
				<h5>住所や位置情報の第三者への開示は固く禁じます。</h5>
				<div id="singleListingMap-container">
					<div id="singleListingMap" data-latitude="{{$latitude}}" data-longitude="{{$longitude}}" data-map-icon="im im-icon-Home"></div>
					<!--<a href="#" id="streetView">Street View</a>-->
				</div>
			</div>
			
			
			<!-- Location -->
			<div id="listing-cancel_policy" class="listing-section">
				<h3 class="listing-desc-headline margin-top-60 margin-bottom-30">キャンセルポリシー</h3>

				<!--<div class="show-more">-->
					<div class="pricing-list-container">
						<ul>
							<li class="cancel_policy">
								<h5>{{$cancel_policy[0]->policy_name}}</h5>
								<p>{{$cancel_policy[0]->policy_desc}}</p>
							</li>
						</ul>
					</div>
			</div>
			
			
			<!-- Overview -->
			<div id="listing-overview" class="listing-section">
			<h3 class="listing-desc-headline margin-top-70 margin-bottom-30">ジムの概要</h3>

				<!-- Description -->

				<p>
					{{$gym_desc}}
				</p>

				
				
				
			</div>


			<!-- Food Menu -->
			<div id="listing-equipment-list" class="listing-section">
				<h3 class="listing-desc-headline margin-top-70 margin-bottom-30">設備</h3>

				<!--<div class="show-more">-->
					<div class="pricing-list-container">
						
						<!-- 設備リスト -->
						<!--<h4>設備</h4>-->
						<ul>
							@for ($i = 0; $i < $gym_equipment_count; $i++)
							<li>
								<h5>{{$gym_equipment[$i]->equipment_name}}</h5>
								<p class="equipment_note">{{$gym_equipment[$i]->note}}</p>
								@if($gym_equipment[$i]->min_weight)
									@if($gym_equipment[$i]->max_weight)
									<span class="equipment_weight">{{$gym_equipment[$i]->min_weight}}kg〜{{$gym_equipment[$i]->max_weight}}kg</span>
									@endif
								@endif
							</li>
							@endfor
						</ul>
					</div>
				<!--</div>-->
				<!--<a href="#" class="show-more-button" data-more-title="Show More" data-less-title="Show Less"><i class="fa fa-angle-down"></i></a>-->
			</div>
			<!-- Food Menu / End -->
			
			
			<!-- Reviews -->
			<div id="listing-reviews" class="listing-section">
				<h3 class="listing-desc-headline margin-top-75 margin-bottom-20">レビュー <span>({{$review_amount}})</span></h3>

				<div id="rating">
					
				</div>


				<div class="clearfix"></div>

				<!-- Reviews -->
				<section class="comments listing-reviews">
					<ul>
						@for($i=0; $i<$review_amount; $i++)
						<li>
							<div class="avatar"><img src="https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70" alt="" /></div>
							<div class="comment-content"><div class="arrow-comment"></div>
								<div class="comment-by">{{$review_user_name[$i]}} <i class="tip" data-tip-content="Person who left this review actually was a customer"></i> <span class="date">{{$book_year_month[$i]}}</span>
									<div class="star-rating" data-rating={{$user_total_stars[$i]}}>
										<strong><i class="fas fa-star"></i> {{$user_total_stars[$i]}}</strong>
									</div>
								</div>
								<p style="overflow-wrap:break-word;">{{$review_note[$i]}}</p>
								
								
								<!--<div class="review-images mfp-gallery-container">-->
								<!--	<a href="images/review-image-01.jpg" class="mfp-gallery"><img src="images/review-image-01.jpg" alt=""></a>-->
								<!--</div>-->
								<!--<a href="#" class="rate-review"><i class="sl sl-icon-like"></i> Helpful Review <span>12</span></a>-->
							</div>
						</li>
						@endfor

					 </ul>
				</section>
			</div>


		

			
				
			


			


		</div>


		<!-- Sidebar-->
		<!--================================================== -->
		<div class="col-lg-4 col-md-4 margin-top-75 sticky">

				
			<!-- Verified Badge -->
			<!--<div class="verified-badge with-tip" data-tip-content="Listing has been verified and belongs the business owner or manager.">-->
			<!--	<i class="sl sl-icon-check"></i> Verified Listing-->
			<!--</div>-->

			<!-- Book Now -->
			<div id="booking-widget-anchor" class="boxed-widget booking-widget margin-top-35">
				<h3><i class="fa fa-calendar-check-o "></i>予約状況の確認</h3>
				<div class="row with-forms  margin-top-0">

					<!-- Date Range Picker - docs: https://www.daterangepicker.com/ -->
					<div class="col-lg-12">
						<input type="text" id="date-picker" placeholder="Date" readonly="readonly">
					</div>

					<!-- Panel Dropdown -->
					<div class="col-lg-12">
						<div class="panel-dropdown time-slots-dropdown">
							<a href="#">Time Slots</a>
							<div class="panel-dropdown-content padding-reset" style="width:100%;">
								<div class="panel-dropdown-scrollable">
									
									<div id="opening-time-slot"></div>
									
									<!-- Time Slot -->
									<!--<div class="time-slot">-->
									<!--	<input type="radio" name="time-slot" id="time-slot-7">-->
									<!--	<label for="time-slot-7">-->
									<!--		<strong>14:00 pm - 14:30 pm</strong>-->
									<!--		<span>1 slots available</span>-->
									<!--	</label>-->
									<!--</div>-->

								</div>
							</div>
						</div>
					</div>
					<!-- Panel Dropdown / End -->

					<!-- Panel Dropdown -->
					<!--<div class="col-lg-12">-->
					<!--	<div class="panel-dropdown">-->
					<!--		<a href="#">Guests <span class="qtyTotal" name="qtyTotal">1</span></a>-->
					<!--		<div class="panel-dropdown-content">-->

								<!-- Quantity Buttons -->
					<!--			<div class="qtyButtons">-->
					<!--				<div class="qtyTitle">Adults</div>-->
					<!--				<input type="text" name="qtyInput" value="1">-->
					<!--			</div>-->

					<!--			<div class="qtyButtons">-->
					<!--				<div class="qtyTitle">Childrens</div>-->
					<!--				<input type="text" name="qtyInput" value="0">-->
					<!--			</div>-->

					<!--		</div>-->
					<!--	</div>-->
					<!--</div>-->
					<!-- Panel Dropdown / End -->

				</div>
				
				<!-- Book Now -->
				<a href="/gym_booking" class="book_request button book-now fullwidth margin-top-5">Request To Book</a>
			</div>
			<!-- Book Now / End -->


			<!-- Coupon Widget -->
			<!--<div class="coupon-widget" style="background-image: url(https://localhost/listeo_html/images/single-listing-01.jpg);">-->
			<!--	<a href="#" class="coupon-top">-->
			<!--		<span class="coupon-link-icon"></span>-->
			<!--		<h3>Order 1 burger and get 50% off on second!</h3>-->
			<!--		<div class="coupon-valid-untill">Expires 25/10/2019</div>-->
			<!--		<div class="coupon-how-to-use"><strong>How to use?</strong> Just show us this coupon on a screen of your smartphone!</div>-->
			<!--	</a>-->
			<!--	<div class="coupon-bottom">-->
			<!--		<div class="coupon-scissors-icon"></div>-->
			<!--		<div class="coupon-code">L1ST30</div>-->
			<!--	</div>-->
			<!--</div>-->

		
			<!-- Opening Hours -->
			<!--<div class="boxed-widget opening-hours margin-top-35">-->
			<!--	<div class="listing-badge now-open">Now Open</div>-->
			<!--	<h3><i class="sl sl-icon-clock"></i> Opening Hours</h3>-->
			<!--	<ul>-->
			<!--		<li>Monday <span>9 AM - 5 PM</span></li>-->
			<!--		<li>Tuesday <span>9 AM - 5 PM</span></li>-->
			<!--		<li>Wednesday <span>9 AM - 5 PM</span></li>-->
			<!--		<li>Thursday <span>9 AM - 5 PM</span></li>-->
			<!--		<li>Friday <span>9 AM - 5 PM</span></li>-->
			<!--		<li>Saturday <span>9 AM - 3 PM</span></li>-->
			<!--		<li>Sunday <span>Closed</span></li>-->
			<!--	</ul>-->
			<!--</div>-->
			<!-- Opening Hours / End -->


			<div id="contact"></div>


			<!-- Share / Like -->
			<!--<div class="listing-share margin-top-40 margin-bottom-40 no-border">-->
			<!--	<button class="like-button"><span class="like-icon"></span> Bookmark this listing</button> -->
			<!--	<span>159 people bookmarked this place</span>-->

					<!-- Share Buttons -->
					<!--<ul class="share-buttons margin-top-40 margin-bottom-0">-->
					<!--	<li><a class="fb-share" href="#"><i class="fa fa-facebook"></i> Share</a></li>-->
					<!--	<li><a class="twitter-share" href="#"><i class="fa fa-twitter"></i> Tweet</a></li>-->
					<!--	<li><a class="gplus-share" href="#"><i class="fa fa-google-plus"></i> Share</a></li>-->
						<!-- <li><a class="pinterest-share" href="#"><i class="fa fa-pinterest-p"></i> Pin</a></li> -->
					<!--</ul>-->
			<!--		<div class="clearfix"></div>-->
			<!--</div>-->

		</div>
		<!-- Sidebar / End -->

	</div>
</div>

<!-- Back To Top Button -->
<div id="backtotop"><a href="#"></a></div>

<!-- Booking Sticky Footer -->
<div class="booking-sticky-footer">
	<div class="container">
		<div class="bsf-left">
			<h3>{{$price_range}}</h3>
			<h4>(15分あたり)</h4>
			<div class="star-rating" data-rating="5">
				<div class="rating-counter"></div>
			</div>
		</div>
		<div class="bsf-right">
			<a href="/gym_booking" class="button">Book Now</a>
		</div>
	</div>
</div>

</div>
<!-- Wrapper / End -->







<!-- Content / End -->
@push('js')
<!--<script src="{{ asset('js/〇〇.js') }}"></script>-->

<script>
	const guest_gender = '{{$guest_gender}}';
	if(guest_gender != ""){
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
	if({{$message_list_count}} != 0){
		$("#contact").append(
			`<!-- Contact -->
				<div class="boxed-widget margin-top-35">
					<div class="hosted-by-title">
						<h4><span>Hosted by</span> {{$host_name}}</h4>
						<a href="pages-user-profile.html" class="hosted-by-avatar"><img class="host_icon" src={{$host_user_icon}} alt=""></a>
						
					</div>
					
	
					<!-- Reply to review popup -->
					<div class="clearfix"></div>
					
					<div id="small-dialog" class="zoom-anim-dialog mfp-hide">
						<div class="small-dialog-header">
							<h3>Send Message</h3>
						</div>
						<form method="get" name="message_select" action="messages_conversation">
						@csrf
							<a onclick="document:message_select.submit();"  class="listing-item-container" style="cursor:pointer">
								<div class="to_message_box">
									<h4>メッセージの履歴を確認する</h4>
									<h5>あなたは以前に{{$host_name}}さんと<br>このジムに関するメッセージのやりとりをしています。</h5>
									<input type="hidden" name="gym_id" value={{$gym_id}}>
								</div>
							</a>
						</form>
						<form method="get" name="send_direct_messages" action="send_direct_messages">
						@csrf
							<input type="hidden" name="gym_id" value={{$gym_id}}></input>
							<input type="hidden" name="guest_id" value={{$user_id}}></input>
							<input type="hidden" name="host_id" value={{$host_user_id}}></input>
							<div class="message-reply">
								<textarea cols="40" rows="3" placeholder="Your Message to {{$host_name}}" name="message" onkeydown="if(event.shiftKey&&event.keyCode==13){document.getElementById('submit').click();return false};"></textarea>
								<input id="submit" type="submit" class="button" value="Send Message"></input>
							</div>
						</form>
					</div>
					
					
	
					<a href="#small-dialog" class="send-message-to-owner button popup-with-zoom-anim"><i class="sl sl-icon-envelope-open"></i> Send Message</a>
				</div>
				<!-- Contact / End-->`
		);
	}else{
		$("#contact").append(
			`<!-- Contact -->
				<div class="boxed-widget margin-top-35">
					<div class="hosted-by-title">
						<h4><span>Hosted by</span> {{$host_name}}</h4>
						<a href="pages-user-profile.html" class="hosted-by-avatar"><img class="host_icon" src={{$host_user_icon}} alt=""></a>
						
					</div>
					
	
					<!-- Reply to review popup -->
					<div class="clearfix"></div>
					
					<div id="small-dialog" class="zoom-anim-dialog mfp-hide">
						<form method="get" name="send_direct_messages" action="send_direct_messages">
						@csrf
							<input type="hidden" name="gym_id" value={{$gym_id}}></input>
							<input type="hidden" name="guest_id" value={{$user_id}}></input>
							<input type="hidden" name="host_id" value={{$host_user_id}}></input>
							<div class="small-dialog-header">
								<h3>Send Message</h3>
							</div>
							<div class="message-reply">
								<textarea cols="40" rows="3" placeholder="Your Message to {{$host_name}}" name="message" onkeydown="if(event.shiftKey&&event.keyCode==13){document.getElementById('submit').click();return false};"></textarea>
								<input id="submit" type="submit" class="button" value="Send Message"></input>
							</div>
						</form>
					</div>
					
					
	
					<a href="#small-dialog" class="send-message-to-owner button popup-with-zoom-anim"><i class="sl sl-icon-envelope-open"></i> Send Message</a>
				</div>
				<!-- Contact / End-->`
		);
	}
</script>

<script>
	let gym_open_times = @json($gym_open_times);
	console.log(gym_open_times);
	
	$('#date-picker').on("change",function(){
		
		$("#opening-time-slot").empty();
	
		let date = $("#date-picker").val();
		
		let openingtimes = $.grep(gym_open_times, function(elem,index){
			return (elem.date == date);
		});
		
		
		if(openingtimes==""){
			$("#opening-time-slot").append(
			`<h5>利用可能な時間帯はありません</h5>`
			)
		}else{
			$.each(openingtimes, function(index,openingtime){
			$("#opening-time-slot").append(
				`<div class="time-slot">
					<p id="time-slot-1" >
					<label for="time-slot-1" style="text-align:center; padding:5px; display:flex; flex-direction:row; justify-content:center;">
						<strong class="booking_status" style="font-size:25px; padding-right:15px;">${openingtime.status}</strong>
						<strong>${openingtime.from_time} - ${openingtime.to_time}</strong>
					</label>
					</p>
				</div>`);
			});
		}
		
		
		
		})
	
	
           
	
	
	
</script>

<!-- Maps -->
<script src="https://maps.google.com/maps/api/js?key=AIzaSyBI-9n6pQ1Vqktbyg8LGjLW-NCPsa6SQ5g&language=ja"></script>
<script src="{{ asset('js/infobox.min.js')}}"></script>
<script src="{{ asset('js/markerclusterer.js')}}"></script>
<script src="{{ asset('js/maps.js')}}"></script>	

<!-- Booking Widget - Quantity Buttons -->
<script src="{{ asset('js/quantityButtons.js')}}"></script>

<!-- Date Range Picker - docs: https://www.daterangepicker.com/ -->
<!--<script src="{{ asset('js/moment.min.js')}}"></script>-->
<!--<script src="{{ asset('js/daterangepicker.js')}}"></script>-->
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


<!-- Replacing dropdown placeholder with selected time slot -->
<script>
$(".time-slot").each(function() {
	var timeSlot = $(this);
	$(this).find('input').on('change',function() {
		var timeSlotVal = timeSlot.find('strong').text();

		$('.panel-dropdown.time-slots-dropdown a').html(timeSlotVal);
		$('.panel-dropdown').removeClass('active');
	});
});
</script>


<!-- Style Switcher
================================================== -->
<script src="{{ asset('js/switcher.js')}}"></script>

<div id="style-switcher">
	<h2>Color Switcher <a href="#"><i class="sl sl-icon-settings"></i></a></h2>
	
	<div>
		<ul class="colors" id="color1">
			<li><a href="#" class="main" title="Main"></a></li>
			<li><a href="#" class="blue" title="Blue"></a></li>
			<li><a href="#" class="green" title="Green"></a></li>
			<li><a href="#" class="orange" title="Orange"></a></li>
			<li><a href="#" class="navy" title="Navy"></a></li>
			<li><a href="#" class="yellow" title="Yellow"></a></li>
			<li><a href="#" class="peach" title="Peach"></a></li>
			<li><a href="#" class="beige" title="Beige"></a></li>
			<li><a href="#" class="purple" title="Purple"></a></li>
			<li><a href="#" class="celadon" title="Celadon"></a></li>
			<li><a href="#" class="red" title="Red"></a></li>
			<li><a href="#" class="brown" title="Brown"></a></li>
			<li><a href="#" class="cherry" title="Cherry"></a></li>
			<li><a href="#" class="cyan" title="Cyan"></a></li>
			<li><a href="#" class="gray" title="Gray"></a></li>
			<li><a href="#" class="olive" title="Olive"></a></li>
		</ul>
	</div>
		
</div>
<!-- Style Switcher / End -->

@endpush
@endsection
