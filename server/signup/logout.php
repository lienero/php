<?php
	//db 폴더에 있는 db.php 불러오기
	include "../db/db.php";
	// session_destroy() : 모든 세션 데이타를 파괴
	session_destroy();
?>
<meta charset="utf-8">
<!-- alret() : 경고창 띄우기 -->
<script>alert("ログアウトされました"); location.href='../index.php'; </script>