<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
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
    <link rel="stylesheet" href="../css/recipe.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous"></script>
    <title>repice</title>
</head>

<body style="background :#FFEAE5;">
<div class="container main_top">
        <div class="row">
            <!--row로 열 만들기-->
            <div class="col-md-2 box1 text-center">
                <!--그리드로 행 나누기 로고버튼-->
                <a href="/recipe_site/index.php"><img src="../img/logo_pink.png" alt="" class=""></a>
            </div>
            <?php
            include "../db/db.php";
            if(isset($_SESSION['mem_id'])){
            ?>    
                <div class="col-md-2 box1 text-center row">
                <div class="login_button_wrap">
                    <a href="../signup/logout.php"><button class="btn login_button">ログアウト</button></a>
                    <a href="../mypage/mypage.php"><button class="btn login_button2">マイページ</button></a>
                </div>
                <br>
                <div class="login_text">
                    <?php
                    //isset 안에 값이 있는지 없는지 확인하는 식
                        echo $_SESSION['mem_id']."様ようこそ.";              
                    ?>
                </div>     
            </div>
            <?php
            }
            else{
            ?>
            <div class="col-md-2 box1 text-center row">
                <div class="login_button_wrap">
                    <a href="../signup/login.php"><button class="btn login_button">ログイン</button></a>
                    <a href="../signup/signup.php"><button class="btn login_button2">新規取得</button></a>
                </div> 
            </div>
            <?php
            };
            ?>
            <!--서치박스 -->
            <div class="col-md-4 box1 text-center search_padding">
                <form action="/recipe_site/search/search_result.php" method="get">
                <nav class="navbar navbar-search navbar-light bg-light">
                    <select class="form-control search_width text-center" name="catgo">
                        <option value="content">Content</option>
                        <option value="mem_id">ID</option>
                    </select>
                    <input class="form-control" type="search" name="search" placeholder="Search" aria-label="Search">
                    <button class="btn search_button" type="submit" id="main-button"
                        style="color:white; background:#f77e8a">検索</button>
                    <!--버튼에 아이디 추가-->
                </nav>
                </form>
            </div>
            <div class="col-md4 btn-group toggle_button switch_button" id="toggle_event_editing">
                <!--토글 이벤트 아이디 추가-->
                <button type="button" class="btn btn-info locked_active">KR</button>
                <button type="button" class="btn btn-default unlocked_inactive">JP</button>
                <span>&nbsp;&nbsp;&nbsp;&nbsp;</span>
                <div class="img-wrap">
                    <a href="#"><img src="../img/facebook.png" alt=""></a>
                    <a href="#"><img src="../img/youtube.png" alt=""></a>
                </div>
            </div>
        </div>
        <!--숨겨진 버튼구역-->
        <nav class="navbar row navbar_margin">
            <div class="row category_button">
                <button class="navbar-toggler hidden-lg hidden-md hidden-sm category_button" type="button"
                    data-toggle="collapse" data-target="#collapsibleNavbar">
                    <img src="../img/category.png" alt="">
                </button>
            </div>
        </nav>
    </div>
    <!--카테고리구역-->
    <div class="container-fluid text-center" style="justify-content: center;">
        <div class="collapse navbar-collapse" id="collapsibleNavbar" style="align-items:center;">
            <!--네브바 아이디 추가-->
            <ul class="navbar-nav col-md-12">
                <li class="nav-item col-md-3"> <a class="nav-link disabled" href="../categorypage/category.php">カテゴリー </a> </li>
                <li class="nav-item dropdown col-md-3">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
                        <span class="caret"></span> 放送局
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">3大天王</a><br>
                        <a class="dropdown-item" href="#">골목식당</a><br>
                        <a class="dropdown-item" href="#">맛남의광장 </a><br>
                        <a class="dropdown-item" href="#">마리텔</a>
                    </div>
                </li>
                <li class="nav-item dropdown col-md-3">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
                        <span class="caret "></span> 料理
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">韓食</a><br>
                        <a class="dropdown-item" href="#">和食</a><br>
                        <a class="dropdown-item" href="#">洋食</a><br>
                        <a class="dropdown-item" href="#">中食</a>
                    </div>
                </li>
                <li class="nav-item col-md-3"> <a class="nav-link" href="#">後記</a> </li>
                <!-- <li class="nav-item col-md-20"> <a class="nav-link" href="#">マイページ</a> </li>  마이페이지-->

            </ul>
        </div>
        </nav>
    </div>
    <br>
    <div class="container">
        <form action="../comment/comment_write_ok.php" method="POST" enctype="multipart/form-data">
            <!--레시피 대표 이미지-->
            <div class="row flex_box">
                <div class="col-md-10 text-center">
                    <img src="https://via.placeholder.com/550x450" class="img-thumbnail rounded">
                </div>
            </div>
            <!--레시피 제목-->
            <div class="row flex_box">
                <div class="col-sm-6 col-md-4">
                    <h3>제목</h3>
                </div>
            </div>
            <!--레시피 설명-->
            <div class="row flex_box">
                <div class="col-sm-6 col-md-4">
                    <p>"요리 설명을 해주시고 큰따옴표는 남겨주세요"</p>
                </div>
            </div>
            <!--좋아요 아이콘-->
            <div class="row flex_box">
                <div class="col-md-3">
                    <div class="thumbnail text-center">
                        <img src="../img/heart.png" class="icon">
                        <div class="caption">
                            <h6>그냥 죽어라냥</h6>
                        </div>
                    </div>
                </div>
                <!--매운맛 단계 표시-->
                <div class="col-md-3">
                    <div class="thumbnail text-center">
                        <img src="../img/Fire.png" class="icon">
                        <div class="caption">
                            <h6>그냥 죽어라냥</h6>
                        </div>
                    </div>
                </div>
            </div>
            <!--페이스북 아이콘-->
            <div class="row flex_box">
                <div class="col-md-2">
                    <div class="img-rounded text-center">
                        <img src="../img/facebook.png">
                    </div>
                </div>
                <!--트위터 아이콘-->
                <div class="col-md-2">
                    <div class="img-rounded text-center">
                        <img src="../img/twitter.png">
                    </div>
                </div>
                <!--유튜브 아이콘-->
                <div class="col-md-2">
                    <div class="img-rounded text-center">
                        <img src="../img/youtube.png">
                    </div>
                </div>
            </div>
            <br>
            <!--재료 설명-->
            <div class="row flex_box">
                <div class="col-md-12">
                    <div class="ready_ingre3 text-center">
                        <ul class="col-md-6">
                            <b class="ready_ingre3">[재료]</b>
                            <li>토마토 같은거<span class="ingre_unit">1개</span>
                            </li>
                            <hr>
                            <li>스팸 <span class="ingre_unit">1개</span>
                            </li>
                            <hr>
                            <li>라면 <span class="ingre_unit">진라면</span>
                            </li>
                            <hr>
                            <li>당근 <span class="ingre_unit">반개</span>
                            </li>
                            <hr>
                            <li>청양고추 <span class="ingre_unit">1개</span>
                            </li>
                        </ul>
                        <!--양념 설명-->
                        <ul class="col-md-6">
                            <b class="ready_ingre3">[양념]</b>
                            <li>토마토소스 <span class="ingre_unit">4T</span>
                            </li>
                            <hr>
                        </ul>
                    </div>
                </div>
            </div>
            <!--동영상 -->
            <div class="row flex_box">
                <div class="col-md-7 text-center">
                    <h3>동영상</h3>
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/watch?v=GP8_7D5eM6A">
                        </iframe>
                    </div>
                </div>
            </div>
    </div>
    <br>
    <!--레시피 설명-->
    <div class="row flex_box">
        <div class="recipe">
            <div class="col-md-6">나의 피땀 눈물을 넣는다 과연 효과는
            </div>
            <!--레시피 이미지-->
            <div class="col-md-6 text-center">
                <img src="https://via.placeholder.com/250x150">
            </div>
        </div>
    </div>
    <br>
    <div class="row flex_box">
        <div class="recipe">
            <div class="col-md-6">나의 피땀 눈물을 넣는다 과연 효과는
            </div>
            <!--레시피 이미지-->
            <div class="col-md-6 text-center">
                <img src="https://via.placeholder.com/250x150">
            </div>
        </div>
    </div>
    <br>
    <div class="row flex_box">
        <div class="recipe">
            <div class="col-md-6">나의 피땀 눈물을 넣는다 과연 효과는
            </div>
            <!--레시피 이미지-->
            <div class="col-md-6 text-center">
                <img src="https://via.placeholder.com/250x150">
            </div>
        </div>
    </div>
    <br>
    <!--댓글 쓰기-->
    <?php
    if(isset($_SESSION['mem_id'])){
	?>	
    <div class="container">
        <div class="row comment_wrap">
            <div class="col-md-3 test">
                <div class="test2 text-right">
                    <img src="../img/plus.png" class="card-img" />
                </div>
            </div>
            <div class="col-md-6 test">        
                <textarea class="form-control" rows="2" name="content" id="content" placeholder="댓글을 입력하세요" required></textarea>
            </div>
            <div class="col-md-3 test">
                <button type="submit" class="btn btn-danger">등록</button>
            </div>
        </div>
    </div>
    <?php
	}else{
	?>
        <div class="container">
        <div class="row comment_wrap">
            <div class="col-md-3 test">
                <div class="test2 text-right">
                    <img src="../img/plus.png" class="card-img" />
                </div>
            </div>
            <div class="col-md-6 test">        
                <textarea class="form-control" rows="2" name="content" id="content" placeholder="로그인을 해주세요" required></textarea>
            </div>
            <div class="col-md-3 test">
                <button type="button" class="btn btn-danger" onclick="location.href='../signup/login.php'">로그인</button>
            </div>
        </div>
    </div>
    <?php
	}
	?>
    </div>
    </div>

    <!--댓글 리스트-->
    <div class="row flex_box">
        <div class="col-md-5 review_margin">
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
				//페이징한 총 페이지의 숫자를 구한다.
				//ceil 은 입력값에 소수부분이 존재할 때 값을 올려서 리턴하는 함수
				$total_page = ceil($row_num/5);
				//만약 블록의 마지막 번호가 페이지수보다 많다면
				if($block_end > $total_page) {
					$block_end = $total_page; 
				}
				//블럭의 총 개수를 구함
				$total_block = ceil($total_page/$block_ct);
				//시작번호 (page-1)에서 5를 곱한다.
                $start_num = ($page-1) * 5;
            ?>
            <div class="reply_tit"><span id="recipeCommentListCount">총 댓글 갯수:<?php echo $row_num ?></span></div>
            <div class="media reply_list">
                <div class="media-left">
                    <img class="media-object" src="../img/logo_pink.png" data-holder-rendered="true">
                </div>
                <?php
                $sql3 = mq("select * from po_comment order by con_seq limit $start_num,5");
				while($comment_info = $sql3->fetch_array())
    			{
                ?>
                <div class="media-body">
                    <h4><b><?php echo $comment_info["mem_id"];?></b> | <?php echo $comment_info['com_date']; ?></h4><?php echo $comment_info['com_cont']; ?>
                </div>
                <br>
                <?php 
                }
                ?>
            </div>
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
    </div>
    </form>
    </div>
    <div class="container-fluid footer_wrap">
        <footer class="footer_margin">
            <h3 class="footer_main">開発者</h3>
            <div class="col-md-5">
                <div class="text-center footer_box1"><a href="https://github.com/imlimchill"
                        style="font-weight: 900; color: white; font-size: 1.3em;"><img src="../img/github-logo.png"
                            alt="">&nbsp;林彩浄(イム・チェジョン
                        &nbsp;|&nbsp;
                        チーム・リーダー)</a>
                    <br>林彩浄(イム・チェジョン |
                    チーム・リーダー)
                    <br>林彩浄(イム・チェジョン |
                    チーム・リーダー)
                    <br>林彩浄(イム・チェジョン |
                    チーム・リーダー)
                </div>
                <div class="text-center footer_box2"><a href="https://github.com/kanghr1685"
                        style="font-weight: 900; color: white; font-size: 1.3em;"><img src="../img/github-logo.png"
                            alt="">&nbsp;姜和林(カン・ファリム)</a>
                    <br>林彩浄(イム・チェジョン |
                    チーム・リーダー)
                    <br>林彩浄(イム・チェジョン |
                    チーム・リーダー)
                    <br>林彩浄(イム・チェジョン |
                    チーム・リーダー)
                </div>
            </div>
            <div class="col-md-2 text-center"><img src="../img/main_git.png" alt="">
                <div class=" text-center git_address">チームGitアドレス</div>
            </div>

            <div class="col-md-5">
                <div class="text-center footer_box2"><a href="https://github.com/lienero"
                        style="font-weight: 900; color: white; font-size: 1.3em;"><img src="../img/github-logo.png"
                            alt="">&nbsp;李京珉(イ・ギョンミン)</a>
                    <br>林彩浄(イム・チェジョン |
                    チーム・リーダー)
                    <br>林彩浄(イム・チェジョン |
                    チーム・リーダー)
                    <br>林彩浄(イム・チェジョン |
                    チーム・リーダー)
                </div>
                <div class="text-center footer_box1"><a href="https://github.com/hyunwooOh1230"
                        style="font-weight: 900; color: white; font-size: 1.3em;"><img src="../img/github-logo.png"
                            alt="">&nbsp;吳賢祐(オ・ヒョンウ)</a>
                    <br>林彩浄(イム・チェジョン |
                    チーム・リーダー)
                    <br>林彩浄(イム・チェジョン |
                    チーム・リーダー)
                    <br>林彩浄(イム・チェジョン |
                    チーム・リーダー)
                </div>
            </div>
        </footer>
    </div>
</body>

</html>