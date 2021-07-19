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
				<h2 class="margin-top-30">ジムの登録が完了しました</h2>
				<a href="/" class="button margin-top-30">ホームに戻る</a>
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
