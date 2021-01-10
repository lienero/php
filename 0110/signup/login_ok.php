<?php
    include "../db/db.php";
    include "./method/password.php";

    //POST로 받아온 아이다와 비밀번호가 비었다면 알림창을 띄우고 전 페이지로 돌아갑니다.
	if($_POST["mem_id"] == "" || $_POST["mem_pw"] == "") {
		// echo '<script> alert("아이디나 패스워드 입력하세요"); history.back(); </script>';
	} else{

        //password변수에 POST로 받아온 값을 저장하고 sql문으로 POST로 받아온 아이디값을 찾습니다.
        $password = $_POST['mem_pw'];
        $sql = mq("select * from po_member where mem_id='".$_POST['mem_id']."'");
        $member = $sql->fetch_array();
        $hash_pw = $member['mem_pw']; //$hash_pw에 POST로 받아온 아이디열의 비밀번호를 저장합니다. 
        
        if(password_verify($password, $hash_pw)) { //만약 password변수와 hash_pw변수가 같다면 세션값을 저장하고 알림창을 띄운후 main.php파일로 넘어갑니다.
            $_SESSION['mem_id'] = $member["mem_id"];
            $_SESSION['mem_pw'] = $member["mem_pw"];
            
            print("성공");
            if($member['rank'] == "admin"){
                echo "<script>alert('ログインされました'); location.href='../managerpage/managerpage.html';</script>";
            } else {
                echo "<script>alert('ログインされました'); location.href='../index.php';</script>";
            }
        } else { // 비밀번호가 같지 않다면 알림창을 띄우고 전 페이지로 돌아갑니다
            print("ログインに失敗しました");
            echo "<script>alert('IDやパスワードを確認してください'); history.back();</script>";
        }
    }
?>