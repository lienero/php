<?php
    include "../db/db.php";

    $id = $_GET['id'];
    $email = $_GET['email'];
    $rank = $_GET['rank'];

    // 1. 데이터가 존재하는지 안하는지 고유의 id_address로 검사한다.
    $sql = mq("SELECT rank FROM po_member WHERE rank = '".$rank."'");
    $member = $sql->fetch_array();

    if ($member) {
        // save id information in session
        $_SESSION['mem_id'] = $id;

        // move to index.php
        echo "<script>alert('ログインできました'); location.href='../index.php';</script>";
    } else {
        // insert data
        $sql = mq("INSERT INTO po_member (mem_id,mem_email,rank) VALUES('".$id."','".$email."','".$rank."')");
        echo "<script>alert('グーグルで新規登録されました'); location.href='../index.php';</script>";
    }

?>