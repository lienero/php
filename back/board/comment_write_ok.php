<?php

//$_SERVER['DOCUMENT_ROOT'] = 현재 사이트가 위치한 서버상의 위치
include $_SERVER['DOCUMENT_ROOT']."/back/db/db.php";

// 세션에서 아이디를 가져와서 삽입
$userid = $_SESSION['userid'];
//각 변수에 comment_write_read.php에서 content 값을 저장한다.
$content = $_POST['content'];
$time = DATE("Y-m-d h:i:s", time());

// $_FILES['userfile']['tmp_name'] : 서버에 저장된 업로드된 파일의 임시 파일 이름. 
$tmpfile = $_FILES['image_link']['tmp_name'];
//$_FILES['userfile']['name'] : 클라이언트 머신에 존재하는 파일의 원래 이름. 
$o_name = $_FILES['image_link']['name'];
// iconv(문자열 charset, 변경할 charset, 문자열) : 문자열을 요청 된 문자 인코딩으로 변환합니다.
$filename = iconv("UTF-8", "EUC-KR", $_FILES['image_link']['name']);
$folder = "../img/poster/".$filename;
//move_uploaded_file(서버로 전송된 파일, 지정위치)은 서버로 전송된 파일을 폴더에 저장할 때 사용하는 함수입니다.
move_uploaded_file($tmpfile,$folder);

// $etc = $_POST['etc'];

if($userid && $content && $time){
    $sql = mq("insert into comment(id, content, image, date)
    values('".$userid."','".$content."','".$o_name."','".$time."')");
    echo "<script>
    alert('댓글이 등록되었습니다.');
    location.href='./comment_write_read.php';</script>";
}else{
    echo "<script>
    alert('댓글을 등록할 수 없습니다.');
    </script>";
}
