@extends('layouts.host_menu_mobnav_3')

@push('css')
    <!--<link href="{{ asset('css/〇〇.css') }}" rel="stylesheet">-->
<style>
    .py-4{
        display: flex;
    }
    
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
	
	.listing-item {
		cursor: default !important;
	}
	
	.col-md-12 {
        margin-bottom: 50px;
    }
    .star_and_price{
        display:flex;
        justify-content: space-between;
    }
    #gym_tags{
        display: flex;
        justify-content: flex-end;
    }
    
    @media (min-width: 991px){
        .fs-inner-container.content {
            width: 80%;
            margin: 0 auto;
            padding-top: 40px;
        }
        .star_and_price{
            display:flex;
            justify-content: space-between;
        }
		.pc_only{
			display:default:
		}
        .mob_only{
            display: none;
        }
	}
    
	@media (max-width: 991px){
	    .search{
			padding: 45px 30px !important;
		}
		.pc_only{
			display:none;
		}
        .mob_only{
            display: default:
        }
        .button{
            width:100%;
            text-align:center;
        }
        .star_and_price {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
        }
	}
</style>
@endpush

@section('content')
<div class="fs-inner-container content" >
		<div class="fs-content">

			<!-- Search -->
			<section class="search">

				<div>
					<h3>ジム管理</h3>
				</div>
				<div class="row pc_only">
					<div class="col-md-12">

							<!-- Row With Forms -->
							<div class="row with-forms">
						

								<!-- Filters -->
								<div class="col-fs-12">

									<!-- Panel Dropdown / End -->
									<div class="panel-dropdown">
										<a href="">ジムタイプで絞り込み</a>
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
    			
    		</section>
    
    	</div>
</div>




@push('js')
<!--<script src="{{ asset('js/〇〇.js') }}"></script>-->
<script>
    let search_amount = {{$search_amount}};
    let gyms = @json($gyms);
    let gym_info = @json($gym_info);
    let sort_filter = @json($gym_info);
</script>
    
    
<script>
    function list_append(){
		$("#results").empty();
		$("#gym_list").empty();
		
		let id_gym = 0;
		let onclick = 0;
        if(search_amount == 0){
    		    $("#results").append(
        			`<p class="showing-results">該当するジムはありません </p>`
        		);
    		}
    		else if(search_amount == 1){
    			console.log(sort_filter);
    			let img_src = "https://s3-ap-northeast-1.amazonaws.com/fandelion/" + sort_filter[0].img_url;
    			
    			onclick_gym_introduction = "document:gym_introduction[0].submit(); return false";
    			onclick_gym_schedule = "document:gym_schedule[0].submit(); return false";
    			onclick_gym_edit = "document:gym_edit[0].submit(); return false";
    			$("#results").append(
        			`<p class="showing-results">${search_amount} Results Found </p>`
        		);
        		
    			$("#gym_list").append(
    			`
    			
    			        <div class="col-md-12">	
        			        <div class="pc_only">
            			        <div id="gym_tags">
    								<span class="listing-tag" style="margin:10px 10px 0 0; font-size:14px;">${sort_filter[0].gym_type}</span>
    								<span class="listing-tag" style="margin:10px 10px 0 0; font-size:14px;">${sort_filter[0].gym_area}</span>
    								<span class="listing-tag" style="margin:10px 10px 0 0; font-size:14px;">〜${sort_filter[0].guest_limit}名</span>
    								<span class="listing-tag" style="margin:10px 10px 0 0; font-size:14px;">${sort_filter[0].guest_gender}</span>
    							</div>
        						<div class="listing-item">
        						    
        							<img src=${img_src} alt="">
        							<div class="listing-item-content">
        							    <div style="display:flex;">
            								<form method="get" name="gym_introduction" action="gym_introduction">
            					                @csrf
            					                <input type="hidden" name="gym_id" value=${sort_filter[0].gym_id}>
            					                <a onclick=${onclick_gym_introduction} class="button" >ゲスト表示画面確認</a>
        					                </form>
            								<form method="get" name="gym_schedule" action="gym_schedule">
            					                @csrf
            					                <input type="hidden" name="gym_id" value=${sort_filter[0].gym_id}>
            					                <a onclick=${onclick_gym_schedule} class="button" >ジムスケジュール確認</a>
        					                </form>
            								<form method="get" name="gym_edit" action="gym_edit">
            					                @csrf
            					                <input type="hidden" name="gym_id" value=${sort_filter[0].gym_id}>
            					                <a onclick=${onclick_gym_edit} class="button" >ジム情報編集</a>
        					                </form>
        				                </div>
        								<h3>${sort_filter[0].gym_title}<i class="verified-icon"></i></h3>
        								<span>${sort_filter[0].addr}</span>
        							</div>
        							<!--<span class="like-icon"></span>-->
        						</div>
        						<div class="star-rating" data-rating=${sort_filter[0].review_average}> 
        								<div class="star_and_price">
            								<div>
                								<strong><i class="fas fa-star"></i> ${sort_filter[0].review_average}</strong>
                								<div class="rating-counter">
                									(${sort_filter[0].review_amount} reviews)
                								</div>
                							</div>
        								    <h4>${sort_filter[0].min_price} ~ ${gym_info[0].max_price}円 (15分あたり)</h4>
        								</div>
        								
        							
        						</div>
    						</div>
    					    <div class="mob_only">
        						<div class="listing-item">
        						    
        							<img src=${img_src} alt="">
        							<div class="listing-item-content">
        								<h3>${sort_filter[0].gym_title}<i class="verified-icon"></i></h3>
        								<span>${sort_filter[0].addr}</span>
        							</div>
        							<!--<span class="like-icon"></span>-->
        						</div>
        						<div class="star-rating" data-rating=${sort_filter[0].review_average}> 
        								<div class="star_and_price">
            								<div>
                								<strong><i class="fas fa-star"></i> ${sort_filter[0].review_average}</strong>
                								<div class="rating-counter">
                									(${sort_filter[0].review_amount} reviews)
                								</div>
                							</div>
        								    <h4>${sort_filter[0].min_price} ~ ${gym_info[0].max_price}円 (15分あたり)</h4>
        								</div>
        						</div>
        						<div>
    								<form method="get" name="gym_introduction" action="gym_introduction">
    					                @csrf
    					                <input type="hidden" name="gym_id" value=${sort_filter[0].gym_id}>
    					                <a onclick=${onclick_gym_introduction} class="button" >ゲスト表示画面確認</a>
					                </form>
    								<form method="get" name="gym_schedule" action="gym_schedule">
    					                @csrf
    					                <input type="hidden" name="gym_id" value=${sort_filter[0].gym_id}>
    					                <a onclick=${onclick_gym_schedule} class="button" >ジムスケジュール確認</a>
					                </form>
    								<form method="get" name="gym_edit" action="gym_edit">
    					                @csrf
    					                <input type="hidden" name="gym_id" value=${sort_filter[0].gym_id}>
    					                <a onclick=${onclick_gym_edit} class="button" >ジム情報編集</a>
					                </form>
				                </div>
    						</div>
    				</div>
    				</div>`
    			
    		);
    		} 
    		else{
    			for ($i = 0; $i < search_amount; $i++) {
    			id_gym = $i + "_gym";
    			console.log(sort_filter);
    			let img_src = "https://s3-ap-northeast-1.amazonaws.com/fandelion/" + sort_filter[$i].img_url;
    			console.log(img_src);
    			onclick_gym_introduction = "document:gym_introduction[" + $i + "].submit(); return false";
    			onclick_gym_schedule = "document:gym_schedule[" + $i + "].submit(); return false";
    			onclick_gym_edit = "document:gym_edit[" + $i + "].submit(); return false";
    			console.log(id_gym);
    			$("#gym_list").append(
    				`
    					
    					<div class="col-md-12">
    						<div class="pc_only">
    							<div id="gym_tags">
									<span class="listing-tag" style="margin:10px 10px 0 0; font-size:14px;">${sort_filter[$i].gym_type}</span>
									<span class="listing-tag" style="margin:10px 10px 0 0; font-size:14px;">${sort_filter[$i].gym_area}</span>
									<span class="listing-tag" style="margin:10px 10px 0 0; font-size:14px;">〜${sort_filter[$i].guest_limit}名</span>
									<span class="listing-tag" style="margin:10px 10px 0 0; font-size:14px;">${sort_filter[$i].guest_gender}</span>
								</div>
    							<div class="listing-item">
    								<img src=${img_src} alt="">
    								
    								<div class="listing-item-content">
        								<div style="display:flex;">
            								<form method="get" name="gym_introduction" action="gym_introduction">
            					                @csrf
            					                <input type="hidden" name="gym_id" value=${sort_filter[$i].gym_id}>
            					                <a onclick=${onclick_gym_introduction} class="button" >ゲスト表示画面確認</a>
        					                </form>
            								<form method="get" name="gym_schedule" action="gym_schedule">
            					                @csrf
            					                <input type="hidden" name="gym_id" value=${sort_filter[$i].gym_id}>
            					                <a onclick=${onclick_gym_schedule} class="button" >ジムスケジュール確認</a>
        					                </form>
            								<form method="get" name="gym_edit" action="gym_edit">
            					                @csrf
            					                <input type="hidden" name="gym_id" value=${sort_filter[$i].gym_id}>
            					                <a onclick=${onclick_gym_edit} class="button" >ジム情報編集</a>
        					                </form>
    					                </div>
    									<h3>${sort_filter[$i].gym_title}<i class="verified-icon"></i></h3>
    									<span>${sort_filter[$i].addr}</span>
    								</div>
    								<!--<span class="like-icon"></span>-->
    							</div>
    							<div class="star-rating" data-rating=${sort_filter[$i].review_average}> 
    								<div class="star_and_price">
        								<div>
            								<strong><i class="fas fa-star"></i> ${sort_filter[$i].review_average}</strong>
            								<div class="rating-counter">
            									(${sort_filter[$i].review_amount} reviews)
            								</div>
            							</div>
    								    <h4>${sort_filter[$i].min_price} ~ ${gym_info[$i].max_price}円 (15分あたり)</h4>
    								</div>
    								
    							</div>
    						</div>
    						<div class="mob_only">
        						<div class="listing-item">
        						    
        							<img src=${img_src} alt="">
        							<div class="listing-item-content">
        								<h3>${sort_filter[$i].gym_title}<i class="verified-icon"></i></h3>
        								<span>${sort_filter[$i].addr}</span>
        							</div>
        							<!--<span class="like-icon"></span>-->
        						</div>
        						<div class="star-rating" data-rating=${sort_filter[$i].review_average}> 
        								<div class="star_and_price">
            								<div>
                								<strong><i class="fas fa-star"></i> ${sort_filter[$i].review_average}</strong>
                								<div class="rating-counter">
                									(${sort_filter[$i].review_amount} reviews)
                								</div>
                							</div>
        								    <h4>${sort_filter[$i].min_price} ~ ${gym_info[$i].max_price}円 (15分あたり)</h4>
        								</div>
        						</div>
        						<div>
    								<form method="get" name="gym_introduction" action="gym_introduction">
    					                @csrf
    					                <input type="hidden" name="gym_id" value=${sort_filter[$i].gym_id}>
    					                <a onclick=${onclick_gym_introduction} class="button" >ゲスト表示画面確認</a>
					                </form>
    								<form method="get" name="gym_schedule" action="gym_schedule">
    					                @csrf
    					                <input type="hidden" name="gym_id" value=${sort_filter[$i].gym_id}>
    					                <a onclick=${onclick_gym_schedule} class="button" >ジムスケジュール確認</a>
					                </form>
    								<form method="get" name="gym_edit" action="gym_edit">
    					                @csrf
    					                <input type="hidden" name="gym_id" value=${sort_filter[$i].gym_id}>
    					                <a onclick=${onclick_gym_edit} class="button" >ジム情報編集</a>
					                </form>
				                </div>
    						</div>
    					</div>
    						
    					
    					
    				`
    		)}
    		};
    };
    
    
    
    
    
    
    
    
    
    
    
	
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
	});
	
	$('.sort-apply').click(function() {
		gymtype_filter();
		search_amount = Object.keys(sort_filter).length;
		gym_sort();
	});
</script>

<script>
    if(search_amount > 0){
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
        
    }else{
        list_append();
    }
    
    
</script>

@endpush
@endsection
