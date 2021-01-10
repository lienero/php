<?php

//$_SERVER['DOCUMENT_ROOT'] = 현재 사이트가 위치한 서버상의 위치
include $_SERVER['DOCUMENT_ROOT']."/recipe_site/db/db.php";
// 현재 시간을 'Asia/Seoul'을 기준으로 맞춘다
date_default_timezone_set('Asia/Seoul');
//com_seq 확인
$com_check =mq("SELECT con_seq FROM po_comment ORDER BY con_seq desc");
$com_num = $com_check->fetch_array();
$com_seq = $com_num["con_seq"];
// 세션에서 아이디를 가져와서 삽입
$userid = $_SESSION['mem_id'];
//각 변수에 comment_write_read.php에서 content 값을 저장한다.
$content = $_POST['content'];
//현재 시간을 변수에 대입한다.
$time = DATE("Y-m-d H:i:s", time());
$recipe_seq = $_GET['recipe_seq'];
// $_FILES['userfile']['tmp_name'] : 서버에 저장된 업로드된 파일의 임시 파일 이름. 
$tmpfile = $_FILES['image_link']['tmp_name'];
//$_FILES['userfile']['name'] : 클라이언트 머신에 존재하는 파일의 원래 이름. 
$o_name = $_FILES['image_link']['name'];

if($tmpfile){
    // iconv(문자열 charset, 변경할 charset, 문자열) : 문자열을 요청 된 문자 인코딩으로 변환합니다.
    $filename = iconv("UTF-8", "EUC-KR//IGNORE", ($com_seq+1)."_com_img.jpeg");
    $folder = $_SERVER['DOCUMENT_ROOT']."/recipe_site/img/".$filename;
    //move_uploaded_file(서버로 전송된 파일, 지정위치)은 서버로 전송된 파일을 폴더에 저장할 때 사용하는 함수입니다.
    move_uploaded_file($tmpfile,$folder);
} else {
    $filename = "";
}

// $etc = $_POST['etc'];

// $userid && $content && $time 값이 존재할(참)시 데이터베이스에 입력  
if($userid && $content && $time){
    $sql = mq("insert into po_comment(recipe_seq ,mem_id, com_cont, com_img, com_date)
    values('".$recipe_seq."','".$userid."','".$content."','".$filename."','".$time."')");
    echo "<script>
    alert('コメントが登録されました');
    history.back();</script>";
}else{
    echo "<script>
    alert('コメントが登録できません');
    </script>";
}
