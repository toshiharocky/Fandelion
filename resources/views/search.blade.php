@extends('layouts.menu')


@push('css')
    <!--<link href="{{ asset('css/〇〇.css') }}" rel="stylesheet">-->
    <style>
    .gym_title_select{
    	overflow: hidden;
	    text-overflow: ellipsis;
	    white-space: nowrap;
    }	
    </style>
@endpush

@section('content')
	
	
	<!-- Banner
	================================================== -->
	<div class="main-search-container dark-overlay">
		<div class="main-search-inner">
	
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h2>ジムを探す</h2>
						<h4>あなたに合ったフィットネス環境をみつけましょう</h4>
	
						<form method="get" action="search_results">
						@csrf	
						{{method_field('get')}}
							<div class="main-search-input" style="width:60%;">
		
								<!-- <div class="main-search-input-item">
									<input type="text" placeholder="What are you looking for?" value=""/>
								</div> -->
		
								
								<div class="main-search-input-item location">
									<div id="autocomplete-container">
										<input id="autocomplete-input" type="text" placeholder="Location" required>
										<input type="hidden" id="city2" name="city2" />
										<input type="hidden" id="cityLat" name="cityLat" />
										<input type="hidden" id="cityLng" name="cityLng" />  
									</div>
									<!--<a href="#"><i class="fa fa-map-marker"></i></a>-->
								</div>
		
							<!--<div class="main-search-input-item" >-->
								<div class="panel-dropdown" style="width:20%;">
									<a href="#"  style="width:100%; text-align:center;">Guests <span class="qtyTotal" name="qtyTotal" style="background-color:#f91942">1</span></a>
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
										<div id="people">
											<input type="hidden" name="men" value=0>
											<input type="hidden" name="women" value=0>
											<input type="hidden" name="others" value=0>
											<input type="hidden" name="total_guest" value="0">
										</div>
									</div>
								</div>
								<div style="width:15%;" id="search" >
									<input type="button" onclick="submit();" class="button search-button" value="Search" style="background-color:#dcdcdc; color:white;" disabled>
								</div>
							</form>
						</div>
					<!--<div id="place-alert"></div>-->
				</div>
			</div>
		</div>
	
		</div>
		
		<!-- Video -->
		<div class="video-container">
			<video poster="images/main-search-video-poster.jpg" loop autoplay muted>
				<source src="images/main-search-video.mp4" type="video/mp4">
			</video>
		</div>
	
	</div>
	
	
	
	
	
	
	<!-- Fullwidth Section -->
	<section class="fullwidth margin-top-65 padding-top-75 padding-bottom-70" data-background-color="#f8f8f8">
	
		<div class="container">
			<div class="row">
	
				<div class="col-md-12">
					<h3 class="headline centered margin-bottom-45">
						Most Visited Places
						<span>Discover top-rated local businesses</span>
					</h3>
				</div>
			</div>
		</div>
	
		<!-- Carousel / Start -->
		<div class="simple-fw-slick-carousel dots-nav">
			@for ($i = 0; $i < $gyms_count; $i++)
			
			<!-- Listing Item -->
			<div class="fw-carousel-item">
				<form method="post" name="gym_select" action="gym_introduction">
				@csrf
					
					<a onclick="document:gym_select[{{$i}}].submit(); return false;" class="listing-item-container compact" >
						<input type="hidden" name="gym_id" value="{{$gym_id[$i]}}">
						<div class="listing-item">
							<img src="images/gym_images/{{$gym_image_url[$i]}}" alt="">
							<!--<div class="listing-item-details">-->
							<!--	<ul>-->
							<!--		<li>Friday, August 10</li>-->
							<!--	</ul>-->
							<!--</div>-->
		
							<!--<div class="listing-badge now-open">Now Open</div>-->
		
							<div class="listing-item-content">
								<div class="numerical-rating" data-rating={{$review_average[$i]}}></div>
								<h3 class="gym_title_select">{{$gym_titles[$i]}}</h3>
								<span>{{$gym_addr[$i]}}</span>
							</div>
							<!--<span class="like-icon"></span>-->
						</div>
					</a>
				</form>
			</div>
			 <!--Listing Item / End -->
			
			@endfor
	
			
	
		</div>
		<!-- Carousel / End -->
	
	
	</section>
	<!-- Fullwidth Section / End -->
	
	
	<!-- Container -->
	<div class="container">
		<div class="row">
	
			<div class="col-md-12">
				<h3 class="headline centered margin-bottom-35 margin-top-70">Popular Cities <span>Browse listings in popular places</span></h3>
			</div>
			
			<div class="col-md-4">
	
				<!-- Image Box -->
				<a href="listings-list-with-sidebar.html" class="img-box" data-background-image="images/popular-location-01.jpg">
					<div class="img-box-content visible">
						<h4>New York </h4>
						<span>14 Listings</span>
					</div>
				</a>
	
			</div>	
				
			<div class="col-md-8">
	
				<!-- Image Box -->
				<a href="listings-list-with-sidebar.html" class="img-box" data-background-image="images/popular-location-02.jpg">
					<div class="img-box-content visible">
						<h4>Los Angeles</h4>
						<span>24 Listings</span>
					</div>
				</a>
	
			</div>	
	
			<div class="col-md-8">
	
				<!-- Image Box -->
				<a href="listings-list-with-sidebar.html" class="img-box" data-background-image="images/popular-location-03.jpg">
					<div class="img-box-content visible">
						<h4>San Francisco </h4>
						<span>12 Listings</span>
					</div>
				</a>
	
			</div>	
				
			<div class="col-md-4">
	
				<!-- Image Box -->
				<a href="listings-list-with-sidebar.html" class="img-box" data-background-image="images/popular-location-04.jpg">
					<div class="img-box-content visible">
						<h4>Miami</h4>
						<span>9 Listings</span>
					</div>
				</a>
	
			</div>
	
		</div>
	</div>
	<!-- Container / End -->
	
	
	<!-- Flip banner -->
	<!--<a href="listings-half-screen-map-list.html" class="flip-banner parallax margin-top-65" data-background="images/slider-bg-02.jpg" data-color="#f91942" data-color-opacity="0.85" data-img-width="2500" data-img-height="1666">-->
	<!--	<div class="flip-banner-content">-->
	<!--		<h2 class="flip-visible">Expolore top-rated attractions nearby</h2>-->
	<!--		<h2 class="flip-hidden">Browse Listings <i class="sl sl-icon-arrow-right"></i></h2>-->
	<!--	</div>-->
	<!--</a>-->
	<!-- Flip banner / End -->
	
	
	
	
	
	<!-- Footer
	================================================== -->
	<div id="footer">
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
	
	
	</div>
	
	<!-- Mobile Navigation -->
	<nav class="mobile-nav mmenu-trigger">
		<div class="mmenu_icon">
			<a href="/" class="mmenus">
				<span class="material-icons-outlined " style="font-size: 42px; margin: auto; color: black; font-weight: bold;">
					search
				</span>
				<p class="icon-disc" style="color: black; font-weight: bold;">さがす</p>
			</a>
		</div>
		<div class="mmenu_icon">
			<a href="#" class="mmenus">
				<span class="material-icons-outlined" style="font-size: 42px; margin: auto; color: #BFBFBF;">
					favorite_border
				</span>
				<p class="icon-disc">お気に入り</p>
			</a>
		</div>
		<div class="mmenu_icon">
			<a href="#" class="mmenus">
				<span class="material-icons-outlined" style="font-size: 42px; margin: auto; color: #BFBFBF;">
					fitness_center
				</span>
				<p class="icon-disc">トレーニング</p>
			</a>
		</div>
		<div class="mmenu_icon">
			<a href="#" class="mmenus">
				<span class="material-icons-outlined" style="font-size: 42px; margin: auto; color: #BFBFBF;">
					chat_bubble_outline
				</span>
				<p class="icon-disc">メッセージ</p>
			</a>
		</div>
		<div class="mmenu_icon">
			<a href="#" class="mmenus">
				<span class="material-icons-outlined" style="font-size: 42px; margin: auto; color: #BFBFBF;">
					account_circle
				</span>
				<p class="icon-disc">プロフィール</p>
			</a>
		</div>
	</nav>
	<!-- Mobile Navigation End-->
	<!-- Wrapper / End -->
	
@push('js')
	<!-- Booking Widget - Quantity Buttons -->
	<script src="{{ asset('/js/quantityButtons.js') }}"></script>
	<!-- Leaflet // Docs: https://leafletjs.com/ -->
	<!--<script src="{{ asset('/js/leaflet.min.js') }}"></script>-->
	
	<!-- Leaflet Maps Scripts -->
	<!--<script src="{{ asset('/js/leaflet-markercluster.min.js') }}"></script>-->
	<!--<script src="{{ asset('/js/leaflet-gesture-handling.min.js') }}"></script>-->
	<!--<script src="{{ asset('/js/leaflet-listeo.js') }}"></script>-->
	
	<!-- Leaflet Geocoder + Search Autocomplete // Docs: https://github.com/perliedman/leaflet-control-geocoder -->
	<!--<script src="{{ asset('/js/leaflet-autocomplete.js') }}"></script>-->
	<!--<script src="{{ asset('/js/leaflet-control-geocoder.js') }}"></script>-->
	
	<!-- Google Autocomplete -->
	// <script>
	//   function initAutocomplete() {
	//     var input = document.getElementById('autocomplete-input');
	//     var autocomplete = new google.maps.places.Autocomplete(input);
	
	//     autocomplete.addListener('place_changed', function() {
	//       var place = autocomplete.getPlace();
	//       if (!place.geometry) {
	//         return;
	//       }
	//     });
	
	// 	if ($('.main-search-input-item')[0]) {
	// 	    setTimeout(function(){ 
	// 	        $(".pac-container").prependTo("#autocomplete-container");
	// 	    }, 300);
	// 	}
	// }
	// </script>
	
	<script>
		
		let total_guest = 0;
		
		
		
		function submit(){
			// console.log('呼ばれたよ');
			let cityLat = $('#cityLat').val();
			let cityLng = $('#cityLng').val();
			let city2 =  $('#city2').val();
			// let autocomplete_input = $("#autocomplete-input").val();
	  //  	console.log(cityLat);
	  //  	console.log(cityLng);
	  //  	console.log(city2);
	  //  	console.log(autocomplete_input);
	    	
			 <!-- $("#place-alert").empty();-->
			 <!-- console.log(cityLat=="" && cityLng=="" && autocomplete_input!="" );-->
			  
			 <!-- if(cityLat=="" && cityLng=="" && autocomplete_input!="" ){-->
				<!--	$("#place-alert").append(-->
				<!--	`<h5 style="color:#f91942;">地名を選択してください</h5>`-->
				<!--	)-->
				<!--}-->
				
				
				if(cityLat!="" && cityLng!="" && total_guest != 0){
					$("#search").empty();
					$("#search").append(
						`<input type="button" onclick="submit();" class="button search-button" value="Search">`
					);
				}else{
					$("#search").empty();
					$("#search").append(
						`<input type="button" onclick="submit();" class="button search-button" value="Search" style="background-color:#dcdcdc; color:white;" disabled>`
					);
				}
		}
		
		
		
		$(".qtyButtons").on("click",function(){
			let men = parseInt($(".qtyButtons").eq(0).children('input').val());
			let women = parseInt($(".qtyButtons").eq(1).children('input').val());
			let others = parseInt($(".qtyButtons").eq(2).children('input').val());
			total_guest = men + women + others;
			<!--console.log(total_guest);-->
			$("#people").empty();
			$("#people").append(
				`<input type="hidden" name="men" value=${men}>
				<input type="hidden" name="women" value=${women}>
				<input type="hidden" name="others" value=${others}>
				<input type="hidden" name="total_guest" value=${total_guest}>
				
				`
			);
			submit();
			
		});
		
		
	    
	    
		
	    
	</script>
	
	<script type="text/javascript">
	    function initAutocomplete() {
	        var input = document.getElementById('autocomplete-input');
	        var autocomplete = new google.maps.places.Autocomplete(input);
	        google.maps.event.addListener(autocomplete, 'place_changed', function () {
	            var place = autocomplete.getPlace();
	            document.getElementById('city2').value = place.name;
	            document.getElementById('cityLat').value = place.geometry.location.lat();
	            document.getElementById('cityLng').value = place.geometry.location.lng();
				submit();
	        });
	        
	    }
	    
	    
	   <!-- $("#autocomplete-input").on("focusout",function(){-->
	   <!-- 	initAutocomplete();-->
	   <!-- }-->
	    
	    
	   <!-- $("#autocomplete-input").on("focusout",function(){-->
	   <!-- 	if($("#autocomplete-input").val() == ""){-->
	   <!-- 		$("#autocomplete-container").empty();-->
	   <!-- 		$("#autocomplete-container").append(-->
				<!--	`<input id="autocomplete-input" type="text" placeholder="Location" required>-->
				<!--	<input type="hidden" id="city2" name="city2" />-->
				<!--	<input type="hidden" id="cityLat" name="cityLat" />-->
				<!--	<input type="hidden" id="cityLng" name="cityLng" />  `-->
				<!--);-->
	   <!-- 	}-->
	    	
	   <!-- 	console.log("外れたよ");-->
    <!--    	submit();-->
	   <!-- });-->
	    
	    // $('#cityLat').on("change",function(){
	    // 	$('#cityLat').delay(1000).queue(function(){
	    //     	submit();
	    //     });
	    // });
	    
	</script>
	
	<!--<script src="https://maps.google.com/maps/api/js?key=AIzaSyBI-9n6pQ1Vqktbyg8LGjLW-NCPsa6SQ5g&language=ja"></script>-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBI-9n6pQ1Vqktbyg8LGjLW-NCPsa6SQ5g&libraries=places&callback=initAutocomplete" async defer">
	</script>
	
	
	
	<!-- Style Switcher
	================================================== -->
	<script src="{{ asset('/js/switcher.js') }}"></script>
	
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
	
	
	
