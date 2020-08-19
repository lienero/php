<html>
<head>
<link rel="stylesheet" type="text/css" href="../css/style.css" />
<link rel="stylesheet" type="text/css" href="../css/common.css" />
<script src =../checks.js></script>
</head>
<body>
<?php
// $_SERVER['DOCUMENT_ROOT'] : httpd.conf 파일에 설정된 웹서버의 루트 디렉토리
include $_SERVER['DOCUMENT_ROOT']."/back/db/db.php";

if(isset($_SESSION['userid'])){
	// 세션에 있는 유저의 아이디와 같은 테이블을 변수에 삽입함
	$sql = mq("select * from member where id='".$_SESSION['userid']."'");	
	// $sql에 있는 fetch_array(): 인덱스를 변수에 삽입
	$member = $sql->fetch_array();
	// member rankd 필드에 있는 값이 매니저이면 관리자
	if($member['rank'] == "manager"){
		echo $_SESSION['userid']."관리자님 환영합니다.";
	}else {
		echo $_SESSION['userid']."님 환영합니다.";
	}
?>
	<sapn><button type="button" onclick="location.href='../mypage/mypage.php'" >마이페이지</button></sapn>
    <sapn><button type="button" onclick="location.href='../login/logout.php'" >로그아웃</button></sapn>
<?php
}
// 만들어 놓은 헤더 (홈, 프로필, 레시피, 게시판) 삽입(include)
include '../header/header.php';
?>	
    <div id="comment_write">
		<!--enctype 속성은 폼 데이터(form data)가 서버로 제출될 때 해당 데이터가 인코딩되는 방법을 명시합니다. -->
		<!-- multipart/form-data :
		     모든 문자를 인코딩하지 않음을 명시함.
             이 방식은 <form> 요소가 파일이나 이미지를 서버로 전송할 때 주로 사용함. -->
		<form action="comment_write_ok.php" method="post" enctype="multipart/form-data">
			<div>댓글</div>
			<?php
			if(isset($_SESSION['userid'])){
			?>	
				<div>
				<textarea cols = "30" rows = "10" name="content" id="content" placeholder="댓글을 입력하세요" required></textarea>
				</div>
				<br>
				<br>
				<span>
				<!-- 타입 file로 comment_write_ok.php 로 보낸다 -->
				<input type="file" name="image_link" value="1" />
				</span>
				<sapn class="bt_cm">
					<button type="submit">글 작성</button>
				</sapn>
			<?php
			}else{
			?>	
				<div>
					<textarea name="content" id="content" placeholder="로그인을 해주세요"></textarea>
				</div>
				<br>
				<div>
					<!-- 타입 file로comment_write_ok.php 로 보낸다 -->
					<input type="file" name="image_link" value="1" />
				</div>
				<br>
				<div class="bt_cm">
					<!-- location.href = '' : 새로운 페이지로 이동 -->
					<button type="button" onclick="location.href='../login/login.php'">로그인 페이지로</button>
				</div>
			<?php
			}
			?>
		</form>
	</>			
    <div id="comment_info_area">
    	<h1>댓글 목록</h1>
    	<table class="list-table">
			<thead>
    			<tr>
					<th>아이디</th>
					<th>이미지</th>
					<th>내용</th>
					<th>업로드 시간</th>
					<th>좋아요</th>
    			</tr>
    		</thead>
			<?php
			// limit min : 불러올 데이터 시작점 변경을 위해 변수설정
			// $_GET['page']에 값이 있을 때 $min 값과 max 값에 $min = $_GET['page'];입력
			if(isset($_GET['page'])){
				$min = $_GET['page'];
			} else {
				// $_GET['page']에 값이 없을 때 $min 값과 max 값에 0, 5 입력
				$min = 0;
			}
			//comment 테이블에서 comment_id를 기준으로 오름차순해서 0부터 5개를(limit 0(시작할 위치),5(출력할 갯수)) 출력
				$sql = mq("select * from comment order by comment_id limit $min,5");
				//$sql->fetch_array() 쿼리에 있는 데이터를 한줄씩 표시(있을 때 까지)
				//$sql->fetch_array()에 데이터가 존재할 때 까지 반복한다.
				while($comment_info = $sql->fetch_array())
    			{
    			?>      
    			<tbody>
           		<tr>
					<!-- <a href="mycomment_read.php?idx=<?php //echo $comment_info["id"];?>"> 링크로 이동  -->
					<!-- mycomment_read.php?idx= = comment_info["id"] == mycomment_read.php? idx== 2 -->
					<td width="70"><a href="mycomment_read.php?idx=<?php echo $comment_info["id"];?>"><?php echo $comment_info["id"];?></a></td>
					<td width="100"><img src="http://localhost/back/img/poster/<?php echo $comment_info['image']; ?>" width="100"/></td>
					<!-- $comment_info['content'] $comment_info 쿼리의 첫번째 라인의 content 필드를 출력 -->
					<td width="200"><?php echo $comment_info['content']; ?></td>
					<td width="70"><?php echo $comment_info['date']; ?></td> 
					<td width="70"><a href="like_count.php?comment_id=<?php echo $comment_info["comment_id"];?>&like=<?php echo $comment_info["like_count"];?>"><?php echo $comment_info["like_count"];?></a></td> 
				</tr>
				<?php
				}
				// 다음페이지를 위한 값 $nextpage변수
				$nextpage = $min + 5;
				// 이전페이지를 위한 값 $prevpage변수
				$prevpage = $min - 5;
				// 페이지 넘버를 표현하기 위한 식
				$pagenum = ($min / 5) + 1;
				// nextpage의 값이 5를 넘을 때 이전페이지 버튼을 표시.
				if($nextpage > 5){
				?>
				<tr>
					<!-- ./comment_write_read.php?page =  echo $prevpage;  값은 $_GET['page']와 같다-->
					<td><a href="./comment_write_read.php?page= <?php echo $prevpage; ?>">이전 페이지</a></td>
				<?php	
				}
				?>
					<!-- 페이지 넘버 $pagenum를 출력   -->
					<td><?php echo $pagenum; ?></td>
					<!-- ./comment_write_read.php?page =  echo $nextpage  값은 $_GET['page']와 같다-->	
					<td><a href="./comment_write_read.php?page= <?php echo $nextpage; ?>">다음 페이지</a></td>
				</tr>		
      	</tbody>
    </table>
    </div>
</body>


</html>