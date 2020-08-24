<meta charset="utf-8" />
<?php

//db 폴더에 있는 db.php 불러오기
include "../db/db.php";
//method 폴더에 있는 passwrod.php;를 불러온다.
include "../signup/method/password.php";
//session_start() 세션을 시작하는 함수 (세션이 필요한 모든 페이지에 필요함)
session_start();

// $_POST로 입력한 값을 받아오기
// password_hash()함수를 이용하여 $_POST['userpw']를 암호화 한다.
$userpw = password_hash($_POST['userpw'], PASSWORD_DEFAULT);
$email = $_POST['email'].$_POST['emailaddress'];

// strlen(문자열) 함수를 이용하여, 패스워드 길이가 8 이상이면 참
if(strlen($_POST['userpw']) >= 8){
    // mq($sql) 함수를 이용하여 퀴리를 $sql에 삽입 (update)
    $sql = mq("update po_member set mem_pw='".$userpw."',mem_email='".$email."' where mem_id='".$_SESSION['mem_id']."'");
    // history.back() : 현재 페이지의 한단계 이전 페이지로 이동
    echo "<script>alert('정보변경이 완료되었습니다.'); location.href='./mypage.php';</script>";
} else {
    echo "<script>alert('정보변경에 실패했습니다.(비밀번호 오류)'); history.back();</script>";
}    
?>
