<?php  
	include "./db/db.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>선문대학교 종합프로젝트 5조 영화 추천 사이트</title>
	<script>
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
	</script>
</head>
<body>
	<form method="post" action="member_ok.php">
		<h1>회원가입</h1>
			<fieldset>
				<legend>입력사항</legend>
					<table>
						<tr>
							<td>아이디</td>
							<td><input type="text" size="35" name="userid" id="uid" placeholder="아이디" required>
								<!-- onclick 할 시에 checkid() 함수 실행 -->
								<input type="button" value="중복검사" onclick="checkid();" />
								<input type="hidden" value="0" name="chs" />
							</td>
						</tr>
						<tr>
							<td>비밀번호</td>
							<!-- placeholder 예시 표시 -->
							<td><input type="password" size="35" name="userpw" placeholder="비밀번호"></td>
						</tr>
						<tr>
							<td>이름</td>
							<td><input type="text" size="35" name="name" placeholder="이름"></td>
						</tr>
						<tr>
							<td>나이</td>
							<td><input type="number" size="35" name="age" required value="20"></td>
						</tr>
						<tr>
							<td>성별</td>
							<td>남<input type="radio" name="sex" value="1"> 여<input type="radio" name="sex" value="0"></td>
						</tr>
					</table>
				<input type="submit" value="가입하기" /><input type="reset" value="다시쓰기" />
			
		</fieldset>
	</form>
</body>
</html>