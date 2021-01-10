<?php
    include "../db/db.php";
    
    $email = $_POST['email'].$_POST['emailaddress'];

    $sql = mq("select * from po_member where mem_email='".$email."'");
    $member = $sql->fetch_array();

    // if $email is null >> page back 
    if($_POST['email']) {
        // if $member is false >> page back
        if($member) {
            echo "<script>alert('あなたのIDは ".$member['mem_id']."'); location.href='./login.html'; </script>";
        } else {
            echo "<script>alert('このIDは存在していません.'); history.back(); </script>";
        }
    } else {
        echo "<script>alert('入力されていません'); history.back(); </script>";
    }
?>