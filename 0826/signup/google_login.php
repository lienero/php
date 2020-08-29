<?php
    include "../db/db.php";

    $id = $_GET['id'];
    $email = $_GET['email'];
    $rank = $_GET['rank'];

    // 1. 데이터가 존재하는지 안하는지 고유의 id_address로 검사한다.
    $sql = mq("SELECT rank FROM po_member WHERE rank = '".$rank."'");
    $member = $sql->fetch_array();

    if ($member) {
        // move to index.php
        echo "<script>alert('로그인 되셨습니다.'); location.href='../index.php';</script>";
    } else {
        // insert data
        $sql = mq("INSERT INTO po_member (mem_id,mem_email,rank) VALUES('".$id."','".$email."','".$rank."')");
        echo "<script>alert('구글로 회원가입 되셨습니다.'); location.href='../index.php';</script>";
    }


?>