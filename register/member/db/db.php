 <?php
  session_start();
  
  $db = new mysqli("localhost","lee","7777","web_test");
  $db->set_charset("utf8");

  // 글로벌 변수 $db를 바탕으로 해당 sql 구문의 쿼리값을 리턴
  function mq($sql){
    global $db;
    return $db->query($sql);
  }

  ?>