<?php

//db 폴더에 있는 db.php 불러오기
include "../db/db.php";
//session_start() 세션을 시작하는 함수 (세션이 필요한 모든 페이지에 필요함)
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
<br>
<!-- 버튼을 클릭할 시에 페이지 이동 --> 
<span><button type="button" onclick="location.href='/back/index.php'" >메인페이지</button></span>
<br>
<span><button type="button" onclick="location.href='./member_modify.php'" >개인 정보수정</button></span>
<span><button type="button" onclick="location.href='./member_withdrawal.php'" >회원탈퇴</span>
<sapn><button type="button" onclick="location.href='../login/logout.php'" >로그아웃</button></sapn>
<?php
// member['rank'] 필드에 있는 값이 매니저이면 사이트 관리 버튼 출현
if($member['rank'] == "manager"){
?>
    <br>
    <sapn><button type="button" onclick="location.href='/register/manager.php'" >사이트 관리</button></sapn>
<?php
}
?>
</html>