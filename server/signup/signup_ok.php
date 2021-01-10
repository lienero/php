<?php
	//db 폴더에 있는 db.php 불러오기
	include "../db/db.php";
	//method 폴더에 있는 passwrod.php;를 불러온다.
	include "./method/password.php";

	//member.php 에서 post값을 받아온다
	$userid = $_POST['userid'];
	// password_hash()함수를 이용하여 $_POST['userpw']를 암호화 한다.
	$userpw = password_hash($_POST['userpw'], PASSWORD_DEFAULT);
	$email = $_POST['email'].$_POST['emailaddress'];
	$agree = $_POST['agree'];

	// $sql에 .$uid. 와 같은 id를 가진 쿼리를 삽입
	$sql = mq("select * from po_member where mem_id='".$userid."'");
	
	// $sql에 있는 fetch_array(): 인덱스를 변수에 삽입
	$member = $sql->fetch_array();
	
	// fetch_array(): 인덱스가 처음이면(0) 이면 사용 가능한 아이디
	if($member==0){	
		// strlen(문자열) 함수를 이용하여, 패스워드 길이가 8 이상이면 참
		if(strlen($_POST['userpw']) >= 8){
			// $_POST로 받아온 두 비밀번호 비교후 일치하면 참
			if($_POST['userpw'] == $_POST['userpwconfirm']){
				// checkbox 를 체크했을 때 참
				if($agree == "agree"){
					//mq() 한수를 이용하여 쿼리를 $sql에 삽입
					$sql = mq("insert into po_member (mem_id,mem_pw,mem_email) values('".$userid."','".$userpw."','".$email."')");
					// alert() :  alert()은 경고창(alert box)를 나타내 주는 스크립트입니다.

					//회원가입이 완료되었을 시 login.html로  
					echo "<script>alert('新規登録できました'); location.href='./login.php';</script>";

				} else {
					// history.back() : 현재 페이지의 한단계 이전 페이지로 이동
					echo "<script>alert('同意していません'); history.back();</script>";
				}						
			} else {
				echo "<script>alert('パスワードの確認が間違っています'); history.back();</script>";
			}
		} else {
			echo "<script>alert('パスワードの長さが間違っています'); history.back();</script>";
		}
	} else {
		echo "<script>alert('このIDは使われているIDです'); history.back();</script>";
	}	
?>


