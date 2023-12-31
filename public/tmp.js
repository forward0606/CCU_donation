var deptArr = new Array();

deptArr[0] = [ "hidden" ];
deptArr[1] = [ "歷史學系","哲學系","中國文學系","外國語文學系","台文創應所","語言所","文學院"];
deptArr[2] = [ "社會福利學系","心理學系","勞工關係學系","政治學系","傳播學系","戰略暨國際事務研究所","社會科學院"]
deptArr[3] = [ "經濟學系","財務金融學系","企業管理學系","會計與資訊科技學系","資訊管理學系","管理學院"]
deptArr[4] = [ "成人及繼續教育學系","犯罪防治學系","運動競技學系","教育學院"]
deptArr[5] = [ "數學系","地球與環境科學系","物理系","化學暨生物化學系","生物醫學科學系","理學院"]
deptArr[6] = [ "資訊工程學系","電機工程學系","機械工程學系","化學工程學系","通訊工程學系","工學院"]
deptArr[7] = [ "法律學系","財經法律學系","法學院"]
deptArr[8] = [ "hidden" ];
deptArr[9] = [ "hidden" ];
deptArr[10] = [ "hidden" ];
deptArr[11] = [ "hidden" ];
deptArr[12] = [ "hidden" ];

var projectArr = new Array();

projectArr[0] = [ ];
projectArr[0][1] = [ "中正之友捐款","「小小力量，大大未來」小額捐款專戶","校慶聯誼餐會募款專戶","中正菁英願景基金","中正大學「嘉有機會希望專戶」-學生獎助學金及急難救助金捐款","國際事業聯盟捐款","第18屆體育年會募資專款","CCU線上購物網輔導計畫 CCU online Store assistant Project","國立中正大學2023創新創業系列活動","112年中正大學統籌款",
"防疫補助專款","追求學術卓越捐款","急難救助捐款","學生社團活動捐款","講座教授獎勵金","科研成果產業化平台計畫","課活組活動經費","學安組學生社團聯合反毒宣教活動","諮商中心-台灣學人課程合作計畫","清江學習中心","資訊處","國際事務處","紫荊書院","紫荊書院院刊","校務發展共識營","學務處（活動、獎助學金、急難慰助經費）","財團法人台灣法學基金會贊助本校活動中心演藝廳裝修案","國立中正大學USR辦公室","教務處","學務處生活事務組「錦玉急難救助金」","總務處「在地鄒族文化意象專款」"];

projectArr[1] = [ ];
projectArr[1][1] = [ "歷史所"];
projectArr[1][2] = [ "哲學所","哲學系碩博士獎助學金"]
projectArr[1][3] = [ "中文系","中文系低收入戶學生獎助學金","中文系學生急難助學金"]
projectArr[1][4] = [ "外文系","外文系畢業公演"]
projectArr[1][5] = [ "台文所","台文所楊智景老師研究室"]
projectArr[1][6] = [ "語言所","語言所系獎學金"]
projectArr[1][7] = [ "文學院「傑出校友陳金樹先生捐款」","文學院「戴振茂先生、戴謝燧女士紀念清寒獎學金」","文學院手語語言學台灣研究中心"]

projectArr[2] = [ ];
projectArr[2][1] = [ "社福所","社福系吳明儒老師研究室","社福系獎學金"]
projectArr[2][2] = [ "心理所","心理所獎學金"]
projectArr[2][3] = [ "勞工所","勞工系獎學金"]
projectArr[2][4] = [ "政治系"]
projectArr[2][5] = [ "傳播系","傳播系(畢業製作)","傳播系(新傳獎)","傳播系「數位傳播國際研討會」"]
projectArr[2][6] = [ "戰略暨國際事務研究所","戰略暨國際事務研究所獎助學金","戰略暨國際事務研究所「蔡洪鳳招女士」獎學金"]
projectArr[2][7] = [ "社科院"]

projectArr[3] = [ ];
projectArr[3][1] = [ "經濟系","經濟系獎學金"];
projectArr[3][2] = [ "財金系所","財金系獎學金","財金系薪傳獎助學金"];
projectArr[3][3] = [ "企管所系","企管系創新創業相關活動及課程","企管系獎助學金"];
projectArr[3][4] = [ "會資系","會計與資訊科技學系獎助學金"];
projectArr[3][5] = [ "資管系獎學金","資管所"];
projectArr[3][6] = [ "管理學院","管理學院「玉山學術獎」","管理學院獎助學金","國立中正大學管理學院Amundi鋒裕匯理永續投資研究中心"];

projectArr[4] = [ ];
projectArr[4][1] = [ "成教學系","成教系「青銀生活服務，實踐大學社會責任」","成教系「青銀共生基地營運經費」","成教系獎學金"];
projectArr[4][2] = [ "犯罪防治學系"];
projectArr[4][3] = [ "運動競技學系","運動競技學系「專項運動-排球訓練發展基金」","運動競技學系「專項運動-網球訓練發展基金」","運動競技學系「112年陽光女孩南區排球對抗聯賽」賽事獎金","運動競技學系獎學金"];
projectArr[4][4] = [ "教育學院","教育學院「2023年馬來亞大學國際研討會專戶」","教育所"];

projectArr[5] = [ ];
projectArr[5][1] = [ "數學所"];
projectArr[5][2] = [ "地球與環境科學系","地環系許昺慕老師研究室"];
projectArr[5][3] = [ "物理系獎助學金","物理所"];
projectArr[5][4] = [ "化生所","化生系","化生系(魏國佐)","化生系獎助學金","化生系獎學金(朱延和)","徐子正先生捐贈胡維平教授實驗室設備及相關用品興學款"];
projectArr[5][5] = [ "生醫系","生醫系組隊參加「iGEM國際競賽」經費","生醫系獎助學金"];
projectArr[5][6] = [ "理學院","理學院科學教育中心「民雄薪傳二手書店服務獎助學金」","理學院科學教育中心「于淑民先生獎助學金」","理學院科學教育中心運作基金"];


projectArr[6] = [ ];
projectArr[6][1] = [ "資訊工程學系","資訊工程學系作業系統技術產學聯盟研究經費","資訊工程學系獎學金"];
projectArr[6][2] = [ "電機工程學系","電機系副教授許宏銘身故關懷慰助專戶","電機系獎學金"];
projectArr[6][3] = [ "機械工程學系","機械系獎助學金"];
projectArr[6][4] = [ "化學工程學系","化工系獎學金"];
projectArr[6][5] = [ "通訊工程學系","通訊工程系清寒優秀獎學金","通訊系系友會","通訊系研究優秀獎學金"];
projectArr[6][6] = [ "工學院","國立中正大學工學院留本永續發展基金帳戶"];

projectArr[7] = [ ];
projectArr[7][1] = [ "法律系所","法律系獎學金"];
projectArr[7][2] = [ "財法系","財法系「2023台灣智慧財產法學會著作權研討會」","財法系獎學金","財經法律研究中心"]
projectArr[7][3] = [ "法學院","法學院之友專戶","法學院獎學金","法學院兩岸四地法律交流中心"]

projectArr[8] = [ ];
projectArr[8][1] = [ "通識中心","李三財先生捐贈通識教育中心白桂英教師興學款","通識教育中心「服務學習課程運作」"];

projectArr[9] = [ ];
projectArr[9][1] = [ "體育中心","體育中心(贊助校隊)"];

projectArr[10] = [ ];
projectArr[10][1] = [ "師資培育中心"];

projectArr[11] = [ ];
projectArr[11][1] = [ "前瞻製造系統頂尖研究中心獎助學金","晶片系統研究中心獎學金","中正大學學生獎助學金捐款","江美雲女士紀念獎助學金","豐泰文教基金會獎助金","雷振聲先生紀念獎助學金","募僑生、外籍生急難救助金","張林美津女士紀念獎助學金",
"邱子修博士紀念獎助學金","中正大學學生獎助及弱勢學生助學專戶","中正大學 似鳥〈NITORI〉國際獎學金","台積電文教基金會與國立中正大學「嘉星計畫新生獎學金」","研究發展處獎助學金","尖端製程與軋鍛技術研究中心獎助學金","國際事務處惠燊紀念獎學金"];

projectArr[12] = [ ];
projectArr[12][1] = [ "超低功耗微控制器實驗室工程捐款","醫療資訊管理中心","製商整合科技中心","製商整合研究中心「智慧生醫光機電跨領域整合產業聯盟」","人文與社會研究中心","犯罪研究中心","網際網路中心","產業發展與預測研究中心","奈米設計與原型中心",
"自旋科技研究中心","精緻電能應用研究中心","國立中正大學高齡研究基地研究經費","人類研究倫理中心","台灣法律資訊中心","社會企業研究中心","東協與南亞研究中心","新農業科技暨產學推廣中心","大數據研究中心","行銷策略與創意研究中心","體育運動研究發展中心",
"民意及市場調查中心","智慧生活研究中心「臺印AI產學技術聯盟」","國際文化創藝整合發展中心","前瞻製造系統頂尖研究中心"];

function select_dept(index){
    var deptSelect = document.getElementById('dept');

    if(index == 0 || index == 8 || index == 9 || index == 10 || index == 11 || index == 12){
        deptSelect.style.display = 'none';
    }
    else{
	    deptSelect.style.display = 'inline';
    }
	deptSelect.options.length = 0;
	for(var i=0; i<deptArr[index].length; i++){
		deptSelect.options[i] = new Option(deptArr[index][i], i+1);
	}
}

function select_project() {
    var projectSelect = document.getElementById('project');
    var deptSelect = document.getElementById('dept');
    var departmentSelect = document.getElementById('department');
    
    projectSelect.style.display = 'inline';
    projectSelect.options.length = 0;
    
    for (var i = 0; i < projectArr[departmentSelect.value][deptSelect.value].length; i++) {
        projectSelect.options[i] = new Option(
            projectArr[departmentSelect.value][deptSelect.value][i]
        );
    }

    return;
}
