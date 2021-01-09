<?php 
	include $_SERVER['DOCUMENT_ROOT']."/recipe_site/db/db.php";
    // 만들어 놓은 헤더 (홈, 프로필, 레시피, 게시판) 삽입(include)
	include '../mainpage/header.php';
	// 서버에 있는 아이디를 $userid변수에 삽입
	$userid = $_SESSION['mem_id'];
?>
<!doctype html>
<head>
<meta charset="UTF-8">
<title>게시판</title>
<link rel="stylesheet" type="text/css" href="../css/style.css" />
<link rel="stylesheet" type="text/css" href="../css/common.css" />
</head>
<body>
<div id="board_area"> 
	<?php
	// 임시 검색 기능
	/* 검색 변수 */
	//serach.php 에서 get으로 받아온 내용을 저장
	$catagory = $_GET['catgo'];
	$search_con = $_GET['search'];
	?>
	<h1><?php echo $catagory; ?>에서 '<?php echo $search_con; ?>'검색결과</h1>
	<h4 style="margin-top:30px;"><a href="../index.php">홈으로</a></h4>	
	<div id="comment_info_area">
		<h1>게시글 목록</h1>
		<table class="table table-bordered"">
			<thead class="info">
    			<tr>
					<th>아이디</th>
					<th>작성자</th>
					<th>내용</th>
					<th>매운맛</th>
					<th>주재료</th>
    			</tr>
			</thead>
		<?php
		if(isset($userid)){
			$sql = mq("select * from po_member where mem_id='".$userid."'");
			// $sql에 있는 fetch_array(): 인덱스를 변수에 삽입
			$member = $sql->fetch_array();
			//  explode("," DB 필드)콤마를 기준으로 나눠서 배열로 저장
			$filter_Array = explode(",", $member['mem_filter']); 
			$spicy_Array = explode(",", $member['mem_spicy']);
			// $spicy_Array에서 null을 제외한 새 배열을 위한 변수 선언
			$count=0;
			// $filter_Array에서 null을 제외한 새 배열을 위한 변수 선언
			$countf=0;
			// $spicy_Array의 길이만큼 반복한다.
			for($i=0; $i< count($spicy_Array); $i++){
				//$spicy_Array의 값이 null이 아닐 시에 $new_Spicy_Array에 값을 삽입한다.
				if($spicy_Array[$i] != null){
					$new_Spicy_Array[$count] = $spicy_Array[$i];
					//배열에 값을 넣은 수 만큼 증가
					$count++; 
				}
			}
			// count(배열) 배열 변수의 개수를 반환. 
			// $filter_Array의 길이만큼 반복한다.
			for($j=0; $j< count($filter_Array); $j++){
				//$filter_Array의 값이 null이 아닐 시에 $new_Filter_Array에 값을 삽입한다.
				if($filter_Array[$j] != null){
					$new_Filter_Array[$countf] = $filter_Array[$j];
					//배열에 값을 넣은 수 만큼 증가
					$countf++; 
				}
			}

			// 기본 통합 검색 용 쿼리 문 작성
			$str_sql = "select * from po_recipe where $catagory like '%$search_con%'";
			// 배열에 값을 넣은 수 만큼 반복한다.
			for($k=0; $k < $count; $k++){
				// 쿼리 문에 필터링을 위해 문자열 합침 ($new_Spicy_Array[$k])
				$str_sql .= " AND recipe_spicy != '$new_Spicy_Array[$k]'";   
			}
			// 배열에 값을 넣은 수 만큼 반복한다.
			for($l=0; $l < $countf; $l++){
				// 쿼리 문에 필터링(not like)을 위해 문자열 합침 (%$new_Filter_Array[$l]%')
				// not like : 특정 값이 들어가진 않은 값을 검색
				$str_sql .= " AND recipe_food not like '%$new_Filter_Array[$l]%'";   
			}
			$sql = mq($str_sql);
			// !$sql: $sql에 값이 존재하지 않을 경우 실행
			if(!$sql){
				echo "검색결과가 없습니다.";
			} else {
				//$sql->fetch_array() 쿼리에 있는 데이터를 한줄씩 표시(있을 때 까지)
				//$sql->fetch_array()에 데이터가 존재할 때 까지 반복한다.
				while($recipe_info = $sql->fetch_array()){
				?>
					<tbody>
						<tr>
							<td><?php echo $recipe_info['recipe_seq'];?></td>
							<td><?php echo $recipe_info['mem_id'];?></td>
							<td><?php echo $recipe_info['recipe_contant'];?></td>
							<td><?php echo $recipe_info['recipe_spicy'];?></td>
							<td><?php echo $recipe_info['recipe_food'];?></td>
						</tr>
					</tbody>			
				<?php
				}
			}
		} else {
			echo "로그인을 해주세요";
		}
		?>
		</table>
		<h1>게시글 목록 2</h1>
    	<table class="table table-bordered"">
			<thead class="info">
    			<tr>
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
            //comment 테이블에서 comment_id를 기준으로 오름차순해서 0부터 5개를(limit 0(시작할 위치),5(출력할 갯수)) 출력
            //변수를 이용하여 조건을 건다.
            //%변수% : 변수 안에 들은 문자열과 일치하는 모든 글 출력  
				$sql = mq("select * from po_comment where $catagory like '%$search_con%' order by con_seq limit $start_num,5");
				//$sql->fetch_array() 쿼리에 있는 데이터를 한줄씩 표시(있을 때 까지)
				//$sql->fetch_array()에 데이터가 존재할 때 까지 반복한다.
				while($comment_info = $sql->fetch_array())
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
					<td width="70"><?php echo $comment_info["like_count"];?></td> 
				</tr>
				</tbody>
				<?php
				}
				?>
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
<?php
include '../mainpage/footer.html'
?>
</body>


</html>