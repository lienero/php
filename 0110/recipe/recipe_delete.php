<?php
    //db 연결
    include $_SERVER['DOCUMENT_ROOT']."/recipe_site/db/db.php";
    //입력값 변수 선언
    $recipe_seq = $_GET['recipe_seq'];

    if($_GET['recipe_seq']){
        $sql = mq("delete from po_recipe where recipe_seq = '".$recipe_seq."'");
        //삭제후 메인페이지로 이동
         echo "<script>alert('レシピを削除しました'); location.href='/recipe_site/index.php';</script>";
    }        
    else{
        echo "<script>alert('削除に失敗しました');history.back();</script>";
    }
?>    