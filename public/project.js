var deptArr = new Array();

deptArr[1] = [ "歷史學系","哲學系","語言學研究所","台灣文學與創意應用研究所","數學系","地球與環境科學系",
            "物理系","化學暨生物化學系","生物醫學科學系"];
deptArr[2] = [ "社會福利學系","心理學系","勞工關係學系","政治學系","傳播學系","戰略暨國際事務研究所"]
deptArr[3] = [ "經濟學系","財務金融學系","企業管理學系","會計與資訊科技學系","資訊管理學系"]
deptArr[4] = [ "成人及繼續教育學系","教育學研究所","犯罪防治學系","運動競技學系"]
deptArr[5] = [ "數學系","地球與環境科學系","物理系","化學暨生物化學系","生物醫學科學系"]
deptArr[6] = [ "資訊工程學系","電機工程學系","機械工程學系","化學工程學系","通訊工程學系"]
deptArr[7] = [ "法律學系","財經法律學系"]

function select_dept(index){
    var deptSelect = document.getElementById('dept');
    if(index == 0){
        deptSelect.style.display = 'none';
        return;
    }
	deptSelect.style.display = 'inline';
	deptSelect.options.length = 0;
	for(var i=0; i<deptArr[index].length; i++){
		deptSelect.options[i] = new Option(deptArr[index][i], deptArr[index][i]);
	}
}