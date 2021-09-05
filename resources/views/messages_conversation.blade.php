@extends('layouts.menu')

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
			<h4>Kathy Brown</h4>
			<!--<a href="#" class="message-action"><i class="sl sl-icon-trash"></i> Delete Conversation</a>-->
		</div>

		<div class="messages-container-inner">

			<!-- Messages -->
			<div class="messages-inbox">
				<ul>
					<li class="active-message">
						<a href="dashboard-messages-conversation.html">
							<div class="message-avatar"><img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70" alt="" /></div>

							<div class="message-by">
								<div class="message-by-headline">
									<h5>Kathy Brown</h5>
									<span>2 hours ago</span>
								</div>
								<p>Hello, I want to talk about your great listing! Morbi velit eros, sagittis in facilisis non, rhoncus et erat. Nam posuere tristique sem, eu ultricies tortor lacinia neque imperdiet vitae...</p>
							</div>
						</a>
					</li>

					<li>
						<a href="dashboard-messages-conversation.html">
							<div class="message-avatar"><img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70" alt="" /></div>

							<div class="message-by">
								<div class="message-by-headline">
									<h5>John Doe <i>Unread</i></h5>
									<span>4 hours ago</span>
								</div>
								<p>Hello, I want to talk about your great listing! Morbi velit eros, sagittis in facilisis non, rhoncus et erat. Nam posuere tristique sem, eu ultricies tortor lacinia neque imperdiet vitae...</p>
							</div>
						</a>
					</li>
					
					<li>
						<a href="dashboard-messages-conversation.html">
							<div class="message-avatar"><img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70" alt="" /></div>

							<div class="message-by">
								<div class="message-by-headline">
									<h5>Thomas Smith</h5>
									<span>Yesterday</span>
								</div>
								<p>Hello, I want to talk about your great listing! Morbi velit eros, sagittis in facilisis non, rhoncus et erat. Nam posuere tristique sem, eu ultricies tortor lacinia neque imperdiet vitae...</p>
							</div>
						</a>
					</li>

					<li>
						<a href="dashboard-messages-conversation.html">
							<div class="message-avatar"><img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70" alt="" /></div>

							<div class="message-by">
								<div class="message-by-headline">
									<h5>Mike Behringer</h5>
									<span>28.06.2019</span>
								</div>
								<p>Hello, I want to talk about your great listing! Morbi velit eros, sagittis in facilisis non, rhoncus et erat. Nam posuere tristique sem, eu ultricies tortor lacinia neque imperdiet vitae...</p>
							</div>
						</a>
					</li>

					<li>
						<a href="dashboard-messages-conversation.html">
							<div class="message-avatar"><img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70" alt="" /></div>

							<div class="message-by">
								<div class="message-by-headline">
									<h5>Robert Baker</h5>
									<span>22.06.2019</span>
								</div>
								<p>Hello, I want to talk about your great listing! Morbi velit eros, sagittis in facilisis non, rhoncus et erat. Nam posuere tristique sem, eu ultricies tortor lacinia neque imperdiet vitae...</p>
							</div>
						</a>
					</li>

					<li>
						<a href="dashboard-messages-conversation.html">
							<div class="message-avatar"><img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70" alt="" /></div>

							<div class="message-by">
								<div class="message-by-headline">
									<h5>Thomas Smith</h5>
									<span>16.06.2019</span>
								</div>
								<p>Hello, I want to talk about your great listing! Morbi velit eros, sagittis in facilisis non, rhoncus et erat. Nam posuere tristique sem, eu ultricies tortor lacinia neque imperdiet vitae...</p>
							</div>
						</a>
					</li>

					<li>
						<a href="dashboard-messages-conversation.html">
							<div class="message-avatar"><img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70" alt="" /></div>

							<div class="message-by">
								<div class="message-by-headline">
									<h5>Mike Behringer</h5>
									<span>12.06.2019</span>
								</div>
								<p>Hello, I want to talk about your great listing! Morbi velit eros, sagittis in facilisis non, rhoncus et erat. Nam posuere tristique sem, eu ultricies tortor lacinia neque imperdiet vitae...</p>
							</div>
						</a>
					</li>

					<li>
						<a href="dashboard-messages-conversation.html">
							<div class="message-avatar"><img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70" alt="" /></div>

							<div class="message-by">
								<div class="message-by-headline">
									<h5>Robert Baker</h5>
									<span>31.05.2019</span>
								</div>
								<p>Hello, I want to talk about your great listing! Morbi velit eros, sagittis in facilisis non, rhoncus et erat. Nam posuere tristique sem, eu ultricies tortor lacinia neque imperdiet vitae...</p>
							</div>
						</a>
					</li>

					<li>
						<a href="dashboard-messages-conversation.html">
							<div class="message-avatar"><img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70" alt="" /></div>

							<div class="message-by">
								<div class="message-by-headline">
									<h5>Thomas Smith</h5>
									<span>27.05.2019</span>
								</div>
								<p>Hello, I want to talk about your great listing! Morbi velit eros, sagittis in facilisis non, rhoncus et erat. Nam posuere tristique sem, eu ultricies tortor lacinia neque imperdiet vitae...</p>
							</div>
						</a>
					</li>

					<li>
						<a href="dashboard-messages-conversation.html">
							<div class="message-avatar"><img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70" alt="" /></div>

							<div class="message-by">
								<div class="message-by-headline">
									<h5>Mike Behringer</h5>
									<span>24.05.2019</span>
								</div>
								<p>Hello, I want to talk about your great listing! Morbi velit eros, sagittis in facilisis non, rhoncus et erat. Nam posuere tristique sem, eu ultricies tortor lacinia neque imperdiet vitae...</p>
							</div>
						</a>
					</li>

					<li>
						<a href="dashboard-messages-conversation.html">
							<div class="message-avatar"><img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70" alt="" /></div>

							<div class="message-by">
								<div class="message-by-headline">
									<h5>Robert Baker</h5>
									<span>22.05.2019</span>
								</div>
								<p>Hello, I want to talk about your great listing! Morbi velit eros, sagittis in facilisis non, rhoncus et erat. Nam posuere tristique sem, eu ultricies tortor lacinia neque imperdiet vitae...</p>
							</div>
						</a>
					</li>

					<li>
						<a href="dashboard-messages-conversation.html">
							<div class="message-avatar"><img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70" alt="" /></div>

							<div class="message-by">
								<div class="message-by-headline">
									<h5>Robert Baker</h5>
									<span>17.05.2019</span>
								</div>
								<p>Hello, I want to talk about your great listing! Morbi velit eros, sagittis in facilisis non, rhoncus et erat. Nam posuere tristique sem, eu ultricies tortor lacinia neque imperdiet vitae...</p>
							</div>
						</a>
					</li>

				</ul>
			</div>
			<!-- Messages / End -->

			<!-- Message Content -->
			<div class="message-content">

				<div class="message-bubble">
					<div class="message-avatar"><img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70" alt="" /></div>
					<div class="message-text"><p>Hello, I want to talk about your great listing! Morbi velit eros, sagittis in facilisis non, rhoncus et erat. Nam posuere tristique sem, eu ultricies tortor lacinia neque imperdiet vitae.</p></div>
				</div>

				<div class="message-bubble me">
					<div class="message-avatar"><img src="images/dashboard-avatar.jpg" alt="" /></div>
					<div class="message-text"><p>Nam ut hendrerit orci, ac gravida orci. Cras tristique rutrum libero at consequat. Vestibulum vehicula neque maximus sapien iaculis, nec vehicula sapien fringilla.</p></div>
				</div>

				<div class="message-bubble me">
					<div class="message-avatar"><img src="images/dashboard-avatar.jpg" alt="" /></div>
					<div class="message-text"><p>Accumsan et porta ac, volutpat id ligula. Donec neque neque, blandit eu pharetra in, tristique id enim.</p></div>
				</div>

				<div class="message-bubble">
					<div class="message-avatar"><img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70" alt="" /></div>
					<div class="message-text"><p>Vivamus lobortis vel nibh nec maximus. Donec dolor erat, rutrum ut feugiat sed, ornare vitae nunc. Donec massa nisl, bibendum id ultrices sed, accumsan sed dolor.</p></div>
				</div>

				<div class="message-bubble me">
					<div class="message-avatar"><img src="images/dashboard-avatar.jpg" alt="" /></div>
					<div class="message-text"><p>Nunc pulvinar, velit sit amet tristique tristique, nisi odio luctus odio, vel vulputate purus enim vestibulum est. Pellentesque non mollis ipsum, vitae tristique sapien.</p></div>
				</div>

				<div class="message-bubble">
					<div class="message-avatar"><img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70" alt="" /></div>
					<div class="message-text"><p>Donec eget consequat magna. Integer luctus neque vel nulla malesuada imperdiet. </p></div>
				</div>

				<div class="message-bubble me">
					<div class="message-avatar"><img src="images/dashboard-avatar.jpg" alt="" /></div>
					<div class="message-text"><p>Accumsan et porta ac, volutpat id ligula. Donec neque neque, blandit eu pharetra in, tristique id enim nulla magna interdum leo, sed tincidunt purus elit vitae magna. Donec eget consequat magna. Integer luctus neque vel nulla malesuada imperdiet. .</p></div>
				</div>

				<div class="message-bubble">
					<div class="message-avatar"><img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70" alt="" /></div>
					<div class="message-text"><p>Nulla eget erat consequat quam feugiat dapibus eget sed mauris.</p></div>
				</div>
				
				<!-- Reply Area -->
				<div class="clearfix"></div>
				<div class="message-reply">
					<textarea cols="40" rows="3" placeholder="Your Message"></textarea>
					<button class="button">Send Message</button>
				</div>
				
			</div>
			<!-- Message Content -->

		</div>

	</div>

</div>

@push('js')
<!--<script src="{{ asset('js/〇〇.js') }}"></script>-->



@endpush
@endsection

