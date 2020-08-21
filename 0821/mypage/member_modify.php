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
	<script src ="../js/checks.js"></script>
    <link rel="stylesheet" href="/recipe_site/signup/css/bootstrap-grid.css">
    <link rel="stylesheet" href="/recipe_site/signup/css/bootstrap-grid.css.map">
    <link rel="stylesheet" href="/recipe_site/signup/css/bootstrap-reboot.css">
    <link rel="stylesheet" href="/recipe_site/signup/css/bootstrap-reboot.css.map">
    <link rel="stylesheet" href="/recipe_site/signup/css/bootstrap.css">
    <link rel="stylesheet" href="/recipe_site/signup/css/bootstrap.css.map">
    <link rel="stylesheet" href="/recipe_site/signup/js/bootstrap.js">
    <link rel="stylesheet" href="/recipe_site/signup/js/bootstrap.js.map">
    <link rel="stylesheet" href="/recipe_site/signup/css/signup2.css">
</head>
<body>
<form class="form-signin" method="post" action="./signup_ok.php">
    <div class="container">
		<!-- post 방식으로 signup_ok.php 에 보낸다. -->
    	<!--메인 로고 이미지-->    
		<div>
			<img src="../signup/img/logo.png"  class="img-responsive center-block" alt="">  
      	</div>
		<!--비밀번호 입력칸-->
		<!-- onKeyUp : 키를 눌렀다 놓았을 때 이벤트 발생 -->
		<!-- safetyPasswordPattern(this) : 비밀번호의 보안레벨을 체크함 -->
		<!-- isSame() : 비밀번호가 비밀번호 확인과 일치하는 지를 체크함 -->
      	<!-- ime-mode:disabled - 영문자만 입력 가능하도록 설정  -->
      	<div class="row">
        	<div class="form-group">
          		<input type="password" id="pw" class="form-control" name="userpw" placeholder="password" onKeyup="safetyPasswordPattern(this);" style="ime-mode:disabled;" required>
        	</div>
      	</div>      
		<!-- id="makyText" : onkeyyup 할 시 작동하는 함수가 변경하는 html  -->
      	<div id="makyText">:: 비밀번호를 입력해 주세요(대소문자, 숫자, 특수문자 포함) ::</div>
		<!--비밀번호 확인 입력칸-->
		<!-- isSame() : 비밀번호가 비밀번호 확인과 일치하는 지를 체크함 -->
		<!-- ime-mode:disabled - 영문자만 입력 가능하도록 설정  -->
      <!--이메일 입력칸-->
      	<div class="row">
        	<div class="form-group input-group">
          		<input type="text" class="form-control" name="email" id="exampleFormControlInput1" placeholder="email">
          		<!--이메일 주소선택-->
				<span>
				<select class="form-control" id="exampleFormControlSelect1" name="emailaddress">
					<option>@gmail.com</option>
					<option>@naver.com</option>
					<option>@daum.net</option>
				</select>
				</span>  
    	</div>
    </div>           
    </div>  
      <!--입력을 완료한다음 수정하기 버튼-->
      <div class="row">     
        <div class="form-group">
          <input type="submit" class="btn btn-outline-success" value="회원 정보 수정" id="success">
        </div>   
      </div>
    </div>     
  </form>
</body>
</html>