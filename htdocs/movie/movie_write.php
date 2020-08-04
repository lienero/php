<?php
?>
<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8" />
<title></title>
</head>
<body>
<div id="board_write">>
	<h1><a href="/">등록</a></h1>
	<div id=write area></div>
		<!--enctype 속성은 폼 데이터(form data)가 서버로 제출될 때 해당 데이터가 인코딩되는 방법을 명시합니다. -->
		<!-- multipart/form-data :
		     모든 문자를 인코딩하지 않음을 명시함.
             이 방식은 <form> 요소가 파일이나 이미지를 서버로 전송할 때 주로 사용함. -->
		<form action="movie_write_ok.php" method="post" enctype="multipart/form-data">
			<div>
			영화 제목: <input type ="text" size="35" name="name" id="name" placeholder="제목" required>
			</div>
			<br>
			<div>
			감독&nbsp;&nbsp;&nbsp;: <input type ="text" size="35" name="director" id="director" placeholder="감독" required>
			</div>
			<br>
			<div>
			주연&nbsp;&nbsp;&nbsp;: <input type ="text" size="35" name="role" id="role" placeholder="주연" required>
			</div>
			<br>
			<div>
			개봉 날짜: <input type ="date" size="35" name="date" id="date" placeholder="개봉 날짜" required>
			</div>
			<br>
			<div>
			관람가&nbsp;&nbsp;: <input type ="int" size="35" name="r_age" id="r_age" placeholder="관람가" required>
			</div>
			<br>
			<div>
			줄거리&nbsp;&nbsp;: <input type ="text" size="50" name="summary" id="summary" placeholder="줄거리" required>
			</div>
			<br>
			<div>
			러닝타임&nbsp;: <input type ="text" size="35" name="r_time" id="r_time" placeholder="러닝타임" required>
			</div>
			<br>
			<br>
			<div>
			<!-- 타입 file로 movie_write_ok.php 로 보낸다 -->
			포스터: <input type="file" name="lo_image_link" value="1" />
			</div>
			<br>
			<div class="bt_se">
				<button type="submit">글 작성</button>
			</div>
		</form>
	</div>
</body>


</html>
