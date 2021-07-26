@extends('layouts.menu')

@push('css')
    <!--<link href="{{ asset('css/〇〇.css') }}" rel="stylesheet">-->
<style>
	.add-sub-rating{
		text-align:center;
		width: 24%;
		desplay: flex;
		justify-content:center;
	}
	.sub-rating-stars{
		display:flex; 
		justify-content:center;
	}
		#booking_overview{
			display:flex;
			justify-content:space-around;
		}
		.element_details{
			text-align:right;
		}
		.add-comment .button {
		    width: 50%;
		    margin-top:30px;
		}
    	textarea {
    		font-size:16px !important;
    	}
	@media (min-width: 991px){
		#time, #guest, #price{
			width:20%;
		}
		.summary{
			width:80%;
		}
	}
	@media (max-width: 991px){
		#booking_overview{
			flex-direction:column;
			align-items:center;
		}
		#time, #guest, #price{
			width:100%;
		}
		.summary{
			width:100%;
		}
		.ratings-container{
			display: flex;
			flex-direction: column;
		}
		.add-sub-rating{
			width: 100%;
		}
		.add-comment .button {
		    width: 100%;
		}
	}
</style>
@endpush

@section('content')

<div class="container">
    <div class="col-md-12" style="margin:0 auto; display:flex; flex-direction:column; align-items:center;" >
        <!-- Booking Summary -->
    	<div class="listing-item-container compact order-summary-widget">
    		<div class="listing-item">
    			<img src="images/gym_images/{{$gym_image_url[1]->img_url}}" alt="">
    
    			<div class="listing-item-content">
    				<h3>{{$gym_title}}</h3>
    				<span>{{$addr}}</span>
    			</div>
    		</div>
    	</div>
    	<h3 class="margin-top-55 margin-bottom-30">レビューをする</h3>
    	<div class="boxed-widget opening-hours summary margin-top-0">
    		<div id="booking_overview">
				<div id="time" class="booking_elements">
					<div id="total_time">
						<h4>時間：{{$total_time}}</h4>
					</div>
					<h4 class="element_details" style="margin-bottom:0;" >{{$date}}</h4>
					<h5 class="element_details">{{$from_to}}</h5>
				</div>
				<div id="guest" class="booking_elements">
					<div id="guest_details">
					<h4 name="number_of_users">人数：{{$number_of_users}}名</h4>
					</div>
    				<h5 name="number_of_men" class="element_details">男性 {{$number_of_men}}名</h5>
    				<h5 name="number_of_women" class="element_details">女性 {{$number_of_women}}名</h5>
    				<h5 name="number_of_others" class="element_details">その他 {{$number_of_others}}名</h5>
				</div>
				<div id="price" class="booking_elements">
					<h4 name="total_price" value="${total_price}" >総計：{{$total_price}}円</h4>
    				<h5 name="gym_price"  value="gym_price" class="element_details">ジム使用料 {{$gym_price}}円</h5>
    				<h5 name="service_price"  value="service_price" class="element_details">サービス料 {{$service_price}}円</h5>
    				<h5 name="tax"  value="tax" class="element_details">VAT {{$tax}}円</h5>
				</div>
				
			</div>
    	</div>
    	<!-- Booking Summary / End -->
    
    
    
        <!-- Add Review Box -->
			<div id="add-review" class="add-review-box">

				<form method="post" action="review_submit">
				@csrf
					<!-- Subratings Container -->
					<div class="ratings-container">
						 <!--Totalrating #1 -->
						<div class="add-sub-rating" style="width: 100%; margin-bottom:36px;">
							<div class="sub-rating-title">Total <i class="tip" data-tip-content="総合評価をしてください"></i></div>
							<div class="sub-rating-stars">
								 <!--Leave Rating -->
								<div class="clearfix"></div>
								<div class="leave-rating">
									<input type="radio" name="total_stars" id="rating-41" value="5"/>
									<label for="rating-41" class="fa fa-star" style="font-size: 36px;"></label>
									<input type="radio" name="total_stars" id="rating-42" value="4"/>
									<label for="rating-42" class="fa fa-star" style="font-size: 36px;"></label>
									<input type="radio" name="total_stars" id="rating-43" value="3"/>
									<label for="rating-43" class="fa fa-star" style="font-size: 36px;"></label>
									<input type="radio" name="total_stars" id="rating-44" value="2"/>
									<label for="rating-44" class="fa fa-star" style="font-size: 36px;"></label>
									<input type="radio" name="total_stars" id="rating-45" value="1"/>
									<label for="rating-45" class="fa fa-star" style="font-size: 36px;"></label>
								</div>
							</div>
						</div>
					
					
					<!-- Subratings Container -->
					<!--<div class="sub-ratings-container">-->
	
						<!-- Subrating #1 -->
						<div class="add-sub-rating">
							<div class="sub-rating-title">Equipment <i class="tip" data-tip-content="掲載されている設備の質に関する評価です"></i></div>
							<div class="sub-rating-stars">
								<!-- Leave Rating -->
								<div class="clearfix"></div>
								<div class="leave-rating">
									<input type="radio" name="equipment_stars" id="rating-1" value="5"/>
									<label for="rating-1" class="fa fa-star"></label>
									<input type="radio" name="equipment_stars" id="rating-2" value="4"/>
									<label for="rating-2" class="fa fa-star"></label>
									<input type="radio" name="equipment_stars" id="rating-3" value="3"/>
									<label for="rating-3" class="fa fa-star"></label>
									<input type="radio" name="equipment_stars" id="rating-4" value="2"/>
									<label for="rating-4" class="fa fa-star"></label>
									<input type="radio" name="equipment_stars" id="rating-5" value="1"/>
									<label for="rating-5" class="fa fa-star"></label>
								</div>
							</div>
						</div>
	
						<!-- Subrating #2 -->
						<div class="add-sub-rating">
							<div class="sub-rating-title">Cleanliness <i class="tip" data-tip-content="清潔さに関する評価です"></i></div>
							<div class="sub-rating-stars">
								<!-- Leave Rating -->
								<div class="clearfix"></div>
								<div class="leave-rating">
									<input type="radio" name="cleanliness_stars" id="rating-11" value="5"/>
									<label for="rating-11" class="fa fa-star"></label>
									<input type="radio" name="cleanliness_stars" id="rating-12" value="4"/>
									<label for="rating-12" class="fa fa-star"></label>
									<input type="radio" name="cleanliness_stars" id="rating-13" value="3"/>
									<label for="rating-13" class="fa fa-star"></label>
									<input type="radio" name="cleanliness_stars" id="rating-14" value="2"/>
									<label for="rating-14" class="fa fa-star"></label>
									<input type="radio" name="cleanliness_stars" id="rating-15" value="1"/>
									<label for="rating-15" class="fa fa-star"></label>
								</div>
							</div>
						</div>
	
						<!-- Subrating #3 -->
						<div class="add-sub-rating">
							<div class="sub-rating-title">Accuracy <i class="tip" data-tip-content="情報の正確さに関する評価です"></i></div>
							<div class="sub-rating-stars">
								<!-- Leave Rating -->
								<div class="clearfix"></div>
								<div class="leave-rating">
									<input type="radio" name="accuracy_stars" id="rating-21" value="5"/>
									<label for="rating-21" class="fa fa-star"></label>
									<input type="radio" name="accuracy_stars" id="rating-22" value="4"/>
									<label for="rating-22" class="fa fa-star"></label>
									<input type="radio" name="accuracy_stars" id="rating-23" value="3"/>
									<label for="rating-23" class="fa fa-star"></label>
									<input type="radio" name="accuracy_stars" id="rating-24" value="2"/>
									<label for="rating-24" class="fa fa-star"></label>
									<input type="radio" name="accuracy_stars" id="rating-25" value="1"/>
									<label for="rating-25" class="fa fa-star"></label>
								</div>
							</div>
						</div>
						
						<!-- Subrating #4 -->
						<div class="add-sub-rating">
							<div class="sub-rating-title">Communication <i class="tip" data-tip-content="ホストとのコミュニケーションに関する評価です"></i></div>
							<div class="sub-rating-stars">
								<!-- Leave Rating -->
								<div class="clearfix"></div>
								<div class="leave-rating">
									<input type="radio" name="communication_stars" id="rating-31" value="5"/>
									<label for="rating-31" class="fa fa-star"></label>
									<input type="radio" name="communication_stars" id="rating-32" value="4"/>
									<label for="rating-32" class="fa fa-star"></label>
									<input type="radio" name="communication_stars" id="rating-33" value="3"/>
									<label for="rating-33" class="fa fa-star"></label>
									<input type="radio" name="communication_stars" id="rating-34" value="2"/>
									<label for="rating-34" class="fa fa-star"></label>
									<input type="radio" name="communication_stars" id="rating-35" value="1"/>
									<label for="rating-35" class="fa fa-star"></label>
								</div>
							</div>
						</div>	
					</div>	
					<!--</div>-->
					<!-- Subratings Container / End -->
					
					
	
					<!-- Review Comment -->
					<div id="add-comment" class="add-comment" style="margin-top:30px; text-align:center;">
						<fieldset>
							<div>
								<div class="sub-rating-title">Review <i class="tip" data-tip-content="感想やホストへのメッセージを書いてください"></i></div>
								<textarea name="note" cols="40" rows="3"></textarea>
							</div>
	
						</fieldset>
	
						<input id="submit" type="submit" class="button"></button>
						<div class="clearfix"></div>
					</div>
				</form>
			</div>
			<!-- Add Review Box / End -->
    </div>
</div>

<!-- Content / End -->
@push('js')
<!--<script src="{{ asset('js/〇〇.js') }}"></script>-->

<script>
	$("#submit").on("click",function(){
		if(window.confirm('レビューを登録してよろしいですか？')){
					alert('レビューを登録しました');
					return true;
				}else{
					return false;
				}
	})
</script>

@endpush
@endsection
