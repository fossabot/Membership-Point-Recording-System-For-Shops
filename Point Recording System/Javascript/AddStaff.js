// JavaScript Document

function AddUser(){
	
	
	try {
  			var Username = document.getElementById("usernameInput").value;
	
			var Password = document.getElementById("passwordInput").value;
	
			var Class = document.getElementById("ClassSelect").value;
	
			var Branch = document.getElementById("branchSelect").value;
		}
		catch(err) {
  			alert(err.message);
		}
	
	
	$.ajax({
		
			data: {Username:Username,Password:Password,Class:Class,Branch:Branch},
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