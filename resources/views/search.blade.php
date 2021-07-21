@extends('layouts.menu_mobnav')


@push('css')
    <!--<link href="{{ asset('css/〇〇.css') }}" rel="stylesheet">-->
    <style>
    .gym_title_select{
    	overflow: hidden;
	    text-overflow: ellipsis;
	    white-space: nowrap;
    }
    .main-search-input{
	    	width:60%;
	    }
    .panel-dropdown{
	    	width:20%;
	    }
    #search{
    	width:15%;
    }
    .featured-gyms{
    	display:flex;
    	justify-content:space-around;
    	width:95%;
	    margin: 0 auto;
    }
    .fw-carousel-item {
	    width: 24%;
	}
    
    
    @media (max-width: 991px){
	    .main-search-input{
	    	width:100%;
	    }
	    .panel-dropdown{
	    	width:100%;
	    }
	    #search{
	    	width:100%;
	    	margin-top:50px;
	    }
	    #search > input{
	    	width:100%;
	    	margin-top:50px;
	    }
	    .featured-gyms{
	    	flex-direction:column;
	    	justify-content:space-around;
	    	width:95%;
		    margin: 0 auto;
	    }
	    .fw-carousel-item {
		    width: 100%;
		}
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
						<h4>あなたに合ったフィットネス環境を<br>みつけましょう</h4>
	
						<form method="put" action="search_results">
						@csrf
							<div class="main-search-input">
		
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
								<div class="panel-dropdown">
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
								<div id="search" >
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
						広いジム
						<span></span>
					</h3>
				</div>
			</div>
		</div>
	
		<!-- Carousel / Start -->
		<div class="featured-gyms dots-nav"> 
		<!--//simple-fw-slick-carousel-->
			@if ($area_gyms_count > 1)
				@for ($i = 0; $i < $area_gyms_count; $i++)
				<!-- Listing Item -->
				<div class="fw-carousel-item">
					<form method="put" name="area_gym_select" action="gym_introduction">
					@csrf
						
						<a onclick="document:area_gym_select[{{$i}}].submit(); return false;" class="listing-item-container compact" >
							<input type="hidden" name="gym_id" value={{$area_gym_id[$i]}}>
							<div class="listing-item">
								<img src="images/gym_images/{{$area_gym_image_url[$i]}}" alt="">
								<!--<div class="listing-item-details">-->
								<!--	<ul>-->
								<!--		<li>Friday, August 10</li>-->
								<!--	</ul>-->
								<!--</div>-->
			
								<!--<div class="listing-badge now-open">Now Open</div>-->
			
								<div class="listing-item-content">
									<!--<div class="numerical-rating" data-rating={{$area_review_average[$i]}}></div>-->
									<h3 class="gym_title_select">{{$area_gym_titles[$i]}}</h3>
									<span>{{$area_gym_addr[$i]}}</span>
								</div>
								<!--<span class="like-icon"></span>-->
							</div>
						</a>
					</form>
				</div>
				 <!--Listing Item / End -->
				
				@endfor
			
			@else
				<!-- Listing Item -->
				<div class="fw-carousel-item">
					<form method="put" name="area_gym_select" action="gym_introduction">
					@csrf
						
						<a onclick="document:area_gym_select.submit(); return false;" class="listing-item-container compact" >
							<input type="hidden" name="gym_id" value="{{$area_gym_id[0]}}">
							<div class="listing-item">
								<img src="images/gym_images/{{$area_gym_image_url[0]}}" alt="">
								<div class="listing-item-content">
									<div class="numerical-rating" data-rating={{$area_review_average[0]}}></div>
									<h3 class="gym_title_select">{{$area_gym_titles[0]}}</h3>
									<span>{{$area_gym_addr[0]}}</span>
								</div>
								<!--<span class="like-icon"></span>-->
							</div>
						</a>
					</form>
				</div>
				 <!--Listing Item / End -->
			
			@endif
		</div>
		<!-- Carousel / End -->
		
	</section>
	<!-- Fullwidth Section / End -->
	
	
	<!-- Fullwidth Section -->
	<section class="fullwidth margin-top-65 padding-top-75 padding-bottom-70" data-background-color="#f8f8f8">
	
		<div class="container">
			<div class="row">
	
				<div class="col-md-12">
					<h3 class="headline centered margin-bottom-45">
						家丸ごとジム
						<span></span>
					</h3>
				</div>
			</div>
		</div>
	
		<!-- Carousel / Start -->
		<div class="featured-gyms dots-nav"> 
		<!--//simple-fw-slick-carousel-->
			@if ($whole_gyms_count > 1)
				@for ($i = 0; $i < $whole_gyms_count; $i++)
				 <!--Listing Item -->
				<div class="fw-carousel-item">
					<form method="put" name="whole_gym_select" action="gym_introduction">
					@csrf
						
						<a onclick="document:whole_gym_select[{{$i}}].submit(); return false;" class="listing-item-container compact" >
							<input type="hidden" name="gym_id" value="{{$whole_gym_id[$i]}}">
							<div class="listing-item">
								<img src="images/gym_images/{{$whole_gym_image_url[$i]}}" alt="">
								<!--<div class="listing-item-details">-->
								<!--	<ul>-->
								<!--		<li>Friday, August 10</li>-->
								<!--	</ul>-->
								<!--</div>-->
			
								<!--<div class="listing-badge now-open">Now Open</div>-->
			
								<div class="listing-item-content">
									<!--<div class="numerical-rating" data-rating={{$whole_review_average[$i]}}></div>-->
									<h3 class="gym_title_select">{{$whole_gym_titles[$i]}}</h3>
									<span>{{$whole_gym_addr[$i]}}</span>
								</div>
								<!--<span class="like-icon"></span>-->
							</div>
						</a>
					</form>
				</div>
				 <!--Listing Item / End -->
				
				@endfor
			
			@else
				 <!--Listing Item -->
				<div class="fw-carousel-item">
					<form method="put" name="whole_gym_select" action="gym_introduction">
					@csrf
						
						<a onclick="document:whole_gym_select.submit(); return false;" class="listing-item-container compact" >
							<input type="hidden" name="gym_id" value="{{$whole_gym_id[0]}}">
							<div class="listing-item">
								<img src="images/gym_images/{{$whole_gym_image_url[0]}}" alt="">
								<div class="listing-item-content">
									<div class="numerical-rating" data-rating={{$whole_review_average[0]}}></div>
									<h3 class="gym_title_select">{{$whole_gym_titles[0]}}</h3>
									<span>{{$whole_gym_addr[0]}}</span>
								</div>
								<!--<span class="like-icon"></span>-->
							</div>
						</a>
					</form>
				</div>
				 <!--Listing Item / End -->
			
			@endif
	
			
	
		</div>
		<!-- Carousel / End -->
		
	</section>
	<!-- Fullwidth Section / End -->
	
	
	
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
	
	
	
