<?php
    include "../db/db.php";

    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    $userid = $_SESSION['mem_id'];
    $sql = mq("select * from po_member where mem_id='".$userid."'");

    // 방송 종류 받아오는 변수 선언
    $list = $_POST['list'];
    // 제목 변수 선언
    $title = $_POST['title'];
    //이미지 파일 변수 선언]
    $fff = $_FILES['inputGroupFile01']['name'];

    for($i=0; $i < count($_FILES['inputGroupFile01']['name']); $i++){
        $tmpfile = $_FILES['inputGroupFile01']['tmp_name'][$i];
        $o_name = $_FILES['inputGroupFile01']['name'][$i];
        $filename = iconv("UTF-8","EUC-KR",$_FILES['inputGroupFile01']['name'][$i]);
        $folder = "./img/".$filename;
        move_uploaded_file($tmpfile,$folder);

    }

    //내용 변수 선언
    $text = $_POST['text'];
    //data()함수를 사용해 작성 시간 가져오기
    $date = date("Y-m-d H:i:s", time() +25200);
    
    if($userid && $list && $title && $text){
        $sql = mq("insert into po_review (mem_id, review_kind, review_name, review_cont, review_date) values('".$userid."','".$list."', '".$title."', '".$text."', '".$date."')");

        $sql_review = mq("SELECT review_seq FROM po_review WHERE mem_id = '".$userid."' AND review_date = '".$date."' ");
        $sql_seq = $sql_review->fetch_array();

        for($i=0; $i < count($_FILES['inputGroupFile01']['name']); $i++){
            $sql_img = mq("insert into po_review_seq (review_seq, review_img) values('".$sql_seq[0]."', '".$fff[$i]."')");
        }

        echo "<script>location.href='./review_view.php?seq=".$sql_seq[0]."';</script>";
    }else{
        echo "<script>alert('잘못 작성하였습니다.');history.back();</script>";
    }
        
    


?>