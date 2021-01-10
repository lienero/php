<?php
	//서버에서 db 폴더에 있는 db.php 불러오기
	include $_SERVER['DOCUMENT_ROOT']."/recipe_site/db/db.php";
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>会員退会</title>
	<!-- 아이디 중복 검사 와 비밀번호 보안성 체크 함수가 담긴 js파일 -->
	<script src ="../js/checks.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
<body class="text-center">
<form class="form-signin" method="post" action="./member_delete.php">
    <div class="container">
		<!-- post 방식으로 signup_ok.php 에 보낸다. -->
      	<!--메인 로고 이미지-->    
		<div>
			<img src="../signup/img/logo.png"  class="img-responsive center-block" alt="">  
      	</div>
		<!--비밀번호 입력칸-->
		<!-- onKeyUp : 키를 눌렀다 놓았을 때 이벤트 발생 -->
		<!-- isSame() : 비밀번호가 비밀번호 확인과 일치하는 지를 체크함 -->
      	<!-- ime-mode:disabled - 영문자만 입력 가능하도록 설정  -->
      	<div class="row">
        	<div class="form-group">
          		<input type="password" id="pw" class="form-control" name="userpw" placeholder="password" onKeyup="isSame();" style="ime-mode:disabled;" required>
        	</div>
      	</div>      
		<!--비밀번호 확인 입력칸-->
		<!-- isSame() : 비밀번호가 비밀번호 확인과 일치하는 지를 체크함 -->
		<!-- ime-mode:disabled - 영문자만 입력 가능하도록 설정  -->
      	<div class="row">
        	<div class="form-group">
          		<input type="password" id="pwcheck" class="form-control" name="userpwconfirm" placeholder="password" onKeyup="isSame()" style="ime-mode:disabled;" required>    
        	</div>
      	</div> 
		<br> 
		<!-- id="same" : onkeyyup 할 시 작동하는 함수가 변경하는 html  -->
      	<div id="same">パスワードを確認します</div>
		<br>
		<br>
     	 <!--동의 의사를 묻는 체크박스-->
      	<div class="row">
        	<div class="checkbox mb-3" style="text-align: center;">
          	<label>  
            	<input type="checkbox" id="jb-checkbox" name="agree" value="agree">同意しますか？
          	</label>      
        	</div>
      	</div>  
      <!--입력을 완료한다음 회원가입 완료 버튼-->
      	<div class="row">     
        	<div class="form-group">
          		<input type="submit" class="btn btn-outline-success" value="会員退会" id="success">
        	</div>   
      	</div>
    </div>     
</form>
</body>
</html>

