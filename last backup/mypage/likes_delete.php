<?php
    //db 연결
    include "../db/db.php";
    // 삭제할 데이터 (실제로는 체크하면 받아짐)
    $like = $_POST['likes'];
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
$userid = $_SESSION['mem_id'];

    

    // 로그인한 회원의 likes 출력
   
    

    // 회원의 likes 의 앞에 있는지 없는지 확인하기 위한 코드 
     
    for($i=0; $i<count($like); $i++){

        $sql_like = mq("SELECT likes FROM po_member WHERE INSTR(mem_id = '".$userid."', '1')>0");
        $member = $sql_like->fetch_array();
        // 삭제할 데이터 길이
        $like_le = strlen($like[$i]);
        if ($like[$i]."," == substr( $member['likes'], 0, $like_le + 1 )){
            // likes 앞에 있을 경우 삭제
            $result = mq("UPDATE po_member SET likes = replace(likes, '".$like[$i].",', '')");
            
        } elseif ($like[$i] == substr( $member['likes'], 0, $like_le )) {
            // likes 에 값이 하나일 경우
            $result = mq("UPDATE po_member SET likes = replace(likes, '".$like[$i]."', '')");
            
        } else {
            // likes 앞에 없을 경우 삭제
            $result = mq("UPDATE po_member SET likes = replace(likes, ',".$like[$i]."', '')"); 
          
            
        }
        // 레시피의 시퀀스 번호에 recipe_likes의 번호 출력
        $recipe_nem= mq("SELECT recipe_likes FROM po_recipe WHERE recipe_seq = '".$like[$i]."'");
        $member = $recipe_nem->fetch_array();
        // 출력한 번호에서 -1하기
        $m = $member[0] -1;
 
        // update로 시퀀스 번호 recipe_likes에 번호 저장
        
        $result = mq("UPDATE po_recipe SET recipe_likes = '".$m."' WHERE recipe_seq = '".$like[$i]."' "); 

    }

    echo "<script>history.back();</script>";
    
    
?>