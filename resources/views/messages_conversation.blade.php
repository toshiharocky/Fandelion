@extends('layouts.menu')

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
	width:60%;
}
.message_time{
	width:40%;
	text-align:right;
}
.message-avatar.list-avatar{
	left:10px !important;
}
.message-bubble{
	display: flex;
    align-items: flex-end;
}
.time{
	margin:0 10px;
}
.time_me{
	margin:0 10px;
	text-align:right;
}
.title_addr{
	margin-left:10px;
}
.message-bubble.me{
	display: flex;
    justify-content: end;
}
@media (min-width: 991px){
		
		.messages-inbox{
			width:30%;
		}
		.message-content{
			width:70%;
		}
		.message-text{
			max-width: 60%;
		}
		.messages-headline{
			display: flex;
			align-items: center;
			justify-content: space-between;
		}
		.host_info{
			width:25%;
		}
		.gym_info{
			display:flex;
			width:75%;
			align-items: center;
		}
		.thumbnail{
			height:100px;
			width:auto;
		}
	}
@media (max-width: 991px){
		.messages-headline{
			display: flex !important;
			flex-direction:column;
			align-items: center;
			justify-content: space-between;
		}
		.host_info{
			width:100%;
		}
		.gym_info{
			display:flex;
			width:100%;
			align-items: center;
			margin-top:5px;
		}
		.thumbnail{
			height:50px;
			width:auto;
		}
	}
</style>
@endpush

@section('content')

<div class="col-lg-12 col-md-12">

	<div class="messages-container margin-top-0">
		

		<div class="messages-container-inner">

			<!-- Messages -->
			<div class="messages-inbox">
				<ul>
					<div class="messages-headline">
						<h4>Messages</h4>
						<!--<a href="/result/ajax">テスト</a>-->
						<!--<a href="#" class="message-action"><i class="sl sl-icon-trash"></i> Delete Conversation</a>-->
					</div>
					<div id="message_list"></div>
					
				</ul>
				

				<!--</ul>-->
			</div>
			<!-- Messages / End -->

			<!-- Message Content -->
			<div class="message-content">
				

				<div id="headline"></div>
				<div id="conversation"></div>
				<div id="reply"></div>
				

				
				
				
				
			</div>
			<!-- Message Content -->

		</div>

	</div>

</div>

@push('js')
<!--<script src="{{ asset('js/〇〇.js') }}"></script>-->
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->

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
	  var h = ('00' + (new Date(dt).getHours()+9)).slice(-2);
	  var i = ('00' + new Date(dt).getMinutes()).slice(-2);
	  return (h + ':' + i);
	}
</script>



<script>
function message_list() {
		$("#message_list").empty();
		if(count == 0){
				$("#message_list").append(
		    			`<p class="showing-results">メッセージはありません </p>`
		    		);
			}
		else if(count == 1){
			status_flg = message_index[0].status_flg;
			date = formatDate(message_index[0].updated_at);
			time = formatTime(message_index[0].updated_at);
			let icon = "https://s3-ap-northeast-1.amazonaws.com/fandelion/" + message_index[0].user_icon;
			if(status_flg==0){
					$("#message_list").append(
						`<li class="unread">
							<div class="listing-item-container" data-id=${message_index[0].gym_id} style="cursor:pointer">
								<div class="message-avatar list-avatar"><img src=${icon} alt="" /></div>
			
								<div class="message-by">
								<div class="message-by-headline">
									<div class="message_detail">
										<h5>${message_index[0].name} <i>Unread</i></h5>
										<p>${message_index[0].last_message}</p>
									</div>
									<div class="message_time">
										<p>${date}</p>
										<p>${time}</p>
									</div>
								</div>
							</div>
							</div>
						</li>`
					)
				}
			else{
					console.log(message_index);
					let icon = "https://s3-ap-northeast-1.amazonaws.com/fandelion/" + message_index[0].user_icon;
					$("#message_list").append(
						`<li>
							<div class="listing-item-container" data-id=${message_index[0].gym_id} style="cursor:pointer">
								<div class="message-avatar list-avatar"><img src=${icon} alt="" /></div>
			
								<div class="message-by">
								<div class="message-by-headline">
									<div class="message_detail">
										<h5>${message_index[0].name}</h5>
										<p>${message_index[0].last_message}</p>
									</div>
									<div class="message_time">
										<p>${date}</p>
										<p>${time}</p>
									</div>
								</div>
							</div>
							</div>
						</li>`
					)
				}
			}else{
			for($i=0; $i<count; $i++){
				
				id_message = $i + "_message";
				status_flg = message_index[$i].status_flg;
				date = formatDate(message_index[$i].updated_at);
				time = formatTime(message_index[$i].updated_at);
				console.log(date);
				onclick = "document:message_select[" + $i + "].submit();";
				let icon = "https://s3-ap-northeast-1.amazonaws.com/fandelion/" + message_index[$i].user_icon;
				if(status_flg==0){
					$("#message_list").append(
						`<li class="unread">
							<div class="listing-item-container" data-id=${message_index[$i].gym_id} style="cursor:pointer">
								<div class="message-avatar list-avatar"><img src=${icon} alt="" /></div>
			
								<div class="message-by">
									<div class="message-by-headline">
										<div class="message_detail">
											<h5>${message_index[$i].name} <i>Unread</i></h5>
											<p>${message_index[$i].last_message}</p>
										</div>
										<div class="message_time">
											<p>${date}</p>
											<p>${time}</p>
										</div>
									</div>
								</div>
							</div>
						</li>`
					)
				}else{
					$("#message_list").append(
						`<li>
							<div class="listing-item-container" data-id=${message_index[$i].gym_id} style="cursor:pointer">
								<div class="message-avatar list-avatar"><img src=${icon} alt="" /></div>
			
								<div class="message-by">
									<div class="message-by-headline">
										<div class="message_detail">
											<h5>${message_index[$i].name}</h5>
											<p>${message_index[$i].last_message}</p>
										</div>
										<div class="message_time">
											<p>${date}</p>
											<p>${time}</p>
										</div>
									</div>
								</div>
							</div>
						</li>`
					)
				}
			}
		}
	}
</script>


<script>
function selected_message(){
	console.log(message_info);
	console.log(gym_id);
	sort_filter = message_info.filter(function(message_info) {
					return message_info.gym_id == gym_id;
				});
	console.log(sort_filter);
}

function conversation(){
	if(count == 0){
		$("#conversation").append(
    			`<p class="showing-results">メッセージはありません </p>`
    		);
	}
	else{
			$("#headline").empty();
			$("#conversation").empty();
			$("#reply").empty();
			console.log(sort_filter);
			let icon = "https://s3-ap-northeast-1.amazonaws.com/fandelion/" + sort_filter[0].user_icon;
			let thumbnail = "https://s3-ap-northeast-1.amazonaws.com/fandelion/" + sort_filter[0].thumbnail;
			console.log(thumbnail);
			$("#headline").append(
				`<div>
					<form method="get" name="gym_select" action="gym_introduction">
						@csrf
						
							<div>
								<a onclick="document:gym_select.submit(); return false" class="listing-item-container" style="cursor:pointer">
									<input type="hidden" name="gym_id" value=${sort_filter[0].gym_id}>
									<div class="messages-headline">
										<div class="host_info">
											<h4>${sort_filter[0].name}</h4>
										</div>
										<!--<a href="#" class="message-action"><i class="sl sl-icon-trash"></i> Delete Conversation</a>-->
										<div class="gym_info">
											<img class="thumbnail" src=${thumbnail}>
											<div class="title_addr">
												<h4>${sort_filter[0].gym_title}</h4>
												<h5>${sort_filter[0].addr}</h5>
											</div>
										</div>
									</div>
								</a>
							</div>
							
						
						</form>
						</div>`
			);
			sort_count = sort_filter.length;
			for($i=0; $i<sort_count; $i++){
			date = formatDate(sort_filter[$i].updated_at);
			time = formatTime(sort_filter[$i].updated_at);
					if(sort_filter[$i].sender == guest_id){
						$("#conversation").append(	
							`<div class="message-bubble me">
								<div class="time_me">
									<h5>${date}</h5>
									<h5>${time}</h5>
								</div>
								<div class="message-avatar"><img src={{$user_icon}}></div>
								<div class="message-text">
									<p>${sort_filter[$i].message}</p>
								</div>
							</div>
							`
							);
					}else {
						$("#conversation").append(	
							`<div class="message-bubble">
								<div class="message-avatar"><img src=${icon}></div>
								<div class="message-text">
									<p>${sort_filter[$i].message}</p>
								</div>
								<div class="time">
									<h5>${date}</h5>
									<h5>${time}</h5>
								</div>
							</div>
							`
							);
					}
			}
			
			$("#reply").append(
				`<!-- Reply Area -->
				<div class="clearfix"></div>
				<form method="get" name="send_messages" action="send_messages">
				@csrf
					<input type="hidden" name="gym_id" value=${sort_filter[0].gym_id}></input>
					<input type="hidden" name="guest_id" value=${sort_filter[0].guest_id}></input>
					<input type="hidden" name="host_id" value=${sort_filter[0].host_id}></input>
					<div class="message-reply">
						<textarea cols="40" rows="3" placeholder="Your Message" name="message" onkeydown="if(event.shiftKey&&event.keyCode==13){document.getElementById('submit').click();return false};"></textarea>
						<input id="submit" type="submit" class="button" value="Send Message"></input>
						<!--<button class="button">Send Message</button>-->
					</div>
				</form>`
			);
	}
}


</script>

<script>
	
		
	function get_data() {
	    $.ajax({
	        url: "result/ajax",
	        dataType: "json",
	        success: data => {
            	// 成功時の処理
            	message_info = data.messages;
            	
            	// message_index = data.messages;
			    selected_message();
			    conversation();
			    message_list();
	        },
	        error: () => {
	            // エラー時の処理
	            alert("ajax Error");
	        }
	    });
	
	    setTimeout("get_data()", 50000);
	}
	
	
	
</script>

<script>
	$('#message_list').on('click','.listing-item-container',function(){
		gym_id  =  $(this).data('id');
		console.log(gym_id);
		get_data();
	})
</script>

<script>
let guest_id = {{$guest_id}};
let host_id = {{$host_id}};
let message_index = @json($message_list);
let sort_filter = @json($messages);
let count = message_index.length;
let sort_count = sort_filter.length;
let id_message = 0;
let onclick = 0;
let message_info = 0;
let host_name = "{{$host_name}}";
let gym_id = "{{$gym_id}}";


get_data();


console.log(message_index);
</script>




@endpush
@endsection

