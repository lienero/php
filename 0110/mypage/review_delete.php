<?php
    //db 연결
    include "../db/db.php";
    //입력값 변수 선언
    $review = $_POST['review'];
    //입력값 갯수 카운트
    $count = count($review);

    if($_POST['review']){
        for($i=0; $i<$count; $i++){
            //작성된 후기 삭제
            $sql = mq("delete from po_review where review_seq = '".$review[$i]."'");
            //삭제후 마이페이지로 이동
         echo "<script>history.back();</script>";
    }        
        //선택한 후기가 없으면 뒤로 이동!
    }else{
        echo "<script>alert('선택된 것이 없습니다.');history.back();</script>";
    }
?>    