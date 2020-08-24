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
                echo "<script>alert('비밀번호가 성공적으로 변경되었습니다.'); location.href='./login.html';</script>";
            } else {
                echo "<script>alert('비밀번호 확인이 틀렸습니다.'); history.back();</script>";
            }
        } else {
            echo "<script>alert('비밀번호의 길이가 안 맞습니다.'); history.back();</script>";
        }
    } 
?>