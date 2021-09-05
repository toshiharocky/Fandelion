@extends('layouts.menu_mobnav_4')

@push('css')
    <!--<link href="{{ asset('css/〇〇.css') }}" rel="stylesheet">-->
<style>
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
	<div class="clearfix"></div>
	<div class="pagination-container margin-top-30 margin-bottom-0">
		<nav class="pagination">
			<ul>
				<li><a href="#" class="current-page">1</a></li>
				<li><a href="#">2</a></li>
				<li><a href="#"><i class="sl sl-icon-arrow-right"></i></a></li>
			</ul>
		</nav>
	</div>
	<!-- Pagination / End -->

</div>


@push('js')
<!--<script src="{{ asset('js/〇〇.js') }}"></script>-->

<script>
let gym_id = @json($gym_id);
let guest_id = @json($guest_id);
let host_id = @json($host_id);
let host_name = @json($host_name);
let sender = @json($sender);
let message = @json($message);
let status_flg = @json($status_flg);
let count = gym_id.length;
console.log(count);

for($i=1; $i<count; $i++){
	if(status_flg[$i]==0){
		$("#message_list").append(
			`<li class="unread">
				<a href="messages_conversation">
					<div class="message-avatar"><img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70" alt="" /></div>

					<div class="message-by">
						<div class="message-by-headline">
							<h5>${host_name[$i]} <i>Unread</i></h5>
							<span>2 hours ago</span>
						</div>
						<p>${message[$i]}</p>
					</div>
				</a>
			</li>`
		)
	}else{
		$("#message_list").append(
			`<li>
				<a href="messages_conversation">
					<div class="message-avatar"><img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70" alt="" /></div>

					<div class="message-by">
						<div class="message-by-headline">
							<h5>${host_name[$i]}</h5>
							<span>2 hours ago</span>
						</div>
						<p>${message[$i]}</p>
					</div>
				</a>
			</li>`
		)
	}
}

</script>

@endpush
@endsection

