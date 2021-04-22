	<?php

	class ConnectSql{
		function ConnectSqlDatabase(){
			
		$servername = "localhost";
		$username = "root";
		$password="";
		$dbname="point system";
		$connect=mysqli_connect($servername, $username, $password, $dbname);
		$conn = new MySQLi($servername, $username, $password, $dbname) or die ("Connection failed");
		return($connect);
		}
	}

//------------------------------------------------------------

	class CheckDATA extends ConnectSql{
		function PreventSQLInjection($TheData){
			
			if($TheData==""){
				
				
			}else if(!preg_match("/^[A-Za-z0-9]+$/",$TheData)){
				
             	ob_clean();
				if(exit(json_encode("Invalid Input",JSON_UNESCAPED_SLASHES))){
					
					
				}
				
        }
			
			
		}
		
		function IdentifyUser($connect){
		$connect;
		if($_SERVER["REQUEST_METHOD"]=="POST"){

			$id=$_POST['login-form-table-username-input'];
			$pwd=$_POST['login-form-table-password-input'];
			$branch=$_POST['login-form-table-branch-select'];
			
			if(!preg_match("/^[A-Za-z0-9]+$/",$id)){
				
				echo"<script>alert('Invalid Username'); 

				</script>";
				return;
			}

			if(!preg_match("/^[A-Za-z0-9]+$/",$branch)){
				
				echo"<script>alert('Invalid Branch'); 

				</script>";
				return;
			}
			
			if(preg_match('/[\'()}{><>,|]/', $pwd)){
				
				echo"<script>alert('Invalid Password'); 

				</script>";
				return;
			}
			
			$salted = "asjdkfla2132789412789jsv128930#$@%^@#$#@！%……&*".$pwd."7B8BCX6A5D4TDSE6F548?<B>?<dasjdihjnklcxzBNMCjoiv%&*%#@#@！#！~``!@#!@#";




			$result=mysqli_query($connect,"select `P_uname` FROM tb_login where `P_delete?`='0' and `P_branch`='$branch' and `P_uname`='$id' and `P_pwd`=MD5('$salted')");/* SqlCode */


			$Tresult=mysqli_num_rows($result);

			if($Tresult<=0){
				echo"<script>alert('Username or Password or Branch incorrect'); 

				</script>";
			}else if ($Tresult>0){
				$loopid = 0;



				do{

				$str = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890'; 
				$randStr = str_shuffle($str);
				$rands= substr($randStr,0,20);


				$Sql = "UPDATE `tb_login` SET `P_cookie`= '$rands' WHERE `P_uname`= '$id'";
				if ($connect->query($Sql) === TRUE) {
					$expire=time()+60*60*24*30;
					setcookie("VLFU", $rands, $expire);//Set a cookie to store value that can identify user
					echo"<script>alert('Sucessful Login');</script>";

					header("Location: MainMenu.php");exit; /* InputItAsset.php */ 

				}




				}while($loopid=0);



			}

		}


	}
		
		
		function checkCookie($connect){
			$this ->PreventSQLInjection(isset($_COOKIE['VLFU']));
			$id=1;

			do{
				$Adminresult = mysqli_query($connect,"SELECT * FROM `tb_login` WHERE `p_id`=  $id");
				$AdmResNumR= $Adminresult->num_rows;
					if($AdmResNumR == 1) {
						$sql ="SELECT `P_cookie` FROM `tb_login` WHERE `P_id`='$id' And `P_delete?` = 0";
						$result = mysqli_query($connect, $sql);
						$cookie = mysqli_fetch_assoc($result);
						if(!isset($_COOKIE['VLFU'])) {
							header("Location: LoginPage.php");exit;
						}else{
						}
						if ($_COOKIE["VLFU"]==$cookie["P_cookie"]){
							$AdmResNumR= 0;
						}
						}else if ($AdmResNumR == 0){
						header("Location: LoginPage.php");exit;
					}
			$id=$id+1;
			}while($AdmResNumR == 1);
		}
		
		function checkUnusedID($connect,$tbname,$pname){
			$id=1;
			do{
				$idresult = mysqli_query($connect,"SELECT * FROM `".$tbname."` WHERE `".$pname."`= '$id'");
				if($idresult->num_rows == 1) {
     				$id=$id+1;
			}
				
				
			}while($idresult->num_rows == 1);
			
			
			return($id);
		}
		
		function CheckStaffID($connect,$StaffCookie){
			
			$result = mysqli_query($connect,"SELECT `P_id` FROM `tb_login` WHERE `P_cookie`= '$StaffCookie'");
			$row = $result->fetch_assoc();
			return($row['P_id']);
			
		}

		function CheckMember($connect,$MemberID){
			
			$result = mysqli_query($connect,"SELECT `P_id` FROM `tb_member` WHERE `P_code`= '$MemberID'");
			$row = $result->fetch_assoc();
			return($row['P_id']);
			
		}
	
		function CheckcalculationRMtoPoint($connect){
			
			$result = mysqli_query($connect,"SELECT `P_TransferRate` FROM `tb_calculator` WHERE `P_id`= '1'");
			$row = $result->fetch_assoc();
			return($row['P_TransferRate']);
			
			
		}
		
		function CheckcalculationPointToRM($connect){
			$result = mysqli_query($connect,"SELECT `P_TransferRate` FROM `tb_calculator` WHERE `P_id`= '2'");
			$row = $result->fetch_assoc();
			return($row['P_TransferRate']);
			
		}
		
		function CheckBranch($connect,$staffID){
			
			$result = mysqli_query($connect,"SELECT `P_branch` FROM `tb_login` WHERE `P_id`='".$staffID."'");
			$row = $result->fetch_assoc();
			return($row['P_branch']);
			
			
		}
		
		function CheckMemberPoint($connect,$MemberID){
			
			$result = mysqli_query($connect,"SELECT `P_point` FROM `tb_member` WHERE `P_id` = '".$MemberID."'");
			$row = $result->fetch_assoc();
			return($row['P_point']);
			
		}
		
		function CheckStaffInfo($connect){
			if($_SERVER["REQUEST_METHOD"]=="POST"){
				$result = mysqli_query($connect,"SELECT `P_uname`,`P_branch`,`P_admin?` FROM `tb_login`WHERE `P_delete?`=0");
				$StaffInfo = array();
				$id=0;
				while($row = $result->fetch_assoc()){
					$StaffInfo[$id][]= $row['P_uname'];
					$StaffInfo[$id][]= $row['P_branch'];
					if($row['P_admin?']==0){
						$StaffInfo[$id][]="Staff";
					}else if($row['P_admin?']==1){
						$StaffInfo[$id][]="Admin";
					}
					$id=$id+1;
				}
				
				ob_clean();
				exit(json_encode($StaffInfo,JSON_UNESCAPED_SLASHES));
				
			}
			
			
		}
		
		function CheckMemberInfo($connect){
			if($_SERVER["REQUEST_METHOD"]=="POST"){
				$result = mysqli_query($connect,"SELECT `P_name`,`P_code`,`P_point` FROM `tb_member` WHERE `p_delete?`=0");
				$StaffInfo = array();
				$id=0;
				while($row = $result->fetch_assoc()){
					$StaffInfo[$id][]= $row['P_name'];
					$StaffInfo[$id][]= $row['P_code'];
					$StaffInfo[$id][]= $row['P_point'];
					
					$id=$id+1;
				}
				
				ob_clean();
				exit(json_encode($StaffInfo,JSON_UNESCAPED_SLASHES));
				
			}
			
			
			
		}
		
		function CheckBuy($connect,$Fromdate,$Todate,$MemberID,$AllDateCbox,$AllMemberCbox){
			
			if($AllDateCbox == "false" && $AllMemberCbox == "false"){

				
				$result = mysqli_query($connect,"SELECT tb_member.`P_code`, tb_buydetail.`P_date`, tb_buydetail.`P_price(RM)` FROM tb_buydetail LEFT JOIN tb_member ON tb_buydetail.`P_memberid`=tb_member.`P_id` where tb_buydetail.`P_delete?`=0 AND tb_member.P_code= '".$MemberID."' AND tb_buydetail.`P_date` between '".$Fromdate."' and '".$Todate."';");
			
				
		}else if($AllDateCbox == "true" && $AllMemberCbox == "false"){

			$result = mysqli_query($connect,"SELECT tb_member.`P_code`, tb_buydetail.`P_date`, tb_buydetail.`P_price(RM)` FROM tb_buydetail LEFT JOIN tb_member ON tb_buydetail.`P_memberid`=tb_member.`P_id` where tb_buydetail.`P_delete?`=0 AND tb_member.P_code= '".$MemberID."' ;");

		}else if($AllDateCbox == "false" && $AllMemberCbox == "true"){

				$result = mysqli_query($connect,"SELECT tb_member.`P_code`, tb_buydetail.`P_date`, tb_buydetail.`P_price(RM)` FROM tb_buydetail LEFT JOIN tb_member ON tb_buydetail.`P_memberid`=tb_member.`P_id` where tb_buydetail.`P_delete?`=0 and tb_buydetail.`P_date` between '".$Fromdate."' and '".$Todate."';");
				
			}else if($AllDateCbox == "true" && $AllMemberCbox == "true"){

				$result = mysqli_query($connect,"SELECT tb_member.`P_code`, tb_buydetail.`P_date`, tb_buydetail.`P_price(RM)` FROM tb_buydetail LEFT JOIN tb_member ON tb_buydetail.`P_memberid`=tb_member.`P_id` where tb_buydetail.`P_delete?`=0 ;");
				
			}
			
			
			
			
			
			$BuyDetail = array();
			
			$id=0;
					while($row = $result->fetch_assoc()){
						$BuyDetail[$id][]= $id+1;
						$BuyDetail[$id][]= $row['P_code'];
						$BuyDetail[$id][]= $row['P_date'];
						$BuyDetail[$id][]= $row['P_price(RM)'];
					
						$id=$id+1;
					}
			
			ob_clean();
			exit(json_encode($BuyDetail,JSON_UNESCAPED_SLASHES));
			}		
		function CheckRedeemRm($connect,$Fromdate,$Todate,$MemberID,$AllDateCbox,$AllMemberCbox){
			
			if($AllDateCbox == "false" && $AllMemberCbox == "false"){
				$result = mysqli_query($connect,"SELECT tb_member.`P_code`, tb_redeemrmdetail.`P_date`, tb_redeemrmdetail.`P_redeem_rm`, tb_redeemrmdetail.`P_refferenceNo` FROM tb_redeemrmdetail LEFT JOIN tb_member ON tb_redeemrmdetail.`P_memberid`=tb_member.`P_id` where tb_member.P_code ='".$MemberID."'AND tb_redeemrmdetail.`P_delete?`=0 and tb_redeemrmdetail.`P_date` between '".$Fromdate."' and '".$Todate."';");
				

				
		}else if($AllDateCbox == "true" && $AllMemberCbox == "false"){

				$result = mysqli_query($connect,"SELECT tb_member.`P_code`, tb_redeemrmdetail.`P_date`, tb_redeemrmdetail.`P_redeem_rm`, tb_redeemrmdetail.`P_refferenceNo` FROM tb_redeemrmdetail LEFT JOIN tb_member ON tb_redeemrmdetail.`P_memberid`=tb_member.`P_id` where tb_member.P_code ='".$MemberID."'AND tb_redeemrmdetail.`P_delete?`=0;");

		}else if($AllDateCbox == "false" && $AllMemberCbox == "true"){
				$result = mysqli_query($connect,"SELECT tb_member.`P_code`, tb_redeemrmdetail.`P_date`, tb_redeemrmdetail.`P_redeem_rm`, tb_redeemrmdetail.`P_refferenceNo` FROM tb_redeemrmdetail LEFT JOIN tb_member ON tb_redeemrmdetail.`P_memberid`=tb_member.`P_id` where tb_redeemrmdetail.`P_delete?`=0 and tb_redeemrmdetail.`P_date` between '".$Fromdate."' and '".$Todate."';");
				
			}else if($AllDateCbox == "true" && $AllMemberCbox == "true"){

				$result = mysqli_query($connect,"SELECT tb_member.`P_code`, tb_redeemrmdetail.`P_date`, tb_redeemrmdetail.`P_redeem_rm`, tb_redeemrmdetail.`P_refferenceNo` FROM tb_redeemrmdetail LEFT JOIN tb_member ON tb_redeemrmdetail.`P_memberid`=tb_member.`P_id` where tb_redeemrmdetail.`P_delete?`=0 ;");
				
				
				
			}
			
			
			
			
			$RedeemRmDetail = array();
			
			$id=0;
				while($row = $result->fetch_assoc()){
					$RedeemRmDetail[$id][]= $id+1;
					$RedeemRmDetail[$id][]= $row['P_code'];
					$RedeemRmDetail[$id][]= $row['P_date'];
					$RedeemRmDetail[$id][]= $row['P_redeem_rm'];
					$RedeemRmDetail[$id][]= $row['P_refferenceNo'];
					$id=$id+1;
				}
			
			
			
			ob_clean();
			exit(json_encode($RedeemRmDetail,JSON_UNESCAPED_SLASHES));
			
			
		}
		
		function CheckRedeempoint($connect,$Fromdate,$Todate,$MemberID,$AllDateCbox,$AllMemberCbox){
			if($AllDateCbox == "false" && $AllMemberCbox == "false"){
				
				$result = mysqli_query($connect,"SELECT tb_member.`P_code`, tb_redeempointdetail.`P_date`, tb_redeempointdetail.`P_redeem_p`, tb_redeempointdetail.`P_refferenceNo` FROM tb_redeempointdetail LEFT JOIN tb_member ON tb_redeempointdetail.`P_memberid`=tb_member.`P_id` where tb_member.P_code = '".$MemberID."' AND tb_redeempointdetail.`P_delete?`=0 and tb_redeempointdetail.`P_date` between '".$Fromdate."' and '".$Todate."';");
				

				
			}else if($AllDateCbox == "true" && $AllMemberCbox == "false"){

				$result = mysqli_query($connect,"SELECT tb_member.`P_code`, tb_redeempointdetail.`P_date`, tb_redeempointdetail.`P_redeem_p`, tb_redeempointdetail.`P_refferenceNo` FROM tb_redeempointdetail LEFT JOIN tb_member ON tb_redeempointdetail.`P_memberid`=tb_member.`P_id` where tb_member.P_code = '".$MemberID."' AND tb_redeempointdetail.`P_delete?`=0;");

			}else if($AllDateCbox == "false" && $AllMemberCbox == "true"){
				$result = mysqli_query($connect,"SELECT tb_member.`P_code`, tb_redeempointdetail.`P_date`, tb_redeempointdetail.`P_redeem_p`, tb_redeempointdetail.`P_refferenceNo` FROM tb_redeempointdetail LEFT JOIN tb_member ON tb_redeempointdetail.`P_memberid`=tb_member.`P_id` where tb_redeempointdetail.`P_delete?`=0 and tb_redeempointdetail.`P_date` between '".$Fromdate."' and '".$Todate."';");
				
			}else if($AllDateCbox == "true" && $AllMemberCbox == "true"){

				
				$result = mysqli_query($connect,"SELECT tb_member.`P_code`, tb_redeempointdetail.`P_date`, tb_redeempointdetail.`P_redeem_p`, tb_redeempointdetail.`P_refferenceNo` FROM tb_redeempointdetail LEFT JOIN tb_member ON tb_redeempointdetail.`P_memberid`=tb_member.`P_id` where tb_redeempointdetail.`P_delete?`=0;");
				
				
			}
			
			
			
			
			$RedeemPointDetail = array();
			
			$id=0;
				while($row = $result->fetch_assoc()){
					$RedeemPointDetail[$id][]= $id+1;
					$RedeemPointDetail[$id][]= $row['P_code'];
					$RedeemPointDetail[$id][]= $row['P_date'];
					$RedeemPointDetail[$id][]= $row['P_redeem_p'];
					$RedeemPointDetail[$id][]= $row['P_refferenceNo'];
					$id=$id+1;
				}
			
			
			
			ob_clean();
			exit(json_encode($RedeemPointDetail,JSON_UNESCAPED_SLASHES));
			
		}
		
		function ROCheckMemberPoint($connect,$Fromdate,$Todate,$MemberID,$AllDateCbox,$AllMemberCbox){
			if($AllMemberCbox == "true"){
				
				$result = mysqli_query($connect,"SELECT `P_name`,`P_code`,`P_point` FROM `tb_member` WHERE `p_delete?`=0;");
				

				
			}else if($AllMemberCbox == "false"){

				$result = mysqli_query($connect,"SELECT `P_name`,`P_code`,`P_point` FROM `tb_member` WHERE `p_delete?`=0 AND `P_code` ='".$MemberID."';");

			}
			
			
			
			
			$MemberPointDetail = array();
			
			$id=0;
				while($row = $result->fetch_assoc()){
					$MemberPointDetail[$id][]= $id+1;
					$MemberPointDetail[$id][]= $row['P_name'];
					$MemberPointDetail[$id][]= $row['P_code'];
					$MemberPointDetail[$id][]= $row['P_point'];
					$id=$id+1;
				}
			
			
			
			ob_clean();
			exit(json_encode($MemberPointDetail,JSON_UNESCAPED_SLASHES));
			
		}
		
		function ReportOperation($connect){
			require_once('PHP/Process.php');
			$CheckFormat = new CheckFormat();
			
			if($_SERVER["REQUEST_METHOD"]=="POST"){

				if(isset($_POST['Type'])){
					$Type = $_POST['Type'];
					$MemberID = $_POST['MemberID'];
					$Fromwhen = $_POST['Fromwhen'];
					$Towhen = $_POST['Towhen'];
					if(($Fromwhen==""||$Towhen=="") && $_POST['AllDateCbox']=="false"){
						
						ob_clean();
						exit(json_encode("Please Insert The Date",JSON_UNESCAPED_SLASHES));
						
					}
					
					
					$this ->PreventSQLInjection($Type);
					
					$this ->PreventSQLInjection($_POST['AllDateCbox']);
					$this ->PreventSQLInjection($_POST['AllMemberCbox']);
					
					
						if(($CheckFormat -> checkmydate($Fromwhen)===false||$CheckFormat -> checkmydate($Towhen)===false)&& $_POST['AllDateCbox']=="false"){
						
						ob_clean();
						exit(json_encode("Please Insert The Correct Date",JSON_UNESCAPED_SLASHES));
						}
					
					
					
					
					if($MemberID === "" && $_POST['AllMemberCbox'] == "false"){
						$this ->PreventSQLInjection($MemberID);
						ob_clean();
						exit(json_encode("Please Insert The Member ID",JSON_UNESCAPED_SLASHES));
						
					}
					
					if(!ctype_digit($MemberID) && $_POST['AllMemberCbox'] == "false"){
						
						ob_clean();
						exit(json_encode("Member ID Should Be Numeric",JSON_UNESCAPED_SLASHES));
						
					}
					
						
						
						
						
					
					if($Type=="checkbuy"){
						
						$this->CheckBuy($connect,$Fromwhen,$Towhen,$MemberID,$_POST['AllDateCbox'],$_POST['AllMemberCbox']);
						
					}else if($Type=="checkredeemrm"){
						
						
						$this->CheckRedeemRm($connect,$Fromwhen,$Towhen,$MemberID,$_POST['AllDateCbox'],$_POST['AllMemberCbox']);
						
					}else if($Type=="checkredeempoint"){
						$this->CheckRedeempoint($connect,$Fromwhen,$Towhen,$MemberID,$_POST['AllDateCbox'],$_POST['AllMemberCbox']);
						
						
					}else if($Type=="checkmemberpoint"){
					
						$this->ROCheckMemberPoint($connect,$Fromwhen,$Towhen,$MemberID,$_POST['AllDateCbox'],$_POST['AllMemberCbox']);
						
					}
					
					
					
					
				
					
				
				}
			}
		
			
			
		}
		
	}

//------------------------------------------------------------

	class changeDATA extends ConnectSql{
		function PreventSQLInjection($TheData){
			
			if($TheData==""){
				
				
			}else if(!preg_match("/^[A-Za-z0-9]+$/",$TheData)){
				
             	ob_clean();
				if(exit(json_encode("Invalid Input",JSON_UNESCAPED_SLASHES))){
					
					
				}
				
        }
			
			
		}
		
		function increasePoint($connect,$TotalBuy,$MemberID,$UnusedID){
			$CheckDATA = new CheckDATA();
			$calculaterate=$CheckDATA ->CheckcalculationRMtoPoint($this -> ConnectSqlDatabase());
			
			$PointToSave = $TotalBuy*$calculaterate;

			
			if(mysqli_query($connect,"UPDATE `tb_member` SET `P_point`= `P_point`+ '".$PointToSave."' WHERE P_id ='".$MemberID."'")){
				
				return($PointToSave);
				
			}else{
				mysqli_query($connect,"DELETE FROM `tb_buydetail` WHERE `P_id`= '".$UnusedID."'");
				exit(json_encode("Somethings Wrong, Please Contact Your Server Administrator",JSON_UNESCAPED_SLASHES));
				
			}
			
		}
		function decreasePointByRM($connect,$TotalRedeemRM,$MemberID,$UnusedID){
			
			$CheckDATA = new CheckDATA();
			$calculaterate=$CheckDATA ->CheckcalculationPointToRM($this -> ConnectSqlDatabase());
			$TotalPointLeft = $CheckDATA ->CheckMemberPoint($this -> ConnectSqlDatabase(),$MemberID);
			$PointTodecrease = $TotalRedeemRM*$calculaterate;
			
			
			
			
			if($TotalPointLeft<$PointTodecrease){
				ob_clean();
				exit(json_encode("Operation Canceled, No Enough Point. (Total Point Left: ".$TotalPointLeft.", You Need ".$PointTodecrease." Point To Redeem.",JSON_UNESCAPED_SLASHES));
				
			}else{
				
				if($TotalPointLeft==$PointTodecrease){
					
					mysqli_query($connect,"UPDATE `tb_member` SET `P_point`= '0' WHERE P_id ='".$MemberID."'");
					
				}else{
					if(mysqli_query($connect,"UPDATE `tb_member` SET `P_point`= `P_point`- '".$PointTodecrease."' WHERE P_id ='".$MemberID."'")){
					
					$TotalPointLeft = $CheckDATA ->CheckMemberPoint($this -> ConnectSqlDatabase(),$MemberID);
						return($TotalPointLeft);
					
					}else{
					ob_clean();
					exit(json_encode("Somethings Wrong, Please Contact Your Server Administrator",JSON_UNESCAPED_SLASHES));
				
					}
				}
				
			}
			
			
			
			
		}
		function decreasePointOnly($connect,$TotalRedeemPoint,$MemberID,$UnusedID){
			
			$CheckDATA = new CheckDATA();
			$TotalPointLeft = $CheckDATA ->CheckMemberPoint($this -> ConnectSqlDatabase(),$MemberID);
			
			if($TotalPointLeft<$TotalRedeemPoint){
				ob_clean();
				exit(json_encode("Operation Canceled, No Enough Point. (Total Point Left: ".$TotalPointLeft.", You Need ".$TotalRedeemPoint." Point To Redeem.",JSON_UNESCAPED_SLASHES));
				
			}else{
				
				if($TotalPointLeft==$TotalRedeemPoint){
					
					mysqli_query($connect,"UPDATE `tb_member` SET `P_point`= '0' WHERE P_id ='".$MemberID."'");
					
				}else{
					if(mysqli_query($connect,"UPDATE `tb_member` SET `P_point`= `P_point`- '".$TotalRedeemPoint."' WHERE P_id ='".$MemberID."'")){
					
					$TotalPointLeft = $CheckDATA ->CheckMemberPoint($this -> ConnectSqlDatabase(),$MemberID);
						return($TotalPointLeft);
					
					}else{
					ob_clean();
					exit(json_encode("Somethings Wrong, Please Contact Your Server Administrator",JSON_UNESCAPED_SLASHES));
				
					}
				}
				
			}
			
			
		}
		
	}

	class AddDATA extends ConnectSql{
		function PreventSQLInjection($TheData){
			
			if($TheData==""){
				
				
			}else if(!preg_match("/^[A-Za-z0-9]+$/",$TheData)){
				
             	ob_clean();
				if(exit(json_encode("Invalid Input",JSON_UNESCAPED_SLASHES))){
					
					
				}
				
        }
			
			
		}
		
		function OperationJudgment(){
			if($_SERVER["REQUEST_METHOD"]=="POST"){
				
				
				$this ->PreventSQLInjection($_POST['MemberCode']);
				$this ->PreventSQLInjection($_POST['BuyOrRedeem']);
				$this ->PreventSQLInjection($_POST['verifyCookie']);
				
				
				if(isset($_POST['BuyOrRedeem'])){
					$BuyOrRedeem = $_POST['BuyOrRedeem'];
					
					if($BuyOrRedeem == "Buy"){
						
						$MemberCode=$_POST['MemberCode'];
						$TotalBuy=$_POST['Value'];
						$StaffCookie = $_POST['verifyCookie'];
						
						if($TotalBuy==0){
							
							ob_clean();
							exit(json_encode("Buy Input Cannot Be Zero",JSON_UNESCAPED_SLASHES));
							
						}
						
						if((!ctype_digit($MemberCode))||($MemberCode >= 1000000000000)||(!is_numeric($TotalBuy))||($TotalBuy >= 50000)){
							ob_clean();
							exit(json_encode("Invalid Input",JSON_UNESCAPED_SLASHES));

						}
						
						$this->BuyRecord($this -> ConnectSqlDatabase(),$MemberCode,$TotalBuy,$StaffCookie);
						
						
						
					}else if ($BuyOrRedeem == "RedeemRM"){
						
						
						$MemberCode=$_POST['MemberCode'];
						$TotalRedeemRM=$_POST['Value'];
						$StaffCookie = $_POST['verifyCookie'];
						
						if($TotalRedeemRM==0){
							
							ob_clean();
							exit(json_encode("Redeem Input Cannot Be Zero",JSON_UNESCAPED_SLASHES));
							
						}
						
						if((!ctype_digit($MemberCode))||($MemberCode >= 1000000000000)||(!is_numeric($TotalRedeemRM))||($TotalRedeemRM >= 50000)){
							ob_clean();
							exit(json_encode("Invalid Input",JSON_UNESCAPED_SLASHES));

						}
						
						$this->RedeemRMRecord($this -> ConnectSqlDatabase(),$MemberCode,$TotalRedeemRM,$StaffCookie);
						
						
						
						
					}else if ($BuyOrRedeem == "RedeemP"){
						
						$MemberCode=$_POST['MemberCode'];
						$TotalRedeemRM=$_POST['Value'];
						$StaffCookie = $_POST['verifyCookie'];
						
						if($TotalRedeemRM==0){
							
							ob_clean();
							exit(json_encode("Redeem Input Cannot Be Zero",JSON_UNESCAPED_SLASHES));
							
						}
						
						if((!ctype_digit($MemberCode))||($MemberCode >= 1000000000000)||(!is_numeric($TotalRedeemRM))||($TotalRedeemRM >= 50000)){
							ob_clean();
							exit(json_encode("Invalid Input",JSON_UNESCAPED_SLASHES));

						}
						
						$this->RedeemPointRecord($this -> ConnectSqlDatabase(),$MemberCode,$TotalRedeemRM,$StaffCookie);
					
					}else{
						
						ob_clean();
						exit(json_encode("Invalid Input",JSON_UNESCAPED_SLASHES));
						
					}
					
				}
				   }
		}
				
		function BuyRecord($connect,$MemberCode,$TotalBuy,$StaffCookie){
			$CheckData = new CheckDATA();
			$changeDATA = new changeDATA();
			

			$UnusedID=$CheckData -> checkUnusedID($this -> ConnectSqlDatabase(),"tb_buydetail","P_id");
			
			$StaffID=$CheckData -> CheckStaffID($this -> ConnectSqlDatabase(),$StaffCookie);
			
			if($StaffID==null){
				ob_clean();
				exit(json_encode("Please Relogin",JSON_UNESCAPED_SLASHES));
				}
			
			$MemberID=$CheckData -> CheckMember($this -> ConnectSqlDatabase(),$MemberCode);
			
			if($MemberID==null){
				
				ob_clean();
				exit(json_encode("Invalid Member ID",JSON_UNESCAPED_SLASHES));
				
			}
			
			$TodayDate=date("Y-m-d");
			
			
			
			if(mysqli_query($connect,"INSERT INTO `tb_buydetail`(`P_id`, `P_memberid`, `P_date`, `P_price(RM)`, `P_staffid`, `P_delete?`) VALUES ('".$UnusedID."','".$MemberID."','".$TodayDate."','".$TotalBuy."','".$StaffID."','0')")){
				
				$Earn=$changeDATA -> increasePoint($this -> ConnectSqlDatabase(),$TotalBuy,$MemberID,$UnusedID);
				
				ob_clean();
				exit(json_encode("Sucessful Earn Point: ".$Earn,JSON_UNESCAPED_SLASHES));
				
			}else{
				
				ob_clean();
				exit(json_encode("Somethings Wrong, Please Contact Your Server Administrator",JSON_UNESCAPED_SLASHES));
				
				
				
			}

			
		}
		
		function AddUser($connect){
			
			if($_SERVER["REQUEST_METHOD"]=="POST"){
				
				
				if($_POST['Username']==""){
					
					ob_clean();
					exit(json_encode("Please Insert Username",JSON_UNESCAPED_SLASHES));
					
				}
				
				if($_POST['Password']==""){
					
					ob_clean();
					exit(json_encode("Please Insert Password",JSON_UNESCAPED_SLASHES));
					
				}
				
				$this ->PreventSQLInjection($_POST['Username']);
				if(preg_match('/[\'()}{><>,|]/', $_POST['Password'])){
				
				ob_clean();
				exit(json_encode("Invalid Input",JSON_UNESCAPED_SLASHES));
				
				}
				$this ->PreventSQLInjection($_POST['Class']);
				$this ->PreventSQLInjection($_POST['Branch']);
				
				try
					{ 
					$CheckData = new CheckDATA();
					$Username=$_POST['Username'];
					$Password=$_POST['Password'];
					$Class=$_POST['Class'];
					$Branch=$_POST['Branch'];
					$UnusedID=$CheckData -> checkUnusedID($this -> ConnectSqlDatabase(),"tb_login","P_id");
					}
					catch(Exception $e)
					{ 
						ob_clean();
						exit(json_encode("Server Connection Failed",JSON_UNESCAPED_SLASHES));
					
					}
				

				
					if (!in_array($Branch, array('A','B','C','D'), true )){
						ob_clean();
						exit(json_encode("Invalid Branch",JSON_UNESCAPED_SLASHES));
						
					}
				
				
					if (!in_array($Class, array('Admin','Staff'), true )){
						ob_clean();
						exit(json_encode("Invalid Class",JSON_UNESCAPED_SLASHES));
						
					}else if($Class=="Admin"){
						
						$Class=1;
						
					}else if($Class=="Staff"){
						$Class=0;
					}
				
					$salted = "asjdkfla2132789412789jsv128930#$@%^@#$#@！%……&*".$Password."7B8BCX6A5D4TDSE6F548?<B>?<dasjdihjnklcxzBNMCjoiv%&*%#@#@！#！~``!@#!@#";
				
					
				
				if(mysqli_query($connect,"INSERT INTO `tb_login`(`P_id`, `P_uname`, `P_pwd`, `P_branch`, `P_admin?`, `P_cookie`, `P_delete?`) VALUES ('".$UnusedID."','".$Username."',MD5('".$salted."'),'".$Branch."','".$Class."',NULL,'0')")){
				
						
				
				
						ob_clean();
						exit(json_encode("Sucessful",JSON_UNESCAPED_SLASHES));
				

				
				}else{
						ob_clean();
						exit(json_encode("Username Already Taken",JSON_UNESCAPED_SLASHES));
					
					
				}
			}
			
			
		}
		
		function AddMember($connect){
			
			if($_SERVER["REQUEST_METHOD"]=="POST"){
				$this ->PreventSQLInjection($_POST['MemberName']);
				$this ->PreventSQLInjection($_POST['MemberID']);
				if($_POST['MemberName']==""){
					
					ob_clean();
					exit(json_encode("Please Insert Member Name",JSON_UNESCAPED_SLASHES));
					
				}
				
				try
					{ 
					$CheckData = new CheckDATA();
					$MemberName=$_POST['MemberName'];
					$MemberID=$_POST['MemberID'];
					$UnusedID=$CheckData -> checkUnusedID($this -> ConnectSqlDatabase(),"tb_member","P_id");
					}
					catch(Exception $e)
					{ 
						ob_clean();
						exit(json_encode("Server Connection Failed",JSON_UNESCAPED_SLASHES));
					
					}
				
				if(!ctype_digit($MemberID)){
					ob_clean();
					exit(json_encode("Please Input Number Only For Member ID",JSON_UNESCAPED_SLASHES));
					
					
				}
				
				
					
				
				if(mysqli_query($connect,"INSERT INTO `tb_member`(`P_id`, `P_name`, `P_code`, `P_point`, `p_delete?`) VALUES ('".$UnusedID."','".$MemberName."','".$MemberID."','0','0')")){
				
						
				
				
						ob_clean();
						exit(json_encode("Sucessful",JSON_UNESCAPED_SLASHES));
				

				
				}else{
						ob_clean();
						exit(json_encode("Member ID Already Taken",JSON_UNESCAPED_SLASHES));
					
					
				}
			}
			
			
		}
		
		function RedeemRMRecord($connect,$MemberCode,$TotalRedeemRM,$StaffCookie){
			$CheckData = new CheckDATA();
			$changeDATA = new changeDATA();
			
			$MemberID=$CheckData -> CheckMember($this -> ConnectSqlDatabase(),$MemberCode);

			if($MemberID==null){
					ob_clean();
					exit(json_encode("This Member ID Is Not Register In System",JSON_UNESCAPED_SLASHES));
			}
			
			

				
				
				$UnusedID=$CheckData -> checkUnusedID($this -> ConnectSqlDatabase(),"tb_redeemrmdetail","P_id");
				$StaffID=$CheckData -> CheckStaffID($this -> ConnectSqlDatabase(),$StaffCookie);
				$Branch=$CheckData -> CheckBranch($this -> ConnectSqlDatabase(),$StaffID);


				if($StaffID==null){
					ob_clean();
					exit(json_encode("Please Relogin",JSON_UNESCAPED_SLASHES));
					}

				
				$TodayDate=date("Y-m-d");
				$refferenceCode = "R".$Branch.$StaffID.$TotalRedeemRM."-".$UnusedID;
				
				
				$PointLeft=$changeDATA -> decreasePointByRM($this -> ConnectSqlDatabase(),$TotalRedeemRM,$MemberID,$UnusedID);
				
				if(mysqli_query($connect,"INSERT INTO `tb_redeemrmdetail`(`P_id`, `P_memberid`, `P_date`, `P_redeem_rm`, `P_staffid`, `P_refferenceNo`, `P_delete?`) VALUES ('".$UnusedID."','".$MemberID."','".$TodayDate."','".$TotalRedeemRM."','".$StaffID."','".$refferenceCode."','0')")){
					
					ob_clean();
					if($PointLeft==null){
						exit(json_encode("Sucessful,Total Point Left: 0",JSON_UNESCAPED_SLASHES));
						
					}else{
						exit(json_encode("Sucessful,Total Point Left: ".$PointLeft." Code: ".$refferenceCode,JSON_UNESCAPED_SLASHES));
						
					}
					

				}else{

					ob_clean();
					exit(json_encode("Somethings Wrong, Please Contact Your Server Administrator",JSON_UNESCAPED_SLASHES));



				}
				
				
				
			
			
			
			
			
			
			
			
			
			
			
		}
		
		function RedeemPointRecord($connect,$MemberCode,$TotalRedeemPoint,$StaffCookie){
			
			$CheckData = new CheckDATA();
			$changeDATA = new changeDATA();
			
			$MemberID=$CheckData -> CheckMember($this -> ConnectSqlDatabase(),$MemberCode);

			if($MemberID==null){
					ob_clean();
					exit(json_encode("This Member ID Is Not Register In System",JSON_UNESCAPED_SLASHES));
			}
			
			

				
				
				$UnusedID=$CheckData -> checkUnusedID($this -> ConnectSqlDatabase(),"tb_redeempointdetail","P_id");
				$StaffID=$CheckData -> CheckStaffID($this -> ConnectSqlDatabase(),$StaffCookie);
				$Branch=$CheckData -> CheckBranch($this -> ConnectSqlDatabase(),$StaffID);


				if($StaffID==null){
					ob_clean();
					exit(json_encode("Please Relogin",JSON_UNESCAPED_SLASHES));
					}

				
			$TodayDate=date("Y-m-d");
			$refferenceCode = "P".$Branch.$StaffID.$TotalRedeemPoint."-".$UnusedID;
			
			$PointLeft=$changeDATA -> decreasePointOnly($this -> ConnectSqlDatabase(),$TotalRedeemPoint,$MemberID,$UnusedID);
			
			if(mysqli_query($connect,"INSERT INTO `tb_redeempointdetail`(`P_id`, `P_memberid`, `P_date`, `P_redeem_p`, `P_staffid`, `P_refferenceNo`, `P_delete?`) VALUES ('".$UnusedID."','".$MemberID."','".$TodayDate."','".$TotalRedeemPoint."','".$StaffID."','".$refferenceCode."','0')")){
					
					ob_clean();
					if($PointLeft==null){
						exit(json_encode("Sucessful,Total Point Left: 0",JSON_UNESCAPED_SLASHES));
						
					}else{
						exit(json_encode("Sucessful,Total Point Left: ".$PointLeft." Code: ".$refferenceCode,JSON_UNESCAPED_SLASHES));
						
					}
					

				}else{

					ob_clean();
					exit(json_encode("Somethings Wrong, Please Contact Your Server Administrator",JSON_UNESCAPED_SLASHES));



				}
			
			
			
		}
		
		
		
	}



	?>