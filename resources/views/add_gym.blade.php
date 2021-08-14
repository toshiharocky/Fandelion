@extends('layouts.menu')


@push('css')
    <!--<link href="{{ asset('css/〇〇.css') }}" rel="stylesheet">-->
    <style>
    	.day_check{
    		margin-bottom:0;
    	}
    	#titlebar{
    		margin-bottom:0;
    	}
    	.add_gym_map{
    		display:flex;
    		align-items:center;
    	}
    	.add_gym_map_parts{
    		width:50%;
    	}
    	#equipment_list{
    		display:flex;
    		width:100%;
    	}
    	input {
    		font-size:16px !important;
    	}
    	select {
    		font-size:16px !important;
    	}
    	textarea {
    		font-size:16px !important;
    	}
	@media (min-width: 991px){
	    	.down_arrow{
	    		display:none;
	    	}
			.add-listing-headline{
				display:flex; 
				flex-direction:row;
			}
			.day_details{
				display:none;
			}
    	}
	@media (max-width: 991px){
		.add_gym_map_parts{
    		width:100%;
    	}
    	.add_gym_map_parts > input{
    		margin-bottom:0 !important;
    	}
    	#mapbutton{
    		margin-top:20px;
    	}
    	.right_arrow{
    		display:none;
    	}
    	.add-listing-section{
    		padding:0 10px 25px;
    	}
		.add-listing-headline{
			flex-direction:column;
			padding:auto;
		}
		.day_price{
			width:100%;
			display:flex;
		}
		.price_q{
			width:90%;
		}
		.opening-day-title{
			display:none;
		}
    	#equipment_list{
    		flex-direction:column;
    	}
	}
    </style>
@endpush

@section('content')
<div class="dashboard-content" >

		<!-- Titlebar -->
		<div id="titlebar">
			<div class="row">
				<div class="col-md-12">
					<h2>ジムを追加する</h2>
				</div>
			</div>
		</div>
		@if (session('flash_message'))
            <div class="flash_message">
                {{ session('flash_message') }}
            </div>
        @endif

		<div class="row">
			<div class="col-lg-12">

				<div id="add-listing">
					<form id="gym_add_submit" method='POST' action='gym_register' enctype="multipart/form-data">
            			@csrf
						<!-- Section -->
						<div class="add-listing-section">
							
	
							<!-- Headline -->
							<!--<div class="add-listing-headline">-->
								<h3><i class="sl sl-icon-doc"></i> Basic Informations</h3>
							<!--</div>-->
	
							<!-- Title -->
							<div class="row with-forms">
								<div class="col-md-12">
									<h5>ジムタイトル <i class="tip" data-tip-content="Name of your gym"></i></h5>
									<input name="gym_title" class="search-field" type="text"  required/>
								</div>
							</div>
	
							<!-- Row -->
							<div class="row with-forms">
	
								<!-- Status -->
								<div class="col-md-6">
									<h5>ジムタイプ</h5>
									<select name="gymType_id" class="chosen-select-no-single" value="選択してください"   required>
										<option value="" style="display:none;">ジムの利用タイプを選んでください</option>	
										<option value="1" >個室</option>
										<option value="2" >住宅全体</option>
										<option value="3" >シェアスペース</option>
									</select>
								</div>
								<div class="col-md-6">
									<h5>広さ</h5>
									<select  name="area" class="chosen-select-no-single" value="選択してください"   required>
										<option value="" style="display:none;">使用可能なエリアの面積を選んでください</option>	
										// heroku用
										<option value="5" >〜10㎡</option>
										<option value="15" >10〜20㎡</option>
										<option value="25" >30〜40㎡</option>
										<option value="35" >40〜50㎡</option>
										<option value="45" >50㎡以上</option>
										// cloud9用
										<!--<option value="1" >〜10㎡</option>-->
										<!--<option value="2" >10〜20㎡</option>-->
										<!--<option value="3" >30〜40㎡</option>-->
										<!--<option value="4" >40〜50㎡</option>-->
										<!--<option value="5" >50㎡以上</option>-->
									</select>
								</div>
								<div class="col-md-6">
									<h5>定員</h5>
									<div style="display:flex; flex-direction:row;">
										<input name="guest_limit" placeholder="定員数を記入してください" required>
										<span style="margin:auto; margin-left:10px;">
											名
										</span>
										</input>
									</div>
								</div>
								<div class="col-md-6">
									<h5>ゲストの性別</h5>
									<select  type="integer"name="guest_gender" class="chosen-select-no-single" value="選択してください"   required>
										<option value="" style="display:none;">ゲストの性別に関する要望を記入してください</option>	
										<option value="1" >特になし</option>
										<option value="2" >女性限定</option>
										<option value="3" >男性限定</option>
										<option value="4" >女性限定(女性同伴の場合は男性も可)</option>
										<option value="5" >男性限定(男性同伴の場合は可)</option>
									</select>
								</div>
							</div>
							<div class="row with-forms">
	
								<!-- Type -->
								<!--<div class="col-md-12">-->
								<!--	<h5>ジムの説明 <i class="tip" data-tip-content="400字以内でジムのアピールポイントを説明してください"></i></h5>-->
								<!--	<input id="gym_desc" type="text" placeholder="">-->
								<!--</div>-->
	
							</div>
							<!-- Row / End -->
	
						</div>
						<!-- Section / End -->
	
						<!-- Section -->
						<div class="add-listing-section margin-top-45">
	
							<!-- Headline -->
							<!--<div class="add-listing-headline">-->
							<h3><i class="sl sl-icon-location"></i> Location</h3>
							<!--</div>-->
	
							<div class="submit-section">
	
								<!-- Row -->
								<div class="row with-forms">
	
									<!-- City -->
									<!--<div class="col-md-6">-->
									<!--	<h5>City</h5>-->
									<!--	<select class="chosen-select-no-single" >-->
									<!--		<option label="blank">Select City</option>	-->
									<!--		<option>New York</option>-->
									<!--		<option>Los Angeles</option>-->
									<!--		<option>Chicago</option>-->
									<!--		<option>Houston</option>-->
									<!--		<option>Phoenix</option>-->
									<!--		<option>San Diego</option>-->
									<!--		<option>Austin</option>-->
									<!--	</select>-->
									<!--</div>-->
	
									<!-- Address -->
									<!--<div class="col-md-6">-->
									<!--	<h5>Address</h5>-->
									<!--	<input type="text" placeholder="e.g. 964 School Street">-->
									<!--</div>-->
	
									<!-- City -->
									<!--<div class="col-md-6">-->
									<!--	<h5>State</h5>-->
									<!--	<input type="text">-->
									<!--</div>-->
	
									<!-- Zip-Code -->
									<div class="col-md-6 add_gym_map">
										<div class="add_gym_map_parts">
											<!--<h5>Zip-Code</h5>-->
											<h4>〒</h4>
											<input class="col-md-3" type="text" name="zip01" size="10" maxlength="8" onKeyUp="AjaxZip3.zip2addr(this,'','pref01','addr01','strt01');"><br>
											<input class="col-md-3" type="text" name="pref01" size="20"><br>
											<input class="col-md-6" id="address" type="text" name="addr01" size="60"><br>
											<input class="col-md-6" id="street" type="text" name="strt01" size="60">
    										<input id="mapbutton" type="button" value="Encode" onclick="codeAddress()">
										</div>
										<div style="width:5%; text-align:center;" class="right_arrow">
											<i class="fas fa-caret-right" style="font-size:60px"></i>
										</div>
										<div style="width:100%; text-align:center;" class="down_arrow">
											<i class="fas fa-caret-down " style="font-size:80px"></i>
										</div>
										<div class="add_gym_map_parts">
											<h5>ジムの所在地へドラッグしてください</h5>
											<div id="map"  style="width:100%; height:300px;"></div>
											<div id="map_place">
												<input name="longitude" type="hidden" required>
												<input name="latitude" type="hidden" required>
											</div>
										</div>
									</div>
	
								</div>
								<!-- Row / End -->
	
							</div>
						</div>
						<!-- Section / End -->
	
	
						<!-- Section -->
						<div class="add-listing-section margin-top-45">
	
							<!-- Headline -->
							<!--<div class="add-listing-headline">-->
							<h3><i class="sl sl-icon-picture"></i> Gallery</h3>
							<!--</div>-->
	
							<!-- Dropzone -->
							<div class="submit-section">
								<input type="file" class="dropzone" name="images[]" multiple>
							</div>
	
						</div>
						<!-- Section / End -->
	
	
						<!-- Section -->
						<div class="add-listing-section margin-top-45">
	
							<!-- Headline -->
							<!--<div class="add-listing-headline">-->
							<h3><i class="sl sl-icon-docs"></i> Details</h3>
							<!--</div>-->
	
							<!-- Description -->
							<div class="form">
								<h5>ジムの説明</h5>
								<textarea name="gym_desc" class="WYSIWYG" name="summary" cols="40" rows="3" spellcheck="true"></textarea>
								<h5>キャンセルポリシー</h5>
								<input type="radio" name="cancel_policy_id" value="1" checked>柔軟
								<p>チェックイン（確認メールに記載の日時）の1時間前までは無料でキャンセルできます。</p>
								<input type="radio" name="cancel_policy_id" value="2">普通
								<p>チェックイン（確認メールに記載の日時）の24時間前までは無料でキャンセルできます。</p>
								<input type="radio" name="cancel_policy_id" value="3">厳格
								<p>チェックイン（確認メールに記載の日時）の3日前までは無料でキャンセルできます。</p>
								<input type="radio" name="cancel_policy_id" value="4">かなり厳格
								<p>チェックイン（確認メールに記載の日時）の7日前までは無料でキャンセルできます。</p>
							</div>
	
							
						</div>
						<!-- Section / End -->
						
						<!-- Section -->
						<div class="add-listing-section margin-top-45">
							
							<!-- Headline -->
							<!--<div class="add-listing-headline">-->
							<h3><i class="sl sl-icon-book-open"></i>Equipment</h3>
								<!-- Switcher -->
								<!--<label class="switch"><input type="checkbox" checked><span class="slider round"></span></label>-->
							<!--</div>-->
	
							<!-- Switcher ON-OFF Content -->
							<!--<div class="switcher-content">-->
	
								<div class="row">
									<div class="col-md-12">
										<table id="pricing-list-container">
											<tr class="pricing-list-item pattern">
												<td style="text-align:center;">
													<!--<div class="fm-move"><i class="sl sl-icon-cursor-move"></i></div>-->
													<!--<div>-->
														<div class="fm-close"style="text-align:center; width:10%; box-sizing:border-box;">
															<a class="delete" ><i class="fa fa-remove"></i></a>
														</div>
														<div style="width:90%;">
															<div id="equipment_list">
																<div class="fm-input col-md-12" style="margin-right:0; box-sizing:border-box;">
																	<input list="equipment-list" name="equipment_name[]" type="text" placeholder="選択肢から選択 or 直接入力" />
																	<datalist id="equipment-list">
																		<option value="ダンベル">ダンベル</option>
																		<option value="バーベル">バーベル</option>
																		<option value="ベンチプレス">ベンチプレス</option>
																		<option value="スクワットラック">スクワットラック</option>
																		<option value="スミスマシン">スミスマシン</option>
																		<option value="トレッドミル">トレッドミル</option>
																		<option value="エアロバイク">エアロバイク</option>
																	</datalist>
																</div>
																<div style="display:flex;">
																	<div class="fm-input col-md-3"  style="margin-right:0; box-sizing:border-box;">
																		<input name="min_weight[]" placeholder="Min" style="text-align:right;"/>
																	</div>
																	<p style="display: inline-block; vertical-align: bottom; margin-right:0; width:7%; box-sizing:border-box;">kg ~ </p>
																	<div class="fm-input col-md-3" style="margin-right:0;">
																		<input name="max_weight[]" placeholder="Max" style="text-align:right;"/>
																	</div>
																	<p style="display: inline-block; vertical-align: bottom; margin-right:0; width:3%; box-sizing:border-box;">kg</p>
																</div>
															</div>
															<div class="fm-input col-md-12" style="margin-right:0; box-sizing:border-box;">
																<input name="note[]" type="text" placeholder="備考"/>
															</div>
														</div>
													<!--</div>-->
													<!--<div class="fm-input "><input type="text" placeholder="Price" data-unit="USD" /></div>-->
												</td>
												
											</tr>
										</table>
										<a href="#" class="button add-pricing-list-item">Add Item</a>
										<!--<a href="#" class="button add-pricing-submenu">Add Category</a>-->
									</div>
								</div>
	
							<!--</div>-->
							<!-- Switcher ON-OFF Content / End -->
	
						</div>
						<!-- Section / End -->
	
	
	
						<!-- Section -->
						<div class=" margin-top-45">
							
							<!-- Headline -->
							<div>
								<h3 style="margin-right:10%;"><i class="sl sl-icon-clock"></i> Opening Hours</h3>
								<!-- Date Range Picker - docs: http://www.daterangepicker.com/ -->
								<p>開始日</p>
								<div class="col-lg-3">	
									<input type="text" id="date-picker" name="start_date" placeholder="Date" readonly="readonly">
								</div>
								<!--  Initial Duration -->
								<p>適用期間</p>
								<div class="col-lg-3">	
									<select type="integer" name="initial_duration" placeholder="Date" readonly="readonly">
										<option value="7"> 7日</option>
										<option value="30" disabled> 30日</option>
										<option value="90" disabled>90日</option>
										<option value="180" disabled>180日</option>
									</select>
								</div>
								
								<!-- Switcher -->
								<!--<label class="switch"><input type="checkbox" checked><span class="slider round"></span></label>-->
								<!-- Switcher ON-OFF Content -->
								<!--<div class="switcher-content">-->
							</div>
							
							
							
		

							
	
								<!-- Day -->
								<div class="row opening-day row opening-day-title">
									<div class="col-md-2"></div>
									<div class="col-md-3" style="text-align:center;"><h5>開始時間</h5></div>
									<div class="col-md-1"></div>
									<div class="col-md-3" style="text-align:center;"><h5>終了時間</h5></div>
									<div class="col-md-2" style="text-align:center;"><h5>15分あたりの価格</h5></div>
								</div>
								<div class="day_details">
									<p>曜日別営業時間 & 価格</p>
								</div>
								<div class="row opening-day">
									<div class="col-md-2" style="display:flex; flex-direction:row; align-items:center; justify-content:space-between;">
										<h5>Monday</h5>
										<input id="mon_check" class="day_check" type="checkbox" checked style="width:20px; height:20px;">
									</div>
									
	
							<!-- Switcher ON-OFF Content -->
									<div id="mon_detail">
										<div class="col-md-3">
											<select type="text" name="monday_start_time" data-placeholder="Opening Time">
												
												<!--<option>Closed</option>-->
												<option value="00:00">00:00</option>
												<option value="01:00">01:00</option>
												<option value="02:00">02:00</option>
												<option value="03:00">03:00</option>
												<option value="04:00">04:00</option>
												<option value="05:00">05:00</option>
												<option value="06:00">06:00</option>
												<option value="07:00">07:00</option>
												<option value="08:00">08:00</option>
												<option value="09:00">09:00</option>
												<option value="10:00" selected>10:00</option>
												<option value="11:00">11:00</option>
												<option value="12:00">12:00</option>	
												<option value="13:00">13:00</option>
												<option value="14:00">14:00</option>
												<option value="15:00">15:00</option>
												<option value="16:00">16:00</option>
												<option value="17:00">17:00</option>
												<option value="18:00">18:00</option>
												<option value="19:00">19:00</option>
												<option value="20:00">20:00</option>
												<option value="21:00">21:00</option>
												<option value="22:00">22:00</option>
												<option value="23:00">23:00</option>
												<option value="24:00">24:00</option>
											</select>
										</div>
										<div class="col-md-1" style="text-align:center;"><h5> 〜 </h5></div>
										<div class="col-md-3">
											<select name="monday_end_time" data-placeholder="Closing Time">
												
												<!--<option>Closed</option>-->
												<option value="00:00">00:00</option>
												<option value="01:00">01:00</option>
												<option value="02:00">02:00</option>
												<option value="03:00">03:00</option>
												<option value="04:00">04:00</option>
												<option value="05:00">05:00</option>
												<option value="06:00">06:00</option>
												<option value="07:00">07:00</option>
												<option value="08:00">08:00</option>
												<option value="09:00">09:00</option>
												<option value="10:00" selected>10:00</option>
												<option value="11:00">11:00</option>
												<option value="12:00">12:00</option>	
												<option value="13:00">13:00</option>
												<option value="14:00">14:00</option>
												<option value="15:00">15:00</option>
												<option value="16:00">16:00</option>
												<option value="17:00">17:00</option>
												<option value="18:00">18:00</option>
												<option value="19:00">19:00</option>
												<option value="20:00">20:00</option>
												<option value="21:00">21:00</option>
												<option value="22:00">22:00</option>
												<option value="23:00">23:00</option>
												<option value="24:00">24:00</option>
											</select>
										</div>
										<div id="price_mon" class="day_price">
											<div class="col-md-2 price_q">
												<input name="monday_price" style="text-align:right;" placeholder="15分あたりの価格" required>
											</div>
											<div class="col-md-1" style="padding-left:0;"><h5> 円 </h5></div>
										</div>
									</div>
								</div>
							<!-- Day / End -->
								
								<!-- Day -->
								<div class="row opening-day js-demo-hours">
									<div class="col-md-2" style="display:flex; flex-direction:row; align-items:center; justify-content:space-between;">
										<h5>Tuesday</h5>
										<input id="tue_check" class="day_check" type="checkbox" checked style="width:20px; height:20px;">
									</div>
									<!-- Switcher ON-OFF Content -->
									<div id="tue_detail">
										<div class="col-md-3">
											<select type="text" name="tuesday_start_time" data-placeholder="Opening Time">
												
												<option>Closed</option>
												<option value="00:00">00:00</option>
												<option value="01:00">01:00</option>
												<option value="02:00">02:00</option>
												<option value="03:00">03:00</option>
												<option value="04:00">04:00</option>
												<option value="05:00">05:00</option>
												<option value="06:00">06:00</option>
												<option value="07:00">07:00</option>
												<option value="08:00">08:00</option>
												<option value="09:00">09:00</option>
												<option value="10:00" selected>10:00</option>
												<option value="11:00">11:00</option>
												<option value="12:00">12:00</option>	
												<option value="13:00">13:00</option>
												<option value="14:00">14:00</option>
												<option value="15:00">15:00</option>
												<option value="16:00">16:00</option>
												<option value="17:00">17:00</option>
												<option value="18:00">18:00</option>
												<option value="19:00">19:00</option>
												<option value="20:00">20:00</option>
												<option value="21:00">21:00</option>
												<option value="22:00">22:00</option>
												<option value="23:00">23:00</option>
												<option value="24:00">24:00</option>
											</select>
										</div>
										<div class="col-md-1" style="text-align:center;"><h5> 〜 </h5></div>
										<div class="col-md-3">
											<select name="tuesday_end_time" data-placeholder="Closing Time">
												
												<option>Closed</option>
												<option value="00:00">00:00</option>
												<option value="01:00">01:00</option>
												<option value="02:00">02:00</option>
												<option value="03:00">03:00</option>
												<option value="04:00">04:00</option>
												<option value="05:00">05:00</option>
												<option value="06:00">06:00</option>
												<option value="07:00">07:00</option>
												<option value="08:00">08:00</option>
												<option value="09:00">09:00</option>
												<option value="10:00" selected>10:00</option>
												<option value="11:00">11:00</option>
												<option value="12:00">12:00</option>	
												<option value="13:00">13:00</option>
												<option value="14:00">14:00</option>
												<option value="15:00">15:00</option>
												<option value="16:00">16:00</option>
												<option value="17:00">17:00</option>
												<option value="18:00">18:00</option>
												<option value="19:00">19:00</option>
												<option value="20:00">20:00</option>
												<option value="21:00">21:00</option>
												<option value="22:00">22:00</option>
												<option value="23:00">23:00</option>
												<option value="24:00">24:00</option>
											</select>
										</div>
										<div id="price_tue" class="day_price">
											<div class="col-md-2 price_q">
												<input name="tuesday_price" style="text-align:right;" placeholder="15分あたりの価格" required>
											</div>
											<div class="col-md-1" style="padding-left:0;"><h5> 円 </h5></div>
										</div>
									</div>
								</div>
								<!-- Day / End -->
	
								<!-- Day -->
								<div class="row opening-day js-demo-hours">
									<div class="col-md-2" style="display:flex; flex-direction:row; align-items:center; justify-content:space-between;">
										<h5>Wednesday</h5>
										<input id="wed_check" class="day_check" type="checkbox" checked style="width:20px; height:20px;">
									</div>
									<!-- Switcher ON-OFF Content -->
									<div id="wed_detail">
										<div class="col-md-3">
											<select type="text" name="wednesday_start_time" data-placeholder="Opening Time">
												
												<option>Closed</option>
												<option value="00:00">00:00</option>
												<option value="01:00">01:00</option>
												<option value="02:00">02:00</option>
												<option value="03:00">03:00</option>
												<option value="04:00">04:00</option>
												<option value="05:00">05:00</option>
												<option value="06:00">06:00</option>
												<option value="07:00">07:00</option>
												<option value="08:00">08:00</option>
												<option value="09:00">09:00</option>
												<option value="10:00" selected>10:00</option>
												<option value="11:00">11:00</option>
												<option value="12:00">12:00</option>	
												<option value="13:00">13:00</option>
												<option value="14:00">14:00</option>
												<option value="15:00">15:00</option>
												<option value="16:00">16:00</option>
												<option value="17:00">17:00</option>
												<option value="18:00">18:00</option>
												<option value="19:00">19:00</option>
												<option value="20:00">20:00</option>
												<option value="21:00">21:00</option>
												<option value="22:00">22:00</option>
												<option value="23:00">23:00</option>
												<option value="24:00">24:00</option>
											</select>
										</div>
										<div class="col-md-1" style="text-align:center;"><h5> 〜 </h5></div>
										<div class="col-md-3">
											<select name="wednesday_end_time" data-placeholder="Closing Time">
												
												<option>Closed</option>
												<option value="00:00">00:00</option>
												<option value="01:00">01:00</option>
												<option value="02:00">02:00</option>
												<option value="03:00">03:00</option>
												<option value="04:00">04:00</option>
												<option value="05:00">05:00</option>
												<option value="06:00">06:00</option>
												<option value="07:00">07:00</option>
												<option value="08:00">08:00</option>
												<option value="09:00">09:00</option>
												<option value="10:00" selected>10:00</option>
												<option value="11:00">11:00</option>
												<option value="12:00">12:00</option>	
												<option value="13:00">13:00</option>
												<option value="14:00">14:00</option>
												<option value="15:00">15:00</option>
												<option value="16:00">16:00</option>
												<option value="17:00">17:00</option>
												<option value="18:00">18:00</option>
												<option value="19:00">19:00</option>
												<option value="20:00">20:00</option>
												<option value="21:00">21:00</option>
												<option value="22:00">22:00</option>
												<option value="23:00">23:00</option>
												<option value="24:00">24:00</option>
											</select>
										</div>
										<div id="price_wed" class="day_price">
											<div class="col-md-2 price_q">
												<input name="wednesday_price" style="text-align:right;" placeholder="15分あたりの価格" required>
											</div>
											<div class="col-md-1" style="padding-left:0;"><h5> 円 </h5></div>
										</div>
									</div>
								</div>
								<!-- Day / End -->
	
								<!-- Day -->
								<div class="row opening-day js-demo-hours">
									<div class="col-md-2" style="display:flex; flex-direction:row; align-items:center; justify-content:space-between;">
										<h5>Thursday</h5>
										<input id="thur_check" class="day_check" type="checkbox" checked style="width:20px; height:20px;">
									</div>
									<!-- Switcher ON-OFF Content -->
									<div id="thur_detail">
										<div class="col-md-3">
											<select type="text" name="thursday_start_time" data-placeholder="Opening Time">
												
												<option>Closed</option>
												<option value="00:00">00:00</option>
												<option value="01:00">01:00</option>
												<option value="02:00">02:00</option>
												<option value="03:00">03:00</option>
												<option value="04:00">04:00</option>
												<option value="05:00">05:00</option>
												<option value="06:00">06:00</option>
												<option value="07:00">07:00</option>
												<option value="08:00">08:00</option>
												<option value="09:00">09:00</option>
												<option value="10:00" selected>10:00</option>
												<option value="11:00">11:00</option>
												<option value="12:00">12:00</option>	
												<option value="13:00">13:00</option>
												<option value="14:00">14:00</option>
												<option value="15:00">15:00</option>
												<option value="16:00">16:00</option>
												<option value="17:00">17:00</option>
												<option value="18:00">18:00</option>
												<option value="19:00">19:00</option>
												<option value="20:00">20:00</option>
												<option value="21:00">21:00</option>
												<option value="22:00">22:00</option>
												<option value="23:00">23:00</option>
												<option value="24:00">24:00</option>
											</select>
										</div>
										<div class="col-md-1" style="text-align:center;"><h5> 〜 </h5></div>
										<div class="col-md-3">
											<select name="thursday_end_time" data-placeholder="Closing Time">
												
												<option>Closed</option>
												<option value="00:00">00:00</option>
												<option value="01:00">01:00</option>
												<option value="02:00">02:00</option>
												<option value="03:00">03:00</option>
												<option value="04:00">04:00</option>
												<option value="05:00">05:00</option>
												<option value="06:00">06:00</option>
												<option value="07:00">07:00</option>
												<option value="08:00">08:00</option>
												<option value="09:00">09:00</option>
												<option value="10:00" selected>10:00</option>
												<option value="11:00">11:00</option>
												<option value="12:00">12:00</option>	
												<option value="13:00">13:00</option>
												<option value="14:00">14:00</option>
												<option value="15:00">15:00</option>
												<option value="16:00">16:00</option>
												<option value="17:00">17:00</option>
												<option value="18:00">18:00</option>
												<option value="19:00">19:00</option>
												<option value="20:00">20:00</option>
												<option value="21:00">21:00</option>
												<option value="22:00">22:00</option>
												<option value="23:00">23:00</option>
												<option value="24:00">24:00</option>
											</select>
										</div>
										<div id="price_thur" class="day_price">
											<div class="col-md-2 price_q">
												<input name="thursday_price" style="text-align:right;" placeholder="15分あたりの価格" required>
											</div>
											<div class="col-md-1" style="padding-left:0;"><h5> 円 </h5></div>
										</div>
									</div>
								</div>
								<!-- Day / End -->
	
								<!-- Day -->
								<div class="row opening-day js-demo-hours">
									<div class="col-md-2" style="display:flex; flex-direction:row; align-items:center; justify-content:space-between;">
										<h5>Friday</h5>
										<input id="fri_check" class="day_check" type="checkbox" checked style="width:20px; height:20px;">
									</div>
									<!-- Switcher ON-OFF Content -->
									<div id="fri_detail">
										<div class="col-md-3">
											<select type="text" name="friday_start_time" data-placeholder="Opening Time">
												
												<option>Closed</option>
												<option value="00:00">00:00</option>
												<option value="01:00">01:00</option>
												<option value="02:00">02:00</option>
												<option value="03:00">03:00</option>
												<option value="04:00">04:00</option>
												<option value="05:00">05:00</option>
												<option value="06:00">06:00</option>
												<option value="07:00">07:00</option>
												<option value="08:00">08:00</option>
												<option value="09:00">09:00</option>
												<option value="10:00" selected>10:00</option>
												<option value="11:00">11:00</option>
												<option value="12:00">12:00</option>	
												<option value="13:00">13:00</option>
												<option value="14:00">14:00</option>
												<option value="15:00">15:00</option>
												<option value="16:00">16:00</option>
												<option value="17:00">17:00</option>
												<option value="18:00">18:00</option>
												<option value="19:00">19:00</option>
												<option value="20:00">20:00</option>
												<option value="21:00">21:00</option>
												<option value="22:00">22:00</option>
												<option value="23:00">23:00</option>
												<option value="24:00">24:00</option>
											</select>
										</div>
										<div class="col-md-1" style="text-align:center;"><h5> 〜 </h5></div>
										<div class="col-md-3">
											<select name="friday_end_time" data-placeholder="Closing Time">
												
												<option>Closed</option>
												<option value="00:00">00:00</option>
												<option value="01:00">01:00</option>
												<option value="02:00">02:00</option>
												<option value="03:00">03:00</option>
												<option value="04:00">04:00</option>
												<option value="05:00">05:00</option>
												<option value="06:00">06:00</option>
												<option value="07:00">07:00</option>
												<option value="08:00">08:00</option>
												<option value="09:00">09:00</option>
												<option value="10:00" selected>10:00</option>
												<option value="11:00">11:00</option>
												<option value="12:00">12:00</option>	
												<option value="13:00">13:00</option>
												<option value="14:00">14:00</option>
												<option value="15:00">15:00</option>
												<option value="16:00">16:00</option>
												<option value="17:00">17:00</option>
												<option value="18:00">18:00</option>
												<option value="19:00">19:00</option>
												<option value="20:00">20:00</option>
												<option value="21:00">21:00</option>
												<option value="22:00">22:00</option>
												<option value="23:00">23:00</option>
												<option value="24:00">24:00</option>
											</select>
										</div>
										<div id="price_fri" class="day_price">
											<div class="col-md-2 price_q">
												<input name="friday_price" style="text-align:right;" placeholder="15分あたりの価格" required>
											</div>
											<div class="col-md-1" style="padding-left:0;"><h5> 円 </h5></div>
										</div>
									</div>
								</div>
								<!-- Day / End -->
	
								<!-- Day -->
								<div class="row opening-day js-demo-hours">
									<div class="col-md-2" style="display:flex; flex-direction:row; align-items:center; justify-content:space-between;">
										<h5>Saturday</h5>
										<input id="sat_check" class="day_check" type="checkbox" checked style="width:20px; height:20px;">
									</div>
									<!-- Switcher ON-OFF Content -->
									<div id="sat_detail">
										<div class="col-md-3">
											<select type="text" name="saturday_start_time" data-placeholder="Opening Time">
												
												<option>Closed</option>
												<option value="00:00">00:00</option>
												<option value="01:00">01:00</option>
												<option value="02:00">02:00</option>
												<option value="03:00">03:00</option>
												<option value="04:00">04:00</option>
												<option value="05:00">05:00</option>
												<option value="06:00">06:00</option>
												<option value="07:00">07:00</option>
												<option value="08:00">08:00</option>
												<option value="09:00">09:00</option>
												<option value="10:00" selected>10:00</option>
												<option value="11:00">11:00</option>
												<option value="12:00">12:00</option>	
												<option value="13:00">13:00</option>
												<option value="14:00">14:00</option>
												<option value="15:00">15:00</option>
												<option value="16:00">16:00</option>
												<option value="17:00">17:00</option>
												<option value="18:00">18:00</option>
												<option value="19:00">19:00</option>
												<option value="20:00">20:00</option>
												<option value="21:00">21:00</option>
												<option value="22:00">22:00</option>
												<option value="23:00">23:00</option>
												<option value="24:00">24:00</option>
											</select>
										</div>
										<div class="col-md-1" style="text-align:center;"><h5> 〜 </h5></div>
										<div class="col-md-3">
											<select name="saturday_end_time" data-placeholder="Closing Time">
												
												<option>Closed</option>
												<option value="00:00">00:00</option>
												<option value="01:00">01:00</option>
												<option value="02:00">02:00</option>
												<option value="03:00">03:00</option>
												<option value="04:00">04:00</option>
												<option value="05:00">05:00</option>
												<option value="06:00">06:00</option>
												<option value="07:00">07:00</option>
												<option value="08:00">08:00</option>
												<option value="09:00">09:00</option>
												<option value="10:00" selected>10:00</option>
												<option value="11:00">11:00</option>
												<option value="12:00">12:00</option>	
												<option value="13:00">13:00</option>
												<option value="14:00">14:00</option>
												<option value="15:00">15:00</option>
												<option value="16:00">16:00</option>
												<option value="17:00">17:00</option>
												<option value="18:00">18:00</option>
												<option value="19:00">19:00</option>
												<option value="20:00">20:00</option>
												<option value="21:00">21:00</option>
												<option value="22:00">22:00</option>
												<option value="23:00">23:00</option>
												<option value="24:00">24:00</option>
											</select>
										</div>
										<div id="price_sat" class="day_price">
											<div class="col-md-2 price_q">
												<input name="saturday_price" style="text-align:right;" placeholder="15分あたりの価格" required>
											</div>
											<div class="col-md-1" style="padding-left:0;"><h5> 円 </h5></div>
										</div>
									</div>
								</div>
								<!-- Day / End -->
	
								<!-- Day -->
								<div class="row opening-day js-demo-hours">
									<div class="col-md-2" style="display:flex; flex-direction:row; align-items:center; justify-content:space-between;">
										<h5>Sunday</h5>
										<input id="sun_check" class="day_check" type="checkbox" checked style="width:20px; height:20px;">
									</div>
									<!-- Switcher ON-OFF Content -->
									<div id="sun_detail">
										<div class="col-md-3">
											<select type="text" name="sunday_start_time" data-placeholder="Opening Time">
												
												<option>Closed</option>
												<option value="00:00">00:00</option>
												<option value="01:00">01:00</option>
												<option value="02:00">02:00</option>
												<option value="03:00">03:00</option>
												<option value="04:00">04:00</option>
												<option value="05:00">05:00</option>
												<option value="06:00">06:00</option>
												<option value="07:00">07:00</option>
												<option value="08:00">08:00</option>
												<option value="09:00">09:00</option>
												<option value="10:00" selected>10:00</option>
												<option value="11:00">11:00</option>
												<option value="12:00">12:00</option>	
												<option value="13:00">13:00</option>
												<option value="14:00">14:00</option>
												<option value="15:00">15:00</option>
												<option value="16:00">16:00</option>
												<option value="17:00">17:00</option>
												<option value="18:00">18:00</option>
												<option value="19:00">19:00</option>
												<option value="20:00">20:00</option>
												<option value="21:00">21:00</option>
												<option value="22:00">22:00</option>
												<option value="23:00">23:00</option>
												<option value="24:00">24:00</option>
											</select>
										</div>
										<div class="col-md-1" style="text-align:center;"><h5> 〜 </h5></div>
										<div class="col-md-3">
											<select name="sunday_end_time" data-placeholder="Closing Time">
												
												<option>Closed</option>
												<option value="00:00">00:00</option>
												<option value="01:00">01:00</option>
												<option value="02:00">02:00</option>
												<option value="03:00">03:00</option>
												<option value="04:00">04:00</option>
												<option value="05:00">05:00</option>
												<option value="06:00">06:00</option>
												<option value="07:00">07:00</option>
												<option value="08:00">08:00</option>
												<option value="09:00">09:00</option>
												<option value="10:00" selected>10:00</option>
												<option value="11:00">11:00</option>
												<option value="12:00">12:00</option>	
												<option value="13:00">13:00</option>
												<option value="14:00">14:00</option>
												<option value="15:00">15:00</option>
												<option value="16:00">16:00</option>
												<option value="17:00">17:00</option>
												<option value="18:00">18:00</option>
												<option value="19:00">19:00</option>
												<option value="20:00">20:00</option>
												<option value="21:00">21:00</option>
												<option value="22:00">22:00</option>
												<option value="23:00">23:00</option>
												<option value="24:00">24:00</option>
											</select>
										</div>
										<div id="price_sun" class="day_price">
											<div class="col-md-2 price_q">
												<input name="sunday_price" style="text-align:right;" placeholder="15分あたりの価格" required>
											</div>
											<div class="col-md-1" style="padding-left:0;"><h5> 円 </h5></div>
										</div>
									</div>
								</div>
								<!-- Day / End -->
	
							</div>
							<!-- Switcher ON-OFF Content / End -->
	
						</div>
						<!-- Section / End -->
	
	
						
	
	
						<div style="width:95%; text-align:right;">
							<input type="submit" class="button preview" value="登録する"></input>
						</div>
					</form>
				</div>
				
			</div>

			

		</div>

	</div>
	<!-- Content / End -->
@push('js')
    <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
    <script src="https://maps.google.com/maps/api/js?key=AIzaSyBI-9n6pQ1Vqktbyg8LGjLW-NCPsa6SQ5g&language=ja"></script>
    
    <script>
		
		var geocoder;
		var map;
		geocoder = new google.maps.Geocoder();
		
		var LatLng = new google.maps.LatLng(35.6811673, 139.7670516);
		var mapOptions = {
		 zoom: 18,      //地図の縮尺値
		 center: LatLng,    //地図の中心座標
		 mapTypeId: 'roadmap'   //地図の種類
		};
	    map = new google.maps.Map(document.getElementById('map'), mapOptions);
		
		
		
		function codeAddress() {
			
		    var address = document.getElementById('address').value + document.getElementById('street').value;
		    var pos = "";
			var lng = "";
			var lat = "";
			
		    geocoder.geocode( { 'address': address}, function(results, status) {
		      if (status == 'OK') {
		        map.setCenter(results[0].geometry.location);
		        var marker = new google.maps.Marker({
		            map: map,
		            position: results[0].geometry.location,
	            	draggable: true,
		        });
				pos = marker.getPosition();
				lng_str = pos.lng();
				lng = parseFloat(lng_str);
				lat_str = pos.lat();
				lat = parseFloat(lat_str);
				
				console.log(lng);
				console.log(lat);
				$("#map_place").empty();
				$("#map_place").append(
					`<input name="longitude" type="hidden" value="${lng}" required>
					<input name="latitude" type="hidden" value="${lat}" required>`
				);
		        
		      } else {
		        alert('Geocode was not successful for the following reason: ' + status);
		      }
		      
	      // Event
			marker.addListener( "position_changed", function () {
				pos = marker.getPosition();
				lng_str = pos.lng();
				lng = parseFloat(lng_str)
				lat_str = pos.lat();
				lat = parseFloat(lat_str);
				console.log(lng);
				console.log(lat);
				$("#map_place").empty();
				$("#map_place").append(
					`<input name="longitude" type="hidden" value="${lng}">
					<input name="latitude" type="hidden" value="${lat}">`
				);
			})
		  })};
		  
		  
	  </script>
	  <script>
	  	// Calendar Init
			$(function() {
				$('#date-picker').daterangepicker({
					"opens": "left",
					singleDatePicker: true,
			
					// Disabling Date Ranges
					isInvalidDate: function(date) {
					// Disabling Date Range
					var disabled_start = moment('09/02/2018', 'MM/DD/YYYY');
					var disabled_end = moment('09/06/2018', 'MM/DD/YYYY');
					return date.isAfter(disabled_start) && date.isBefore(disabled_end);
			
					// Disabling Single Day
					// if (date.format('MM/DD/YYYY') == '08/08/2018') {
					//     return true; 
					// }
					}
				});
			});
			
			// Calendar animation
			$('#date-picker').on('showCalendar.daterangepicker', function(ev, picker) {
				$('.daterangepicker').addClass('calendar-animated');
			});
			$('#date-picker').on('show.daterangepicker', function(ev, picker) {
				$('.daterangepicker').addClass('calendar-visible');
				$('.daterangepicker').removeClass('calendar-hidden');
			});
			$('#date-picker').on('hide.daterangepicker', function(ev, picker) {
				$('.daterangepicker').removeClass('calendar-visible');
				$('.daterangepicker').addClass('calendar-hidden');
			});
	  </script>
	  <script>
	  
	 $('#mon_check').on("click",function(){
    	
	 	// prop()でチェックの状態を取得
    	if($('#mon_check').prop('checked')){
    		$('#price_mon').empty();
    		$('#mon_detail').show();
    		$('#price_mon').append(
    		'<div class="col-md-2"><input name="monday_price" style="text-align:right;" placeholder="15分あたりの価格" required></div>',
			'<div class="col-md-1" style="padding-left:0;"><h5> 円 </h5></div>');
    	}else{
    		$('#mon_detail').hide();
    		$('#price_mon').empty();
    	}
	 });
	 
	 $('#tue_check').on("click",function(){
    	
	 	// prop()でチェックの状態を取得
    	if($('#tue_check').prop('checked')){
    		$('#price_tue').empty();
    		$('#tue_detail').show();
    		$('#price_tue').append(
    		'<div class="col-md-2"><input name="tuesday_price" style="text-align:right;" placeholder="15分あたりの価格" required></div>',
			'<div class="col-md-1" style="padding-left:0;"><h5> 円 </h5></div>');
    	}else{
    		$('#tue_detail').hide();
    		$('#price_tue').empty();
    	}
	 });
	 
	 $('#wed_check').on("click",function(){
    	
	 	// prop()でチェックの状態を取得
    	if($('#wed_check').prop('checked')){
    		$('#price_wed').empty();
    		$('#wed_detail').show();
    		$('#price_wed').append(
    		'<div class="col-md-2"><input name="wednesday_price" style="text-align:right;" placeholder="15分あたりの価格" required></div>',
			'<div class="col-md-1" style="padding-left:0;"><h5> 円 </h5></div>');
    	}else{
    		$('#wed_detail').hide();
    		$('#price_wed').empty();
    	}
	 });
	 
	 $('#thur_check').on("click",function(){
    	
	 	// prop()でチェックの状態を取得
    	if($('#thur_check').prop('checked')){
    		$('#price_thur').empty();
    		$('#thur_detail').show();
    		$('#price_thur').append(
    		'<div class="col-md-2"><input name="thursday_price" style="text-align:right;" placeholder="15分あたりの価格" required></div>',
			'<div class="col-md-1" style="padding-left:0;"><h5> 円 </h5></div>');
    	}else{
    		$('#thur_detail').hide();
    		$('#price_thur').empty();
    	}
	 });
	 
	 $('#fri_check').on("click",function(){
    	
	 	// prop()でチェックの状態を取得
    	if($('#fri_check').prop('checked')){
    		$('#price_fri').empty();
    		$('#fri_detail').show();
    		$('#price_fri').append(
    		'<div class="col-md-2"><input name="friday_price" style="text-align:right;" placeholder="15分あたりの価格" required></div>',
			'<div class="col-md-1" style="padding-left:0;"><h5> 円 </h5></div>');
    	}else{
    		$('#fri_detail').hide();
    		$('#price_fri').empty();
    	}
	 });
	 
	 $('#sat_check').on("click",function(){
    	
	 	// prop()でチェックの状態を取得
    	if($('#sat_check').prop('checked')){
    		$('#price_sat').empty();
    		$('#sat_detail').show();
    		$('#price_sat').append(
    		'<div class="col-md-2"><input name="saturday_price" style="text-align:right;" placeholder="15分あたりの価格" required></div>',
			'<div class="col-md-1" style="padding-left:0;"><h5> 円 </h5></div>');
    	}else{
    		$('#sat_detail').hide();
    		$('#price_sat').empty();
    	}
	 });
	 
	 $('#sun_check').on("click",function(){
    	
	 	// prop()でチェックの状態を取得
    	if($('#sun_check').prop('checked')){
    		$('#price_sun').empty();
    		$('#sun_detail').show();
    		$('#price_sun').append(
    		'<div class="col-md-2"><input name="sunday_price" style="text-align:right;" placeholder="15分あたりの価格" required></div>',
			'<div class="col-md-1" style="padding-left:0;"><h5> 円 </h5></div>');
    	}else{
    		$('#sun_detail').hide();
    		$('#price_sun').empty();
    	}
	 });
	 					
	  </script>
	  
	  <script>
	  	
	  	$("#gym_add_submit").submit(function(){
		    if(window.confirm('記載の内容でジムを登録しますか？')){ // 確認ダイアログを表示
        		return true; // 「OK」時は送信を実行
        	}else{ // 「キャンセル」時の処理
        		return false; // 送信を中止
	        }
		});
	  </script>
@endpush
@endsection
	
	
