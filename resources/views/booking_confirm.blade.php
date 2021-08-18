@extends('layouts.menu')

@push('css')
    <!--<link href="{{ asset('css/〇〇.css') }}" rel="stylesheet">-->
<style>
		#booking_overview{
			display:flex;
			justify-content:space-around;
		}
		.element_details{
			text-align:right;
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
	}
</style>
@endpush

@section('content')
<div class="container">
    <div class="col-md-12" style="margin:0 auto; display:flex; flex-direction:column; align-items:center;" >
        <!-- Booking Summary -->
    	<div class="listing-item-container compact order-summary-widget">
    		<div class="listing-item">
    			<img src="https://s3-ap-northeast-1.amazonaws.com/fandelion/{{$gym_image_url[1]->img_url}}" alt="">
    
    			<div class="listing-item-content">
    				<h3>{{$gym_title}}</h3>
    				<span>{{$addr}}</span>
    			</div>
    		</div>
    	</div>
    	<h3 class="margin-top-55 margin-bottom-30">Booking Summary</h3>
    	<div class="boxed-widget opening-hours summary margin-top-0">
    		<div id="booking_overview">
				<div id="time" class="booking_elements">
					<div id="total_time">
						<h4>時間：{{$total_time}}分</h4>
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
    <!--booking_completedへ-->
    
    
        <h3 class="margin-top-55 margin-bottom-30">Payment Method</h3>
        <!-- Payment Methods Accordion -->
        <div class="payment">
        
        	<div class="payment-tab payment-tab-active">
        		<div class="payment-tab-trigger">
        			<input checked id="paypal" name="cardType" type="radio" value="paypal">
        			<label for="paypal">PayPal</label>
        			<img class="payment-logo paypal" src="https://i.imgur.com/ApBxkXU.png" alt="">
        		</div>
        
        		<div class="payment-tab-content">
        			<p>You will be redirected to PayPal to complete payment.</p>
        		</div>
        	</div>
        
        
        	<div class="payment-tab">
        		<div class="payment-tab-trigger">
        			<input type="radio" name="cardType" id="creditCart" value="creditCard">
        			<label for="creditCart">Credit / Debit Card</label>
        			<img class="payment-logo" src="https://i.imgur.com/IHEKLgm.png" alt="">
        		</div>
        
        		<div class="payment-tab-content">
        			<div class="row">
        
        				<div class="col-md-6">
        					<div class="card-label">
        						<label for="nameOnCard">Name on Card</label>
        						<input id="nameOnCard" name="nameOnCard" required type="text">
        					</div>
        				</div>
        
        				<div class="col-md-6">
        					<div class="card-label">
        						<label for="cardNumber">Card Number</label>
        						<input id="cardNumber" name="cardNumber" placeholder="1234  5678  9876  5432" required type="text">
        					</div>
        				</div>
        
        				<div class="col-md-4">
        					<div class="card-label">
        						<label for="expirynDate">Expiry Month</label>
        						<input id="expiryDate" placeholder="MM" required type="text">
        					</div>
        				</div>
        
        				<div class="col-md-4">
        					<div class="card-label">
        						<label for="expiryDate">Expiry Year</label>
        						<input id="expirynDate" placeholder="YY" required type="text">
        					</div>
        				</div>
        
        				<div class="col-md-4">
        					<div class="card-label">
        						<label for="cvv">CVV</label>
        						<input id="cvv" required type="text">
        					</div>
        				</div>
        
        			</div>
        		</div>
        	</div>
        
        </div>
        <!-- Payment Methods Accordion / End -->
        
        <a href='booking_completed' class="button booking-confirmation-btn margin-top-40 margin-bottom-65">Confirm and Pay</a>
    </div>
</div>




<!-- Content / End -->
@push('js')
<!--<script src="{{ asset('js/〇〇.js') }}"></script>-->

@endpush
@endsection
