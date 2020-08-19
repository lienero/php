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
	<link rel="stylesheet" href="/recipe_site/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/recipe_site/css/bootstrap-theme.min.css" />
</head>
<body>
	<!-- Bootstrap의 콘텐츠는 항상 class="container"태그 내에 기술한다. 이것에 의해 폭이 자동 조정이 된다.-->
    <div class="container-fluid">
        <!-- 이것은 콘텐츠의 row(가로 열)를 작성하기 위한 컨테이너이다. 그리드 시스템에서는 이 class="row" 태그 안에 표시할 내용을 준비한다. 
        	그로 인해, 이 class="row" 태그 안에 포함된 콘텐츠의 태그가 자동으로 가로로 나란히 정렬되거나, 세로로 정렬되거나 한다.-->
        <div class="row">
		    <!-- 폭 조정을 하는 클래스 col-종류-숫자 형태로 작성한다 md:태블릿-->
			<div class="col-md-12">
				<div class="page-header">
                    <h1 class="text-info">회원정보수정</h1>
                    <br>
                    <img src="../img/picky_catB.png" alt="" width="300" class="img-responsive center-block">
                </div>
				<!-- <form class="form-inline"> : 입력폼의 입력 항목이 가로로 표시되게 된다. -->
				<form class="form-inline" method="post" action="./member_update.php" style="text-align:center;">
					<div class="from-group">
						<!-- onKeyUp : 키를 눌렀다 놓았을 때 이벤트 발생 -->
						<!-- safetyPasswordPattern(this) : 비밀번호의 보안레벨을 체크함 -->
						<span><input type="password" class="form-control" name="userpw" id="pw" onKeyup="safetyPasswordPattern(this); isSame();" style="ime-mode:disabled;" placeholder="패스워드" required/></td></span>
					</div>
					<br>
					<div class="from-group">
						<span id="makyText">:: 비밀번호를 입력해 주세요(대소문자, 숫자, 특수문자 포함) ::</span>
					</div>
					<br>			
					<div class="from-group input-group">
						<span><input type="text" class="form-control" size="20" name="email" placeholder="이메일을 입력해주세요." required ></span>
						<span><select class="form-control" name="emailaddress"></span>
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
					</div>
					<br>
					<br>
					<div class="from-group">	
						<input type="submit" class="btn btn-info" value="수정하기" />
						<input type="reset" class="btn btn-info" value="다시쓰기" />
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>