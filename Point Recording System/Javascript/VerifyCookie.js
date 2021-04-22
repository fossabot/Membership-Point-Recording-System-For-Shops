// JavaScript Document
/* exported VerifyCookie*/
	function VerifyCookie(){
		$.ajax({
			
			data: {DeleteCookie:"1"},
			type: 'POST',
			success: function(data){
				
			},
			error : function() {    
				alert("Error！");
			}	    
		});
	}

