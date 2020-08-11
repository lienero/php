<?php
	//db 폴더에 있는 db.php 불러오기
	include "../db/db.php";
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="../css/common.css" />
	<title>회원탈퇴</title>
	<!-- 아이디 중복 검사 와 비밀번호 보안성 체크 함수가 담긴 js파일 -->
	<script src ="../checks.js"></script>
</head>
<body>
	<form method="post" action="./member_delete.php">
		<h1>회원 탈퇴</h1>
			<fieldset>
				<legend>입력사항</legend>
					<table>
						<tr>
							<td>비밀번호</td>
							<!-- onKeyUp : 키를 눌렀다 놓았을 때 이벤트 발생 -->
							<!-- isSame() : 비밀번호가 비밀번호 확인과 일치하는 지를 체크함 -->
                            <!-- ime-mode:disabled - 영문자만 입력 가능하도록 설정  -->
							<td><input type="password" name="userpw" id="pw" onKeyup="safetyPasswordPattern(this); isSame();" style="ime-mode:disabled;" required/></td>
						</tr>
                        <tr>
							<td></td>	
							<td><span id="makyText">:: 비밀번호를 입력해 주세요(대소문자, 숫자, 특수문자 포함) ::</span></td>
						</tr>
                        <tr>
							<td>비밀번호 확인</td>
							<!-- isSame() : 비밀번호가 비밀번호 확인과 일치하는 지를 체크함 -->
							<!-- ime-mode:disabled - 영문자만 입력 가능하도록 설정  -->
							<td><input type="password" name="userpwconfirm" id="pwcheck" onKeyup="isSame()" style="ime-mode:disabled;" required/></td>
						</tr>
						<tr>
							<td></td>	
							<td><span id="same">비밀번호를 확인합니다.</span></td>
						</tr>
                        <tr>
						<td></td>
						<td>당신의 아이를 진짜로 버리시겠습니까?</td>
						</tr>
						<tr>
							<td></td>
							<td>동의하시겠습니까?<input type="checkbox" name="agree" value="agree"></td>
						</tr>
					</table>
				<input type="submit" value="탈퇴하기" /><input type="reset" value="다시쓰기" />
			
		</fieldset>
	</form>
</body>
</html>

