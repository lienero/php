<?php

//$_SERVER['DOCUMENT_ROOT'] = 현재 사이트가 위치한 서버상의 위치
include $_SERVER['DOCUMENT_ROOT']."/member/db/db.php";

//각 변수에 write.php에서 input, nmae 값들을 저장한다.
$name = $_POST['name'];
$role = $_POST['role'];
$date = $_POST['date'];
$r_age = $_POST['r_age'];
$summary = $_POST['summary'];
$r_time = $_POST['r_time'];
$director = $_POST['director'];

// $_FILES['userfile']['tmp_name'] : 서버에 저장된 업로드된 파일의 임시 파일 이름. 
$tmpfile = $_FILES["lo_image_link"]['tmp_name'];
//$_FILES['userfile']['name'] : 클라이언트 머신에 존재하는 파일의 원래 이름. 
$o_name = $_FILES["lo_image_link"]['name'];
// iconv(문자열 charset, 변경할 charset, 문자열) : 문자열을 요청 된 문자 인코딩으로 변환합니다.
$filename = iconv("UTF-8", "EUC-KR", $_FILES['lo_image_link']['name']);
$folder = "../img/poster/".$filename;
//move_uploaded_file(서버로 전송된 파일, 지정위치)은 서버로 전송된 파일을 폴더에 저장할 때 사용하는 함수입니다.
move_uploaded_file($tmpfile,$folder);

// $etc = $_POST['etc'];

if($name && $role && $date && $r_age && $summary && $r_time && $director && $o_name){
    $sql = mq("insert into movie_info(m_name, m_local_role, m_Opening_date, m_r_age, m_summary, m_r_time, m_director, m_lo_image_link)
    values('".$name."','".$role."','".$date."','".$r_age."','".$r_summary."','".$r_time."','".$director."','".$o_name."')");
    echo "<script>
    alert('글쓰기 완료되었습니다.');
    location.href='/page/main.php';</script>";
}else{
    echo "<script>
    alert('글쓰기_완료되었습니다.');
    </script>";
}
