@extends('layouts.menu_mobnav_4')

@push('css')
    <!--<link href="{{ asset('css/〇〇.css') }}" rel="stylesheet">-->
<style>
.listing-item-container {
	margin-bottom: 0px;
	
}
.message-by-headline{
	display: flex;
    justify-content: space-between;
}
.message_detail{
	width:80%;
}
.message_time{
	width:20%;
	text-align:right;
}
.showing-results{
	text-align:center;
}
@media (min-width: 991px){
		.py-4{
			display: flex;
		    flex-direction: column;
		    align-items: center;
		}
	}
@media (max-width: 991px){
		
	}
</style>
@endpush

@section('content')
<div class="col-lg-8 col-md8">

	<div class="messages-container margin-top-0">
		<div class="messages-headline">
			<h4>Inbox</h4>
		</div>
		
		<div class="messages-inbox">

			<ul>
				<div id="message_list"></div>
				
			</ul>
			
		</div>
	</div>

	<!-- Pagination -->
	<!--<div class="clearfix"></div>-->
	<!--<div class="pagination-container margin-top-30 margin-bottom-0">-->
	<!--	<nav class="pagination">-->
	<!--		<ul>-->
	<!--			<li><a href="#" class="current-page">1</a></li>-->
	<!--			<li><a href="#">2</a></li>-->
	<!--			<li><a href="#"><i class="sl sl-icon-arrow-right"></i></a></li>-->
	<!--		</ul>-->
	<!--	</nav>-->
	<!--</div>-->
	<!-- Pagination / End -->

</div>


@push('js')
<!--<script src="{{ asset('js/〇〇.js') }}"></script>-->

<script>
	// 日付をYYYY/MM/DDの書式で返すメソッド
	function formatDate(dt) {
	  var y = ('0'+new Date(dt).getFullYear()).slice(-4);
	  var m = ('0' + new Date(dt).getMonth()).slice(-2);
	  m ++;
	  var d = ('0' + new Date(dt).getDate()).slice(-2);
	  return (y + '/' + m + '/' + d);
	}
	// 日付をhh:iiの書式で返すメソッド
	function formatTime(dt) {
	  var h = ('00' + (new Date(dt).getHours()+9)).slice(-2); //UTCを日本標準時に調整（+9hours）
	  var i = ('00' + new Date(dt).getMinutes()).slice(-2);
	  return (h + ':' + i);
	}
</script>

<script>
let message_info = @json($messages);
console.log(message_info)
let count = message_info.length;
let id_message = 0;
let onclick = 0;


let date = 0;

let time = 0;


if(count == 0){
		$("#message_list").append(
    			`<p class="showing-results">メッセージはありません </p>`
    		);
	}
else if(count == 1){
	status_flg = message_info[0].status_flg;
	onclick = "document:message_select.submit();";
	let icon = "https://s3-ap-northeast-1.amazonaws.com/fandelion/" + message_info[0].user_icon;
	date = formatDate(message_info[0].updated_at);
	time = formatTime(message_info[0].updated_at);
	if(status_flg==0){
			$("#message_list").append(
				`<li class="unread">
					<form method="get" name="message_select" action="messages_conversation">
					@csrf
						<a id=${id_message} onclick=${onclick}  class="listing-item-container" style="cursor:pointer">
							<div class="message-avatar"><img src=${icon} alt="" /></div>
		
							<div class="message-by">
								<div class="message-by-headline">
									<div class="message_detail">
										<h5>${message_info[0].name} <i>Unread</i></h5>
										<p>${message_info[0].last_message}</p>
									</div>
									<input type="hidden" name="gym_id" value=${message_info[0].gym_id}>
									<div class="message_time">
										<p>${date}</p>
										<p>${time}</p>
									</div>
								</div>
								<p>${message_info[0].last_message}</p>
							</div>
						</a>
					</form>
				</li>`
			)
		}
	else{
			$("#message_list").append(
				`<li>
					<form method="get" name="message_select" action="messages_conversation">
					@csrf
						<a id=${id_message} onclick=${onclick}  class="listing-item-container" style="cursor:pointer">
							<div class="message-avatar"><img src=${icon} alt="" /></div>
		
							<div class="message-by">
								<div class="message-by-headline">
									<div class="message_detail">
										<h5>${message_info[0].name}</h5>
										<p>${message_info[0].last_message}</p>
									</div>
									<input type="hidden" name="gym_id" value=${message_info[0].gym_id}>
									<div class="message_time">
										<p>${date}</p>
										<p>${time}</p>
									</div>
								</div>
								<p>${message_info[0].last_message}</p>
							</div>
						</a>
					</form>
				</li>`
			)
		}
	}else{
	for($i=0; $i<count; $i++){
		id_message = $i + "_message";
		status_flg = message_info[$i].status_flg;
		date = formatDate(message_info[$i].updated_at);
		time = formatTime(message_info[$i].updated_at);
		console.log(status_flg);
		onclick = "document:message_select[" + $i + "].submit();";
		let icon = "https://s3-ap-northeast-1.amazonaws.com/fandelion/" + message_info[$i].user_icon;
		if(status_flg==0){
			$("#message_list").append(
				`<li class="unread">
					<form method="get" name="message_select" action="messages_conversation">
					@csrf
						<a id=${id_message} onclick=${onclick}  class="listing-item-container" style="cursor:pointer">
							<div class="message-avatar"><img src=${icon} alt="" /></div>
		
							<div class="message-by">
								<div class="message-by-headline">
									<div class="message_detail">
										<h5>${message_info[0].name} <i>Unread</i></h5>
										<p>${message_info[0].last_message}</p>
									</div>
									<input type="hidden" name="gym_id" value=${message_info[0].gym_id}>
									<div class="message_time">
										<p>${date}</p>
										<p>${time}</p>
									</div>
								</div>
							</div>
						</a>
					</form>
				</li>`
			)
		}else{
			$("#message_list").append(
				`<li>
					<form method="get" name="message_select" action="messages_conversation">
					@csrf
						<a id=${id_message} onclick=${onclick}  class="listing-item-container" style="cursor:pointer">
							<div class="message-avatar"><img src=${icon} alt="" /></div>
		
							<div class="message-by">
								<div class="message-by-headline">
									<div class="message_detail">
										<h5>${message_info[$i].name}</h5>
										<p>${message_info[$i].last_message}</p>
									</div>
									<input type="hidden" name="gym_id" value=${message_info[$i].gym_id}>
									<div class="message_time">
										<p>${date}</p>
										<p>${time}</p>
									</div>
								</div>
							</div>
						</a>
					</form>
				</li>`
			)
		}
	}
}

</script>

@endpush
@endsection

