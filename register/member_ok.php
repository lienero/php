<?php
	include "./db/db.php";
	include "./method/password.php";

	$userid = $_POST['userid'];
	// password_hash()함수를 이용하여 $_POST['userpw']를 암호화 한다.
	$userpw = password_hash($_POST['userpw'], PASSWORD_DEFAULT);
	$email = $_POST['email'].$_POST['emailaddress'];
	$agree = $_POST['agree'];

	// $sql에 .$uid. 와 같은 id를 가진 쿼리를 삽입
	$sql = mq("select * from member where id='".$userid."'");
	
	// $sql에 있는 fetch_array(): 인덱스를 변수에 삽입
	$member = $sql->fetch_array();
	
	// fetch_array(): 인덱스가 처음이면(0) 이면 사용 가능한 아이디
	if($member==0)
	{	
		// strlen(문자열) 함수를 이용하여, 패스워드 길이가 8 이상이면 참
		if(strlen($_POST['userpw']) >= 8){
			// $_POST로 받아온 두 비밀번호 비교후 일치하면 참
			if($_POST['userpw'] == $_POST['userpwconfirm']){
				// checkbox 를 체크했을 때 참
				if($agree == "agree"){
					//mq() 한수를 이용하여 쿼리를 $sql에 삽입
					$sql = mq("insert into member (id,pw,email) values('".$userid."','".$userpw."','".$email."')");
				?>
					<meta charset="utf-8" />
					<!-- alert() :  alert()은 경고창(alert box)를 나타내 주는 스크립트입니다.-->
					<script type="text/javascript">alert('회원가입이 완료되었습니다.');</script>
					<!-- 회원가입이 완료되었을 시 index.php로  -->
					<meta http-equiv="refresh" content="0 url=/register/index.php">
				<?php		
				} else {
				?>
					<meta charset="utf-8" />
					<script type="text/javascript">alert('백종원님에 대한 사랑이 부족하여 회원가입이 실패하였습니다.');</script>
					<!-- 회원가입이 실패됐을 시 member.php로  -->
					<meta http-equiv="refresh" content="0 url= /register//member.php">
				<?php	
				}
					
			} else {
			?>
				<meta charset="utf-8" />
				<script type="text/javascript">alert('비밀번호 확인이 틀려 회원가입이 실패하였습니다.');</script>
				<meta http-equiv="refresh" content="0 url= /register//member.php">
			<?php
			}
		} else {
		?>
			<meta charset="utf-8" />
			<script type="text/javascript">alert('비밀번호 길이가 안 맞아 회원가입에 실패하였습니다.');</script>
			<meta http-equiv="refresh" content="0 url= /register//member.php">
		<?php 
		}
	} else {
	?>
		<meta charset="utf-8" />
		<script type="text/javascript">alert('아이디가 중복되어 회원가입에 실패하였습니다.');</script>
		<meta http-equiv="refresh" content="0 url= /register//member.php">
	<?php 	
	}	
?>


