<?php 
	//db 폴더에 있는 db.php 불러오기
	include "../db/db.php";
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>회원정보수정</title>
	<!-- 아이디 중복 검사 와 비밀번호 보안성 체크 함수가 담긴 js파일 -->
	<script src ="../checks.js"></script>
</head>
<body>
	<form method="post" action="./member_update.php">
		<h1>회원 정보 수정</h1>
			<fieldset>
				<legend>수정 사항</legend>
					<table>
						<tr>
							<td>비밀번호 변경</td>
							<!-- onKeyUp : 키를 눌렀다 놓았을 때 이벤트 발생 -->
							<!-- safetyPasswordPattern(this) : 비밀번호의 보안레벨을 체크함 -->
							<!-- isSame() : 비밀번호가 비밀번호 확인과 일치하는 지를 체크함 -->
							<!-- ime-mode:disabled - 영문자만 입력 가능하도록 설정  -->
							<td><input type="password" name="userpw" id="pw" value="" onKeyup="safetyPasswordPattern(this);" style="ime-mode:disabled;" required/></td>
						</tr>
						<tr>
							<td></td>	
							<td><span id="makyText">:: 비밀번호를 입력해 주세요(대소문자, 숫자, 특수문자 포함) ::</span></td>
						</tr>
						<tr>
							<td>이메일</td>
							<td><input type="text" size="20" name="email" placeholder="xxxxxx@naver.com" required >
								<select name="emailaddress">
									<option>
										@naver.com
									</option>
									<option>
										@google.com
									</option>
									<option>
										@daum.com
									</option>
								</select>
							</td>
						</tr>
					</table>
				<input type="submit" value="수정하기" /><input type="reset" value="다시쓰기" />
			
		</fieldset>
	</form>
</body>
</html>