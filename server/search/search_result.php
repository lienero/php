<?php 
	include $_SERVER['DOCUMENT_ROOT']."/recipe_site/mainpage/header.php";
	// 서버에 있는 아이디를 $userid변수에 삽입
	if(isset($_SESSION['mem_id'])){
		$userid = $_SESSION['mem_id'];
	}
?>
<!doctype html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>검색창</title>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="../js/vendor/jquery-ui-1.10.3.custom.min.js"></script>
    <script type="text/javascript" src="../js/index.js"></script>
    <script src="../js/vendor/modernizr-custom.js"></script>
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/bootstrap-theme.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/bootstrap-theme.css">
    <link rel="stylesheet" href="../js/bootstrap.js">
    <link rel="stylesheet" href="../js/npm.js">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=M+PLUS+Rounded+1c" rel="stylesheet">
</head>
<body style="background :#FFEAE5;">
    <br>
	<?php
	// 임시 검색 기능
	/* 검색 변수 */
	//serach.php 에서 get으로 받아온 내용을 저장
	$catagory = $_GET['catgo'];
	$search_con = $_GET['search'];
	?>
    <div class="container recipe_recommendation_box">
        <div class="row content_box1 img-fluid">
            <div class="content_box1_title">
                <div class="content_box1_title_content row">’<?php echo $search_con ?>’の検索の結果
				</div>
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
					if(isset($_SESSION['mem_id'])){
						// 배열에 값을 넣은 수 만큼 반복한다.
						for($k=0; $k < $count; $k++){
							// 쿼리 문에 필터링을 위해 문자열 합침 ($new_Spicy_Array[$k])
							$str_sql .= " AND recipe_spicy != '$new_Spicy_Array[$k]'";   
						}
						// 배열에 값을 넣은 수 만큼 반복한다.
						for($l=0; $l < $countf; $l++){
							// 쿼리 문에 필터링(not like)을 위해 문자열 합침 (%$new_Filter_Array[$l]%')
							// not like : 특정 값이 들어가진 않은 값을 검색
							$str_sql .= " AND recipe_food not like '%$new_Filter_Array[$l]%' order by recipe_likes desc limit 0,12";   
						}
					}
					$sql2 = mq($str_sql);
					if(isset($_GET['page'])){
					   $page=$_GET['page'];
				   }else{
					   //$_GET['page']안에 값이 없을 경우 $page 값에 1을 입력
					   $page=1;
				   }
				   //comment 테이블에서 comment_id를 기준으로 오름차순해서 0부터 5개를 입력
				   //limt 0(시작할 위치) 5(출력할 갯수)출력
				   //mysqli_num_rows : sql의 레코트의 행을 구함, 게시판 총 레코드 수
				   $row_num = mysqli_num_rows($sql2);
				   // 블록당 보여줄 페이지의 개수
				   $block_ct = 12;
				   // 현재 페이지 블록 구하기
				   $block_num = ceil($page/$block_ct); 
				   // 페이지의 시작번호
				   $block_start = (($block_num - 1) * $block_ct) + 1;
				   // 블록의 마지막 번호
				   $block_end = $block_start + $block_ct -1;
				   //페이징한 총 페이지의 숫자를 구한다.
				   //ceil 은 입력값에 소수부분이 존재할 때 값을 올려서 리턴하는 함수
				   $total_page = ceil($row_num/12);
				   //만약 블록의 마지막 번호가 페이지수보다 많다면
				   if($block_end > $total_page) {
				   $block_end = $total_page; 
				   }
				   //블럭의 총 개수를 구함
				   $total_block = ceil($total_page/$block_ct);
				   //시작번호 (page-1)에서 $block_ct를 곱한다.
				   $start_num = ($page-1) * $block_ct;
					// !$sql: $sql에 값이 존재하지 않을 경우 실행
					if(!$sql2){
						echo "검색결과가 없습니다.";
					} else {
						//$sql->fetch_array() 쿼리에 있는 데이터를 한줄씩 표시(있을 때 까지)
						//$sql->fetch_array()에 데이터가 존재할 때 까지 반복한다.
						while($recipe_info = $sql2->fetch_array()){
						?>
						<div class="col-md-3 col-sm-3">
							<a href="../recipe/recipe.php?recipe_seq=<?php echo $security_seq=password_hash($recipe_info["recipe_seq"], PASSWORD_DEFAULT);?>"><img class="card-img-top img-responsive img-rounded" src="/recipe_site/img/<?php echo $recipe_info["img"];?>" style="width: 212px; height: 160px;"></a>
							<div class="card-body">
								<h4 class="card-title">
									<a href="#"><?php echo $recipe_info["recipe_name"];?>&nbsp;</a>
								</h4>
								<h5>イイね:<td><?php echo $recipe_info["recipe_likes"];?>&nbsp;</td></h5>
								<p class="card-text">by: <?php echo $recipe_info["mem_id"];?>&nbsp;</p>
							</div>
						</div>
               			<?php
                    	}
					}
				}else {
					echo "ログインしてください";
				}
				?>
                </div>
            </div>
        </div>
    </div>
			<div class="text-center">
				<!-- 현재 페이지의 숫자를 출력 -->
				<div class='page-item'> <?php echo "[".$page."]"; ?> </div>
				<ul class="pagination">
					<?php
						//현재 페이지가 1을 초과했을 때 출력한다
						if($page > 1){
							// 처음 버튼을 누를 시에 ($_GET('page') 값에 1을 삽입
							echo "<li class='page-item'><a href='?page=1'>初め</a></li>";
						}
						// 현재 페이지가 1을 초과했을 때 출력한다.
						if($page > 1){
							//$pre 변수에 $page-1을 해준다.
							$pre = $page-1;
							//이전 버튼을 클릭할 시에 ($_GET('page') 값에 $pre 변수를 삽입 
							echo "<li class='page-item'><a href='?page=$pre'>前に</a></li>";
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
							echo "<li class='page-item'><a href='?page=$next'>後に</a></li>";
						}
						//만약에 page가 총 페이지 수의 미만일 경우
						if($page < $total_page){
							// 마지막 버튼을 클릭할 시($_GET('page') 값에 총 페이지 수를 삽입 
							echo "<li class='page-item'><a href='?page=$total_page'>最後に</a></li>";
						}
					?>
				</ul>
			</div>
    <!--푸터구역-->
    <?php include "../mainpage/footer.php"; ?>
</body>


</html>