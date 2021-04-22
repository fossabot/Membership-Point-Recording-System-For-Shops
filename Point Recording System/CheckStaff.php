<!doctype html>
<?php
require_once('PHP/SQL.php');
require_once('MenuBar.php');
$CheckDATA = new CheckDATA();
$checkCookie = $CheckDATA -> checkCookie($CheckDATA -> ConnectSqlDatabase());
$CheckStaffInfo = $CheckDATA -> CheckStaffInfo($CheckDATA -> ConnectSqlDatabase());

head();
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="Css/CheckStaff.css">
<meta charset="utf-8">
<title>Staff</title>
</head>

<body>
	<div class="HeadDiv">
	
		
		</div>
	
				<div class="cover">
				<div class="AddUserDiv">
					<div class="AddUserBtnDiv">
						<input  type="button"  name="btnaddnew" class="btnaddnew" id="btnaddnew" value="Add Staff" onClick="window.location.href='AddStaff.php'">
						
						
					</div>
					</div>
				
				
				
				<div class="ticover">
					<ul class="headul">
					<li class="noli">
						<span >No</span>
						
						</li><li class="nameli" id="nameli">
						<span>Username</span>
						</li><li class="branchli" id="branchli">
						<span>Branch</span>
						</li><li class="Classli">
						<span>Class</span>
						</li>
						

					</ul>
					
					</div>
						<div class="contentcover" id="contentcover">
					
					
						
							
							

						
					
					</div>
				
				
				
					
					
					
					
					</div>


	
	
</body>
	<script type="text/javascript" src="Javascript/jquery.js"></script>
	<script type="text/javascript" src="Javascript/CheckStaff.js"></script>
</html>