<?php
  session_start();
  
  $db = new mysqli("localhost","root","7777","p1");
  $db->set_charset("utf8");

  function mq($sql){
    global $db;
    return $db->query($sql);
  }

  ?>