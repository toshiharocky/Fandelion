@extends('layouts.menu')

@push('css')
    <!--<link href="{{ asset('css/〇〇.css') }}" rel="stylesheet">-->
@endpush

@section('content')





<!-- Slider
================================================== -->
<div class="listing-slider mfp-gallery-container margin-bottom-0">
    @for ($i = 0; $i < $gym_images_count; $i++)
	<a href="images/gym_images/{{$gym_image_url[$i]->img_url}}" data-background-image="images/gym_images/{{$gym_image_url[$i]->img_url}}" class="item mfp-gallery" title="Title 1"></a>
	@endfor
</div>


<!-- Content
================================================== -->
<div class="container">
	<div class="row sticky-wrapper">
		<div class="col-lg-8 col-md-8 padding-right-30">
		
			<!-- Titlebar -->
			<div id="titlebar" class="listing-titlebar" style="display:flex; flex-direction:row; justify-content:space-between;">
				<div class="listing-titlebar-title" style="max-width:70%;">
					<h2>{{$gym_title}} 
						<div id=gym_tags></div>
					</h2>
					<span>
						<a href="#listing-location" class="listing-address">
							<i class="fa fa-map-marker"></i>
							{{$addr}}
						</a>
					</span>
					<div class="star-rating" data-rating="5">
						<div class="rating-counter"><a href="#listing-reviews">({{$review_amount}} reviews)</a></div>
					</div>
				</div>
			</div>



			<!-- Listing Nav -->
			<div id="listing-nav" class="listing-nav-container">
				<ul class="listing-nav">
					<li><a href="#listing-location" class="active">場所</a></li>
					<li><a href="#listing-cancel_policy">キャンセルポリシー</a></li>
					<li><a href="#listing-overview">ジムの概要</a></li>
					<li><a href="#listing-equipment-list">設備</a></li>
					
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
							<li>
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
								<p>{{$gym_equipment[$i]->note}}</p>
								@if($gym_equipment[$i]->min_weight)
									@if($gym_equipment[$i]->max_weight)
									<span>{{$gym_equipment[$i]->min_weight}}kg〜{{$gym_equipment[$i]->max_weight}}kg</span>
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

		

			
				
			


			


		</div>


		<!-- Sidebar-->
		<!--================================================== -->
		<div class="col-lg-4 col-md-4 margin-top-75 sticky">

				
			<!-- Verified Badge -->
			<div class="verified-badge with-tip" data-tip-content="Listing has been verified and belongs the business owner or manager.">
				<i class="sl sl-icon-check"></i> Verified Listing
			</div>

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
				<a href="/gym_booking" class="button book-now fullwidth margin-top-5">Request To Book</a>
			</div>
			<!-- Book Now / End -->


			<!-- Coupon Widget -->
			<div class="coupon-widget" style="background-image: url(https://localhost/listeo_html/images/single-listing-01.jpg);">
				<a href="#" class="coupon-top">
					<span class="coupon-link-icon"></span>
					<h3>Order 1 burger and get 50% off on second!</h3>
					<div class="coupon-valid-untill">Expires 25/10/2019</div>
					<div class="coupon-how-to-use"><strong>How to use?</strong> Just show us this coupon on a screen of your smartphone!</div>
				</a>
				<div class="coupon-bottom">
					<div class="coupon-scissors-icon"></div>
					<div class="coupon-code">L1ST30</div>
				</div>
			</div>

		
			<!-- Opening Hours -->
			<div class="boxed-widget opening-hours margin-top-35">
				<div class="listing-badge now-open">Now Open</div>
				<h3><i class="sl sl-icon-clock"></i> Opening Hours</h3>
				<ul>
					<li>Monday <span>9 AM - 5 PM</span></li>
					<li>Tuesday <span>9 AM - 5 PM</span></li>
					<li>Wednesday <span>9 AM - 5 PM</span></li>
					<li>Thursday <span>9 AM - 5 PM</span></li>
					<li>Friday <span>9 AM - 5 PM</span></li>
					<li>Saturday <span>9 AM - 3 PM</span></li>
					<li>Sunday <span>Closed</span></li>
				</ul>
			</div>
			<!-- Opening Hours / End -->


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
	let gym_open_times = @json($gym_open_times);
	console.log(gym_open_times);
	
	$('#date-picker').on("change",function(){
		
		$("#opening-time-slot").empty();
	
		let date = $("#date-picker").val();
		
		let openingtimes = $.grep(gym_open_times, function(elem,index){
			return (elem.date == date);
		});
		
		<!--console.log(openingtime_of_the_day[0].from_time);-->
		
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
