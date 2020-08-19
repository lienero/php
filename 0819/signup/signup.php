<?php 
	//db 폴더에 있는 db.php 불러오기
	include "../db/db.php";
?>
<!DOCTYPE html>
<html>
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./css/signup.css">
	<title>회원가입</title>
	<!-- 아이디 중복 검사 와 비밀번호 보안성 체크 함수가 담긴 js파일 -->
	<script src ="../js/checks.js"></script>
</head>
<body>
<div class="container">
		<!-- post 방식으로 signup_ok.php 에 보낸다. -->
        <form class="form-signin" method="post" action="./signup_ok.php">
          <!--메인 로고 이미지-->    
			<div>
				<img src="./img/logo.png"  class="rounded mx-auto d-block" alt="">  
			</div> 
			<br>
			<br>
        <!--아이디 입력칸과 중복확인 버튼-->
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="userid" id="uid" placeholder="ID" aria-label="ID" aria-describedby="button-addon2">
                <div class="input-group-append">
					<!-- onclick 할 시에 checkid() 함수 실행 -->
                	<input type="button" id="button" value="중복검사" onclick="checkid();" />
                </div>
            </div>
            <br>
            <br>
			<!--비밀번호 입력칸-->
			<!-- onKeyUp : 키를 눌렀다 놓았을 때 이벤트 발생 -->
			<!-- safetyPasswordPattern(this) : 비밀번호의 보안레벨을 체크함 -->
			<!-- isSame() : 비밀번호가 비밀번호 확인과 일치하는 지를 체크함 -->
			<!-- ime-mode:disabled - 영문자만 입력 가능하도록 설정  -->
            <div class="form-label-group">
                <input type="password" id="pw" class="form-control rounded mx-auto d-block" name="userpw" placeholder="password" onKeyup="safetyPasswordPattern(this); isSame();" style="ime-mode:disabled;" required>
                <label for="pw"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"></font></font></label>
            </div>
			<!-- id="makyText" : onkeyyup 할 시 작동하는 함수가 변경하는 html  -->
            <div id="makyText">:: 비밀번호를 입력해 주세요(대소문자, 숫자, 특수문자 포함) ::</div>
            <br>
			<!--비밀번호 확인 입력칸-->
			<!-- isSame() : 비밀번호가 비밀번호 확인과 일치하는 지를 체크함 -->
			<!-- ime-mode:disabled - 영문자만 입력 가능하도록 설정  -->
            <div class="form-label-group">
                <input type="password" id="pwcheck" class="form-control rounded mx-auto d-block" name="userpwconfirm" placeholder="password" onKeyup="isSame()" style="ime-mode:disabled;" required>
                <label for="pwcheck"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"></font></font></label>
            </div>
			<!-- id="same" : onkeyyup 할 시 작동하는 함수가 변경하는 html  -->
            <div id="same">비밀번호를 확인합니다.</div>
            <br>
            <!--이메일 입력칸-->
            <div class="input-group">
              <input type="text" class="form-control" name="email" aria-label="Text input with dropdown button">
              <!--이메일 주소선택-->
                <select class="form-control" id="exampleFormControlSelect1" name="emailaddress">
                  <option>@gmail.com</option>
                  <option>@naver.com</option>
                  <option>@daum.net</option>
                </select>
            </div>     
              <br>
              <br>
              <!--동의 의사를 묻는 체크박스-->
              <div class="custom-control custom-checkbox" style="text-align: center;">
                <input type="checkbox" id="jb-checkbox" name="agree" value="agree" class="custom-control-input ">
                <label class="custom-control-label" for="jb-checkbox">동의하시겠습니까?</label>
              </div>
              <br>
              <br>
              <!--입력을 완료한다음 회원가입 완료 버튼-->
            <div>
              <input type="submit" class="btn btn-outline-success rounded mx-auto d-block" value="Success" id="success">
            </div>   
      </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>