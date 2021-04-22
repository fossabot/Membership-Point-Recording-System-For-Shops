<?php
require_once('PHP/SQL.php');
require_once('MenuBar.php');
$AddDATA = new AddDATA();
$OperationJudgment= $AddDATA -> OperationJudgment();

$CheckDATA = new CheckDATA();
$checkCookie = $CheckDATA -> checkCookie($CheckDATA -> ConnectSqlDatabase());

head();

?>

<!doctype html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="Css/Operation.css">
<meta charset="utf-8">
<title>Operation</title>
</head>

<body>
	
	<div class="HeadDiv">
	
		
		</div>
	<div class="OperationDiv">
		<form class="OperationForm" onsubmit="Send()">
		<table class="OperationTable">
			<tr class="bottr">
				<th>
					<h3 class="label">Member ID: </h3>
					</th>
				
				<th class="right">
					<input class="OperationInput" name="MemberidInput" id="MemberidInput" type="text"  placeholder="" oninput="value=value.toString().match(/^\d+(?:\d{0})?/)"  required>
					</th>
				
				</tr>
			
			<tr>
				<th>
					<input type="radio" name="OperationRadio" class="Buyradio" value="Buy" checked="checked" onChange="CheckRadio('B')"> Buy
					</th>
				<th class="right">
					<b>RM:<input class="OperationInput" name="buyInput" id="buyInput" type="text" onkeypress="return AvoidSpace(event)"placeholder="" oninput="value=value.toString().match(/^\d+(?:\.\d{0,2})?/)"  required>
					</th>
				</tr>
			
			</tr>
			
			<tr>
				<th>
					<input type="radio" name="OperationRadio" class="RedeemRMradio" value="RedeemRM" onChange="CheckRadio('RRM')"> Redeem
					</th>
				<th class="right">
					RM: <input class="OperationInput" name="redeemRmInput" id="redeemRmInput" type="text" onkeypress="return AvoidSpace(event)"placeholder="" oninput="value=value.toString().match(/^\d+(?:\.\d{0,2})?/)" disabled  required>
					</th>
				</tr>
			
			<tr class="bottr">
				<th>
					<input type="radio" name="OperationRadio" class="RedeemPointradio" value="RedeemP" onChange="CheckRadio('RP')"> Redeem
					</th>
				<th class="right">
					Point: <input class="OperationInput" name="redeemPInput" id="redeemPInput" type="text" onkeypress="return AvoidSpace(event)"placeholder="" oninput="value=value.toString().match(/^\d+(?:\.\d{0,2})?/)" disabled  required>
					</th>
				</tr>
			<tr>
				<th>
					
					</th>
				<th>
					<input class="submitbtn" type="Button" onClick="Send()" value="Submit">
					</th>
				</tr>
			</table>
		</form>
		</div>
	
	
</body>
<script type="text/javascript" src="Javascript/jquery.js"></script>
<script type="text/javascript" src="Javascript/Judgment.js"></script>
<script type="text/javascript" src="Javascript/Operation.js"></script>




</html>