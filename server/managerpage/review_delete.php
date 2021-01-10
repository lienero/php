<?php
    include "../db/db.php";

    // bring ckeckbox's values
    if($_POST['review']) {
        for($idx = 0; $idx < count($_POST['review']); $idx++) {
            // put value in array
            $review = $_POST['review'];
            echo $review[$idx];
            // delect recipe data
            $sql = mq("DELETE FROM po_review WHERE review_seq = '".$review[$idx]."'");
            // back manager page
            echo "<script>history.back();</script>";
        }
    } else {
        echo "<script>alert('選択されていません'); history.back();</script>";
        
    }

?>