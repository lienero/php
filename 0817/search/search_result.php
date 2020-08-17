<?php 
    include $_SERVER['DOCUMENT_ROOT']."/recipe_site/db/db.php";
    // 만들어 놓은 헤더 (홈, 프로필, 레시피, 게시판) 삽입(include)
    include '../header/header.php';
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
<!-- 18.10.11 검색 추가 -->
<?php
    /* 검색 변수 */
    //serach.php 에서 get으로 받아온 내용을 저장
    $catagory = $_GET['catgo'];
    $search_con = $_GET['search'];
?>
<h1><?php echo $catagory; ?>에서 '<?php echo $search_con; ?>'검색결과</h1>
<h4 style="margin-top:30px;"><a href="../index.php">홈으로</a></h4>	
<div id="comment_info_area">
    	<h1>게시글 목록</h1>
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
            //변수를 이용하여 조건을 건다.
            //%변수% : 변수 안에 들은 문자열과 일치하는 모든 글 출력  
				$sql = mq("select * from comment  where $catagory like '%$search_con%' order by comment_id limit $min,5");
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
					<td width="70"><?php echo $comment_info["like_count"];?></td> 
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
					<td><a href="./search_result.php?catgo=<?php echo $catagory;?>&search=<?php echo $search_con;?>&page=<?php echo $prevpage; ?>">이전 페이지</a></td>
				<?php	
				}
				?>
					<!-- 페이지 넘버 $pagenum를 출력   -->
					<td><?php echo $pagenum; ?></td>
					<!-- ./comment_write_read.php?page =  echo $nextpage  값은 $_GET['page']와 같다-->	
					<td><a href="./search_result.php?catgo=<?php echo $catagory;?>&search=<?php echo $search_con;?>&page=<?php echo $nextpage; ?>">다음 페이지</a></td>
				</tr>		
      	</tbody>
    </table>
    <!-- 재 검색을 위한 검색 창 생성 -->
    <div id="search_box2">
        <form action="./search_result.php" method="get">
            <select name="catgo">
                <option value="content">내용</option>
                <option value="id">아이디</option>
            </select>
        <input type="text" name="search" size="40" required="required" /> <button>검색</button>
    </form>
    </div>
    </div>
</body>


</html>