<html>
<head>
<link rel="stylesheet" href="/recipe_site/css/bootstrap.min.css" />
<link rel="stylesheet" href="/recipe_site/css/bootstrap-theme.min.css" />
<script src =../checks.js></script>
</head>
<body>
<?php
// $_SERVER['DOCUMENT_ROOT'] : httpd.conf 파일에 설정된 웹서버의 루트 디렉토리
include $_SERVER['DOCUMENT_ROOT']."/recipe_site/db/db.php";

if(isset($_SESSION['mem_id'])){
	// 세션에 있는 유저의 아이디와 같은 테이블을 변수에 삽입함
	$sql = mq("select * from po_member where mem_id='".$_SESSION['mem_id']."'");	
	// $sql에 있는 fetch_array(): 인덱스를 변수에 삽입
	$member = $sql->fetch_array();
	// member rankd 필드에 있는 값이 매니저이면 관리자
	if($member['rank'] == "manager"){
		echo $_SESSION['mem_id']."관리자님 환영합니다.";
	}else {
		echo $_SESSION['mem_id']."님 환영합니다.";
	}
?>
	<sapn><button type="button" onclick="location.href='../mypage/mypage.php'" >마이페이지</button></sapn>
    <sapn><button type="button" onclick="location.href='../login/logout.php'" >로그아웃</button></sapn>
<?php
}
?>	
    <div id="comment_write">
		<!--enctype 속성은 폼 데이터(form data)가 서버로 제출될 때 해당 데이터가 인코딩되는 방법을 명시합니다. -->
		<!-- multipart/form-data :
		     모든 문자를 인코딩하지 않음을 명시함.
             이 방식은 <form> 요소가 파일이나 이미지를 서버로 전송할 때 주로 사용함. -->
		<form class="form-group" action="comment_write_ok.php" method="post" enctype="multipart/form-data">
			<div><h3>댓글</h3></div>
			<?php
			if(isset($_SESSION['mem_id'])){
			?>	
				<div>
				<textarea class="form-control" rows="5" name="content" id="content" placeholder="댓글을 입력하세요" required></textarea>
				</div>
				<br>
				<br>
				<span>
				<!-- 타입 file로 comment_write_ok.php 로 보낸다 -->
				<input type="file" name="image_link" value="1" />
				</span>
				<sapn class="bt_cm">
					<button type="submit" class="btn btn-info pull-right">글 작성</button>
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
					<button type="button" onclick="location.href='../signup/login.html'">로그인 페이지로</button>
				</div>
			<?php
			}
			?>
		</form>
	</>			
    <div id="comment_info_area">
    	<h1>댓글 목록</h1>
    	<table  class="table table-bordered">
			<thead>
    			<tr class="info">
					<th>아이디</th>
					<th>이미지</th>
					<th>내용</th>
					<th>업로드 시간</th>
					<th>좋아요</th>
    			</tr>
    		</thead>
			<?php
			// $_GET['page']에 값이 있을 때 $apge 값에 $_GET['page'];입력
			if(isset($_GET['page'])){
				$page = $_GET['page'];
			} else {
				// $_GET['page']에 값이 없을 때 $apge 값에 1을 입력
				$page = 1;
			}
				$sql2 = mq("select * from po_comment");
				//mysqli_num_rows : sql의 레코트의 행을 구함, 게시판 총 레코드 수
				$row_num = mysqli_num_rows($sql2);
				// 블록당 보여줄 페이지의 개수
				$block_ct = 5;
				// 현재 페이지 블록 구하기
				$block_num = ceil($page/$block_ct); 
				// 페이지의 시작번호
				$block_start = (($block_num - 1) * $block_ct) + 1;
				// 블록의 마지막 번호
				$block_end = $block_start + $block_ct -1;
				//페이징한 페이지의 숫자를 구한다.
				//ceil 은 입력값에 소수부분이 존재할 때 값을 올려서 리턴하는 함수
				$total_page = ceil($row_num/5);
				//만약 블록의 마지막 번호가 페이지수보다 많다면
				if($block_end > $total_page) {
					$block_end = $total_page; 
				}
				//블럭의 총 개수를 구함
				$total_block = ceil($total_page/$block_ct);
				//시작번호 (page-1)에서 $list를 곱한다.
				$start_num = ($page-1) * 5;
				//$sql->fetch_array() 쿼리에 있는 데이터를 한줄씩 표시(있을 때 까지)
				//$sql->fetch_array()에 데이터가 존재할 때 까지 반복한다.
				//comment 테이블에서 con_seq를 기준으로 오름차순해서 0부터 5개를(limit 0(시작할 위치),5(출력할 갯수)) 출력
				$sql3 = mq("select * from po_comment order by con_seq limit $start_num,5");
				while($comment_info = $sql3->fetch_array())
    			{
    			?>      
    			<tbody>
           		<tr>
					<!-- <a href="mycomment_read.php?idx=<?php //echo $comment_info["id"];?>"> 링크로 이동  -->
					<!-- mycomment_read.php?idx= = comment_info["id"] == mycomment_read.php? idx== 2 -->
					<td width="10%"><a href="mycomment_read.php?idx=<?php echo $comment_info["mem_id"];?>"><?php echo $comment_info["mem_id"];?></a></td>
					<td width="20%"><img src="http://localhost/recipe_site/img/<?php echo $comment_info['com_img']; ?>" width="100"/></td>
					<!-- $comment_info['content'] $comment_info 쿼리의 첫번째 라인의 content 필드를 출력 -->
					<td width="50%"><?php echo $comment_info['com_cont']; ?></td>
					<td width="10%"><?php echo $comment_info['com_date']; ?></td> 
					<td width="10%"><a href="like_count.php?comment_id=<?php echo $comment_info["comment_seq"];?>&like=<?php echo $comment_info["like_count"];?>"><?php echo $comment_info["like_count"];?></a></td> 
				</tr>
				<?php
				}
				?>
				</tbody>
    		</table>
			<div class="container" id ="page_num" style="text-align: center;">
				<!-- 현재 페이지의 숫자를 출력 -->
				<div class='page-item'> <?php echo "[".$page."]"; ?> </div>
				<ul class="pagination">
					<?php
						//현재 페이지가 1을 초과했을 때 출력한다
						if($page > 1){
							// 처음 버튼을 누를 시에 ($_GET('page') 값에 1을 삽입
							echo "<li class='page-item'><a href='?page=1'>처음</a></li>";
						}
						// 현재 페이지가 1을 초과했을 때 출력한다.
						if($page > 1){
							//$pre 변수에 $page-1을 해준다.
							$pre = $page-1;
							//이전 버튼을 클릭할 시에 ($_GET('page') 값에 $pre 변수를 삽입 
							echo "<li class='page-item'><a href='?page=$pre'>이전</a></li>";
						}
						//반복문을 사용하여, 블록 시작번호가 마지막 블록보다 작거나 같을 때 까지 반복한다 
						for($i=$block_start; $i<=$block_end; $i++){
							// 페이지와 $i가 같지 않을 시에 숫자를 출력한다.
							if($page != $i){
								// 페이지 숫자를 클릭할 시 ($_GET('page') 값에 $i(페이지의 숫자) 변수를 삽입
								echo "<li class='page-item'><a href='?page=$i'>[$i]</a></li>";
							}
						}	
						//만약에 현재 블록이 블록의 총 갯수 미만일 경우
						if($page < $total_page){
							//$next 변수에 $page변수에 1을 더한 값을 삽입
							$next = $page +1;
							// 다음 버튼을 클릭할 시 ($_GET('page') 값에 $next 변수를 삽입
							echo "<li class='page-item'><a href='?page=$next'>다음</a></li>";
						}
						//만약에 page가 총 페이지 수의 미만일 경우
						if($page < $total_page){
							// 마지막 버튼을 클릭할 시($_GET('page') 값에 총 페이지 수를 삽입 
							echo "<li class='page-item'><a href='?page=$total_page'>마지막</a></li>";
						}
					?>
				</ul>
			</div>
    </div>
</body>
</html>