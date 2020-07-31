<?php
   include 'db_info.php';

   $id = $_POST['id'];
   $pwd = $_POST['pwd'];
   $e_mail = $_POST['email'];
   $b_day = $_POST['b-day'];
   $gender = $_POST['gender'];
   $u_name = $_POST['u_name'];
   $profile = $_POST['profile'];
   
   if( $id == NULL ||
       $pwd == NULL ||
       $e_mail == NULL ||
       $b_day == NULL ||
       $gender == NULL ||
       $u_name == NULL) {
           echo "입력 값을 제대로 적어주세요.";
           echo "<a href=register.html>홈페이지로 돌아갑니다.</a>";
           exit();
       } else {
           echo "좋아요!"."<br>";
       }
       
       $check = "SELECT * FROM user where u_id = '$id'";
       // $mysqli->query($check) -> : 멤버연산자(클래스에 접근)
       $result = $mysqli->query($check);
       //num_rows : 데이터 열 수를 반환
       if($result -> num_rows == 1) {
           echo "이 아이디는 이미 있는 아이디입니다.";
           echo "<a href=register.html>홈페이지로 돌아갑니다.</a>";
           // exit() : 프로그램 처리 중단 명령어
           exit();
       } else {
           echo "좋아요!";
       }
       $query = "INSERT INTO user (u_id, password, e_mail, b_day, gender, u_name, profile)
        VALUES ('$id', '$pwd', '$e_mail', '$b_day', '$gender', '$u_name', '$profile')";
       $execute = $mysqli->query($query);
       if($execute) {
           echo "회원 가입에 성공하였습니다.";
           // header() : raw HTTP header를 클라이언트에게 보낸다. (사이트 이동)
           header("location:login.php");
       } else {
           echo "에러가 발생하였습니다."."<br>";
           echo $mysqli->error;
       }
?>   