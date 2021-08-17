@extends('layouts.menu_mobnav')

@push('css')
    <!--<link href="{{ asset('css/〇〇.css') }}" rel="stylesheet">-->
<style>
	span.listing-tag {
	    color: #f91942;
	    padding: 8px 16px;
	    line-height: 15px;
	    letter-spacing: 2.5px;
	    border-radius: 50px;
	    text-transform: uppercase;
	    background-color: #fff;
	    border: 1px solid #f91942;
	    font-weight: 500;
	    position: relative;
	    top: -6px;
	    display: inline-block;
	}
	.fs-inner-container.content{
		padding-top:0px !important;
	}
	@media (max-width: 991px){
		.search{
			padding: 45px 30px !important;
		}
		#map-container{
			height:80% !important;
		}
	}
</style>
@endpush

@section('content')

<!-- Content
================================================== -->
<div class="fs-container">

	<div class="fs-inner-container content" style="padding-top: 0px;">
		<div class="fs-content">

			<!-- Search -->
			<section class="search">

				<div>
					<h3>検索条件</h3>
					<h4>場所：{{$city2}} 周辺</h4>
					<div style="display:flex; align-items: flex-end;">
						<h4>人数：{{$total_guest}}名</h4>
						<h5 style="padding-left:5px;">(男性：{{$men}}名 女性：{{$women}}名 その他{{$others}}名)</h5>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">

							<!-- Row With Forms -->
							<div class="row with-forms">

								<!-- Main Search Input -->
								<!--<div class="col-fs-6">-->
								<!--	<div class="input-with-icon">-->
								<!--		<i class="sl sl-icon-magnifier"></i>-->
								<!--		<input type="text" placeholder="What are you looking for?" value=""/>-->
								<!--	</div>-->
								<!--</div>-->

								<!-- Main Search Input -->
								<!--<div class="col-fs-6">-->
								<!--	<div class="input-with-icon location">-->
							
								<!--		<div id="autocomplete-container">-->
								<!--			<input id="autocomplete-input" type="text" placeholder="Location">-->
								<!--		</div>-->
								<!--		<a href="#"><i class="fa fa-map-marker"></i></a>-->
								<!--	</div>-->
								<!--</div>-->
						

								<!-- Filters -->
								<div class="col-fs-12">

									<!-- Panel Dropdown / End -->
									<div class="panel-dropdown">
										<a href="#">ジムタイプで絞り込み</a>
										<div class="panel-dropdown-content checkboxes categories">
											
											 <!--Checkboxes -->
											<div class="row">
												<div class="col-md-6">
													<input id="check-1" type="checkbox" name="check" class="gymtype-check" value="room" checked>
													<label for="check-1">個室</label>

													<input id="check-2" type="checkbox" name="check" class="gymtype-check" value="home" checked>
													<label for="check-2">住宅全体</label>

													<input id="check-3" type="checkbox" name="check" class="gymtype-check" value="share_space" checked>
													<label for="check-3">シェアスペース</label>
												</div>	

												
											</div>
											
											 <!--Buttons -->
											<div class="panel-buttons">
												<button class="panel-cancel">Cancel</button>
												<button class="panel-apply gymtype-apply">Apply</button>
											</div>

										</div>
									</div>
									<!-- Panel Dropdown / End -->

									<!-- Panel Dropdown -->
									<div class="panel-dropdown wide">
										<a class="sort_button" href="#">並び替え</a>
										<div class="panel-dropdown-content checkboxes">

											<!-- Checkboxes -->
											<div class="row">
												<div class="col-md-6">
													<input id="check-a" value="review_average" type="checkbox" name="check" class="sort-check" checked>
													<label for="check-a">平均レビューが高い順</label>
													
													<input id="check-d" value="review_amount" type="checkbox" name="check" class="sort-check">
													<label for="check-d">レビュー数が多い順</label>


													<input id="check-b" value="guest_limit" type="checkbox" name="check" class="sort-check">
													<label for="check-b">定員数が多い順</label>

													<input id="check-c" value="area" type="checkbox" name="check" class="sort-check">
													<label for="check-c">面積が広い順</label>
												</div>	

												<!--<div class="col-md-6">-->
												<!--	<input id="check-e" type="checkbox" name="check" >-->
												<!--	<label for="check-e">Free parking on premises</label>-->

												<!--	<input id="check-f" type="checkbox" name="check" >-->
												<!--	<label for="check-f">Free parking on street</label>-->

												<!--	<input id="check-g" type="checkbox" name="check">-->
												<!--	<label for="check-g">Smoking allowed</label>	-->

												<!--	<input id="check-h" type="checkbox" name="check">-->
												<!--	<label for="check-h">Events</label>-->
												<!--</div>-->
											</div>
											
											 <!--Buttons -->
											<div class="panel-buttons">
												<button class="panel-cancel">Cancel</button>
												<button class="panel-apply sort-apply">Apply</button>
											</div>

										</div>
									</div>
									<!-- Panel Dropdown / End -->

									<!-- Panel Dropdown -->
									<!--<div class="panel-dropdown">-->
									<!--	<a href="#">Distance Radius</a>-->
									<!--	<div class="panel-dropdown-content">-->
									<!--		<input class="distance-radius" type="range" min="1" max="100" step="1" value="50" data-title="Radius around selected destination">-->
									<!--		<div class="panel-buttons">-->
									<!--			<button class="panel-cancel">Disable</button>-->
									<!--			<button class="panel-apply">Apply</button>-->
									<!--		</div>-->
									<!--	</div>-->
									<!--</div>-->
									<!-- Panel Dropdown / End -->
									
								</div>
								<!-- Filters / End -->
	
							</div>
							<!-- Row With Forms / End -->

					</div>
				</div>

			</section>
			<!-- Search / End -->


		<section class="listings-container margin-top-30">
			<!-- Sorting / Layout Switcher -->
			<div class="row fs-switcher">

				<div class="col-md-6">
					<!-- Showing Results -->
					<div id="results"></div>
				</div>

			</div>

			
			
			
			<div id="gym_list"></div>
				
					
			
			


			<!-- Pagination Container -->
			<!--<div class="row fs-listings">-->
			<!--	<div class="col-md-12">-->

					<!-- Pagination -->
			<!--		<div class="clearfix"></div>-->
			<!--		<div class="row">-->
			<!--			<div class="col-md-12">-->
							<!-- Pagination -->
			<!--				<div class="pagination-container margin-top-15 margin-bottom-40">-->
			<!--					<nav class="pagination">-->
			<!--						<ul>-->
			<!--							<li><a href="#" class="current-page">1</a></li>-->
			<!--							<li><a href="#">2</a></li>-->
			<!--							<li><a href="#">3</a></li>-->
			<!--							<li><a href="#"><i class="sl sl-icon-arrow-right"></i></a></li>-->
			<!--						</ul>-->
			<!--					</nav>-->
			<!--				</div>-->
			<!--			</div>-->
			<!--		</div>-->
			<!--		<div class="clearfix"></div>-->
					<!-- Pagination / End -->
					
					<!-- Copyrights -->
			<!--		<div class="copyrights margin-top-0">© 2021 Listeo. All Rights Reserved.</div>-->

			<!--	</div>-->
			<!--</div>-->
			<!-- Pagination Container / End -->
		</section>

		</div>
	</div>
	<div class="fs-inner-container map-fixed" style="padding-top: 0px;">

		<!-- Map -->
		<div id="map-container">
		    <div id="map" data-map-zoom="9" data-map-scroll="true">
		        <!-- map goes here -->
		    </div>
		</div>

	</div>
</div>


</div>
<!-- Mobile Navigation -->
<nav class="mobile-nav mmenu-trigger">
	<div class="mmenu_icon">
		<a href="#" class="mmenus">
			<span class="material-icons-outlined" style="font-size: 42px; margin: auto; color: black; font-weight: bold;">
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



@push('js')
<!--<script src="{{ asset('js/〇〇.js') }}"></script>-->
<script src="https://maps.google.com/maps/api/js?key=AIzaSyBI-9n6pQ1Vqktbyg8LGjLW-NCPsa6SQ5g&language=ja"></script>

<script>
	
		
	let map;
	  let mainMarker;
	  let marker =[];
	  let infoWindow = [];
	
	
    let cityLat = {{$cityLat}};
    let cityLng = {{$cityLng}};
	let search_amount = {{$search_amount}};
	let men = {{$men}};
	let women = {{$women}};
	let total_guest = {{$total_guest}};
	let others = {{$others}};
	// let gym_titles = {{$gym_titles[0]}};
	let gym_latitude =  @json($gym_latitude);
	let gym_longitude =  @json($gym_longitude);
	let gym_titles = @json($gym_titles);
	
	let gym_info = @json($gym_info);
	let sort_filter = @json($gym_info);
	
	
	console.log(sort_filter);
</script>

<script>
	function list_append(){
		$("#results").empty();
		$("#gym_list").empty();
		console.log(sort_filter);
		console.log(search_amount);
		console.log(typeof (search_amount));
		$("#results").append(
			`<p class="showing-results">${search_amount} Results Found </p>`
		);
		let id_gym = 0;
		let onclick = 0;
		if(search_amount == 0){
		    $("#results").append(
    			`<p class="showing-results">該当するジムはありません </p>`
    		);
		}else if(search_amount == 1){
			$("#gym_list").append(
			`
			<form method="get" name="gym_select" action="gym_introduction">
			@csrf
				<div class="col-md-12">
					<a id="gym" onclick="document:gym_select.submit(); return false;" class="listing-item-container" data-marker-id="0">
						<input type="hidden" name="gym_id" value=${sort_filter[0].gym_id}>
						<div class="listing-item">
						    <img src="{{ Storage::disk('s3')->url(${sort_filter[0].img_url}) }}" alt="">
							
							<div class="listing-item-content">
								<h3>${sort_filter[0].gym_title}<i class="verified-icon"></i></h3>
								<span>${sort_filter[0].addr}</span>
							</div>
							<!--<span class="like-icon"></span>-->
						</div>
						<div class="star-rating" data-rating=${sort_filter[0].review_average}> 
							<strong><i class="fas fa-star"></i> ${sort_filter[0].review_average}</strong>
							<div class="rating-counter">
								(${sort_filter[0].review_amount} reviews)
								
							</div> 
							
							<div id="gym_tags">
								<span class="listing-tag" style="margin:10px 10px 0 0; font-size:14px;">${sort_filter[0].gym_type}</span>
								<span class="listing-tag" style="margin:10px 10px 0 0; font-size:14px;">${sort_filter[0].gym_area}</span>
								<span class="listing-tag" style="margin:10px 10px 0 0; font-size:14px;">〜${sort_filter[0].guest_limit}名</span>
								<span class="listing-tag" style="margin:10px 10px 0 0; font-size:14px;">${sort_filter[0].guest_gender}</span>
							</div>
							<h4 style="text-align:right;">${sort_filter[0].min_price} ~ ${gym_info[0].max_price}円 (15分あたり)</h4>
						</div>
					</a>
				</div>
			</form>`
			
		);
		}else{
			for ($i = 0; $i < search_amount; $i++) {
			id_gym = $i + "_gym";
			onclick = "document:gym_select[" + $i + "].submit(); return false";
			console.log(id_gym);
			$("#gym_list").append(
				`
					<form method="get" name="gym_select" action="gym_introduction">
					@csrf
					
					<div class="col-md-12">
						<a id=${id_gym} onclick=${onclick} class="listing-item-container" data-marker-id=$i>
							<input type="hidden" name="gym_id" value=${sort_filter[$i].gym_id}>
							<div class="listing-item">
								<img src="{{ Storage::disk('s3')->url(${sort_filter[0].img_url}) }}" alt="">
								
								<div class="listing-item-content">
									<h3>${sort_filter[$i].gym_title}<i class="verified-icon"></i></h3>
									<span>${sort_filter[$i].addr}</span>
								</div>
								<!--<span class="like-icon"></span>-->
							</div>
							<div class="star-rating" data-rating=${sort_filter[$i].review_average}> 
								<strong><i class="fas fa-star"></i> ${sort_filter[$i].review_average}</strong>
								<div class="rating-counter">
									(${sort_filter[$i].review_amount} reviews)
									
								</div> 
								
								<div id="gym_tags">
									<span class="listing-tag" style="margin:10px 10px 0 0; font-size:14px;">${sort_filter[$i].gym_type}</span>
									<span class="listing-tag" style="margin:10px 10px 0 0; font-size:14px;">${sort_filter[$i].gym_area}</span>
									<span class="listing-tag" style="margin:10px 10px 0 0; font-size:14px;">〜${sort_filter[$i].guest_limit}名</span>
									<span class="listing-tag" style="margin:10px 10px 0 0; font-size:14px;">${sort_filter[$i].guest_gender}</span>
								</div>
								<h4 style="text-align:right;">${sort_filter[$i].min_price} ~ ${gym_info[$i].max_price}円 (15分あたり)</h4>
							</div>
						</a>
					</div>
						
					
					</form>
				`
		)}
		};
		
	}
</script>



<script>
	$(".sort-check").change(function() {
	    $(".sort-check").prop('checked', false);
	    $(this).prop('checked', true);
	});
	
	function gym_sort(){
    
	    //すべてのチェック済みvalue値を取得する
	    $('.sort-check:checked').each(function() {
	        var r = $(this).val();
	        console.log(r);
	        switch(r){
	        	case "review_amount":
	        		function asyncFunction_rev_amount() {
					 return new Promise(function (resolve, reject){
						try{
							sort_filter.sort(function(a, b) {
								   if (a.review_amount > b.review_amount) {
								       return -1;
								   } else {
								       return 1;
								   }
								});
							
							resolve();
						}catch (e) {
							reject();
						}
					}
					)};
					
					console.log(sort_filter);
					
					
					asyncFunction_rev_amount().then(() => {
					  list_append();
					})
	        		break;
	        	case "review_average":
	        		function asyncFunction_rev_ave() {
					 return new Promise(function (resolve, reject){
						try{
							sort_filter.sort(function(a, b) {
								   if (a.review_average > b.review_average) {
								       return -1;
								   } else {
								       return 1;
								   }
								});
							
							resolve();
						}catch (e) {
							reject();
						}
					}
					)};
					
					console.log(sort_filter);
					
					
					asyncFunction_rev_ave().then(() => {
					  list_append();
					})
	        		break;
        		case "guest_limit":
	        		function asyncFunction_guest() {
					 return new Promise(function (resolve, reject){
						try{
							sort_filter.sort(function(a, b) {
								   if (a.guest_limit > b.guest_limit) {
								       return -1;
								   } else {
								       return 1;
								   }
								});
							
							resolve();
						}catch (e) {
							reject();
						}
					}
					)};
					
					console.log(sort_filter);
					
					asyncFunction_guest().then(() => {
					  list_append();
					})
        			break;
    			case "area":
	        		function asyncFunction_area() {
					 return new Promise(function (resolve, reject){
						try{
							sort_filter.sort(function(a, b) {
								   if (a.area > b.area) {
								       return -1;
								   } else {
								       return 1;
								   }
								});
							
							resolve();
						}catch (e) {
							reject();
						}
					}
					)};
					
					console.log(sort_filter);
					
					
					asyncFunction_area().then(() => {
					  list_append();
					})
    				
    				break;
	        }
	    })
	    
	};
	
	
	function gymtype_filter(){
		//すべてのチェック済みvalue値を取得する
		var t = [];
	    $('.gymtype-check:checked').each(function() {
		        t.push($(this).val());
		})
		console.log(t);
		
		
		if((t.includes("room")) && (t.includes("home"))&& (t.includes("share_space"))){
			sort_filter = gym_info.filter(function(gym_info) {
				  return gym_info.gym_type == "シェアスペース" || gym_info.gym_type == "個室" || gym_info.gym_type == "住宅全体" ;
				});
			}else if(t.includes("room")){
					if(t.includes("home")){
						sort_filter = gym_info.filter(function(gym_info) {
						  return gym_info.gym_type == "個室" || gym_info.gym_type == "住宅全体" ;
						});
					}
					else if(t.includes("share_space")){
						sort_filter = gym_info.filter(function(gym_info) {
						  return gym_info.gym_type == "シェアスペース" || gym_info.gym_type == "個室";
						});
					}
					else{
						sort_filter = gym_info.filter(function(gym_info) {
						  return gym_info.gym_type == "個室";
						});
					}
			}else if(t.includes("home")){
				if(t.includes("share_space")){
					sort_filter = gym_info.filter(function(gym_info) {
					  return gym_info.gym_type == "シェアスペース" || gym_info.gym_type == "住宅全体" ;
					});
				}
				else{
					sort_filter = gym_info.filter(function(gym_info) {
					  return gym_info.gym_type == "住宅全体" ;
					});
				}
			}else if(t.includes("share_space")){
				sort_filter = gym_info.filter(function(gym_info) {
				  return gym_info.gym_type == "シェアスペース";
				});
			}
		
		
		
		
	};
	
	
	$('.gymtype-apply').click(function(){
		gymtype_filter();
		search_amount = Object.keys(sort_filter).length;
		gym_sort();
		initMap();
	});
	
	$('.sort-apply').click(function() {
		gymtype_filter();
		search_amount = Object.keys(sort_filter).length;
		gym_sort();
		initMap();
	});
</script>

<script>
	function asyncFunction() {
	 return new Promise(function (resolve, reject){
		try{
			sort_filter.sort(function(a, b) {
				   if (a.review_average > b.review_average) {
				       return -1;
				   } else {
				       return 1;
				   }
				});
			
			resolve();
		}catch (e) {
			reject();
		}
	}
	)};
	
	
	asyncFunction().then(() => {
	  list_append();
	})
		
	
	
	function initMap(){
	  //let markerData = gon.places;
	  let latlng = {lat: cityLat, lng: cityLng};
	  // 初期位置の指定
	  map = new google.maps.Map(document.getElementById('map'), {
	  center: latlng,
	  zoom: 16
	  });
	
	  // 初期位置にマーカーを立てる
	  mainMarker = new google.maps.Marker({
	    map: map,
	    position: latlng
	  });
	
	  // 近隣店舗にマーカーを立てる
	  
	  for ($i = 0; $i < search_amount; $i++) {
	    const image = "https://maps.google.com/mapfiles/ms/icons/yellow-dot.png";
	    // 緯度経度のデータを作成
	    
	    let markerLatLng = new google.maps.LatLng({lat: sort_filter[$i].latitude, lng: sort_filter[$i].longitude});
	    let id = "#"+$i+"_gym";
	    <!--console.log(id);-->
	    <!--console.log(markerLatLng);-->
	    // マーカーの追加
	    marker[$i] = new google.maps.Marker({
	      position: markerLatLng,
	      map: map,
	      icon: image,
	    });
	
	    // 吹き出しの追加
	    infoWindow[$i] = new google.maps.InfoWindow({
	    // 吹き出しに店舗詳細ページへのリンクを追加
	    content: `<a href=${id}>${sort_filter[$i].gym_title}</a>`
	    });
	
	    markerEvent($i); 
	  }
	
	  // マーカークリック時に吹き出しを表示する
	  function markerEvent($i) {
	    marker[$i].addListener('click', function() {
	      infoWindow[$i].open(map, marker[$i]);
	    });
	  }
	}
	
	initMap();
	
	<!--document.addEventListener('turbolinks:load', function(){-->
	<!--  initMap();-->
	<!--});-->
    
	<!--var LatLng = new google.maps.LatLng(cityLat, cityLng);-->
	<!--var mapOptions = {-->
	<!-- zoom: 16,      //地図の縮尺値-->
	<!-- center: LatLng,    //地図の中心座標-->
	<!-- mapTypeId: 'roadmap'   //地図の種類-->
	<!--};-->
 <!--   map = new google.maps.Map(document.getElementById('map'), mapOptions);-->
	
	
	
	
	  
	  
</script>


@endpush
@endsection
