<!doctype html>
<!doctype html>
<?php
require_once('PHP/SQL.php');
require_once('MenuBar.php');
$CheckDATA = new CheckDATA();
$checkCookie = $CheckDATA -> checkCookie($CheckDATA -> ConnectSqlDatabase());
$ReportOperation = $CheckDATA -> ReportOperation($CheckDATA -> ConnectSqlDatabase());

head();
?>
<html>
<head> 
<link rel="stylesheet" type="text/css" href="Css/Report.css">
<meta charset="utf-8">
<title>Report</title>
</head>

<body>
		<div class="HeadDiv">
	
		
		</div>
	
		<div id="title-wrapper" class="title-wrapper">
		<h2>Check Report</h2> 
		</div>
	<div class="HeadDiv2">
	
		  
		</div>
	
				<div class="cover" id="cover">
				
					<div class="OperationDiv">
						Report Type: <select  name="ReportTypeSelect" id="ReportTypeSelect" class="ReportTypeSelect" onChange="CheckSelect()" required>
							<option value="BuyDetail">Buy Detail</option>
							<option value="ClaimDetailRm">Claim Point Detail(RM)</option>
							<option value="ClaimDetailPoint">Claim Point Detail(Point)</option>
							<option value="MemberPoint">Member Point</option>
						</select>
						</div>
					<div class="OperationDiv">
						From: <input type="date" data-date-format="YYYY-MM-DD" name="from" class="date" id="from" > To: <input type="date"  name="to" class="date" id="to"> 
						<input type="checkbox" id="AllDateCheckbox" name="AllDateCheckbox" class="OperationCheckbox" onclick="AllDateCheckbox()" > All
						</div> 
					<div class="OperationDiv">
						Member ID: <input type="text" name="MemberIDInput" class="MemberIDInput" id="MemberIDInput" oninput="value=value.toString().match(/^\d+(?:\d{0})?/)">
						<input type="checkbox" id="AllMemberCheckbox" name="AllMemberCheckbox" class="OperationCheckbox" onClick="AllMemberIDCheckbox()"> All
						</div> 
				<div class="checkrptDiv">
					<div class="checkrptBtnDiv">
						<input  type="button"  name="btncheckrpt" class="btncheckrpt" id="btncheckrpt" value="Check Report" onClick="changeReport()">
						
						
					</div> 
					
					</div>
				
				
				
				<div class="ticover">
					<ul class="headul">
						<li class="li1" id="li1"><span class="span1" id="span1">No</span>
						</li><li class="li2" id="li2" ><span class="span2" id="span2">Member ID</span>
						</li><li class="li3" id="li3"><span class="span3" id="span3">Date</span>
						</li><li class="li4" id="li4"><span class="span4" id="span4">Buy(RM)</span>
						</li><li class="li5" id="li5"><span class="span5" id="span5" > </span>
						</li>

					</ul>
					
					</div>
				<div class="contentCover" id="contentCover">
					
				
				</div>
				  
					
					
					
					
					</div>


	
	
</body>
	<script type="text/javascript" src="Javascript/jquery.js"></script>
	<script type="text/javascript" src="Javascript/CheckReport.js"></script>
	<script type="text/javascript" src="Javascript/CheckReportEvent.js"></script>
</html>
	
</body>
</html>