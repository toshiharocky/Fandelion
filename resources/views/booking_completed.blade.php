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
				<h2 class="margin-top-30">Thanks for your booking!</h2>
				<p>You'll receive a confirmation email at mail@example.com</p>
				<a href="dashboard-invoice.html" class="button margin-top-30">View Invoice</a>
			</div>

		</div>
	</div>
</div>
<!-- Container / End -->
<!-- Content / End -->
@push('js')
<!--<script src="{{ asset('js/〇〇.js') }}"></script>-->



@endpush
@endsection
