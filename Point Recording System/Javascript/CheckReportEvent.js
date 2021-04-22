// JavaScript Document
function AllDateCheckbox(){
	var AllDateCbox = document.getElementById("AllDateCheckbox");
	
	
	if(AllDateCbox.checked == true){
		
		document.getElementById("from").disabled=true;
		document.getElementById("to").disabled=true;
	}else if(AllDateCbox.checked == false){
		 
		document.getElementById("from").disabled=false;
		document.getElementById("to").disabled=false;
			 
			 
			 }
	
	
}


function AllMemberIDCheckbox(){
	var AllMemberIDCbox = document.getElementById("AllMemberCheckbox");
	
	if(AllMemberIDCbox.checked == true){
	   
	   document.getElementById("MemberIDInput").disabled=true;
	   
	   }else if(AllMemberIDCbox.checked == false){
		
		document.getElementById("MemberIDInput").disabled=false;
	}
	
	
}

function CheckSelect(){
	
	var select = document.getElementById("ReportTypeSelect").value;
	
	if(select=="MemberPoint"){
		document.getElementById("from").disabled=true;
		document.getElementById("to").disabled=true;
		document.getElementById("AllDateCheckbox").disabled=true;
		document.getElementById("AllDateCheckbox").checked=true;
	}else{
		
		document.getElementById("AllDateCheckbox").disabled=false;
		
		
		
		
	}
	
	
}