@extends('layouts.menu')

@push('css')
    <!--<link href="{{ asset('css/〇〇.css') }}" rel="stylesheet">-->
@endpush

@section('content')
<!-- Container -->
<div class="container">

	<div class="row">
		<div class="col-md-12">

			<section id="not-found" class="center" style="margin:60px 0 0 0">
				<h3>ただいま準備中です </h3>
				<p>We're sorry, but the page you were looking for doesn't exist.</p>
			</section>
			<div style="text-align:center;">
			    <a href="javascript:history.back()" class="button margin-top-30" style="width:25%">前のページへ戻る</a>
			</div>
		    <div style="text-align:center;">
			    <a href="/" class="button margin-top-30" style="width:25%">ホームへ戻る</a>
			</div>

		</div>
	</div>

</div>


@push('js')
<!--<script src="{{ asset('js/〇〇.js') }}"></script>-->



@endpush
@endsection

