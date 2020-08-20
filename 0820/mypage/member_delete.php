<?php
	//db 폴더에 있는 db.php 불러오기
    include "../db/db.php";
    
	//password변수에 POST로 받아온 값을 저장하고 sql문으로 POST로 받아온 아이디값을 찾습니다.
    $password = $_POST['userpw']; // 패스워드 입력 값을 post로 받아옴
    $agree = $_POST['agree']; // 동의 체크박스를 post로 받아옴
	$sql = mq("select * from member where mem_id='".$_SESSION['mem_id']."'");
	$member = $sql->fetch_array();
	$hash_pw = $member['mem_pw']; //$hash_pw에 POST로 받아온 아이디열의 비밀번호를 저장합니다. 

	//password_verify()만약 password변수와 hash_pw변수가 같다면 세션값을 저장하고 알림창을 띄운후 main.php파일로 넘어갑니다.
    if(isset($_SESSION['mem_id'])){
        if($_POST['userpw'] == $_POST['userpwconfirm']){
            if(password_verify($password, $hash_pw)) {
                if($agree == "agree"){
                    $sql = mq("delete from member where mem_id='".$_SESSION['mem_id']."'");
                    session_destroy();
                    echo "<script>alert('회원을 탈퇴하셨습니다.'); location.href='../signup/login.html';</script>";
                } else {
                    echo "<script>alert('동의하지 않으셨습니다.'); history.back();</script>";
                }
            } else {
                echo "<script>alert('비밀번호가 틀렷습니다.'); history.back();</script>";
            }      
        } else {
            echo "<script>alert('비밀번호를 확인하세요.'); history.back();</script>";
        }    
    } else {
        echo "<script>alert('로그인하세요.'); history.back();</script>";
    }
?>
?>

