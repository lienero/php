<?php
  session_start();
  
  $db = new mysqli("localhost","w1004mesm","smagics1s2s3","w1004mesm");
  $db->set_charset("utf8");

  function mq($sql){
    global $db;
    return $db->query($sql);
  }

  ?>