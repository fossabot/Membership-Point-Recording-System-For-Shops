<?php
require_once('PHP/SQL.php');
require_once('MenuBar.php');
$CheckDATA = new CheckDATA();
$checkCookie = $CheckDATA -> checkCookie($CheckDATA -> ConnectSqlDatabase());

head();
?>
<!doctype html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="Css/Main Menu.css">

<meta charset="utf-8">
<!-- TemplateBeginEditable name="doctitle" -->
<title>Main Page</title>
<!-- TemplateEndEditable -->
<!-- TemplateBeginEditable name="head" -->
<!-- TemplateEndEditable -->
</head>

<body>
	<div class="HeadDiv">
		
		</div>
	<div class="CoverDiv">
		<div class="SelectionDiv">
			<div class="OperationDiv">
				
				<button class="OperationBtn" value="Operation" onClick="window.location.href='Operation.php'">Operation</button>
			
			
			</div>
			<div class="ReportDiv">
			
				<button class="ReportBtn" value="Report" onClick="window.location.href='Report.php'">Report</button>
			
			</div>
			
			<div class="AdminCenterDiv">
			
				<button class="AdminCenterBtn" value="AdminCenter" onClick="window.location.href='AdminCenter.php'">AdminCenter</button>
			
			</div>
			
			</div>
		
		
		</div>
	
	
</body>
</html>
