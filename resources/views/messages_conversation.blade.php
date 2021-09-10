@extends('layouts.menu')

@push('css')
    <!--<link href="{{ asset('css/〇〇.css') }}" rel="stylesheet">-->
<style>
.listing-item-container {
	margin-bottom: 0px;
	
}
@media (min-width: 991px){
		.message-bubble.me{
			display: flex;
		    justify-content: end;
		}
		.message-text{
			max-width: 60%;
		}
	}
@media (max-width: 991px){
		
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
						<!--<a href="#" class="message-action"><i class="sl sl-icon-trash"></i> Delete Conversation</a>-->
					</div>
					<div id="message_list"></div>
					
				</ul>
				<!--<ul>-->
					

				<!--	<li>-->
				<!--		<a href="dashboard-messages-conversation.html">-->
				<!--			<div class="message-avatar"><img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70" alt="" /></div>-->

				<!--			<div class="message-by">-->
				<!--				<div class="message-by-headline">-->
				<!--					<h5>John Doe <i>Unread</i></h5>-->
				<!--					<span>4 hours ago</span>-->
				<!--				</div>-->
				<!--				<p>Hello, I want to talk about your great listing! Morbi velit eros, sagittis in facilisis non, rhoncus et erat. Nam posuere tristique sem, eu ultricies tortor lacinia neque imperdiet vitae...</p>-->
				<!--			</div>-->
				<!--		</a>-->
				<!--	</li>-->
					
				<!--	<li>-->
				<!--		<a href="dashboard-messages-conversation.html">-->
				<!--			<div class="message-avatar"><img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70" alt="" /></div>-->

				<!--			<div class="message-by">-->
				<!--				<div class="message-by-headline">-->
				<!--					<h5>Thomas Smith</h5>-->
				<!--					<span>Yesterday</span>-->
				<!--				</div>-->
				<!--				<p>Hello, I want to talk about your great listing! Morbi velit eros, sagittis in facilisis non, rhoncus et erat. Nam posuere tristique sem, eu ultricies tortor lacinia neque imperdiet vitae...</p>-->
				<!--			</div>-->
				<!--		</a>-->
				<!--	</li>-->

				<!--	<li>-->
				<!--		<a href="dashboard-messages-conversation.html">-->
				<!--			<div class="message-avatar"><img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70" alt="" /></div>-->

				<!--			<div class="message-by">-->
				<!--				<div class="message-by-headline">-->
				<!--					<h5>Mike Behringer</h5>-->
				<!--					<span>28.06.2019</span>-->
				<!--				</div>-->
				<!--				<p>Hello, I want to talk about your great listing! Morbi velit eros, sagittis in facilisis non, rhoncus et erat. Nam posuere tristique sem, eu ultricies tortor lacinia neque imperdiet vitae...</p>-->
				<!--			</div>-->
				<!--		</a>-->
				<!--	</li>-->

				<!--	<li>-->
				<!--		<a href="dashboard-messages-conversation.html">-->
				<!--			<div class="message-avatar"><img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70" alt="" /></div>-->

				<!--			<div class="message-by">-->
				<!--				<div class="message-by-headline">-->
				<!--					<h5>Robert Baker</h5>-->
				<!--					<span>22.06.2019</span>-->
				<!--				</div>-->
				<!--				<p>Hello, I want to talk about your great listing! Morbi velit eros, sagittis in facilisis non, rhoncus et erat. Nam posuere tristique sem, eu ultricies tortor lacinia neque imperdiet vitae...</p>-->
				<!--			</div>-->
				<!--		</a>-->
				<!--	</li>-->

				<!--	<li>-->
				<!--		<a href="dashboard-messages-conversation.html">-->
				<!--			<div class="message-avatar"><img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70" alt="" /></div>-->

				<!--			<div class="message-by">-->
				<!--				<div class="message-by-headline">-->
				<!--					<h5>Thomas Smith</h5>-->
				<!--					<span>16.06.2019</span>-->
				<!--				</div>-->
				<!--				<p>Hello, I want to talk about your great listing! Morbi velit eros, sagittis in facilisis non, rhoncus et erat. Nam posuere tristique sem, eu ultricies tortor lacinia neque imperdiet vitae...</p>-->
				<!--			</div>-->
				<!--		</a>-->
				<!--	</li>-->

				<!--	<li>-->
				<!--		<a href="dashboard-messages-conversation.html">-->
				<!--			<div class="message-avatar"><img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70" alt="" /></div>-->

				<!--			<div class="message-by">-->
				<!--				<div class="message-by-headline">-->
				<!--					<h5>Mike Behringer</h5>-->
				<!--					<span>12.06.2019</span>-->
				<!--				</div>-->
				<!--				<p>Hello, I want to talk about your great listing! Morbi velit eros, sagittis in facilisis non, rhoncus et erat. Nam posuere tristique sem, eu ultricies tortor lacinia neque imperdiet vitae...</p>-->
				<!--			</div>-->
				<!--		</a>-->
				<!--	</li>-->

				<!--	<li>-->
				<!--		<a href="dashboard-messages-conversation.html">-->
				<!--			<div class="message-avatar"><img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70" alt="" /></div>-->

				<!--			<div class="message-by">-->
				<!--				<div class="message-by-headline">-->
				<!--					<h5>Robert Baker</h5>-->
				<!--					<span>31.05.2019</span>-->
				<!--				</div>-->
				<!--				<p>Hello, I want to talk about your great listing! Morbi velit eros, sagittis in facilisis non, rhoncus et erat. Nam posuere tristique sem, eu ultricies tortor lacinia neque imperdiet vitae...</p>-->
				<!--			</div>-->
				<!--		</a>-->
				<!--	</li>-->

				<!--	<li>-->
				<!--		<a href="dashboard-messages-conversation.html">-->
				<!--			<div class="message-avatar"><img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70" alt="" /></div>-->

				<!--			<div class="message-by">-->
				<!--				<div class="message-by-headline">-->
				<!--					<h5>Thomas Smith</h5>-->
				<!--					<span>27.05.2019</span>-->
				<!--				</div>-->
				<!--				<p>Hello, I want to talk about your great listing! Morbi velit eros, sagittis in facilisis non, rhoncus et erat. Nam posuere tristique sem, eu ultricies tortor lacinia neque imperdiet vitae...</p>-->
				<!--			</div>-->
				<!--		</a>-->
				<!--	</li>-->

				<!--	<li>-->
				<!--		<a href="dashboard-messages-conversation.html">-->
				<!--			<div class="message-avatar"><img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70" alt="" /></div>-->

				<!--			<div class="message-by">-->
				<!--				<div class="message-by-headline">-->
				<!--					<h5>Mike Behringer</h5>-->
				<!--					<span>24.05.2019</span>-->
				<!--				</div>-->
				<!--				<p>Hello, I want to talk about your great listing! Morbi velit eros, sagittis in facilisis non, rhoncus et erat. Nam posuere tristique sem, eu ultricies tortor lacinia neque imperdiet vitae...</p>-->
				<!--			</div>-->
				<!--		</a>-->
				<!--	</li>-->

				<!--	<li>-->
				<!--		<a href="dashboard-messages-conversation.html">-->
				<!--			<div class="message-avatar"><img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70" alt="" /></div>-->

				<!--			<div class="message-by">-->
				<!--				<div class="message-by-headline">-->
				<!--					<h5>Robert Baker</h5>-->
				<!--					<span>22.05.2019</span>-->
				<!--				</div>-->
				<!--				<p>Hello, I want to talk about your great listing! Morbi velit eros, sagittis in facilisis non, rhoncus et erat. Nam posuere tristique sem, eu ultricies tortor lacinia neque imperdiet vitae...</p>-->
				<!--			</div>-->
				<!--		</a>-->
				<!--	</li>-->

				<!--	<li>-->
				<!--		<a href="dashboard-messages-conversation.html">-->
				<!--			<div class="message-avatar"><img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70" alt="" /></div>-->

				<!--			<div class="message-by">-->
				<!--				<div class="message-by-headline">-->
				<!--					<h5>Robert Baker</h5>-->
				<!--					<span>17.05.2019</span>-->
				<!--				</div>-->
				<!--				<p>Hello, I want to talk about your great listing! Morbi velit eros, sagittis in facilisis non, rhoncus et erat. Nam posuere tristique sem, eu ultricies tortor lacinia neque imperdiet vitae...</p>-->
				<!--			</div>-->
				<!--		</a>-->
				<!--	</li>-->

				<!--</ul>-->
			</div>
			<!-- Messages / End -->

			<!-- Message Content -->
			<div class="message-content">
				

				<div id="headline"></div>
				<div id="conversation"></div>
				<div id="reply"></div>
				

				<!--<div class="message-bubble me">-->
				<!--	<div class="message-avatar"><img src="images/dashboard-avatar.jpg" alt="" /></div>-->
				<!--	<div class="message-text"><p>Accumsan et porta ac, volutpat id ligula. Donec neque neque, blandit eu pharetra in, tristique id enim.</p></div>-->
				<!--</div>-->

				<!--<div class="message-bubble">-->
				<!--	<div class="message-avatar"><img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70" alt="" /></div>-->
				<!--	<div class="message-text"><p>Vivamus lobortis vel nibh nec maximus. Donec dolor erat, rutrum ut feugiat sed, ornare vitae nunc. Donec massa nisl, bibendum id ultrices sed, accumsan sed dolor.</p></div>-->
				<!--</div>-->

				<!--<div class="message-bubble me">-->
				<!--	<div class="message-avatar"><img src="images/dashboard-avatar.jpg" alt="" /></div>-->
				<!--	<div class="message-text"><p>Nunc pulvinar, velit sit amet tristique tristique, nisi odio luctus odio, vel vulputate purus enim vestibulum est. Pellentesque non mollis ipsum, vitae tristique sapien.</p></div>-->
				<!--</div>-->

				<!--<div class="message-bubble">-->
				<!--	<div class="message-avatar"><img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70" alt="" /></div>-->
				<!--	<div class="message-text"><p>Donec eget consequat magna. Integer luctus neque vel nulla malesuada imperdiet. </p></div>-->
				<!--</div>-->

				<!--<div class="message-bubble me">-->
				<!--	<div class="message-avatar"><img src="images/dashboard-avatar.jpg" alt="" /></div>-->
				<!--	<div class="message-text"><p>Accumsan et porta ac, volutpat id ligula. Donec neque neque, blandit eu pharetra in, tristique id enim nulla magna interdum leo, sed tincidunt purus elit vitae magna. Donec eget consequat magna. Integer luctus neque vel nulla malesuada imperdiet. .</p></div>-->
				<!--</div>-->

				<!--<div class="message-bubble">-->
				<!--	<div class="message-avatar"><img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70" alt="" /></div>-->
				<!--	<div class="message-text"><p>Nulla eget erat consequat quam feugiat dapibus eget sed mauris.</p></div>-->
				<!--</div>-->
				
				
				
			</div>
			<!-- Message Content -->

		</div>

	</div>

</div>

@push('js')
<!--<script src="{{ asset('js/〇〇.js') }}"></script>-->
<script>
function message_list() {
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
											<input type="hidden" name="gym_id" value=${message_index[0].gym_id}></input>
											<span>2 hours ago</span>
										</div>
										<p>${message_index[0].last_message}</p>
									</div>
								</a>
							</form>
						</li>`
					)
				}
			else{
					console.log(message_index);
					$("#message_list").append(
						`<li>
							<form method="get" name="message_select" action="messages_conversation">
							@csrf
								<a id=${id_message} onclick=${onclick}  class="listing-item-container" style="cursor:pointer">
									<div class="message-avatar"><img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70" alt="" /></div>
				
									<div class="message-by">
										<div class="message-by-headline">
											<h5>${message_info[0].name}</h5>
											<input type="hidden" name="gym_id" value=${message_index[0].gym_id}></input>
											<span>2 hours ago</span>
										</div>
										<p>${message_index[0].last_message}</p>
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
											<input type="hidden" name="gym_id" value=${message_index[$i].gym_id}></input>
											<span>2 hours ago</span>
										</div>
										<p>${message_index[$i].last_message}</p>
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
											<input type="hidden" name="gym_id" value=${message_index[$i].gym_id}></input>
											<span>2 hours ago</span>
										</div>
										<p>${message_index[$i].last_message}</p>
									</div>
								</a>
							</form>
						</li>`
					)
				}
			}
		}
	}
</script>

<script>
function selected_message(){
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
	}else{
			$("#headline").append(
				`<div class="messages-headline">
					<h4>${sort_filter[0].name}</h4>
					<!--<a href="#" class="message-action"><i class="sl sl-icon-trash"></i> Delete Conversation</a>-->
				</div>`
			);
			sort_count = sort_filter.length;
			for($i=0; $i<sort_count; $i++){
					if(sort_filter[$i].sender == guest_id){
						$("#conversation").append(	
							`<div class="message-bubble me">
								<div class="message-avatar"><img src="images/dashboard-avatar.jpg" alt="" /></div>
								<div class="message-text"><p>${sort_filter[$i].message}</p></div>
							</div>`
							);
					}else {
						$("#conversation").append(	
							`<div class="message-bubble">
								<div class="message-avatar"><img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70" alt="" /></div>
								<div class="message-text"><p>${sort_filter[$i].message}</p></div>
							</div>`
							);
					}
			}
			
			$("#reply").append(
				`<!-- Reply Area -->
				<div class="clearfix"></div>
				<form method="get" name="send_messages" action="send_messages">
				@csrf
					<div class="message-reply">
						<input type="textarea" cols="40" rows="3" placeholder="Your Message" name="message"></input>
						<input type="hidden" name="gym_id" value=${sort_filter[0].gym_id}></input>
						<input type="hidden" name="guest_id" value=${sort_filter[0].guest_id}></input>
						<input type="hidden" name="host_id" value=${sort_filter[0].host_id}></input>
						<input type="submit" class="button" value="Send Message"></input>
						<!--<button class="button">Send Message</button>-->
					</div>
				</form>`
			);
	}
}


</script>



<script>
let guest_id = {{$guest_id}};
let host_id = {{$host_id}};
let message_index = @json($message_list);
let message_info = @json($messages);
let sort_filter = @json($messages);
let count = message_index.length;
let sort_count = message_info.length;
let id_message = 0;
let onclick = 0;
let host_name = "{{$host_name}}";
let gym_id = "{{$gym_id}}";
message_list();
selected_message();
conversation();
console.log(message_index);
</script>


@endpush
@endsection

