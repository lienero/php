<meta charset="utf-8" />
<?php

include "./db/db.php";
include "./method/password.php";

// $_POST로 입력한 값을 받아오기
// password_hash()함수를 이용하여 $_POST['userpw']를 암호화 한다.
$userpw = password_hash($_POST['userpw'], PASSWORD_DEFAULT);
$username = $_POST['name'];
$age = $_POST['age'];
$sex = $_POST['sex'];

// mq($sql) 함수를 이용하여 퀴리를 $sql에 삽입 
$sql = mq("update member set pw='".$userpw."', name='".$username."', age='".$age."',sex='".$sex."',email='".$_POST['email']."' where id='".$_SESSION['userid']."'");
echo "<script>alert('정보변경이 완료되었습니다 	'); history.back();</script>";

?>