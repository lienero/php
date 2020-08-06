<?php
include "./db/db.php";
//session_start() 세션을 시작하는 함수 (세션이 필요한 모든 페이지에 필요함)
echo "메인입니다.<br>";

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
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
    <link rel="stylesheet" type="text/css" href="../css/common.css" />
</head>
 <body>
	<br>
    <sapn><button type="button" onclick="location.href='./mypage/mypage.php'" >마이페이지</button></sapn>
    <sapn><button type="button" onclick="location.href='/register/logout.php'" >로그아웃</button></sapn>
<?php
}
?>
	<div>
		<nav id="topMenu">
			<ul>
				<li><a class="menuLink" href="/register/main.php">홈</a></li>
				<li><a class="menuLink" href="bookmark.php">프로필</a></li>
				<li><a class="menuLink" href="/register/mypage/mypage.php">레시피</a></li>
				<li><a class="menuLink" href="/register/board/comment_write_read.php">찬양게시판</a></li>
			</ul>	
		</nav>
	</div>
    </html>

