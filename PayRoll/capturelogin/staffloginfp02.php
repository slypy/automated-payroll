<?php session_start();
if (!isset($_SESSION['username'])) {
	$_SESSION['msg'] = "You must log in first";
	header('location: login.php');
	die();
}
if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['username']);
	header("location: login.php");
	die();
}
?>

<!DOCTYPE HTML>
<html>

<head>
	<title>STAFF LOG-IN</title>
	<meta name="description" content="aaaa" />
	<meta name="keywords" content="aaaaa" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="css/style22.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/cs-select.css">

	<style>
		<?php include 'reset_CSS.php'; ?>body {
			background-color: #2F2827;
		}

		:-webkit-body {
			requestFullScreen();
		}

		button {
			color: red;
		}

		button:hover {
			background-color: #B60000;
			color: white;
		}

		.input222 {
			height: 50px;
			border: 1px solid #CCCCCC;
			border-radius: 3px;
			color: #B60000;
			text-align: center;
			font-weight: bold;
		}

		::placeholder {
			font-size: 1.1em;
			color: blue;
			opacity: .2;
		}

		:-ms-input-placeholder {
			font-size: 1.1em;
			color: blue;
			opacity: .2;
		}

		::-ms-input-placeholder {
			font-size: 1.1em;
			color: blue;
			opacity: .2;
		}

		#trnssdfsd345:hover {
			background-image: url('img/swipebox02.PNG');
			background-repeat: no-repeat;
			text-align: center;
			width: 280px;
			height: 50px;
		}

		input {
			width: auto;
		}

		datalist {
			height: 50px !important;
			max-height: 80px !important;
			display: block !important;
		}

		.height555 {
			height: 50px;
			width: 237px;
			border: 1px solid #CCCCCC;
			border-radius: .2em;
			color: #B60000;
			font-size: 1.2em;
			font-weight: bold;
		}

		.fixed_header tbody {
			display: block;
			max-height: 600px;
			width: auto;
			background-color: #E5E5DB;
		}

		.tbody tr {
			display: block;
		}

		.fixed_header thead {
			display: block;
			width: auto;
		}

		.fixed_header thead th {
			width: auto;
		}

		.fixed_header tfoot {
			display: block;
			width: auto;
		}

		.fixed_header tfoot th {
			width: auto;
			background-color: #B6997B;
		}

		th:nth-child(odd) {
			background-color: #FFF3DD;
		}

		th:nth-child(even) {
			background-color: #B6997B;
		}

		td {
			font-size: 16px;
			;
			font-weight: bold;
			border-bottom: 2px solid black;
			text-align: center center;
		}

		td:nth-child(odd) {}

		td:nth-child(even) {
			color: #C43600;
		}

		td: {
			background-color: #FFFF;
			font-weight: bold;
		}

		#main {
			width: auto;
			height: 100%;
		}

		#site_content {
			width: auto;
			height: 100%;
		}

		#container {
			width: auto;
			height: 100%;
		}

		#tabulation {
			width: auto;
			height: 100%;
		}

		#trnsctnlabel {
			background-color: white;
			color: #0074B6;
		}

		.blnkn02 {
			font-weight: bold;
			background-color: #0074B6;
			color: white;
			animation: blinking 4s infinite;
		}

		@keyframes blinking {
			10% {
				background-color: white;
				color: #0074B6;
			}

			40% {
				background-color: #0074B6;
				color: white;
			}

			80% {
				background-color: white;
				color: #0074B6;
			}
		}
	</style>
	<script src="js/webcam.js"></script>

	<script type="text/javascript">
		function dshbrdoffcrule() {
			var query_parameter8 = document.getElementById("LnchBreakTime").value;
			var dataString8 = 'parameter8=' + query_parameter8;

			var query_parameter9 = document.getElementById("BreakTimeDur").value;
			var dataString9 = 'parameter9=' + query_parameter9;

			var query_parameter10 = document.getElementById("LateHrMin").value;
			var dataString10 = 'parameter10=' + query_parameter10;

			var query_parameter11 = document.getElementById("LateDeduct").value;
			var dataString11 = 'parameter11=' + query_parameter11;

			var query_parameter12 = document.getElementById("AbsntHrMin").value;
			var dataString12 = 'parameter12=' + query_parameter12;

			var query_parameter14 = document.getElementById("EarlyClockIn").value;
			var dataString14 = 'parameter14=' + query_parameter14;

			var query_parameter23 = document.getElementById("trnsctcard2244").value;
			var dataString23 = 'parameter23=' + query_parameter23;

			var query_parameter24 = document.getElementById("ShftngTimeIn02").value;
			var dataString24 = 'parameter24=' + query_parameter24;

			var query_parameter25 = document.getElementById("ShftngTimeOut02").value;
			var dataString25 = 'parameter25=' + query_parameter25;

			var query_parameter27 = document.getElementById("AmtUndrTm").value;
			var dataString27 = 'parameter27=' + query_parameter27;

			$.ajax({
				type: "POST",
				url: "updatenewrule.php",
				data: {
					parameter8: query_parameter8,
					parameter9: query_parameter9,
					parameter10: query_parameter10,
					parameter11: query_parameter11,
					parameter12: query_parameter12,
					parameter14: query_parameter14,
					parameter23: query_parameter23,
					parameter24: query_parameter24,
					parameter25: query_parameter25,
					parameter27: query_parameter27
				},
				cache: false,
				success: function(html) {
					document.getElementById("officerules02").innerHTML = html;
					document.getElementById("table_content").value = "";
					document.getElementById("trnsctcard22").value = "";
					document.getElementById("trnsctcard44").value = "";
					//document.getElementById("trnsctcard44").focus(); 
				}
			});
			return false;
		}
	</script>

</head>

<body>
	<div id="main" style="width:100%;height:100%;padding:10;">

		<div id="site_content" style="width:100%;height:100%;padding:0;">
			<div class="tabulation" style="width:100%;height:100%;padding:0;">
				<center>
					<h2>*---*</h2>
				</center>
				<div class="tab-content" style="width:100%;height:100%;padding:0;">
					<input id="trnsctnlabel" type="textarea" style="position:absolute;visibility:hidden;" class="input222 blnkn02" value=" First Press Button to Clock IN or OUT or Overtime work " onclick="document.getElementById('trnsctcard22').focus();" onmouseover="document.getElementById('trnsctcard22').focus();" readonly />
					<center id="logbooking4540" style="margin:auto;height:100%;padding:20px;border:none;background:#f2f2f2;">

						<input id="tofocus01" style="position:absolute;opacity:0;width:2px;" value="" />

						<form method="POST" action="rgstrfngrprnt01.php" class="form" autocomplete="off" target="_blank" style="width:100%;height:100%;">

							<table style="width:100%;height:100%;">
								<tr>
									<td>
										<center><br>
											<div><input id="timelogin123" style="padding:0;left:-10px;font-size:2em;font-weight:bold;width:200px;height:auto;border:1px solid green;border-radius:5px;color:green;" type="textarea" class="input222" />
												<input id="datelogin123" style="padding:0;left:-10px;font-size:2em;font-weight:bold;width:370px;height:auto;border:1px solid #B60000;" type="textarea" class="input222" />
											</div>
											<br><br>
											<div id="my_camera" width="400" height="400" align="center"></div>
											<div id="results2" width="400" height="400"></div>
										</center>
										<input style="position:absolute;visibility:hidden;" name="crdnum02" value="" />
										<table style="background-color:white;" align="center">
											<tr>
												<td>
													<input type="hidden" name="image" class="image-tag" />
													<span id="warning12" style="position:absolute;visibility:hidden;">
														<center>
															<table>
																<tr>
																	<td style="background-color:white;">
																		<center>Picture 1: The Card Owner </center>
																	</td>
																	<td>
																		<center>Picture 2: who Swiped <b id="actionswpd"></b></center>
																	</td>
																</tr>
																<tr>
																	<td style="background-color:white;">
																		<center id="my_pic123" width="400" height="400"></center>
																	</td>
																	<td>
																		<center id="results" width="400" height="400"></center>
																	</td>
																</tr>
																<tr>
																	<td colspan=2>
																		<center>
																			<p style="padding:10;font-size:1.8em;color:red;"><b style="color:black;">Warning : </b>If These two PERSONS is not the same, BOTH will be TERMINATED.. Immediately!! </p>
																		</center>
																		<div id="note_content4" style="position:absolute;visibility:hidden;">
																			<p id="latenotice4" style="position:relative;font-size:2.5em;border:none;background-color:transparent;height:auto;margin:auto;color:black;text-shadow:4px 4px 8px gray;display:block;text-align:center;z-index:8989898;">
																			</p>

																			<br>
																		</div>
																	</td>
																</tr>
															</table>
														</center>
													</span>
												</td>
											</tr>
											<tr>
												<td>
													<div id="table_content" style="width:auto;height:100%;background-color:transparent;font-size:25px;font-weight:bold;">

														<div id="my_pic123b" height="400" width="400" style="position:absolute;visibility:hidden;">

														</div>
														<input id="StatusIn" type="textarea" value="0" style="position:absolute;visibility:hidden;" />
														<input id="action123xy" type="textarea" value="" style="position:absolute;visibility:hidden;" />
													</div>
												</td>
											</tr>
										</table>

				</div>
				<div class="text-center">

					<div style="padding:0;">

						<span id="selectedaction01" style="position:absolute;visibility:hidden;width:100%;">

							<input id="selectedvalue01" style="text-align:center;font-weight:bold;font-size:2.6em;width:auto;height:80px;color:red;" type="textarea" value="" />

						</span>

						<center id="noselectaction02" style="visibility:hidden;">
							<h3 style="font-size:1.6em;font-weight:bold;">SELECT WORK TYPE :</h3>
							<br><br>
							<button style="padding:3px;boder:1.5px outset gray;" onClick="document.getElementById('atttype-in').click();"> <input style="position:absolute;visibility:hidden;" type="checkbox" id="atttype-in" name="Att_Type" value="Clock-in" onclick="document.getElementById('selectedaction01').style =  'visibility:visible;width:100%;height:100%;';document.getElementById('selectedvalue01').value = this.value;document.getElementById('noselectaction02').style.visibility = 'hidden';document.getElementById('name2').value='Clock-in';document.getElementById('OTtype-off').checked = false;document.getElementById('OTtype-wrk').checked = false;document.getElementById('atttype-out').checked = false;document.getElementById('btn_camera').click();document.getElementById('trnsctcard22').focus();document.getElementById('triggerFPC11').click();" /><br>
								<label style="font-size:2em;font-weight:bold;width:220px;height:100px;">Time-In</label>
							</button><span style="opacity:0;">------</span><button style="padding:3px;boder:1.5px outset gray;" onClick="document.getElementById('atttype-out').click();"> <input style="position:absolute;visibility:hidden;" type="checkbox" id="atttype-out" name="Att_Type" value="Clock-out" onclick="document.getElementById('selectedaction01').style =  'visibility:visible;width:100%;height:100%;';document.getElementById('selectedvalue01').value = this.value;document.getElementById('noselectaction02').style.visibility = 'hidden';document.getElementById('name2').value='Clock-out';document.getElementById('OTtype-off').checked = false;document.getElementById('OTtype-wrk').checked = false;document.getElementById('atttype-in').checked = false;document.getElementById('btn_camera').click();document.getElementById('trnsctcard22').focus();document.getElementById('triggerFPC11').click();" /><br>
								<label style="font-size:2em;font-weight:bold;width:220px;height:100px;">Time-Out</label>
							</button>
							<br><br>
							<div>
								<button style="padding:3px;boder:1.5px outset gray;" onClick="document.getElementById('OTtype-wrk').click();"> <input style="position:absolute;visibility:hidden;" type="checkbox" id="OTtype-wrk" name="Att_Type" value="Overtime work" onclick="document.getElementById('selectedaction01').style =  'visibility:visible;width:100%;';document.getElementById('selectedvalue01').value = this.value;document.getElementById('noselectaction02').style.visibility = 'hidden';document.getElementById('name2').value='Overtime work';document.getElementById('OTtype-off').checked = false;document.getElementById('atttype-in').checked = false;document.getElementById('atttype-out').checked = false;document.getElementById('btn_camera').click();document.getElementById('trnsctcard22').focus();document.getElementById('triggerFPC11').click();" /><label style="font-size:1.8em;font-weight:bold;width:240px;height:80px;color:green;">Overtime In</label>
								</button><span style="opacity:0;">------</span><button style="padding:3px;boder:1.5px outset gray;" onClick="document.getElementById('OTtype-off').click();"> <input style="position:absolute;visibility:hidden;" type="checkbox" id="OTtype-off" name="Att_Type" value="Overtime off" onclick="document.getElementById('selectedaction01').style =  'visibility:visible;width:100%;';document.getElementById('selectedvalue01').value = this.value;document.getElementById('noselectaction02').style.visibility = 'hidden';document.getElementById('name2').value='Overtime off';document.getElementById('OTtype-wrk').checked = false;document.getElementById('atttype-in').checked = false;document.getElementById('atttype-out').checked = false;document.getElementById('btn_camera').click();document.getElementById('trnsctcard22').focus();" /><label style="font-size:1.8em;font-weight:bold;width:240px;height:80px;color:green;document.getElementById('triggerFPC11').click();">Overtime Out</label>
								</button>
							</div>
						</center>

						<input id="trnsctcard22" name="Device_ID" type="textarea" style="position:relative;width:15%;opacity:0;" class="input222" value="" onfocus="document.getElementById('trnsctnlabel').style= 'position:absolute;left:-2px;opacity:.7;width:100%;height:100%;font-size:2.8em;font-weight:bold;';document.getElementById('trnsctnlabel').value = ' Swipe your Card Or Use FingerPrint ';" />
						<br>


						<input id="trnsctcard44" type="textarea" style="position:absolute;opacity:0;width:1%;" class="input222" value="" onfocus="document.getElementById('trnsctnlabel').value = 'First Press Button to Clock IN or OUT or Overtime work ';" autofocus />

						<div id="officerules02" style="position:absolute;visibility:hidden;">

						</div>


						<input id="name" name="parameter" style="position:absolute;visibility:hidden;" type="text" value="" />

						<input id="name2" name="parameter2" style="position:absolute;visibility:hidden;" type="text" value="" />

						<input id="name3" name="parameter3" style="position:absolute;visibility:hidden;" type="text" value="" />

						<input id="name4" name="parameter4" style="position:absolute;visibility:hidden;" type="text" value="" />

						<input id="name5" name="parameter5" style="position:absolute;visibility:hidden;" type="text" value="" />

						<input id="name6" name="parameter6" style="position:absolute;visibility:hidden;" type="text" value="" />

						<input id="name7" name="parameter7" style="position:absolute;visibility:hidden;" type="text" value="" />



						<input style="position:absolute;visibility:hidden;" id="nicknm03" name="nicknm03" type="text" value="" />
						<input style="position:absolute;visibility:hidden;" id="lstnum03" name="lstnum03" type="text" value="" />




						<script>
							var input = document.getElementById("trnsctcard22");
							input.addEventListener("keyup", function(event) {
								if (event.keyCode === 13) {
									event.preventDefault();

									function sleep(ms) {
										return new Promise(resolve => setTimeout(resolve, ms));
									}
									async function Tutor() {
										document.getElementById("results2").style = "position:absolute;visibility:hidden;";
										document.getElementById("trnsctnlabel").style = "position:absolute;visibility:hidden;";
										var query_parameter22 = document.getElementById("trnsctcard22").value;
										var dataString22 = 'parameter22=' + query_parameter22;
										$.ajax({
											type: "POST",
											url: "queryschedrule.php",
											data: {
												parameter22: query_parameter22
											},
											cache: false,
											success: function(html) {
												document.getElementById("officerules02").innerHTML = html;
											}
										});
										await sleep(1000);
										document.getElementById("name").value = document.getElementById("trnsctcard22").value;
										document.getElementById("name3").value = document.getElementById("LateHrMin").value;
										document.getElementById("name4").value = document.getElementById("LateDeduct").value;
										document.getElementById("name5").value = document.getElementById("EarlyClockIn").value;
										document.getElementById("name6").value = document.getElementById("LnchBreakTime").value;
										document.getElementById("name7").value = document.getElementById("BreakTimeDur").value;

										var query_parameter = document.getElementById("trnsctcard22").value;
										var dataString = 'parameter=' + query_parameter;
										var query_parameter2 = document.getElementById("name2").value;
										var dataString2 = 'parameter2=' + query_parameter2;
										var query_parameter3 = document.getElementById("name3").value;
										var dataString3 = 'parameter3=' + query_parameter3;
										var query_parameter4 = document.getElementById("name4").value;
										var dataString4 = 'parameter4=' + query_parameter4;
										var query_parameter5 = document.getElementById("name5").value;
										var dataString5 = 'parameter5=' + query_parameter5;
										var query_parameter6 = document.getElementById("name6").value;
										var dataString6 = 'parameter6=' + query_parameter6;
										var query_parameter7 = document.getElementById("name7").value;
										var dataString7 = 'parameter7=' + query_parameter7;
										var query_parameter26 = document.getElementById("AmtUndrTm").value;
										var dataString26 = 'parameter26=' + query_parameter26;
										var query_parameter27 = document.getElementById("AbsntHrMin").value;
										var dataString27 = 'parameter27=' + query_parameter27;

										$.ajax({
											type: "POST",
											url: "getlogindata01.php",
											data: {
												parameter: query_parameter,
												parameter2: query_parameter2,
												parameter3: query_parameter3,
												parameter4: query_parameter4,
												parameter5: query_parameter5,
												parameter6: query_parameter6,
												parameter7: query_parameter7,
												parameter26: query_parameter26,
												parameter27: query_parameter27
											},
											cache: false,
											success: function(html) {
												document.getElementById("table_content").innerHTML = html;
												var mypicimg123 = document.getElementById("my_pic123b").innerHTML;
												document.getElementById("my_pic123").innerHTML = mypicimg123;
												document.getElementById("warning12").style = "position:relative;visibility:visible;";

												function sleep(ms) {
													return new Promise(resolve => setTimeout(resolve, ms));
												}
												async function Tutor2() {
													await sleep(2000);
													var StatusIn123 = document.getElementById("StatusIn").value;
													var latenotice4val = document.getElementById("latenotice").value;
													document.getElementById("note_content4").style = "position:relative;visibility:visible;padding:5px;width:100%;height:auto;background-color:rgba(250,250,250,.8);box-shadow:-4px 4px 10px gray;border:1.5px solid #2F2827;border-radius:5px;z-index:999998;";
													document.getElementById("latenotice4").innerHTML = latenotice4val;
													var actnswpd123 = document.getElementById("action123xy").value;
													document.getElementById("actionswpd").innerHTML = actnswpd123;
													await sleep(1000);
													if (StatusIn123 == "1") {
														document.getElementById("saveForm123").click();
														document.getElementById("tofocus01").focus();
														await sleep(10000);
														location.reload();
													} else {
														document.getElementById("tofocus01").focus();
														await sleep(8000);
														location.reload();
													}
												}
												Tutor2();
											}
										});
										return false;
									}
									Tutor();
								} else if (event.keyCode === 82) {
									location.reload();
								} else if (event.keyCode === 79) {
									event.preventDefault();
									document.getElementById("table_content").innerHTML = "";
									//document.getElementById("note_content4").style = "position:absolute;visibility:hidden;";
									document.getElementById("officerules02").innerHTML = "";
									document.getElementById("trnsctcard44").value = "";
									document.getElementById("trnsctcard22").value = "";
									document.getElementById("atttype-out").click();
								} else if (event.keyCode === 73) {
									event.preventDefault();
									document.getElementById("table_content").innerHTML = "";
									document.getElementById("note_content4").style = "position:absolute;visibility:hidden;";
									document.getElementById("officerules02").innerHTML = "";
									document.getElementById("trnsctcard44").value = "";
									document.getElementById("trnsctcard22").value = "";
									document.getElementById("atttype-in").click();
								} else if (event.keyCode === 90) {
									event.preventDefault();
									document.getElementById("table_content").innerHTML = "";
									document.getElementById("note_content4").style = "position:absolute;visibility:hidden;";
									document.getElementById("officerules02").innerHTML = "";
									document.getElementById("trnsctcard44").value = "";
									document.getElementById("trnsctcard22").value = "";
									document.getElementById("OTtype-wrk").click();
								} else if (event.keyCode === 88) {
									event.preventDefault();
									document.getElementById("table_content").innerHTML = "";
									document.getElementById("note_content4").style = "position:absolute;visibility:hidden;";
									document.getElementById("officerules02").innerHTML = "";
									document.getElementById("trnsctcard44").value = "";
									document.getElementById("trnsctcard22").value = "";
									document.getElementById("OTtype-off").click();
								}
							});
						</script>

						<script>
							var input = document.getElementById("trnsctcard44");
							input.addEventListener("keyup", function(event) {
								if (event.keyCode === 82) {
									location.reload();
								} else if (event.keyCode === 79) {
									event.preventDefault();
									document.getElementById("table_content").innerHTML = "";
									document.getElementById("note_content4").style = "position:absolute;visibility:hidden;";
									document.getElementById("officerules02").innerHTML = "";
									document.getElementById("trnsctcard44").value = "";
									document.getElementById("trnsctcard22").value = "";
									document.getElementById("atttype-out").click();
								} else if (event.keyCode === 73) {
									event.preventDefault();
									document.getElementById("table_content").innerHTML = "";
									document.getElementById("note_content4").style = "position:absolute;visibility:hidden;";
									document.getElementById("officerules02").innerHTML = "";
									document.getElementById("trnsctcard44").value = "";
									document.getElementById("trnsctcard22").value = "";
									document.getElementById("atttype-in").click();
								} else if (event.keyCode === 90) {
									event.preventDefault();
									document.getElementById("table_content").innerHTML = "";
									document.getElementById("note_content4").style = "position:absolute;visibility:hidden;";
									document.getElementById("officerules02").innerHTML = "";
									document.getElementById("trnsctcard44").value = "";
									document.getElementById("trnsctcard22").value = "";
									document.getElementById("OTtype-wrk").click();
								} else if (event.keyCode === 88) {
									event.preventDefault();
									document.getElementById("table_content").innerHTML = "";
									document.getElementById("note_content4").style = "position:absolute;visibility:hidden;";
									document.getElementById("officerules02").innerHTML = "";
									document.getElementById("trnsctcard44").value = "";
									document.getElementById("trnsctcard22").value = "";
									document.getElementById("OTtype-off").click();
								} else {
									document.getElementById("table_content").innerHTML = "";
									document.getElementById("note_content4").style = "position:absolute;visibility:hidden;";
									document.getElementById("officerules02").innerHTML = "";
									document.getElementById("trnsctcard22").value = "";
									document.getElementById("trnsctcard44").value = "";
									document.getElementById("trnsctcard44").focus();
								}
							});
						</script>

						<script type="text/javascript">
							window.addEventListener('keydown', function(e) {
								if (e.keyIdentifier == 'U+000A' || e.keyIdentifier == 'Enter' || e.keyCode == 13) {
									if (e.target.nodeName == 'INPUT' && e.target.type == 'text', 'textarea', 'number', 'time') {
										e.preventDefault();
										return false;
									}
								}
							}, true);
						</script>

						<script type="text/javascript">
							function getDateTime77() {
								var now77 = new Date();
								var year = now77.getFullYear();
								var month = now77.getMonth() + 1;
								var day = now77.getDate();
								var daytx2 = "";
								switch (now77.getDay()) {
									case 0:
										daytx2 = "SUN";
										break;
									case 1:
										daytx2 = "MON";
										break;
									case 2:
										daytx2 = "TUE";
										break;
									case 3:
										daytx2 = "WED";
										break;
									case 4:
										daytx2 = "THU";
										break;
									case 5:
										daytx2 = "FRI";
										break;
									case 6:
										daytx2 = "SAT";
								}
								switch (month) {
									case 1:
										month6 = "January";
										break;
									case 2:
										month6 = "February";
										break;
									case 3:
										month6 = "March";
										break;
									case 4:
										month6 = "April";
										break;
									case 5:
										month6 = "May";
										break;
									case 6:
										month6 = "June";
										break;
									case 7:
										month6 = "July";
										break;
									case 8:
										month6 = "August";
										break;
									case 9:
										month6 = "September";
										break;
									case 10:
										month6 = "October";
										break;
									case 11:
										month6 = "November";
										break;
									case 12:
										month6 = "December";
								}

								if (month.toString().length == 1) {
									month = '0' + month;
								}
								if (day.toString().length == 1) {
									day = '0' + day;
								}
								var dateTime77 = daytx2 + ' - ' + month6 + ' ' + day + ', ' + year;
								return dateTime77;
							}
							setInterval(function() {
								currentTime = getDateTime77();
								document.getElementById("datelogin123").value = currentTime;
							}, 1000);
							setInterval(function() {
								// location.reload();
							}, 10000);
						</script>

						<script type="text/javascript">
							var timetext12 = "start";
							var timestart12 = 0;

							function getDateTime77x() {
								var now77x = new Date();
								var hour = now77x.getHours();
								var hour2 = now77x.getHours();
								var minute = now77x.getMinutes();
								var second = now77x.getSeconds();
								var ampm1 = 'AM';
								if (hour > 12) {
									hour = hour - 12;
								}
								if (hour.toString().length == 1) {
									hour = '0' + hour;
								}
								if (minute.toString().length == 1) {
									minute = '0' + minute;
								}
								if (second.toString().length == 1) {
									second = '0' + second;
								}
								var dateTimeix = hour2 + '' + minute;
								var dateTimeix2 = Number(dateTimeix);
								if (dateTimeix2 > 1200) {
									var ampm1 = 'PM';
								}
								var dateTime77x = hour + ':' + minute + ':' + second + ' ' + ampm1;
								return dateTime77x;
							}
							setInterval(function() {
								currentTimex = getDateTime77x();
								document.getElementById("timelogin123").value = currentTimex;
								timestart12 = timestart12 + 1;
								if ((timestart12 >= 2) && (timetext12 == "start")) {
									document.getElementById("noselectaction02").style = "background-color:transparent;font-weight:bold;font-size:1.2em;width:100%;height:auto;color:brown;padding:10px;";
									timetext12 = "end";
								}
								if (timestart12 >= 30) {
									if (timestart12 >= 30) {
										timestart12 = 0;
										document.getElementById("goback123").click();
									}
								}
							}, 1000);
						</script>

						<li style="position:absolute;visibility:hidden;">
							<label>Swipe Card here to LOGIN :</label>
							<button id="saveForm123" name="saveForm" style="position:absolute;visibility:hidden;height:58px;width:306px;color:white;background-color:#11A8DF;" type="submit" /><b> Click here to LOGIN </b></button>
						</li>

						</center>

						<li style="position:absolute;visibility:hidden;">
							<center>
								<input type="textarea" name="crdpreparedby" value="<?php echo $prprdby22; ?>" readonly />
							</center>
						</li><br>

					</div>

					<center style="position:absolute;visibility:hidden;">
						<button id="btn_camera" type="button" onClick="take_snapshot()"><b>iMaGe Capture345343</b></button>
					</center>
					</td>
					</tr>
					</table>
					</center>
					</form>

					<!-- Configure a few settings and attach camera -->
					<script language="JavaScript">
						Webcam.set({
							width: 640,
							height: 480,
							image_format: 'jpeg',
							jpeg_quality: 90,
							constraints: {
								width: {
									exact: 640
								},
								height: {
									exact: 480
								}
							}
						});
						Webcam.attach('#my_camera');
					</script>

					<script language="JavaScript">
						function take_snapshot() {
							Webcam.snap(function(data_uri) {
								$(".image-tag").val(data_uri);
								document.getElementById('results').innerHTML = '<img width="640" height="480" src="' + data_uri + '"/>';
								document.getElementById('results2').innerHTML = '<img width="640" height="480" src="' + data_uri + '"/>';
								document.getElementById('my_camera').style = 'position:absolute;visibility:hidden;';
							});
						}
					</script>

					<button id="goback123" style="position:absolute;visibility:hidden;" type="button" onclick="window.location.href = 'staffloginfp.php';"><b>back</b></button>

					<button id="goreload123" style="position:absolute;visibility:hidden;" type="button" onclick="location.reload();"><b>back</b></button>
				</div>
			</div>
		</div>
		<br><br>

		<a id="triggerFPC11" rel="nofollow" href="triggerFPC07.php" target="triggerFPC" rel="nofollow" style="position:absolute;visibility:hidden;">triggerFPC11</a>
		<br><br>
		<iframe id="triggerFPC" name="triggerFPC" style="position:absolute;visibility:hidden;">
			dddd
		</iframe>
		<br><br>
		<br><br>
	</div>

	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>

</body>

</html>