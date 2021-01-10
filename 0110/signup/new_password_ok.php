<?php
    include "../db/db.php";
    include "./method/password.php";

    $id = $_GET['id'];
    $pw = password_hash($_POST['userpw'], PASSWORD_DEFAULT);

    $sql = mq("select * from po_member where mem_id='".$id."'");
    $member = $sql->fetch_array();

    if($member) {
        if(strlen($_POST['userpw']) >= 8){
            if($_POST['userpw'] == $_POST['userpwconfirm']){
                $sql = mq("UPDATE member SET mem_pw='".$pw."' where mem_id='".$id."'");
                echo "<script>alert('パスワードを変更しました'); location.href='./login.html';</script>";
            } else {
                echo "<script>alert('パスワードの確認が間違っています'); history.back();</script>";
            }
        } else {
            echo "<script>alert('パスワードの長さが間違っています'); history.back();</script>";
        }
    } 
?>