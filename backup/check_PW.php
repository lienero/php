<html>
<head>
<title>비밀번호 안전성 검사 코드</title>
<script type="text/javascript">
	// 중복 검사를 위한 checkid() 함수 생성
	function checkid(){
		// document.getElementById("uid").value; : 이 문서에 있는 uid 값의 안에 있는 값
		var userid = document.getElementById("uid").value;
		if(userid)
		{
			url = "check.php?userid="+userid;
			// window.open('새창에 불러올 문서','새창이름','새창속성') : 새창을 열어주는 함수
				window.open(url,"chkid","width=300,height=100");
		}else{
			alert("아이디를 입력하세요");
		}
	}
    
    function safetyPasswordPattern(str) {

        var pass = str.value;
        var message = "";
        var color = "";
        var checkPoint = 0;

        // 입력값이 있을경우에만 실행
        if(pass.length) {

            // 최대 입력 글자수를 제한한다.
            if(pass.length < 8 || pass.length > 16) {
                message = ":: 최소 8자 이상, 최대 16자 이하 ::";
                color = "#A23E48";
            }

            // 문자열의 길이가 8 ~ 16 인경우
            else {

                // 비밀번호 문자열에 숫자 존재 여부 검사
                var pattern1 = /[0-9]/;  // 숫자
                if(pattern1.test(pass) == false) {
                    checkPoint = checkPoint + 1;
                }

                // 비밀번호 문자열에 영문 소문자 존재 여부 검사
                var pattern2 = /[a-z]/;
                if(pattern2.test(pass) == false) {
                    checkPoint = checkPoint + 1;
                }

                // 비밀번호 문자열에 영문 대문자 존재 여부 검사
                var pattern3 = /[A-Z]/;
                if(pattern3.test(pass) == false) {
                    checkPoint = checkPoint + 1;
                }

                // 비밀번호 문자열에 특수문자 존재 여부 검사
                var pattern4 = /[~!@#$%^&*()_+|<>?:{}]/;  // 특수문자
                if(pattern4.test(pass) == false) {
                    checkPoint = checkPoint + 1;
                }

                if(checkPoint >= 3) {
                    message = ":: 보안성이 취약한 비밀번호 ::";
                    color = "#A23E48";
                } else if(checkPoint == 2) {
                    message = ":: 보안성이 낮은 비밀번호 ::";
                    color = "#FF8C42";
                } else if(checkPoint == 1) {
                    message = ":: 보안성이 보통인 비밀번호 ::";
                    color = "#FF8C42";
                } else {
                    message = ":: 보안성이 강력한 비밀번호 ::";
                    color = "#0000CD";
                }
            }
        }

        else {
            message = ":: 비밀번호를 입력해 주세요 ::";
            color = "#000000";
        }

        document.getElementById("makyText").innerHTML = message;
        document.getElementById("makyText").style.color = color;
    }
</script>
</head>
<body>
    <input type="password" id="memberPw" value="" onKeyup="safetyPasswordPattern(this);" style="ime-mode:disabled;"/>
    <br/>
    <span id="makyText">:: 비밀번호를 입력해 주세요 ::</span>
</body>
</html>