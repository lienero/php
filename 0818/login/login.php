<?php   
//db 폴더에 있는 db.php 불러오기
include "../db/db.php";
?>

<head>
	<meta charset="utf-8" />
	<title></title>
<link rel="stylesheet" type="text/css" href="../css/common.css" />
</head>
<body>
	<br>
	<br>
	<br>
	<div id="login_box">
		<h1>Login</h1>		
			<!-- post 방식으로 login.ok.php 로 보낸다-->					
			<form method="post" action="./login_ok.php">
				<table align="center" border="0" cellspacing="0" width="300">
					<tr>
						<td colspan="2"> 
							<img src="../img/id.png" width="25">
							<input type="text" name="userid" class="inph">
						</td>
					</tr>
						<td colspan="2">
							<img src="../img/pw.png" width="25">
							<input type="password" name="userpw" class="inph">
						</td>
					<tr>
						<td colspan="2"> 
						<br>
						</td>
					</tr>
					<tr>
						<td class="mem"> 
							<button type="button" onclick="location.href='../signup/signup.php'" >Create Account</button>
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