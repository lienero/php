<?php

//$_SERVER['DOCUMENT_ROOT'] = 현재 사이트가 위치한 서버상의 위치
include $_SERVER['DOCUMENT_ROOT']."/back/db/db.php";

// 세션에서 아이디를 가져와서 삽입
$userid = $_SESSION['userid'];
//변수에 comment_write_read.php에서 GET으로 가져온 ID 값을 저장한다.
$comment_id = $_GET['comment_id'];
//변수에 comment_write_read.php에서 GET으로 가져온 like에 1은 더한 값을 저장한다.
$like_count = $_GET['like'] +1;

if(isset($userid)){    
    $sql = mq("update comment set like_count='".$like_count."' where comment_id='".$comment_id."'");
    echo "<script>
    alert('추천하셨습니다.');
    location.href='./comment_write_read.php';</script>";
} else {
    echo "<script>
    alert('로그인을 해주세요.');
    location.href='./comment_write_read.php';</script>";
}
?>