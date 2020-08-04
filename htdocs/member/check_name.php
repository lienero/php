<?php
include "./db/db.php";

// $uname 으로 document.getElementById("uname").value; 로 가져온 name를 삽입
$uname = $_GET["name"];

// $sql에 .$uid. 와 같은 id를 가진 쿼리를 삽입
$sql = mq("select * from member where id='".$uname."'");

// $sql에 있는 fetch_array(): 인덱스를 변수에 삽입
$member = $sql->fetch_array(name);

// fetch_array(): 인덱스가 처음이면(0) 이면 사용 가능한 아이디
if($member==0)
{
    ?>
	<div style='font-family:"malgun gothic"';><?php echo $uname; ?>는 사용가능한 닉네임입니다.</div>
<?php 
	}else{
?>
	<div style='font-family:"malgun gothic"; color:red;'><?php echo $uname; ?>중복된 닉네임입니다.<div>
<?php
	}
?>
<!-- onclick 할 시에 window.close() : 윈도우 닫기 함수 실행 -->
<button value="닫기" onclick="window.close()">닫기</button>
<script>
</script>