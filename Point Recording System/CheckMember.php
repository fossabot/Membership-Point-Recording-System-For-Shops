<!doctype html>
<?php
require_once('PHP/SQL.php');
require_once('MenuBar.php');
$CheckDATA = new CheckDATA();
$checkCookie = $CheckDATA -> checkCookie($CheckDATA -> ConnectSqlDatabase());
$CheckMemberInfo = $CheckDATA -> CheckMemberInfo($CheckDATA -> ConnectSqlDatabase());

head();
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="Css/CheckMember.css">
<meta charset="utf-8">
<title>Member</title>
</head>

<body>
	<div class="HeadDiv">
	
		
		</div>
	
				<div class="cover">
				<div class="AddUserDiv">
					<div class="AddUserBtnDiv">
						<input type="button"  name="btnaddnew" class="btnaddnew" id="btnaddnew" value="Add Member" onClick="window.location.href='AddMember.php'">
						
						
					</div>
					</div>
				
				
				
				<div class="ticover">
					<ul class="headul">
					<li class="noli">
						<span >No</span>
						
						</li><li class="nameli" id="nameli">
						<span>Member</span>
						</li><li class="idli" id="branchli">
						<span>ID</span>
						</li><li class="Pointli">
						<span>Point</span>
						</li>
						

					</ul>
					
					</div>
						<div class="contentcover" id="contentcover">
					
					
						
							
							

						
					
					</div>
				
				
				
					
					
					
					
					</div>


	
	
</body>
	<script type="text/javascript" src="Javascript/jquery.js"></script>
	<script type="text/javascript" src="Javascript/CheckMember.js"></script>
</html>