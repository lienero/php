<meta charset="utf-8" />
<?php	
	include "../db/db.php";
	include "../method/password.php";
	
	//session_start() 세션을 시작하는 함수 (세션이 필요한 모든 페이지에 필요함)
	//SESSION : 쿠키와 달리 서버에 저장되는 정보로, 사이트를 나가기 전까지 서버에 정보를 저장함
	session_start();

	//POST로 받아온 아이다와 비밀번호가 비었다면 알림창을 띄우고 전 페이지로 돌아갑니다.
	if($_POST["userid"] == "" || $_POST["userpw"] == ""){
		echo '<script> alert("아이디나 패스워드 입력하세요"); history.back(); </script>';
	}else{

	//password변수에 POST로 받아온 값을 저장하고 sql문으로 POST로 받아온 아이디값을 찾습니다.
	$password = $_POST['userpw'];
	$sql = mq("select * from member where id='".$_POST['userid']."'");
	$member = $sql->fetch_array();
	$hash_pw = $member['pw']; //$hash_pw에 POSt로 받아온 아이디열의 비밀번호를 저장합니다. 

	//password_verify()만약 password변수와 hash_pw변수가 같다면 세션값을 저장하고 알림창을 띄운후 main.php파일로 넘어갑니다.
	if(password_verify($password, $hash_pw)) 
	{
		$_SESSION['userid'] = $member["id"];
		$_SESSION['userpw'] = $member["pw"];
		
		echo "<script>alert('로그인되었습니다.'); location.href='../main.php';</script>";
	}else{ // 비밀번호가 같지 않다면 알림창을 띄우고 전 페이지로 돌아갑니다
		   // history.back() : 현재 페이지의 한단계 이전 페이지로 이동
		echo "<script>alert('아이디 혹은 비밀번호를 확인하세요.'); history.back();</script>";
	}
}
?>