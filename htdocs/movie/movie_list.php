<?php
include $_SERVER['DOCUMENT_ROOT']."/member/db/db.php";
?>
<html>
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
            <li><a class="menuLink" href="logout.php">로그아웃</a></li>
        </ul>
    </nav>
    </div>
    
    <div id="movie_info_area">
    	<h1>영화 목록</h1>
    	<h4>관리자가 영화를 등록하거나 관리하는 페이지 입니다.</h4>
    	<table class="list-table">
    		<thead>
    			<tr>
    				<th>번호</th>
    				<th>영화 제목</th>
    				<th>포스터</th>
    				<th>감독</th>
    				<th>주연</th>
    				<th>개봉 날짜</th>
    				<th>관람가</th>
    				<th>줄거리</th>
    				<th>러닝타임</th>
    			</tr>
    		</thead>
    		<?php 
    		//movie_info 테이블에서 idx를 기준으로 내림차순해서 5개까지(limit 0,5) 표시
    		$sql = mq("select * from movie_info order by m_idx limit 0,5");
    		while($movie_info = $sql->fetch_array())
    		{
    		    //title변수에 DB에서 가져온 title을 선택
    		    $title=$movie_info["m_name"];
    		    if(strlen($title)>30)
    		    {
    		        //title이 30을 넘어서면 ...표시
    		        $title=str_replace($movie_info["title"],mb_substr($movie_info["title"],0,30,"utf-8")."...",$movie_info["title"]);
    		    }
    		?>      
    	<tbody>
            <tr>
              <td width="70"><?php echo $movie_info["m_idx"]; ?><a></td>
              <!-- /member/movie_read.php? idx = movie_info["m_idx"] 링크로 이동  -->
              <!-- /member/movie_read.php? idx = movie_info["m_idx"] == /member/movie_read.php? idx = 2 -->
              <!-- echo $title 은 $title=$movie_info["m_name"]; -->
              <td width="150"><a href="movie_read.php?idx=<?php echo $movie_info["m_idx"];?>"><?php echo $title;?></a></td>
              <td width="100"><img src="http://localhost/img/poster/<?php echo $movie_info['m_lo_image_link']; ?>" width="100"/></td>
              <td width="100"><?php echo $movie_info['m_director']; ?></td>
              <td width="120"><?php echo $movie_info['m_local_role']?></td>
              <td width="100"><?php echo $movie_info['m_Opening_date']?></td>
    		  <td width="100"><?php echo $movie_info['m_r_age']; ?></td>
    		  <td width="500"><?php echo $movie_info['m_summary']; ?></td>
    		  <td width="100"><?php echo $movie_info['m_r_time']; ?></td>		  
            </tr>
      </tbody>
      <?php 
    		}
      ?>
    </table>
    <div id="write_btn">
      <a href="/page_admin/movie_write.php"><button>글쓰기</button></a>
    </div>
  </div>
</body>
    	
    
    </div>
</html>