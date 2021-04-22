
<!doctype html>
<?php


	require_once('PHP/SQL.php');
	$CheckDATA = new CheckDATA();
	$IdentifyUser = $CheckDATA -> IdentifyUser($CheckDATA -> ConnectSqlDatabase());
	?>



<html>
	
	
<head>
	 <link rel="stylesheet" type="text/css" href="Css/Login Page.css">
	
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- TemplateBeginEditable name="doctitle" -->
<title>LOGIN</title>
<!-- TemplateEndEditable -->
<!-- TemplateBeginEditable name="head" -->
<!-- TemplateEndEditable -->
</head>

<body>

	<div id="page-wrapper" class="gray-bg" style="text-align: center;width:auto;height: 100px; margin:0 auto;">
	
</div>
	
	
	<div id="title-wrapper" class="title-wrapper">
	<h2>Login To Point Calculating System (This Website Is For Test Only)</h2>
</div> 
	
	<div id="div1" class="div1" style="height :80px; margin:0 auto;">
	
</div>
	
	<form class="login-form" method="post" action=""  name="MyForm"> 

	<table class="login-form-table" >
  <tr>
    <th><h3>Username: </h3></th>
    <th align="left"><input class="login-form-table-username-input" name="login-form-table-username-input" id="login-form-table-username-input" type="text" onkeypress="return AvoidSpace(event)"placeholder="Enter username..."  required></th>
    
  </tr>
  <tr>
    <td><h3>Password: </h3></td>
    <td align="left"><input type="password"class="login-form-table-password-input" name="login-form-table-password-input" id="login-form-table-password-input"onkeypress="return AvoidSpace(event)"placeholder="Enter password..."  required></td>
    
  </tr>
  <tr>
	  <td><h3>Branch: </h3></td>
	  <td align="left"><select name="login-form-table-branch-select" id="login-form-table-branch-select" class="login-form-table-branch-select">
  			<option value="A">A</option>
  			<option value="B">B</option>
  			<option value="C">C</option>
  			<option value="D">D</option>
			</select></td>
	  </tr>
  <tr>
    <td></td>
    <td><button class="login-form-table-buttonsubmit" type="submit"  value="Submit" >Log In</button></td>
  </tr>
</table>

</form>
	
<script type="text/javascript" src="Javascript/Judgment.js"></script>

	
	
</body>
	
</html>
