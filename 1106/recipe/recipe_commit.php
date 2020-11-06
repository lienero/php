<?php
include $_SERVER['DOCUMENT_ROOT']."/recipe_site/db/db.php";
include "../signup/method/password.php";
// 현재 시간을 'Asia/Seoul'을 기준으로 맞춘다
date_default_timezone_set('Asia/Seoul');
// 세션에서 아이디를 가져와서 삽입
$userid = $_SESSION['mem_id'];
//현재 시간을 변수에 대입한다.
$seq_check =mq("SELECT recipe_seq FROM po_recipe ORDER BY recipe_seq desc");
$seq_num = $seq_check->fetch_array();
$recipe_seq = $seq_num["recipe_seq"];
$time = DATE("Y-m-d H:i:s", time());
$recipe_name = $_POST['recipe_name'];
$textarea = $_POST['textarea'];
$youtube_url = $_POST['youtube_url'];
$spicy = $_POST['spicy'];
$human = $_POST['human'];
$tv_show = $_POST['tv_show'];
$thema = $_POST['thema'];
$pork = $_POST['pork'];
$beef = ','.$_POST['beef'];
$chicken = ','.$_POST['chicken'];
$vegetable = ','.$_POST['vegetable'];
$fruit = ','.$_POST['fruit'];
$seasoning = ','.$_POST['seasoning'];
$food_array = $_POST["food"];
//파일 업로드 방법
// $_FILES['파일 name']['tmp_name'] : 서버에 저장된 업로드된 파일의 임시 파일 이름. 
$tmp_imgMain = $_FILES['imgMain']['tmp_name'];
//$_FILES['파일 name']['name'] : 클라이언트 머신에 존재하는 파일의 원래 이름. 
$o_imgMain = $_FILES['imgMain']['name'];
// iconv(문자열 charset, 변경할 charset, 문자열) : 문자열을 요청 된 문자 인코딩으로 변환합니다.
$name_imgMain = iconv("UTF-8", "EUC-KR//IGNORE",($recipe_seq+1)."_main_img.jpeg");
$img_folder="../img/".$name_imgMain;
$recipe_sub_img=$_POST['recipe_imgs[]'];



//move_uploaded_file(서버로 전송된 파일, 지정위치)은x    서버로 전송된 파일을 폴더에 저장할 때 사용하는 함수입니다.
move_uploaded_file($tmp_imgMain,$img_folder);

$food = $pork.$beef.$chicken.$vegetable.$fruit.$seasoning;
for($i=0; $i<=$_POST['count']; $i++){
    $food .= ",".$food_array[$i];
}

$food_array2 = explode(",", $food); 
$food_count = count($food_array2);
for($i=0; $i<$food_count; $i++){
    echo ($food_array2[$i])."<br/>";
}

$file_text = $_POST["sub_img"];

for($j = 0; $j < count($file_text); $j++){
    $tmp_img_name = $_FILES['recipe_imgs']['tmp_name'];
    $img_name[] =$_FILES['recipe_imgs']['name'][$j];

}


if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

if($userid && $time){
    $sql = mq("insert into po_recipe(mem_id, recipe_name, recipe_contant, img, recipe_spicy, recipe_food, recipe_cate1, recipe_cate2, recipe_date, recipe_url)values('".$userid."','".$recipe_name."','".$textarea."','".$name_imgMain."','".$spicy."','".$food."','".$human."','".$tv_show."','".$time."','".$youtube_url."')");

    $seq_check =mq("SELECT recipe_seq FROM po_recipe ORDER BY recipe_seq desc");
    $seq_num = $seq_check->fetch_array();
    $recipe_seq = $seq_num["recipe_seq"];

    for($i = 0; $i<  count($file_text); $i++){
    $sql2 = mq("insert into po_recipe_img(recipe_seq, recipe_img, img_cont)values('".$seq_num[0]."','".$img_name[$i]."','".$file_text[$i]."')");
    }

    $security_seq = password_hash($seq_num[0], PASSWORD_DEFAULT);

    echo "<script>
    alert('글이 등록되었습니다.');
    location.href='./recipe.php?recipe_seq=$security_seq';</script>";

 
}else{
    // echo "<script>
    // alert('글을 등록할 수 없습니다.');
    // location.href='../index.php';</script>";
}

?>