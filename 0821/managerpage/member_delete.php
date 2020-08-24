<?php
    include "../db/db.php";

    $count = count($_POST['member']);
    // bring ckeckbox's values
    if($_POST['member']) {
        for($idx = 0; $idx < $count; $idx++) {
            // put value in array
            $member = $_POST['member'];
            // delect member data
            $sql = mq("DELETE FROM po_member WHERE mem_id = '".$member[$idx]."'");
            // back manager page
            echo "<script>history.back();</script>";
        }
    } else {
        echo "<script>alert('선택된 레시피가 없습니다.'); history.back();</script>";
        
    }


?>