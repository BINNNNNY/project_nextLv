function categoryChange(e) {
	//var category = ["하드웨어", "소프트웨어", "네트워크", "공유 설정", "전산장비 이관"];
	var category_details_1 = ["", "PC 점검", "모니터", "프린터", "복사기", "노트북", "키보드/마우스", "HDD 복구", "전자교탁", "빔프로젝터", "기타"];
	var category_details_2 = ["", "OS 재설치", "정품 인증", "한글과 컴퓨터", "MS Office", "바이러스", "환경설정", "기타 소프트웨어"];
	var category_details_3 = ["", "랜카드/케이블", "네트워크 설정", "업무이관", "기타"];
	var category_details_4 = ["", "파일 공유", "프린터 공유", "기타"];
	var category_details_5 = ["", "불용창고 이관", "행정부서 이관", "학과/학부 이관", "실습실 이관", "기타"];
	var target = document.getElementById("category_details");

	if(e.value == "하드웨어") var d = category_details_1;
	else if(e.value == "소프트웨어") var d = category_details_2;
	else if(e.value == "네트워크") var d = category_details_3;
	else if(e.value == "공유 설정") var d = category_details_4;
	else if(e.value == "전산장비 이관") var d = category_details_5;

	target.options.length = 0;

	for (x in d) {
		var opt = document.createElement("option");
		opt.value = d[x];
		opt.innerHTML = d[x];
		target.appendChild(opt);
	}
}
