<?php
	if(strlen($_POST['pw'])>=8){
		echo "아이디: ",$_POST['id'],"<br/>";
		echo "비밀번호: ",$_POST['pw'],"좋음 <br/>";
		echo "이메일: ",$_POST['email'],"<br/>";	
	} else{ 
		echo "아이디: ", $_POST['id'],"<br/>";
		echo "비밀번호: ", $_POST['pw'], " 나쁨 <br/>";
		echo "이메일: ", $_POST['email'], "<br/>";	
	}	
?>