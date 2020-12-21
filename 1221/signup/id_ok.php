<?php
    include "../db/db.php";
    
    $email = $_POST['email'].$_POST['emailaddress'];

    $sql = mq("select * from po_member where mem_email='".$email."'");
    $member = $sql->fetch_array();

    // if $email is null >> page back 
    if($_POST['email']) {
        // if $member is false >> page back
        if($member) {
            echo "<script>alert('당신의 id는 ".$member['mem_id']."'); location.href='./login.html'; </script>";
        } else {
            echo "<script>alert('해당 계정의 정보가 존재하지 않습니다.'); history.back(); </script>";
        }
    } else {
        echo "<script>alert('입력이 되지 않았습니다.'); history.back(); </script>";
    }
?>