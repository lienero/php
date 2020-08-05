<?php
    $mysql_hostname = "localhost"; //localhost = 자신
    $mysql_username = "lee";    // 계정으로 접속
    $mysql_password = "7777";   // 비밀번호 입력
    $mysql_database = "web_test";   // 접속하고자 하는 데이터베이스
    $mysql_port = '3306';       // 접속할 사용하는 포트번호
    $mysql_charset = 'UTF8';
   
    // 2. DB 연결
    $mysqli = new mysqli($mysql_hostname, $mysql_username, $mysql_password, $mysql_database, $mysql_port, $mysql_charset);
?>   