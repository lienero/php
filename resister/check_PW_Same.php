<html>
	<head>
		<meta charset="utf-8">
		<script type="text/javascript">
			// 비밀번호 재입력 일치여부 확인
			function isSame() {
				if(document.getElementById('pw').value!='' && document.getElementById('pwCheck').value!='') {
					if(document.getElementById('pw').value==document.getElementById('pwCheck').value) {
						document.getElementById('same').innerHTML='비밀번호가 일치합니다.';
						document.getElementById('same').style.color='blue';
					}
					else {
						document.getElementById('same').innerHTML='비밀번호가 일치하지 않습니다.';
						document.getElementById('same').style.color='red';
					}
				}
			}
		</script>
	</head>
	<body>
		비밀번호 <input type="password" name="wUserPW" id="pw" onKeyup="isSame()" style="ime-mode:disabled;"/><br/>
		비밀번호 확인<input type="password" name="wUserPWConfirm" id="pwCheck" onKeyup="isSame()" style="ime-mode:disabled;"/>
		<span id="same"></span></td>
	</body>
</html>