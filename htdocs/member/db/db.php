 <?php
  session_start();
  
  $db = new mysqli("localhost","lee","7777","web_test");
  $db->set_charset("utf8");

  function mq($sql){
    global $db;
    return $db->query($sql);
  }

  ?>