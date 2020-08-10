<?php
include "./db/db.php";
?>
<!DOCTYPE html>
<html class = "no-js"; lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="./css/mainproject_home.css"> <!--CSS연결-->
    <link rel="stylesheet" href="./css/reset.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous">
    </script><!--라이브러리는 항상 적용할 것 보다 위에-->
    <script src="./js/vendor/modernizr-custom.js"></script>
    <!--우리가 만든 디자인과 효과를 모든 브라우저와 똑같이 구동시키기 위한 장치 -->
    <script src="./js/vendor/jquery-ui-1.10.3.custom.min.js"></script>
    <script src="./js/mainproject.js"></script><!--js연결-->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <script src="js/mainproject-exam1.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Pen+Script&display=swap" rel="stylesheet">
  </head>
 <body>
 <div id="menubar">
      <ul id="menubar-menus">
        <li>
          <a href="#">프로필</a>
          <div class="bar_left">
            <p>프로필</p>
            <p>방송리스트</p>
            <p>어록</p>
          </div>
        </li>
        <li>
          <a href="#">레시피</a>
          <div class="bar_left">
            <p>유튜브</p>	
            <p>마리텔</p>	
            <p>집밥 백선생</p>		
            <p>맛남의 광장</p>		
          </div>		
        </li>
        <li>
          <a href="./board/comment_write_read.php">찬양 페이지</a>
        </li>
<?php
// 서버에 아이디가 존재할 시(로그인 상태) 아래 메뉴를 띄움(마이페이지,로그아웃)
if(isset($_SESSION['userid'])){

	// 세션에 있는 유저의 아이디와 같은 테이블을 변수에 삽입함
	$sql = mq("select * from member where id='".$_SESSION['userid']."'");	
	// $sql에 있는 fetch_array(): 인덱스를 변수에 삽입
	$member = $sql->fetch_array();
	// member rankd 필드에 있는 값이 매니저이면 관리자
	if($member['rank'] == "manager"){
		echo $_SESSION['userid']."관리자님 환영합니다.";
	}else {
		echo $_SESSION['userid']."님 환영합니다.";
	} 
	?>
	<li class="bar_right">
	<!-- 클릭할 시 로그인으로 이동 -->
        <a href='./mypage/mypage.php''>마이페이지</a>
	</li>
    <li class="bar_right">
		<!-- 클릭할 시 회원가입으로 이동 -->
        <a href='./login/logout.php' >로그아웃</a>
    </li>
<?php
// 서버에 아이디가 존재하지 않을 시(로그아웃상태) 아래 메뉴를 띄움(회원가입 로그인)
} else {
?>		
		<li class="bar_right">
		<!-- 클릭할 시 로그인으로 이동 -->
          	<a href='./login/index.php'>로그인</a>
		</li>
        <li class="bar_right">
			<!-- 클릭할 시 회원가입으로 이동 -->
          	<a href='./register/member.php' >회원가입</a>
        </li>
<?php
}
?>
      </ul>
      <div class="logo_1"><a href = "./main.php"><img src="./img/TheBack_white.png" alt=""></a></div>
        <div class="slide_control">
            <div class="slide_box">
              	<a href=""><img src="./img/back_2.png" alt="width=1890;" height="700"></a>
            	<a href=""><img src="./img/back_3.png" alt="width=1890;" height="700"></a>
           		<a href=""><img src="./img/back_4.png" alt="width=1600;" height="700"></a>
            </div>
        </div>
        <section id="two">
          <div class="inner">
            <article>
              <div class="content">
                <header>
                  <h3 class="back_mapa">백종원의 바지락칼국수</h3>
                </header>
                <div class="image fit">
                  <img src="./img/cook_1.jpg.png" alt="" />
                </div>
                <p class="back_mapa_sub">재료: 바지락,애호박,당근,칼국수
                   양념 :멸치가루1스푼,국간장2스푼,후추조금,다시다조금
              <br>&nbsp;
                  </p>
              </div>
            </article>
            <article class="alt">
              <div class="content">
                <header>
                  <h3 class="back_mapa">백종원의 마파두부</h3>
                </header>
                <div class="image fit">
                  <img src="./img/cook_2.jpg.png" alt="" />
                </div>
                <p class="back_mapa_sub">재료 : 두부한모,돼지고기 한줌,
                  햄,양파,대파,된장,고추장,전분<div class="br"></div></p>
              </div>
            </article>
          </div>
          <div class="final_box">
            <img src="./img/board.png" alt="">
          </div>
        </section>
      </body>
  </body>


