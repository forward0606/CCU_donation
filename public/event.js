//全域變數 紀錄驗證碼
var code="";
//
var checkCode = document.getElementById("code");

//顏色組
var fontColor=["blue","yellow","red"];
var bgColor=["yellow","red","blue",];
var ls=["2px","8px","-2px",];
var iColor;
//alert(iColor);

//隨機設定顏色組合
function randColor(){
  iColor=Math.floor(Math.random()*(fontColor.length));
  return iColor;
}
function createCode(){
  var ci=randColor()
  checkCode.style['color']=fontColor[ci];
  checkCode.style['background-color']=bgColor[ci];
  checkCode.style['letter-spacing']=ls[ci];
  //alert (ci);
	code = ""; 
	var codeLength = 6;//驗證碼的長度	
	var random = new Array(0,1,2,3,4,5,6,7,8,9,'A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');//隨機數 
	for(var i = 0; i < codeLength; i++  ) {//迴圈操作 
		var index = Math.floor(Math.random()*36);//取得隨機數的索引（0~35） 
		code  += random[index];//根據索引取得隨機數加到code上 
	} 
	checkCode.innerHTML= code;//把code值賦給驗證碼
  	console.log(code);
}

//更新驗證碼
var recode=document.getElementById('recode');
recode.addEventListener("click",function(e){
	createCode();
  document.getElementById("input").value = "";//清空文字框
  e.preventDefault();	
});

//點擊更新驗證碼
checkCode.addEventListener("click",function(e){
	createCode();
  document.getElementById("input").value = "";//清空文字框
  e.preventDefault();	
});

//驗證
var validate=document.getElementById('validate');
validate.addEventListener("click",function(e){
	var inputCode = document.getElementById("input").value.toUpperCase(); //取得輸入的驗證碼並轉化為大寫 
	if(inputCode.length <= 0) { //若輸入的驗證碼長度為0 
		alert("請輸入驗證碼！"); //則彈出請輸入驗證碼 
	} 
	else if(inputCode !== code ) { //若輸入的驗證碼與產生的驗證碼不一致時 
      alert("驗證碼輸入錯誤！@_@"); //則彈出驗證碼輸入錯誤 
      createCode();//重新整理驗證碼 
	    document.getElementById("input").value = "";//清空文字框 
	} 
	else { //輸入正確時 
		alert("^-^"); //彈出^-^ 
    createCode();//重新整理驗證碼 
    document.getElementById("input").value = "";//清空文字框 
	} 
});

createCode();