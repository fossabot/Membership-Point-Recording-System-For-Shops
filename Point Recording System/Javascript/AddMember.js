// JavaScript Document

function AddMember(){
	
	
	try {
  			var MemberName = document.getElementById("memberInput").value;
	
			var MemberID = document.getElementById("memberidInput").value;
	
		}
		catch(err) {
  			alert(err.message);
		}
	
	
	$.ajax({
		
			data: {MemberName:MemberName,MemberID:MemberID},
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