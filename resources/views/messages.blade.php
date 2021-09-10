@extends('layouts.menu_mobnav_4')

@push('css')
    <!--<link href="{{ asset('css/〇〇.css') }}" rel="stylesheet">-->
<style>
.listing-item-container {
	margin-bottom: 0px;
	
}
@media (min-width: 991px){
		
	}
@media (max-width: 991px){
		
	}
</style>
@endpush

@section('content')
<div class="col-lg-12 col-md-12">

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
let message_info = @json($messages);

let count = message_info.length;
let id_message = 0;
let onclick = 0;

console.log(count);

if(count == 0){
		$("#message_list").append(
    			`<p class="showing-results">メッセージはありません </p>`
    		);
	}
else if(count == 1){
	status_flg = message_info[0].status_flg;
	onclick = "document:message_select.submit();";
	if(status_flg==0){
			$("#message_list").append(
				`<li class="unread">
					<form method="get" name="message_select" action="messages_conversation">
					@csrf
						<a id=${id_message} onclick=${onclick}  class="listing-item-container" style="cursor:pointer">
							<div class="message-avatar"><img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70" alt="" /></div>
		
							<div class="message-by">
								<div class="message-by-headline">
									<h5>${message_info[0].name} <i>Unread</i></h5>
									<input type="hidden" name="gym_id" value=${message_info[0].gym_id}>
									<span>2 hours ago</span>
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
							<div class="message-avatar"><img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70" alt="" /></div>
		
							<div class="message-by">
								<div class="message-by-headline">
									<h5>${message_info[0].name}</h5>
									<input type="hidden" name="gym_id" value=${message_info[0].gym_id}>
									<span>2 hours ago</span>
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
		console.log(status_flg);
		onclick = "document:message_select[" + $i + "].submit();";
		if(status_flg==0){
			$("#message_list").append(
				`<li class="unread">
					<form method="get" name="message_select" action="messages_conversation">
					@csrf
						<a id=${id_message} onclick=${onclick}  class="listing-item-container" style="cursor:pointer">
							<div class="message-avatar"><img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70" alt="" /></div>
		
							<div class="message-by">
								<div class="message-by-headline">
									<h5>${message_info[$i].name} <i>Unread</i></h5>
									<input type="hidden" name="gym_id" value=${message_info[$i].gym_id}>
									<span>2 hours ago</span>
								</div>
								<p>${message_info[$i].last_message}</p>
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
							<div class="message-avatar"><img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70" alt="" /></div>
		
							<div class="message-by">
								<div class="message-by-headline">
									<h5>${message_info[$i].name}</h5>
									<input type="hidden" name="gym_id" value=${message_info[$i].gym_id}>
									<span>2 hours ago</span>
								</div>
								<p>${message_info[$i].last_message}</p>
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

