<?php
	include "./db/db.php";
	// session_destroy() : 모든 세션 데이타를 파괴
	session_destroy();
?>
<meta charset="utf-8">
<!-- alret() : 경고창 띄우기 -->
<script>alert("로그아웃되었습니다."); location.href="./index.php"; </script>