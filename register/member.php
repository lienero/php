<?php  
	include "./db/db.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>선문대학교 종합프로젝트 5조 영화 추천 사이트</title>
	<!-- 아이디 중복 검사 와 비밀번호 보안성 체크 함수가 담긴 js파일 -->
	<script src ="./checks.js"></script>
</head>
<body>
	<form method="post" action="member_ok.php">
		<h1>회원가입</h1>
			<fieldset>
				<legend>입력사항</legend>
					<table>
						<tr>
							<!-- placeholder 예시 표시 -->
							<td>아이디</td>
							<td><input type="text" size="20" name="userid" id="uid"placeholder="아이디"  required>
								<!-- onclick 할 시에 checkid() 함수 실행 -->
								<input type="button" value="중복검사" onclick="checkid();" />
								<input type="hidden" value="0" name="chs" />
							</td>
						</tr>
						<tr>
							<td>비밀번호</td>
							<!-- onKeyUp : 키를 눌렀다 놓았을 때 이벤트 발생 -->
							<!-- safetyPasswordPattern(this) : 비밀번호의 보안레벨을 체크함 -->
							<!-- isSame() : 비밀번호가 비밀번호 확인과 일치하는 지를 체크함 -->
							<!-- ime-mode:disabled - 영문자만 입력 가능하도록 설정  -->
							<td><input type="password" name="userpw" id="pw" value="" onKeyup="safetyPasswordPattern(this); isSame();" style="ime-mode:disabled;" required/></td>
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
						<tr>
						<td></td>
						<td>영예로운 백선생님~~</td>
						</tr>
						<tr>
							<td></td>
							<td>동의하시겠습니까?<input type="checkbox" name="agree" value="agree"></td>
						</tr>
					</table>
				<input type="submit" value="가입하기" /><input type="reset" value="다시쓰기" />
			
		</fieldset>
	</form>
</body>
</html>