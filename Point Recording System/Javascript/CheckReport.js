// JavaScript Document
var li1 = document.getElementById("li1");
var li2 = document.getElementById("li2");
var li3 = document.getElementById("li3");
var li4 = document.getElementById("li4");
var li5 = document.getElementById("li5");
var span1 = document.getElementById("span1");
var span2 = document.getElementById("span2");
var span3 = document.getElementById("span3");
var span4 = document.getElementById("span4");
var span5 = document.getElementById("span5");


function changeReport(){
	var reporttype = document.getElementById("ReportTypeSelect").value;
 
	if(reporttype=="BuyDetail"){
		
		checkbuy();
		span1.innerHTML = "No";
		span2.innerHTML = "Member ID";
		span3.innerHTML = "Date";
		span4.innerHTML = "Buy(RM)";
		span5.innerHTML = "";
		li1.style.width = "10%";
		li2.style.width = "30%";
		li3.style.width = "30%";
		li4.style.width = "25%";
		li5.style.width = "0%";
		li5.style.display = "none";
		
		




		
	}else if(reporttype=="ClaimDetailRm"){ 
		checkredeemrm();
		span1.innerHTML = "No";
		span2.innerHTML = "Member ID";
		span3.innerHTML = "Date";
		span4.innerHTML = "Redeem(RM)";
		span5.innerHTML = "Reference";
		li1.style.width = "8%";
		li2.style.width = "20%";
		li3.style.width = "16%";
		li4.style.width = "25%";
		li5.style.width = "25%";
		li5.style.display = "inline-block";
		
	}else if(reporttype=="ClaimDetailPoint"){
		checkredeempoint();
		span1.innerHTML = "No";
		span2.innerHTML = "Member ID";
		span3.innerHTML = "Date";
		span4.innerHTML = "Redeem(Point)";
		span5.innerHTML = "Reference";
		li1.style.width = "8%";
		li2.style.width = "20%";
		li3.style.width = "16%";
		li4.style.width = "25%";
		li5.style.width = "25%";
		li5.style.display = "inline-block";
		
		
	}else if(reporttype=="MemberPoint"){
		checkmemberpoint();
		span1.innerHTML = "No";
		span2.innerHTML = "Member Name";
		span3.innerHTML = "Member ID";
		span4.innerHTML = "Point";
		span5.innerHTML = "";
		li1.style.width = "10%";
		li2.style.width = "30%";
		li3.style.width = "30%";
		li4.style.width = "25%";
		li5.style.width = "0%";
		li5.style.display = "none";
			 
			 }
	
	
	
}
	
	
	
function checkbuy(){
	 
	var from = document.getElementById("from").value;
	var to = document.getElementById("to").value;
	var MemberID = document.getElementById("MemberIDInput").value;
	var AllDateCheckbox = document.getElementById("AllDateCheckbox");
	var AllMemberCheckbox = document.getElementById("AllMemberCheckbox");
	var AllDateCbox;
	var AllMemberCbox;
	

	
	
	if(AllDateCheckbox.checked == true){
	   
		AllDateCbox = true;
	   
	   }else if(AllDateCheckbox.checked == false){
				AllDateCbox = false;
				
				}else{
					
					return
				}
	
	if(AllMemberCheckbox.checked == true){
	   
		AllMemberCbox = true;
	   
	   }else if(AllMemberCheckbox.checked == false){
				AllMemberCbox = false;
				
				}else{
					
					return
				}
	
	rebuild();
	
	
	DoAjax("checkbuy",MemberID,from,to,AllDateCbox,AllMemberCbox);
	

}

function checkredeemrm(){
	var from = document.getElementById("from").value;
	var to = document.getElementById("to").value;
	var MemberID = document.getElementById("MemberIDInput").value;
	var AllDateCheckbox = document.getElementById("AllDateCheckbox");
	var AllMemberCheckbox = document.getElementById("AllMemberCheckbox");
	var AllDateCbox;
	var AllMemberCbox;
	rebuild();
	if(AllDateCheckbox.checked == true){
	   
		AllDateCbox = true;
	   
	   }else if(AllDateCheckbox.checked == false){
				AllDateCbox = false;
				
				}else{
					
					return
				}
	
	if(AllMemberCheckbox.checked == true){
	   
		AllMemberCbox = true;
	   
	   }else if(AllMemberCheckbox.checked == false){
				AllMemberCbox = false;
				
				}else{
					
					return
				}
	
	
	DoAjax("checkredeemrm",MemberID,from,to,AllDateCbox,AllMemberCbox);
	
	
}
function checkredeempoint(){
	var from = document.getElementById("from").value;
	var to = document.getElementById("to").value;
	var MemberID = document.getElementById("MemberIDInput").value;
	var AllDateCheckbox = document.getElementById("AllDateCheckbox");
	var AllMemberCheckbox = document.getElementById("AllMemberCheckbox");
	var AllDateCbox;
	var AllMemberCbox;
	rebuild();
	if(AllDateCheckbox.checked == true){
	   
		AllDateCbox = true;
	   
	   }else if(AllDateCheckbox.checked == false){
				AllDateCbox = false;
				
				}else{
					
					return
				}
	
	if(AllMemberCheckbox.checked == true){
	   
		AllMemberCbox = true;
	   
	   }else if(AllMemberCheckbox.checked == false){
				AllMemberCbox = false;
				
				}else{
					
					return
				}
	
	
	DoAjax("checkredeempoint",MemberID,from,to,AllDateCbox,AllMemberCbox);
	
}
function checkmemberpoint(){
	var from = document.getElementById("from").value;
	var to = document.getElementById("to").value;
	var MemberID = document.getElementById("MemberIDInput").value;
	var AllDateCheckbox = document.getElementById("AllDateCheckbox");
	var AllMemberCheckbox = document.getElementById("AllMemberCheckbox");
	var AllDateCbox;
	var AllMemberCbox;
	rebuild();
	if(AllDateCheckbox.checked == true){
	   
		AllDateCbox = true;
	   
	   }else if(AllDateCheckbox.checked == false){
				AllDateCbox = false;
				
				}else{
					
					return
				}
	
	if(AllMemberCheckbox.checked == true){
	   
		AllMemberCbox = true;
	   
	   }else if(AllMemberCheckbox.checked == false){
				AllMemberCbox = false;
				
				}else{
					
					return
				}
	
	
	DoAjax("checkmemberpoint",MemberID,from,to,AllDateCbox,AllMemberCbox);
	
	
}

function rebuild(){
	document.getElementsByClassName("contentCover").remove();
	createcontentCover();
}

function createcontentCover(){
	var div  = document.createElement("div");
	div.id = "contentCover";
	div.className = "contentCover";
	document.getElementById('cover').appendChild(div);
	
}

function createContentUl(number){
	
	var ul  = document.createElement("ul");
	ul.id = "contentul"+number;
	ul.className = "contentul";
	document.getElementById('contentCover').appendChild(ul);

}

function createContentLi(numbery,numberx){
	var li = document.createElement("li");
	li.id = "contentli"+numbery+numberx;
	li.className = "contentli"+numberx;
	document.getElementById('contentul'+numbery).appendChild(li);
}

function createSpan(numbery,numberx,content){
	var span = document.createElement("span");
	span.setAttribute("onclick", "#");
	span.innerHTML=content;
	
	document.getElementById('contentli'+numbery+numberx).appendChild(span);
	
}

function changecontentliwidth(number){
	
		var contentlicount = 1;
		do{
			var li=document.getElementById("li"+contentlicount);


			
			Array.from(document.getElementsByClassName("contentli"+contentlicount)).forEach(
				function(element, index, array) {

				element.style.width = li.getBoundingClientRect().width +"px";
       
    		}
		);
			contentlicount = contentlicount+1;
		}while(contentlicount <= number);
		
	
}

function DoAjax(Type,MemberID,from,to,AllDateCbox,AllMemberCbox){
	
		$.ajax({
			data:{Type:Type,MemberID:MemberID, Fromwhen:from, Towhen:to, AllDateCbox:AllDateCbox, AllMemberCbox:AllMemberCbox},
			type: 'POST',
			success:function(data){
				
				if(!Array.isArray(eval(data))){
	   				alert(data);
				   	return;
	   				
	   			}
				var Detail = eval(data);

				
				

				
				
				var length = 0;
				var number =0;

				if(Detail.length==0){
					alert("No Data");
					
				}else{
					do{
						number = number +1;
						
						createContentUl(number);
						var i;
						var y = 0;
						for (i = 0; i <=Detail[length].length-1; i++) {
						y = y+1;
							createContentLi(number,y);
							createSpan(number,y,Detail[length][i]);
						}

						
						
						length = length+1;
						} while(length<Detail.length);
				
					changecontentliwidth(Detail[0].length);
					
				}
					
				
				if (data=="Sucess"){
				
				//location.reload();
				}
				
				
				},error : function() {
					alert("Error！");
									}
	});
	
	
}

Element.prototype.remove = function() {
    this.parentElement.removeChild(this);
}
NodeList.prototype.remove = HTMLCollection.prototype.remove = function() {
    for(var i = this.length - 1; i >= 0; i--) {
        if(this[i] && this[i].parentElement) {
            this[i].parentElement.removeChild(this[i]);
        }
    }
}
