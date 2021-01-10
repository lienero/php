<?php
  session_start();
  
  $db = new mysqli("localhost","w1004mesm","smagics1s2s3","p1");
  $db->set_charset("utf8");

  function mq($sql){
    global $db;
    return $db->query($sql);
  }

  ?>