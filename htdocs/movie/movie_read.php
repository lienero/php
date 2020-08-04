<?php
    include $_SERVER['DOCUMENT_ROOT']."../member/db/db.php";
?>
<!doctype html>    
<html>
<head>
<meta charset="UTF-8">
<title>영화 정보</title>
<link rel="stylesheet" type="text/css" href="../css/style.css" />
<link rel="stylesheet" type="text/css" href="../css/common.css" />
</head>
<body>
	<div>
		<nav id="topMenu">
			<ul>
				<li><a class="menuLink" href="/page/main.php">Logo</a></li>
				<li><a class="menuLink" href="bookmark.php">북마크</a></li>
				<li><a class="menuLink" href="mypage.php">마이페이지</a></li>
				<li><a class="menuLink" href="/member/logout.php">로그아웃</a></li>
			</ul>	
		</nav>
	</div>
	
	<?php 
	   $bno = $_GET['idx']; // bno 함수에 idx 값을 받아와 넣음
	   /* 조회수 필요 시 사용
	   $hit = mysqli_fetch_array(mg("select * from movie_info where m_idx = '".$bno."'"));
	   $hit = $hit['hit'] + 1;
	   $fet = mq("update movie_info set hit = '".$hit."' wherer m_idx = '".$bno."'");*/
	   $sql = mq("select * from movie_info where m_idx='".$bno."'"); // 받아온 idx 값을 선택
       // fetch_array 함수는 mysqli_query 를 통해 얻은 리절트 셋(result set)에서 레코드를 1개씩 리턴해주는 함수입니다.
       // 레코드를 1개씩 리턴해주는 것은 mysqli_fetch_row 나 mysqli_fetch_assoc 와 동일하지만 리턴하는 배열의 형태가 틀립니다.
       // mysqli_fetch_array 함수는 순번을 키로 하는 일반 배열과 컬럼명을 키로 하는 연관배열 둘 모두 값으로 갖는 배열을 리턴합니다.
	   $movie_info = $sql->fetch_array();
	?>
	<h1>영화 정보</h1>
	<br>
		<div>
		영화 제목: <?php echo $movie_info['m_name'];?>
		</div>
		<div width="150">
		<!-- 포스터 -->
		포스터<br>
		<img src="http://localhost/img/poster/<?php echo $movie_info['m_lo_image_link'];?>">
		</div>
		<br>
		<div>
		감독: <?php echo $movie_info['m_director'];?>
		</div>
		<br>
		<div>
		주연: <?php echo $movie_info['m_local_role'];?>
		</div>
		<br>
		<div>
		개봉 날짜: <?php echo $movie_info['m_Opening_date'];?>
		</div>
		<br>
		<div>
		관람가: <?php echo $movie_info['m_r_age'];?>
		</div>
		<br>
		<div>
		줄거리: <?php echo $movie_info['m_summary'];?>
		</div>
		<br>
		<div>
		러닝타임: <?php echo $movie_info['m_r_time'];?>
		</div>
		<br>
		
		<!-- 목록, 수정, 삭제 -->
		<div id="bo_ser">
			<ul>
				<li><a href="/movie/movie_list.php">[목록으로]</a></li>
				<li><a href="/movie/movie_modify.php?idx=<?php echo $movie_info['m_idx']; ?>">[수정]</a></li>
				<li><a href="/movie/movie_delete.php?idx=<?php echo $movie_info['m_idx']; ?>">[삭제]</a></li>
			</ul>
		</div>
		<br>		
</body>
</html>