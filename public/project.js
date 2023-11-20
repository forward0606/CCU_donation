var deptArr = new Array();

deptArr[1] = [ "歷史學系","哲學系","中國文學系","外國語文學系","語言學研究所"];
deptArr[2] = [ "社會福利學系","心理學系","勞工關係學系","政治學系","傳播學系","戰略暨國際事務研究所"]
deptArr[3] = [ "經濟學系","財務金融學系","企業管理學系","會計與資訊科技學系","資訊管理學系"]
deptArr[4] = [ "成人及繼續教育學系","教育學研究所","犯罪防治學系","運動競技學系"]
deptArr[5] = [ "數學系","地球與環境科學系","物理系","化學暨生物化學系","生物醫學科學系"]
deptArr[6] = [ "資訊工程學系","電機工程學系","機械工程學系","化學工程學系","通訊工程學系"]
deptArr[7] = [ "法律學系","財經法律學系"]

var projectArr = new Array();

projectArr[1] = [ ];
projectArr[1][1] = [ "募款--歷史所(112DB04)"];
projectArr[1][2] = [ "募款--哲學所(112DB05)","募款--哲學系碩博士獎助學金(112DC01)"]
projectArr[1][3] = [ "募款--中文系(112DB02)","募款--中文系低收入戶學生獎助學金(112DC67)","募款--中文系學生急難助學金(112DC70)"]
projectArr[1][4] = [ "募款--外文系(112DB03)","募款--外文系畢業公演(112DB03-1)"]

projectArr[2] = [ ];
projectArr[2][1] = [ "募款--社福所(112DB11)","募款--社福系吳明儒老師研究室(112DB11-1)","募款--社福系獎學金(112DC22)"]
projectArr[2][2] = [ "募款--心理所(112DB12)","募款--心理所獎學金(112DC27)"]
projectArr[2][3] = [ "募款─勞工所(112DB13)","募款--勞工系獎學金(112DC20)"]
projectArr[2][4] = [ "募款--政治系(112DB14)"]
projectArr[2][5] = [ "募款--傳播系(112DB31)","募款--傳播系(畢業製作)(112DB31-1)","募款--傳播系(新傳獎)(112DB31-2)","募款--傳播系「數位傳播國際研討會」(112DB31-3)"]
projectArr[2][6] = [ "募款--戰略暨國際事務研究所(112DB48)","募款--戰略暨國際事務研究所獎助學金(112DC66)","募款--戰略暨國際事務研究所「蔡洪鳳招女士」獎學金(112DC71)"]

projectArr[3] = [ ];
projectArr[3][1] = [ "募款--經濟系(112DB46)","募款--經濟系獎學金(112DC09)"];
projectArr[3][2] = [ "募款--財金系所(112DB22)","募款--財金系獎學金(112DC53)","募款--財金系薪傳獎助學金(112DC57)"];
projectArr[3][3] = [ "募款--企管所系(112DB23)","募款--企管系創新創業相關活動及課程(112DB23-1)","募款--企管系獎助學金(112DC06)"];



function select_dept(index){
    
    var deptSelect = document.getElementById('dept');
    if(index == 0){
        deptSelect.style.display = 'none';
        
        return;
    }
	deptSelect.style.display = 'inline';
	deptSelect.options.length = 1;
	for(var i=0; i<deptArr[index].length; i++){
		deptSelect.options[i+1] = new Option(deptArr[index][i], i+1);
	}
}

function select_dept2() {
    var deptSelect2 = document.getElementById('dept_test');
    
    deptSelect2.style.display = 'inline';
    deptSelect2.options.length = 1;
    var deptSelect3 = document.getElementById('dept');
    var deptSelect1 = document.getElementById('department');
    for (var i = 0; i < projectArr[deptSelect1.value][deptSelect3.value].length; i++) {
        deptSelect2.options[i+1] = new Option(
            projectArr[deptSelect1.value][deptSelect3.value][i]
        );
    }

    return;
}
