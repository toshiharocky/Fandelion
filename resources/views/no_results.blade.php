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
				<h3>検索結果に該当するジムが見つかりませんでした。 </h3>
				<p>We're sorry, but no resluts were found.</p>
			</section>
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

