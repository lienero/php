<?php

//$_SERVER['DOCUMENT_ROOT'] = 현재 사이트가 위치한 서버상의 위치
include $_SERVER['DOCUMENT_ROOT']."/back/db/db.php";
date_default_timezone_set('Asia/Seoul');

// 세션에서 아이디를 가져와서 삽입
$userid = $_SESSION['userid'];
//변수에 comment_write_read.php에서 GET으로 가져온 ID 값을 저장한다.
$comment_id = $_GET['comment_id'];
//변수에 comment_write_read.php에서 GET으로 가져온 like에 1은 더한 값을 저장한다.
$like_count = $_GET['like'] +1;
$sql = mq("select * from member where id='".$userid."'");
$member = $sql->fetch_array();
// 데이터베이스의 member 테이블의 like_date 필드에 있는 값을 불러온다.
$like_date = $member['like_date']; 
// 현재 시간을 년 월 일 포맷으로 $current_like_date 변수에 저장
// 후에 로컬 시간이 아니라 클라이언트 시간을 받아오는 시도가 필요함
$current_like_date = DATE("Y-m-d", time());

if(isset($userid)){    
    if($like_date < $current_like_date){
        // 현재 시간(추천한 시간을) UPDATE 구문으로 like_date 에 삽입 
        $sql = mq("update member set like_date='".$current_like_date."' where id='".$userid."'");
        // 추천횟수 + 1을 UPDATE 구문으로 like_count 에 삽입
        $sql = mq("update comment set like_count='".$like_count."' where comment_id='".$comment_id."'");
        echo "<script>
        alert('추천하셨습니다.');
        location.href='./comment_write_read.php';</script>";
    } else {
        echo "<script>
        alert('오늘의 추천 횟수를 다 사용하셨습니다.');
        location.href='./comment_write_read.php';</script>";
    }    
} else {
    echo "<script>
    alert('로그인을 해주세요.');
    location.href='./comment_write_read.php';</script>";
}
?>