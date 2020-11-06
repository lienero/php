<?php
    include "../db/db.php";

    $id = $_POST['id'];
    $email = $_POST['email'].$_POST['emailaddress'];
    
    $sql = mq("select * from po_member where mem_email='".$email."' AND mem_id='".$id."'");
    $member = $sql->fetch_array();

    if($member) {
        echo "<script> location.href='./new_password.php?id=$id'; </script>";
    } else {
        echo "<script>alert('해당 계정의 정보가 존재하지 않습니다.'); history.back(); </script>";
    }
?>