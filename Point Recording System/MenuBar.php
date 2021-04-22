
<!DOCTYPE html>

<?php
require_once('PHP/Process.php');

$cookie = new cookie();
$cookie -> deleteCookie();

function head(){

    function Style(){
	echo "<script>
	var myCookie = document.cookie.replace(/(?:(?:^|.*;\s*)VLFU\s*\=\s*([^;]*).*$)|^.*$/, \"$1\");

	if (myCookie == \"\"){
		location.reload();
		
		
		}else{
		
			
		
			
			}
	
	
	</script>
	
	
";
	
}
	
	function Html(){
		echo' <html>	
<head>
<link rel="stylesheet" type="text/css" href="Css/Menu Bar.css">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


</head>
<body>
<div class="c-nav">
	<div class="container navFlex">
		<div class="flexItem">
			<img  class="logo" />
		</div>
		

		<div class="flexItem show">
			<ul>
				<li onclick="window.location.href=\'MainMenu.php\'"><a href="#">Home</a></li>
				<li onclick="window.location.href=\'Operation.php\'"><a href="#">Operation</a></li>
				<li onclick="window.location.href=\'Report.php\'"><a href="#">Report</a></li>
				<li onclick="window.location.href=\'AdminCenter.php\'"><a href="#">Admin Center</a></li>
				<li onclick="window.location.href=\'About.php\'"><a href="#">About</a></li>
				<li onclick="VerifyCookie(),location.reload(),window.location.href=\'LoginPage.php\'"><a href="#">Logout</a></li>
			</ul>
		</div>
	</div>
</div>
 
<script type="text/javascript" src="Javascript/jquery.js"></script>
<script type="text/javascript" src="Javascript/VerifyCookie.js"></script>
<script type="text/javascript src="Javascript/MenuBar.js""></script>
</body>
</html> ';
		
	}
	function License(){
		echo '	
		<style>	
		*{margin:0;padding:0;list-style-type:none;}
		.container{max-width:1140px;margin:0 auto;}
		.c-nav2 .show{display: inline-block;}
		.c-nav2 .hiden{display: none;}
.c-nav2{width: 100%;background-color: black;position: fixed;bottom: 0;}


}	
		</style>
		
	<html>	
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title></title>

</head>
<body>
<div class="c-nav2" >
		<th><a style="color:white;font-size:20%;" href=\'#\'>Type Somethings</a></th>
</div>
 
</body>
</html>';
		
		
		
	}

Style();
Html();
	
}

?>






