@extends('layouts.menu')

@push('css')
    <!--<link href="{{ asset('css/〇〇.css') }}" rel="stylesheet">-->
@endpush

@section('content')

<!-- Container -->
<div class="container">
	<div class="row">
		<div class="col-md-12">
            <h3>登録内容の確認</h3>
            
            <div class="add-listing-section">
                <!-- Headline -->
    			<div class="add-listing-headline">
    				<h3><i class="sl sl-icon-doc"></i> Basic Informations</h3>
    			</div>
    			<table>
        			<tr>
        			    <td>ジムタイトル</td>
        			    <td>{{$gym_title}}</td>
        			</tr>
        			<tr>
        			    <td>ジムタイプ</td>
        			    <td>{{$gymtype_title}}</td>
        			</tr>
        			<tr>
        			    <td>広さ</td>
        			    <td>{{$area_title}}</td>
        			</tr>
        			<tr>
        			    <td>定員</td>
        			    <td>{{$guest_limit}}名</td>
        			</tr>
        			<tr>
        			    <td>ゲストの性別</td>
        			    <td>{{$guest_gender_title}}</td>
        			</tr>
    			</table>
			</div>
			<div class="add-listing-section">
                 <!--Headline -->
    			<div class="add-listing-headline">
    				<h3><i class="sl sl-icon-doc"></i> Location</h3>
    			</div>
    			<table>
        			<tr>
        			    <td>郵便番号</td>
        			    <td>{{$zip01}}</td>
        			</tr>
        			<tr>
        			    <td>住所</td>
        			    <td>{{$pref01}}{{$addr01}}{{$strt01}}</td>
        			</tr>
    			</table>
			</div>
			<div class="add-listing-section">
                 <!--Headline -->
    			<div class="add-listing-headline">
    				<h3><i class="sl sl-icon-doc"></i>Details</h3>
    			</div>
    			<table>
        			<tr>
        			    <td>ジムの説明</td>
        			    <td>{{$gym_desc}}</td>
        			</tr>
        			<tr>
        			    <td>キャンセルポリシー</td>
        			    <td>{{$cancel_policy_name}}<br>{{$cancel_policy_detail}}</td>
        			</tr>
    			</table>
			</div>
			<div class="add-listing-section">
                 <!--Headline -->
    			<div class="add-listing-headline">
    				<h3><i class="sl sl-icon-doc"></i>Equipment</h3>
    			</div>
    			<table>
    			    <th>機器</th>
    			    <th>最小重量</th>
    			    <th>最大重量</th>
    			    <th>備考</th>
    			    @for($i=0; $i<$equipment_amount; $i++)
            			<tr>
            			    <td>{{$equipment_name[$i]}}</td>
            			    <td>{{$min_weight[$i]}}</td>
            			    <td>{{$max_weight[$i]}}</td>
            			    <td>{{$note[$i]}}</td>
            			</tr>
        			@endfor
    			</table>
			</div>
			<div class="add-listing-section">
                 <!--Headline -->
    			<div class="add-listing-headline">
    				<h3><i class="sl sl-icon-doc"></i>Opening Hours</h3>
    			</div>
    			<table>
    			    <th></th>
    			    <th>開始時間</th>
    			    <th></th>
    			    <th>終了時間</th>
    			    <th>15分あたりの価格</th>
        			<tr>
        			    <td>Monday</td>
        			    <td>{{$monday_start_time}}</td>
        			    <td>〜</td>
        			    <td>{{$monday_end_time}}</td>
        			    <td>{{$monday_price}}円</td>
        			</tr>
        			<tr>
        			    <td>Tuesday</td>
        			    <td>{{$tuesday_start_time}}</td>
        			    <td>〜</td>
        			    <td>{{$tuesday_end_time}}</td>
        			    <td>{{$tuesday_price}}円</td>
        			</tr>
        			<tr>
        			    <td>Wednesday</td>
        			    <td>{{$wednesday_start_time}}</td>
        			    <td>〜</td>
        			    <td>{{$wednesday_end_time}}</td>
        			    <td>{{$wednesday_price}}円</td>
        			</tr>
        			<tr>
        			    <td>Thursday</td>
        			    <td>{{$thursday_start_time}}</td>
        			    <td>〜</td>
        			    <td>{{$thursday_end_time}}</td>
        			    <td>{{$thursday_price}}円</td>
        			</tr>
        			<tr>
        			    <td>Friday</td>
        			    <td>{{$friday_start_time}}</td>
        			    <td>〜</td>
        			    <td>{{$friday_end_time}}</td>
        			    <td>{{$friday_end_time}}円</td>
        			</tr>
        			<tr>
        			    <td>Saturday</td>
        			    <td>{{$saturday_start_time}}</td>
        			    <td>〜</td>
        			    <td>{{$saturday_end_time}}</td>
        			    <td>{{$saturday_price}}円</td>
        			</tr>
        			<tr>
        			    <td>Sunday</td>
        			    <td>{{$sunday_start_time}}</td>
        			    <td>〜</td>
        			    <td>{{$sunday_end_time}}</td>
        			    <td>{{$sunday_price}}円</td>
        			</tr>
    			</table>
			</div>
			
			
			
			
			<div style="text-align:center;">
			    <a href="javascript:history.back()" class="button margin-top-30" style="width:25%">前のページへ戻る</a>
			</div>
		    <div style="text-align:center;">f
			    <a href="gym_register" class="button margin-top-30" style="width:25%">ジム情報を登録する</a>
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
