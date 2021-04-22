<!doctype html>
<?php
require_once('PHP/SQL.php');
require_once('MenuBar.php');
$CheckDATA = new CheckDATA();
$checkCookie = $CheckDATA -> checkCookie($CheckDATA -> ConnectSqlDatabase());
head();
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="Css/AdminCenter.css">
<meta charset="utf-8">
<title>AdminCenter</title>
</head>
	
	<div class="HeadDiv">
		
		</div>
	<div class="CoverDiv">
		<div class="SelectionDiv">
			<div class="AddMemberDiv">
				
				<button class="AddMemberbtn" value="AddMemberbtn" onClick="window.location.href='CheckMember.php'"> Member</button>
			
			
			</div>
			<div class="AddStaffDiv">
			
				<button class="AddStaffBtn" value="AddStaff" onClick="window.location.href='CheckStaff.php'">Staff</button>
			
			</div>
			

			
			</div>
		
		
		</div>

<body>
</body>
</html>