<?php
    include "../db/db.php";

    // bring ckeckbox's values
    if($_POST['recipe']) {
        for($idx = 0; $idx < count($_POST['recipe']); $idx++) {
            // put value in array
            $recipe = $_POST['recipe'];
            echo $recipe[$idx];
            // delect recipe data
            $sql = mq("DELETE FROM recipe WHERE recipe_seq = '".$recipe[$idx]."'");
            // back manager page
            echo "<script>history.back();</script>";
        }
    } else {
        echo "<script>alert('선택된 레시피가 없습니다.'); history.back();</script>";
        
    }

?>