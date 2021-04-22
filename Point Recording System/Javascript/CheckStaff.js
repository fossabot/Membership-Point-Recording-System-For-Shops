// JavaScript Document
adddata();

function adddata(){
	
	$.ajax({
		
			type: 'POST',
			success:function(data){
				var StaffInfo = eval(data);
				var length = 0;
				var number =0;
					do{
						number = number +1;
						
						createContul(number);
						createCnoli(number);
						createSpanID(number);
						createCnameli(number);
						createUserSpan(number,StaffInfo[length][0]);
						createCbranch(number);
						createCbranchSpan(number,StaffInfo[length][1]);
						createCclassli(number);
						createClassSpan(number,StaffInfo[length][2]);
						
						length = length+1;
						} while(length<StaffInfo.length);
						
				adjustcss();
				
				if (data=="Sucess"){
				
				//location.reload();
				}
				
				
				},error : function() {
					alert("Error！");
									}
	});
	
}



function createContul(number){
	var ul  = document.createElement("ul");
	ul.id = "contul"+number;
	ul.className = "contul";
	document.getElementById('contentcover').appendChild(ul);
}

function createCnoli(number){
	var li = document.createElement("li");
	li.id = "cnoli"+number;
	li.className = "cnoli";
	document.getElementById('contul'+number).appendChild(li);
}

function createSpanID(number){
	var span = document.createElement("span");
	span.id = "spanid";
	span.innerHTML=number;
	document.getElementById('cnoli'+number).appendChild(span);
	
}

function createCnameli(number){
	var li = document.createElement("li");
	li.id = "cnameli"+number;
	li.className ="cnameli"
	document.getElementById('contul'+number).appendChild(li);
}

function createUserSpan(number,username){
	var span = document.createElement("span");
	span.setAttribute("onclick", "#");
	span.innerHTML=username;
	document.getElementById('cnameli'+number).appendChild(span);
	
}

function createCbranch(number){
	var li = document.createElement("li");
	li.className="cbranchli"
	li.id = "cbranchli"+number;	document.getElementById('contul'+number).appendChild(li);
}

function createCbranchSpan(number,branch){
	var span = document.createElement("span");
	span.innerHTML=branch;
	document.getElementById('cbranchli'+number).appendChild(span);
}

function createCclassli(number){
	var li = document.createElement("li");
	li.className="cclassli"
	li.id = "cclassli"+number;	document.getElementById('contul'+number).appendChild(li);
}

function createClassSpan(number,idclass){
	var span = document.createElement("span");
	span.innerHTML=idclass;
	document.getElementById('cclassli'+number).appendChild(span);
}

function adjustcss(){


	document.getElementById("nameli").style.width = document.getElementById("cnameli1").getBoundingClientRect().width +"px";
	
	
}

