<!doctype html>
<?php
require_once('PHP/SQL.php');
require_once('MenuBar.php');
$CheckDATA = new CheckDATA();
$checkCookie = $CheckDATA -> checkCookie($CheckDATA -> ConnectSqlDatabase());
$AddDATA = new AddDATA();
$AddUser = $AddDATA -> AddUser($AddDATA -> ConnectSqlDatabase());
head();

?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="Css/AddStaff.css">
<meta charset="utf-8">
<title>Add Staff</title>
</head>

<body>
	<div class="HeadDiv">
	
		
		</div>
	<div id="title-wrapper" class="title-wrapper">
	<h2>Add Staff</h2>
		</div> 
	
	<div id="splitdiv" class="splitdiv">
	
		</div>
	
	
	<div class="CoverAddUsr">
	<table class="addusrTable" >
	  <tr>
		<th><h3>Username: </h3></th>
		<th align="left"><input class="usernameInput" name="usernameInput" id="usernameInput" type="text" placeholder="Enter username..."   required></th>

	  </tr>
	  <tr>
		<td><h3>Password: </h3></td>
		<td align="left"><input type="password"class="passwordInput" name="passwordInput" id="passwordInput"placeholder="Enter password..."   required></td>

	  </tr>
		<tr>
			<td>
				<h3>Class: </h3>
				</td>
			<td align="left"><select name="ClassSelect" id="ClassSelect" class="ClassSelect" required>
				<option value="Staff">Staff</option>
				<option value="Admin">Admin</option>
				</select>
				
				</td>
			
			</tr>
	  <tr>
		  <td><h3>Branch: </h3></td>
		  <td align="left"><select name="branchSelect" id="branchSelect" class="branchSelect" required>
				<option value="A">A</option>
				<option value="B">B</option>
				<option value="C">C</option>
				<option value="D">D</option>
				</select></td>
		  </tr>
	  <tr>
		<td></td>
		<td><button class="SubmitBtn" type="button" onClick="AddUser()" >Add User</button></td>
	  </tr>
	</table>
	</div>
	
</body>
	<script type="text/javascript" src="Javascript/jquery.js"></script>
	<script type="text/javascript" src="Javascript/AddStaff.js"></script>
</html>