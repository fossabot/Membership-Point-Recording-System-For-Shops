<?php
class cookie{
	function deleteCookie(){
		if(isset($_POST['DeleteCookie'])){
			setcookie("VLFU", "", time()-3600);
			header("Location: LoginPage.php");exit;

		}
	
}
	
	
}

class CheckFormat{
	
	function checkmydate($date) {
		
		try {
			$tempDate = explode('-', $date);
			// checkdate(month, day, year)
			checkdate($tempDate[1], $tempDate[2], $tempDate[0]);
		} catch (Exception $e) {
			ob_clean();
			exit(json_encode($e->getMessage(),JSON_UNESCAPED_SLASHES));
		}
		
		
		
  		return checkdate($tempDate[1], $tempDate[2], $tempDate[0]);
		
  
 
}
	
	
}
	
?>