@extends('layouts.menu')

@push('css')
    <!--<link href="{{ asset('css/〇〇.css') }}" rel="stylesheet">-->
@endpush

@section('content')

<!-- Container -->
<div class="container">
	<div class="row">
		<div class="col-md-12">

			<div class="booking-confirmation-page">
				<i class="fa fa-check-circle"></i>
				<h2 class="margin-top-30">チェックアウトが完了しました！</h2>
				<h3 class="margin-top-30">{{$user_name}}さん、お疲れ様でした!!</h3>
				<p>You'll receive a confirmation email at mail@example.com</p>
				<form method="get" action="review_to_host" style="display:flex; justify-content:center;">
					<input type="hidden" name="gym_id" value={{$gym_id}}>
					<input type="hidden" name="booking_id" value={{$booking_id}}>
					<div style="width:50%;">
						<input type="button" onclick="submit();" class="button search-button margin-top-30" value="レビューをする">
					</div>
					<!--<a href="review_to_host" class="button margin-top-30">レビューをする</a>-->
				</form>
			</div>

		</div>
	</div>
</div>
<!-- Container / End -->
<!-- Content / End -->
@push('js')
<!--<script src="{{ asset('js/〇〇.js') }}"></script>-->
<script>
	gym_id = {{$gym_id}};
	console.log(gym_id);
</script>

@endpush
@endsection
