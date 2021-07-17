<!doctype html>
<head>

<!-- Basic Page Needs
================================================== -->
<title>Fandelion</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- CSS
================================================== -->

<link href="{{ asset('/css/all.css') }}" rel="stylesheet" type="text/css">
@stack('css')
<script src="{{ asset('/js/all.js') }}"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons%7CMaterial+Icons+Outlined" rel="stylesheet">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<link rel="stylesheet" href="https://use.typekit.net/wau6xrc.css">

</head>

<body>

<!-- Wrapper -->
<div id="wrapper">

<!-- Header Container
================================================== -->
<header id="header-container">

	<!-- Header -->
	<div id="header">
		<div class="container header-menu">
			
			<!-- Left Side Content -->
			<div class="left-side">
				
				<!-- Logo -->
				<div id="logo">
					<a href="/" style="color: #2B4393; font-size:52px;">Fandelion</a>
				</div>

				<!-- Mobile Navigation -->
				<!-- <div class="mmenu-trigger">
					<button class="hamburger hamburger--collapse" type="button">
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
					</button>
				</div> -->


				<!-- Main Navigation -->
				<!--<nav id="navigation" class="style-1">-->
				<!--	<ul id="responsive">-->

				<!--		<li><a class="current" href="#">Home</a>-->
				<!--			<ul>-->
				<!--				<li><a href="index.html">Home 1 (Modern)</a></li>-->
				<!--				<li><a href="index-2.html">Home 2 (Default)</a></li>-->
				<!--				<li><a href="index-3.html">Home 3 (Airbnb)</a></li>-->
				<!--				<li><a href="index-4.html">Home 4 (Creative)</a></li>-->
				<!--				<li><a href="index-5.html">Home 5 (Slider)</a></li>-->
				<!--				<li><a href="index-6.html">Home 6 (Map)</a></li>-->
				<!--				<li><a href="index-7.html">Home 7 (Video)</a></li>-->
				<!--				<li><a href="index-8.html">Home 8 (Classic)</a></li>-->
				<!--			</ul>-->
				<!--		</li>-->

				<!--		<li><a href="#">Listings</a>-->
				<!--			<ul>-->
				<!--				<li><a href="#">List Layout</a>-->
				<!--					<ul>-->
				<!--						<li><a href="listings-list-with-sidebar.html">With Sidebar</a></li>-->
				<!--						<li><a href="listings-list-full-width.html">Full Width</a></li>-->
				<!--						<li><a href="listings-list-full-width-with-map.html">Full Width + Map</a></li>-->
				<!--					</ul>-->
				<!--				</li>-->
				<!--				<li><a href="#">Grid Layout</a>-->
				<!--					<ul>-->
				<!--						<li><a href="listings-grid-with-sidebar-1.html">With Sidebar 1</a></li>-->
				<!--						<li><a href="listings-grid-with-sidebar-2.html">With Sidebar 2</a></li>-->
				<!--						<li><a href="listings-grid-full-width.html">Full Width</a></li>-->
				<!--						<li><a href="listings-grid-full-width-with-map.html">Full Width + Map</a></li>-->
				<!--					</ul>-->
				<!--				</li>-->
				<!--				<li><a href="#">Half Screen Map</a>-->
				<!--					<ul>-->
				<!--						<li><a href="listings-half-screen-map-list.html">List Layout</a></li>-->
				<!--						<li><a href="listings-half-screen-map-grid-1.html">Grid Layout 1</a></li>-->
				<!--						<li><a href="listings-half-screen-map-grid-2.html">Grid Layout 2</a></li>-->
				<!--					</ul>-->
				<!--				</li>-->
				<!--				<li><a href="#">Single Listings</a>-->
				<!--					<ul>-->
				<!--						<li><a href="listings-single-page.html">Single Listing 1</a></li>-->
				<!--						<li><a href="listings-single-page-2.html">Single Listing 2</a></li>-->
				<!--						<li><a href="listings-single-page-3.html">Single Listing 3</a></li>-->
				<!--					</ul>-->
				<!--				</li>-->
				<!--				<li><a href="#">Open Street Map</a>-->
				<!--					<ul>-->
				<!--						<li><a href="listings-half-screen-map-list-OpenStreetMap.html">Half Screen Map List Layout</a></li>-->
				<!--						<li><a href="listings-half-screen-map-grid-1-OpenStreetMap.html">Half Screen Map Grid Layout 1</a></li>-->
				<!--						<li><a href="listings-half-screen-map-grid-2-OpenStreetMap.html">Half Screen Map Grid Layout 2</a></li>-->
				<!--						<li><a href="listings-list-full-width-with-map-OpenStreetMap.html">Full Width List</a></li>-->
				<!--						<li><a href="listings-grid-full-width-with-map-OpenStreetMap.html">Full Width Grid</a></li>-->
				<!--						<li><a href="listings-single-page-OpenStreetMap.html">Single Listing</a></li>-->
				<!--					</ul>-->
				<!--				</li>-->
				<!--			</ul>-->
				<!--		</li>-->

				<!--		<li><a href="#">User Panel</a>-->
				<!--			<ul>-->
				<!--				<li><a href="dashboard.html">Dashboard</a></li>-->
				<!--				<li><a href="dashboard-messages.html">Messages</a></li>-->
				<!--				<li><a href="dashboard-bookings.html">Bookings</a></li>-->
				<!--				<li><a href="dashboard-wallet.html">Wallet</a></li>-->
				<!--				<li><a href="dashboard-my-listings.html">My Listings</a></li>-->
				<!--				<li><a href="dashboard-reviews.html">Reviews</a></li>-->
				<!--				<li><a href="dashboard-bookmarks.html">Bookmarks</a></li>-->
				<!--				<li><a href="dashboard-add-listing.html">Add Listing</a></li>-->
				<!--				<li><a href="dashboard-my-profile.html">My Profile</a></li>-->
				<!--				<li><a href="dashboard-invoice.html">Invoice</a></li>-->
				<!--			</ul>-->
				<!--		</li>-->

				<!--		<li><a href="#">Pages</a>-->
				<!--			<div class="mega-menu mobile-styles three-columns">-->

				<!--					<div class="mega-menu-section">-->
				<!--						<ul>-->
				<!--							<li class="mega-menu-headline">Pages #1</li>-->
				<!--							<li><a href="pages-user-profile.html"><i class="sl sl-icon-user"></i> User Profile</a></li>-->
				<!--							<li><a href="pages-booking.html"><i class="sl sl-icon-check"></i> Booking Page</a></li>-->
				<!--							<li><a href="pages-add-listing.html"><i class="sl sl-icon-plus"></i> Add Listing</a></li>-->
				<!--							<li><a href="pages-blog.html"><i class="sl sl-icon-docs"></i> Blog</a></li>-->
				<!--						</ul>-->
				<!--					</div>-->
		
				<!--					<div class="mega-menu-section">-->
				<!--						<ul>-->
				<!--							<li class="mega-menu-headline">Pages #2</li>-->
				<!--							<li><a href="pages-contact.html"><i class="sl sl-icon-envelope-open"></i> Contact</a></li>-->
				<!--							<li><a href="pages-coming-soon.html"><i class="sl sl-icon-hourglass"></i> Coming Soon</a></li>-->
				<!--							<li><a href="pages-404.html"><i class="sl sl-icon-close"></i> 404 Page</a></li>-->
				<!--							<li><a href="pages-masonry-filtering.html"><i class="sl sl-icon-equalizer"></i> Masonry Filtering</a></li>-->
				<!--						</ul>-->
				<!--					</div>-->

				<!--					<div class="mega-menu-section">-->
				<!--						<ul>-->
				<!--							<li class="mega-menu-headline">Other</li>-->
				<!--							<li><a href="pages-elements.html"><i class="sl sl-icon-settings"></i> Elements</a></li>-->
				<!--							<li><a href="pages-pricing-tables.html"><i class="sl sl-icon-tag"></i> Pricing Tables</a></li>-->
				<!--							<li><a href="pages-typography.html"><i class="sl sl-icon-pencil"></i> Typography</a></li>-->
				<!--							<li><a href="pages-icons.html"><i class="sl sl-icon-diamond"></i> Icons</a></li>-->
				<!--						</ul>-->
				<!--					</div>-->
									
				<!--			</div>-->
				<!--		</li>-->
						
				<!--	</ul>-->
				<!--</nav>-->
				<!--<div class="clearfix"></div>-->
				<!-- Main Navigation / End -->
				
			</div>
			<!-- Left Side Content / End -->


			<!-- Right Side Content / End -->
			<div class="right-side">
				<!-- Authentication Links -->
				
                @guest
					<div class="header-widget">
						<a href="#sign-in-dialog" class="sign-in popup-with-zoom-anim"><i class="sl sl-icon-login"></i> Sign In</a>
					</div>
				@else
					<div class="header-widget">
					<!-- User Menu -->
						<div class="user-menu">
							<div class="user-name"><span><img src="images/dashboard-avatar.jpg" alt=""></span>{{$user_name}}  </div>
							<ul>
								<!--<li><a href="dashboard.html"><i class="sl sl-icon-settings"></i> Dashboard</a></li>-->
								<!--<li><a href="dashboard-messages.html"><i class="sl sl-icon-envelope-open"></i> Messages</a></li>-->
								<li><a href="/history"><i class="fas fa-dumbbell"></i>予約一覧</a></li>
								<li><a href="/add_gym"><i class="fa fa-calendar-check-o"></i>ジムの追加</a></li>
								<li><a href="{{ route('logout') }}"
	                                   onclick="event.preventDefault();
	                                                 document.getElementById('logout-form').submit();">
	                                    <i class="sl sl-icon-power"></i>{{ __('Logout') }}</a></li>
	
	                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
	                                @csrf
	                            </form>
							</ul>
						</div>
					</div>
					
					
					<!--<div class="header-widget">-->
					<!--	<li class="nav-item dropdown">-->
     <!--                       <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>-->
     <!--                           {{ Auth::user()->name }} <span class="caret"></span>-->
     <!--                       </a>-->

     <!--                       <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">-->
     <!--                           <a class="dropdown-item" href="{{ route('logout') }}"-->
     <!--                              onclick="event.preventDefault();-->
     <!--                                            document.getElementById('logout-form').submit();">-->
     <!--                               {{ __('Logout') }}-->
     <!--                           </a>-->

     <!--                           <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">-->
     <!--                               @csrf-->
     <!--                           </form>-->
     <!--                       </div>-->
     <!--                   </li>-->
     <!--               </div>-->
                @endguest
			</div>
			<!-- Right Side Content / End -->

			<!-- Sign In Popup -->
			<div id="sign-in-dialog" class="zoom-anim-dialog mfp-hide">

				<div class="small-dialog-header">
					<h3>Sign In</h3>
				</div>

				<!--Tabs -->
				<div class="sign-in-form style-1">

					<ul class="tabs-nav">
						<li class=""><a href="#tab1">Log In</a></li>
						<li><a href="#tab2">Register</a></li>
					</ul>

					<div class="tabs-container alt">

						<!-- Login -->
						<div class="tab-content" id="tab1" style="display: none;">
						<form method="POST" action="{{ route('login') }}">
                        	@csrf
                        	<form method="post" class="login">
								<p class="form-row form-row-wide">
									<label for="email">{{ __('E-Mail Address') }}
										<i class="im im-icon-Male"></i>
										<input id="email" type="email" class="input-text form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus/>

		                                @error('email')
		                                    <span class="invalid-feedback" role="alert">
		                                        <strong>{{ $message }}</strong>
		                                    </span>
		                                @enderror
									</label>
								</p>

								<p class="form-row form-row-wide">
									<label for="password">{{ __('Password') }}
										<i class="im im-icon-Lock-2"></i>
										<input id="password" type="password" class="input-text form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"/>

		                                @error('password')
		                                    <span class="invalid-feedback" role="alert">
		                                        <strong>{{ $message }}</strong>
		                                    </span>
		                                @enderror
									</label>

		                                @if (Route::has('password.request'))
		                                    <a class="btn btn-link" href="{{ route('password.request') }}">
		                                        {{ __('Forgot Your Password?') }}
		                                    </a>
		                                @endif
									<!--<span class="lost_password">-->
									<!--	<a href="#" >Lost Your Password?</a>-->
									<!--</span>-->
								</p>

								<div class="form-group row">
		                            <div class="col-md-6 offset-md-4">
		                                <div class="form-check">
		                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
		                                    <label class="form-check-label" for="remember">
		                                        {{ __('Remember Me') }}
		                                    </label>
		                                </div>
		                            </div>
		                        </div>
                                <button type="submit" class="button border margin-top-5">
                                    {{ __('Login') }}
                                </button>
									
								
							</form>
						</div>

						<!-- Register -->
						<div class="tab-content" id="tab2" style="display: none;">

							<form method="POST" action="{{ route('register') }}" class="register">
                        		@csrf
								
								<!--<input id="memstatus_id" type="hidden" name="memstatus_id" value="1">-->
								
								<p class="form-row form-row-wide">
									<label for="name">{{ __('Name') }}
										<i class="im im-icon-Male"></i>
										<input id="name" type="text" class="input-text form-control @error('name') is-invalid @enderror" 
										name="name" value="{{ old('name') }}" required autocomplete="name" autofocus/>

		                                @error('name')
		                                    <span class="invalid-feedback" role="alert">
		                                        <strong>{{ $message }}</strong>
		                                    </span>
		                                @enderror
									</label>
								</p>
									
								<p class="form-row form-row-wide">
									<label for="email">{{ __('E-Mail Address') }}
										<i class="im im-icon-Mail"></i>
										<input id="email" type="email" class="input-text form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"/>

		                                @error('email')
		                                    <span class="invalid-feedback" role="alert">
		                                        <strong>{{ $message }}</strong>
		                                    </span>
		                                @enderror
									</label>
								</p>
	
								<p class="form-row form-row-wide">
									<label for="password">{{ __('Password') }}
										<i class="im im-icon-Lock-2"></i>
										<input id="password" type="password" class="input-text form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"/>

		                                @error('password')
		                                    <span class="invalid-feedback" role="alert">
		                                        <strong>{{ $message }}</strong>
		                                    </span>
		                                @enderror
									</label>
								</p>
	
								<p class="form-row form-row-wide">
									<label for="password-confirm" >{{ __('Confirm Password') }}
										<i class="im im-icon-Lock-2"></i>
										<input id="password-confirm" type="password" class="input-text form-control" name="password_confirmation" required autocomplete="new-password"/>
									</label>
								</p>
	
								<p class="form-row form-row-wide">
									<label for="phone_num">{{ __('Phone_num') }}
										<i class="im im-icon-Lock-2"></i>
										<input id="phone_num" type="text" class="input-text form-control @error('phone_num') is-invalid @enderror" required name="phone_num" value="{{ old('phone_num') }}"/>

		                                @error('phone_num')
		                                    <span class="invalid-feedback" role="alert">
		                                        <strong>{{ $message }}</strong>
		                                    </span>
		                                @enderror
									</label>
								</p>
	
								<p class="form-row form-row-wide">
									<label for="birthday">{{ __('Birthday') }}
										<i class="im im-icon-Lock-2"></i>
										<input id="birthday" type="date" class="input-text form-control @error('birthday') is-invalid @enderror" required name="birthday"
                                       value="2000-01-01" min="1920-01-01" max="2020-12-31"/>

		                                @error('birthday')
		                                    <span class="invalid-feedback" role="alert">
		                                        <strong>{{ $message }}</strong>
		                                    </span>
		                                @enderror
									</label>
								</p>
	
								<p class="form-row form-row-wide">
									<label for="gender">{{ __('Gender') }}
										<!--<i class="im im-icon-Lock-2"></i>-->
		                                <select id="gender" class="form-control @error('gender') is-invalid @enderror" required name="gender">
		                                    <option value="" style="display: none;">選択してください</option>
		                                    <option value="1">男性</option>
		                                    <option value="2">女性</option>
		                                    <option value="3">その他</option>
		                                </select>
		
		                                @error('gender')
		                                    <span class="invalid-feedback" role="alert">
		                                        <strong>{{ $message }}</strong>
		                                    </span>
		                                @enderror
									</label>
								</p>
	
								
								<input type="submit" class="button border fw margin-top-10" name="register" value="Register" />
	
							</form>
						</div>

					</div>
				</div>
			</div>
			<!-- Sign In Popup / End -->

		</div>
	</div>
	<!-- Header / End -->

</header>
<div class="clearfix"></div>
<!-- Header Container / End -->


<main class="py-4">
    @yield('content')
</main>
@stack('js')
</body>
</html>