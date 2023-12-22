document.addEventListener('DOMContentLoaded', function() {
	
	var code = "";
	var checkCode = document.getElementById("code");

	// color
	var fontColor = ["blue","yellow","red","green","black",];
	var bgColor = ["yellow","red","blue","white"];
	var ls = ["2px","8px","-2px",];
	var iColor;
	//alert(iColor);

	function randColor(){
		iColor = Math.floor(Math.random()*(fontColor.length));
		return iColor;
	}

	function createCode(){
		var ci = randColor()
		checkCode.style['color']=fontColor[ci];
		checkCode.style['background-color']=bgColor[ci];
		checkCode.style['letter-spacing']=ls[ci];
		//alert (ci);
		code = ""; 
		var codeLength = 6;	
		var random = new Array(0,1,2,3,4,5,6,7,8,9,'A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');//隨機數 
		for(var i = 0; i < codeLength; i++  ) {
			var index = Math.floor(Math.random()*36); 
			code += random[index];
		} 
		checkCode.innerHTML= code;
	}

	var recode = document.getElementById('recode');
	recode.addEventListener("click",function(e){
		createCode();
		document.getElementById("input").value = "";
		e.preventDefault();	
	});

	checkCode.addEventListener("click",function(e){
		createCode();
		document.getElementById("input").value = "";
		e.preventDefault();	
	});


	var validate = document.getElementById('validate_button');
	validate.addEventListener("click",function(e){
		var inputCode = document.getElementById("input").value.toUpperCase();  

		var Message = document.getElementById('message');
		Message.innerHTML = '';
		const title = document.createElement('h2');
		title.textContent = "請留意";
		Message.appendChild(title);

		if(inputCode.length <= 0) { 
			const label = document.createElement('div');
			label.textContent = "請輸入驗證碼";
			Message.appendChild(label);
			showAlert();
		} else if(inputCode !== code ) {  
			const label = document.createElement('div');
			label.textContent = "驗證碼輸入錯誤";
			Message.appendChild(label);
			showAlert();
			createCode(); 
			document.getElementById("input").value = ""; 
		} else {
			var save = document.getElementById('donation_save');
			save.click();
			createCode();
			document.getElementById("input").value = ""; 
		}
	});

	createCode();

	$(document).ready(function(){
		$.ajax({
			url: 'https://raw.githubusercontent.com/donma/TaiwanAddressCityAreaRoadChineseEnglishJSON/master/CityCountyData.json',              
			type: "get",
			dataType: "json",
			success: function (data) {
				console.log(data);
				$.each(data,function(key,value){
					console.log(key,value)
					$('#city').append('<option value="'+key+'">'+data[key].CityName+'</option>')
				})
			},
			error: function (data) {
				alert("fail");
			}
		});

		$("#city").change(function(){
			cityvalue=$("#city").val();  //取值
			$("#area").empty(); //清空上次的值
			$("#area").css("display","inline"); //顯現
			$.ajax({
				url:'https://raw.githubusercontent.com/donma/TaiwanAddressCityAreaRoadChineseEnglishJSON/master/CityCountyData.json',
				type:"get",
				dataType:"json",
				success:function(data){
				
					eachval=data[cityvalue].AreaList; //鄉鎮
					
					$.each(eachval,function(key,value){
						$('#area').append('<option value="'+key+'">'+eachval[key].AreaName+'</option>')
					});
				},
				error:function(){
					alert("fail");
				}
				
			});
		});
	});
});
