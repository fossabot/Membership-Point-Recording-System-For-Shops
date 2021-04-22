// JavaScript Document
/* exported OperationRadio*/
function CheckRadio(which){
	try {
		var which = which;
		var BuyInput = document.getElementById("buyInput");
		var RedeemRmInput = document.getElementById("redeemRmInput");
		var RedeemPointInput = document.getElementById("redeemPInput");

		if(which=="B"){

			RedeemRmInput.disabled=true;
			BuyInput.disabled=false;
			RedeemPointInput.disabled=true;
			
			RedeemRmInput.value="";
			RedeemPointInput.value="";
			
		   }else if (which=="RRM"){
			   
			   BuyInput.disabled=true;
			   RedeemRmInput.disabled=false;
			   RedeemPointInput.disabled=true;
			   
			   RedeemPointInput.value="";
			   BuyInput.value="";
		   }

			else if (which=="RP"){

				BuyInput.disabled=true;
				RedeemRmInput.disabled=true;
				RedeemPointInput.disabled=false;
				
				RedeemRmInput.value="";
				BuyInput.value="";
		   }
		
		}catch(err) {
  			alert(err.message);
			return;
		}
}

function Send(){
	
	try {
		var redeemRmInput = document.getElementById("redeemRmInput");
		
		var redeemPInput = document.getElementById("redeemPInput");
		
		var buyinput = document.getElementById("buyInput");
	
		var MemberCode = document.getElementById("MemberidInput").value;
	
		var BuyOrRedeem;
	
		var Value;
	
		var verifyCookie = check_cookie_name("VLFU");
		
		
		if(!buyinput.disabled){
			
				Value = buyinput.value;	
				BuyOrRedeem = "Buy";
					
		}else if(!redeemRmInput.disabled){
	   
	    	Value = redeemRmInput.value;
			BuyOrRedeem = "RedeemRM";
		
	   
	   }else if(!redeemPInput.disabled){
				
			Value = redeemPInput.value;	
			BuyOrRedeem = "RedeemP";
				
			}
		
		
	}catch(err) {
  			alert(err.message);
			return;
		}
	

	
	$.ajax({
		
			data: {BuyOrRedeem:BuyOrRedeem,MemberCode:MemberCode,Value:Value,verifyCookie:verifyCookie},
			type: 'POST',
			success: function(data){
				alert(data);
				
				if (data=="Sucess"){
				
				//location.reload();
				}
				
				
				
            },
     		error : function() {    
          alert("Error！");
     }
        });
	
	
}

function check_cookie_name(name){
      var match = document.cookie.match(new RegExp('(^| )' + name + '=([^;]+)'));
      if (match) {
        return match[2];
      }
      else{
           return '--something went wrong---';
		  
      }
   }