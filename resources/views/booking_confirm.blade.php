@extends('layouts.menu')

@push('css')
    <!--<link href="{{ asset('css/〇〇.css') }}" rel="stylesheet">-->
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
    	<h3 class="margin-top-55 margin-bottom-30">Booking Summary</h3>
    	<div class="boxed-widget opening-hours summary margin-top-0" style="width:80%;">
    		<div id="booking_overview" style="display:flex; justify-content:space-around">
				<div id="time" class="booking_elements" style="width:20%;">
					<div id="total_time">
						<h4>時間：{{$total_time}}分</h4>
					</div>
					<h4 class="element_details" style="text-align:left; margin-bottom:0;" >{{$date}}</h4>
					<h5 class="element_details">{{$from_to}}</h5>
				</div>
				<div id="guest" class="booking_elements" style="width:20%;">
					<div id="guest_details">
					<h4 name="number_of_users">人数：{{$number_of_users}}名</h4>
					</div>
    				<h5 name="number_of_men" class="element_details">男性 {{$number_of_men}}名</h5>
    				<h5 name="number_of_women" class="element_details">女性 {{$number_of_women}}名</h5>
    				<h5 name="number_of_others" class="element_details">その他 {{$number_of_others}}名</h5>
				</div>
				<div id="price" class="booking_elements" style="width:20%;">
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

<!-- Content / End -->
@push('js')
<!--<script src="{{ asset('js/〇〇.js') }}"></script>-->

@endpush
@endsection
