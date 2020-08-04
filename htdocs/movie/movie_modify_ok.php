<?php

    include $_SERVER['DOCUMENT_ROOT']."../member/db/db.php";

//각 변수에 write.php에서 input name값들을 저장한다
// 이전 링크에서 idx 값을 받아온다
$bno = $_GET['idx'];
$name = $_POST['name'];
$role = $_POST['local_role'];
$date = $_POST['Opening_date'];
$r_age = $_POST['r_age'];
$summay = $_POST['summay'];
$r_time = $_POST['r_time'];
$director = $_POST['director'];
$lo_image_link = $_POST['lo_image_link'];

if($name && $role && $date && $r_age && $summay && $r_time && $director && $lo_image_link){
    $sql = mq("update movie_info set m_name='".$name."',
	m_local_role='".$role."',
	m_Opening_date='".$date."',
	m_r_age='".$r_age."',
	m_summay='".$summay."',
	m_r_time='".$r_time."',
	m_director='".$director."',
	m_lo_image_link='".$lo_image_link."'");

// arter() 팝업 메세지 표현 
echo "<script>
	alert('글 수정이 완료되었습니다.');
	location.href='movie_list.php';</script>";
}
?>