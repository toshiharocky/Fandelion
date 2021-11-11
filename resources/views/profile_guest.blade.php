@extends('layouts.menu_mobnav_5')

@push('css')
    <!--<link href="{{ asset('css/〇〇.css') }}" rel="stylesheet">-->
<style>
.profile_list{
	display:flex;
    margin-top: 30px;
	flex-direction:column;
    align-items: center;
}
.profile_header{
    margin-top: 10px;
	display:flex;
	align-items: center;
}
.profile_img{
	width: 30%;
    height: 30%;
    object-fit: contain;
}
.profile_name{
	margin:0 10px;
}
.profile_mode{
	width:80%;
	display:flex;
	justify-content: space-between;
    align-items: center;
}
.mode_name{
	padding:5px 10px;
	color:#f91942;
	border:2px solid;
    border-radius: 7px;
	border-color: #f91942;
}
.profile_menu_wrapper{
	margin-top:50px;
	width: 80%;
}
.profile_menu{
	width: 100%;
}
.profile_menu ul li {
    border-bottom: 1px solid #eaeaea;
    transition: 0.2s;
}
.profile_menu ul {
    list-style: none;
    padding: 0;
    margin: 0;
    text-align:center;
}
.profile_menu ul li a {
    position: relative;
    display: block;
    padding: 30px;
}
.menu_text {
    margin: 0;
}
@media (min-width: 991px){
		.back-button{
			width:25%;
		}
		.profile_header{
			width:40%;
    		justify-content: space-around;
		}
	}
@media (max-width: 991px){
		.back-button{
			width:80%;
		}
		.profile_mode{
			flex-direction:column;
		}
		.profile_header{
			width:100%;
    		justify-content: center;
		}
	}
</style>
@endpush

@section('content')
<!-- Container -->
<div class="container">

	<div class="row">
		<div class="col-md-12 profile_list">
			<!--<div class="messages-container margin-top-0">-->
				<div class="profile_mode">
					<h3>プロフィール</h3>
					<h5 class="mode_name">ゲストモード</h5>
				</div>
				<div class="profile_header">
					<img class="profile_img" src={{$user_icon}}>
					<h3 class="profile_name">{{$user_name}}</h3>
				</div>
				
				<div class="profile_menu_wrapper">
					<div class="profile_menu">
					<ul>
						<div id="message_list">
							<li>
								<form method="get" name="profile_update" action="profile_update">
								@csrf
									<a onclick=document:profile_update.submit();  class="listing-item-container" style="cursor:pointer">
										<h3 class="menu_text">会員情報の変更</h3>
										<!--<div class="message-avatar"><img src=${icon} alt="" /></div>-->
					
										<!--<div class="message-by">-->
										<!--	<div class="message-by-headline">-->
										<!--		<div class="message_detail">-->
										<!--			<h5>${message_info[$i].name}</h5>-->
										<!--			<p>${message_info[$i].last_message}</p>-->
										<!--		</div>-->
										<!--		<input type="hidden" name="gym_id" value=${message_info[$i].gym_id}>-->
										<!--		<div class="message_time">-->
										<!--			<p>${date}</p>-->
										<!--			<p>${time}</p>-->
										<!--		</div>-->
										<!--	</div>-->
										<!--</div>-->
									</a>
								</form>
							</li>
							<li>
								<form method="get" name="payment_update" action="payment_update">
								@csrf
									<a onclick=document:payment_update.submit();  class="listing-item-container" style="cursor:pointer">
										<h3 class="menu_text">支払情報の変更</h3>
										<!--<div class="message-avatar"><img src=${icon} alt="" /></div>-->
					
										<!--<div class="message-by">-->
										<!--	<div class="message-by-headline">-->
										<!--		<div class="message_detail">-->
										<!--			<h5>${message_info[$i].name}</h5>-->
										<!--			<p>${message_info[$i].last_message}</p>-->
										<!--		</div>-->
										<!--		<input type="hidden" name="gym_id" value=${message_info[$i].gym_id}>-->
										<!--		<div class="message_time">-->
										<!--			<p>${date}</p>-->
										<!--			<p>${time}</p>-->
										<!--		</div>-->
										<!--	</div>-->
										<!--</div>-->
									</a>
								</form>
							</li>
						</div>
					</ul>
				</div>
				</div>
			<!--</div>-->
			

		</div>
	    <div style="text-align:center;">
		    <a href="/host_profile" class="button margin-top-30 back-button">ホストモードへ</a>
		</div>
	</div>

</div>


@push('js')
<!--<script src="{{ asset('js/〇〇.js') }}"></script>-->

<script>
	
</script>

@endpush
@endsection

