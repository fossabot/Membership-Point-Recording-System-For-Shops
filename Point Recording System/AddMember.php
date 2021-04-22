<!doctype html>
<?php
require_once('PHP/SQL.php');
require_once('MenuBar.php');
$CheckDATA = new CheckDATA();
$checkCookie = $CheckDATA -> checkCookie($CheckDATA -> ConnectSqlDatabase());
$AddDATA = new AddDATA();
$AddMember = $AddDATA -> AddMember($AddDATA -> ConnectSqlDatabase());
head();

?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="Css/AddMember.css">
<meta charset="utf-8">
<title>Add Member</title>
</head>

<body>
	<div class="HeadDiv">
	
		
		</div>
	<div id="title-wrapper" class="title-wrapper">
	<h2>Add Member</h2>
		</div> 
	
	<div id="splitdiv" class="splitdiv">
	
		</div>
	
	
	<div class="CoverAddUsr">
	<table class="addusrTable" >
	  <tr>
		<th><h3>Member Name: </h3></th>
		<th align="left"><input class="memberInput" name="memberInput" id="memberInput" type="text" placeholder="Enter member name..."   required></th>

	  </tr>
	  <tr>
		<td><h3>Member ID: </h3></td>
		<td align="left"><input type="text"class="memberidInput" name="memberidInput" id="memberidInput" oninput="value=value.toString().match(/^\d+(?:\d{0})?/)" placeholder="Enter member ID..."   required></td>

	  </tr>
		
	  <tr>
		<td></td>
		<td><button class="SubmitBtn" type="button" onClick="AddMember()" >Add User</button></td>
	  </tr>
	</table>
	</div>
	
</body>
	<script type="text/javascript" src="Javascript/jquery.js"></script>
	<script type="text/javascript" src="Javascript/AddMember.js"></script>
</html>