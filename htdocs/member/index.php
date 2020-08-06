<?php   
// include로 db.php 불러오기
include "./member/db/db.php";
?>

<head>
	<meta charset="utf-8" />
	<title></title>
<!-- <link href =""> href 링크에 있는 파일을 불러옴 -->	
<link rel="stylesheet" type="text/css" href="/css/common.css" />
</head>
<body>
	<br>
	<br>
	<br>
	<div id="login_box">
		<h1>Login</h1>							
			<form method="post" action="/member/login_ok.php">
				<table align="center" border="0" cellspacing="0" width="300">
					<tr>
						<td colspan="2"> 
							<img src="./img/id.png" width="25">
							<input type="text" name="userid" class="inph">
						</td>
					</tr>
						<td colspan="2">
							<img src="./img/pw.png" width="25">
							<input type="password" name="userpw" class="inph">
						</td>
					<tr>
						<td colspan="2"> 
						<br>
						</td>
					</tr>
					<tr>
						<td class="mem"> 
							<!-- onclick 할 시에 href location.href='/member/member.php'로 이동 -->
							<button type="button" onclick="location.href='/member/member.php'" >Create Account</button>
						</td>
						<td> 
							<button type="submit" id="btn" >Sign in</button>
						</td>
						
					</tr>
				</table>
			</form>
	</div>
</body>
</html>