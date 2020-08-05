<?php
	include "./db/db.php";
    
	// $uid 로 가져온 userid를 삽입
	$uid = $_GET["userid"];
    
	// $sql에 .$uid. 와 같은 id를 가진 쿼리를 삽입
	$sql = mq("select * from member where id='".$uid."'");
	
	// $sql에 있는 fetch_array(): 인덱스를 변수에 삽입
	$member = $sql->fetch_array();

	// fetch_array(): 인덱스가 처음이면(0) 이면 사용 가능한 아이디
	if($member==0)
	{
?>
	<div style='font-family:"malgun gothic"';><?php echo $uid; ?>는 사용가능한 아이디입니다.</div>
<?php 
	}else{
?>
	<div style='font-family:"malgun gothic"; color:red;'><?php echo $uid; ?>중복된아이디입니다.<div>
<?php
	}
?>
<!-- onclick 할 시에 window.close() : 윈도우 닫기 함수 실행 -->
<button value="닫기" onclick="window.close()">닫기</button>
<script>
</script>