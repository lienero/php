<?php
    include "../db/db.php";
    include "../signup/method/password.php";
    $security_seq = $_GET['recipe_seq'];
    $rec_seq = mq("SELECT recipe_seq FROM po_recipe");
    while($re_seq = $rec_seq->fetch_array()) {
        if(password_verify($re_seq[0], $security_seq)) {
            $seq_check = $re_seq[0];
        }
    }
    $recipe_sql = mq("SELECT * FROM po_recipe where  recipe_seq='".$seq_check."'");
    $recipe = $recipe_sql->fetch_array();
    $recipe_img =  mq("SELECT * FROM po_recipe_img where  recipe_seq='".$seq_check."'");
?>
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
    <script src="../js/recipe_new.js"></script>
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
        <form action="/recipe_site/comment/comment_write_ok.php?recipe_seq=<?php echo $recipe["recipe_seq"];?>" method="POST" enctype="multipart/form-data">
            <!--레시피 대표 이미지-->
            <div class="row flex_box">
                <div class="col-md-10 text-center">
                    <img src="http://localhost/recipe_site/img/<?php echo $recipe["img"];?>" class="img-thumbnail rounded">
                </div>
            </div>
            <!--레시피 제목-->
            <div class="row flex_box">
                <div class="col-sm-6 col-md-4">
                    <h3><?php echo $recipe["recipe_name"];?></h3>
                </div>
            </div>
            <!--레시피 설명-->
            <div class="row flex_box">
                <div class="col-sm-6 col-md-4">
                    <p><?php echo $recipe["recipe_contant"]?></p>
                </div>
            </div>
            <!--좋아요 아이콘-->
              <div class="row flex_box">
                <div class="col-md-3">
                    <div class="thumbnail text-center">
                        <a href="like.php?recipe_seq=<?php echo $recipe["recipe_seq"];?>&like=<?php echo $recipe["recipe_likes"]*26543;?>"><img src="../img/heart.png" class="icon"></a>
                        <div class="caption">
                            <h6>좋아요</h6>
                        </div>
                    </div>
                </div>
                <!--매운맛 단계 표시-->
                
                <div class="col-md-3">
                    <div class="thumbnail text-center">
                        <img src="../img/Fire.png" class="icon">
                        <div class="caption">
                        <h6>
                            <?php
                            $spicy=$recipe["recipe_spicy"];
                            switch($spicy){
                                case 0:
                                echo "안매움";
                                break;
                                case 1:
                                echo "조금 매움";
                                break;
                                case 2:
                                echo "매움";
                                break;
                                case 3:
                                echo "그냥 죽여라냥";
                                break;                                
                            }
                            ?>
                        </h6>
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
                            <?php
                            $food_array = $recipe["recipe_food"];
                            $food_array2 = explode(",", $food_array); 
                            $food_count = count($food_array2);
                            for($i=0; $i<$food_count; $i++)
                            {
                                if($food_array2[$i]!=""){
                            ?>    
                            <li>
                            <?php
                                echo ($food_array2[$i])."<br/>";
                            ?>
                            <hr>
                            </li>
                            <?php
                                }
                            }
                            ?>
                            
    
                        </ul>

                    </div>
                </div>
            </div>
            <!--동영상 -->
            <?php
            if($recipe["recipe_url"]!= ""){
                $url = $recipe["recipe_url"];
                /*preg_match('/[\\?\\&]v=(["\\?\\&]+)/', $url, $matches) :
                첫 번째 인수 : 정규식 표현 작성. : 대괄호([])로 묶은 안의 값은 그 중 어느 값이든 일치하면 된다.
                두 번째 인수 : 검색 대상 문자열.
                세 번째 인수 : 배열 변수 반환. 패턴 매치에서 매칭된 값을 배열로 저장.
                반환값 : 매칭에 성공하면 1, 실패하면 0이 반환*/
                preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $url, $matches);
                $id = $matches[1];
            ?>
             <div class="row flex_box">
                <div class="col-md-7 text-center">
                    <h3>동영상</h3>
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo $id ?>?rel=0&showinfo=0&color=white&iv_load_policy=3" frameborder="0">
                        </iframe>
                    </div>
                    
                </div>
            </div>
            <?php
            }
            ?>
           
            
    </div>
    <br>
    <!--레시피 설명-->
    <?php
    while($recipe_cont = $recipe_img->fetch_array()){
        ?>
    <div class="row">
        <div class="recipe text-right">
            <div class="col-md-6"><?php echo $recipe_cont["img_cont"]?>
            </div>
            <!--레시피 이미지-->
            <div class="col-md-6" style="width:250px; height:150px">
                <img src="http://localhost/recipe_site/img/<?php echo $recipe_cont["recipe_img"];?> "style="width:250px; height:150px">
            </div>
        </div>
    </div>
    <?php
    }
    ?>
    
    <br>
    <!--댓글 쓰기-->
    <?php
    if(isset($_SESSION['mem_id'])){
	?>	
    <div class="container">
        <div class="row comment_wrap">
            <div class="col-md-3 test">
                <div class="test2 text-right">'
                    <input type="file" name="image_link" id="image_link"style='display: none;'> 
                    <input type='text' name='file' id='file' style='display: none;'> 
                    <!-- 이미지를 클릭할 시 텍스트 인풋으로 이동 텍스트 인풋에서 파일 타입으로 이동하는 스크립트 -->
                    <img src="../img/plus.png" onclick='document.all.image_link.click(); document.all.file.value=document.all.image_link.value'> 
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
                <input type="file" name="image_link" id="image_link"style='display: none;'> 
                    <input type='text' name='file' id='file' style='display: none;'> 
                    <!-- 이미지를 클릭할 시 텍스트 인풋으로 이동 텍스트 인풋에서 파일 타입으로 이동하는 스크립트 -->
                    <img src="../img/plus.png" onclick='document.all.image_link.click(); document.all.file.value=document.all.image_link.value'> 
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
            $recipe_seq = $recipe["recipe_seq"];
            $security_seq = password_hash($recipe_seq, PASSWORD_DEFAULT);
			// $_GET['page']에 값이 있을 때 $apge 값에 $_GET['page'];입력
			if(isset($_GET['page'])){
				$page = $_GET['page'];
			} else {
				// $_GET['page']에 값이 없을 때 $apge 값에 1을 입력
				$page = 1;
			}
				$sql2 = mq("select * from po_comment WHERE recipe_seq = '".$seq_check."'");
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
                <?php
                $sql3 = mq("SELECT * from po_comment WHERE recipe_seq = '".$seq_check."' order by con_seq limit $start_num,5");
				while($comment_info = $sql3->fetch_array())
    			{
                ?>
                <div class="media-left">
                    <img src="http://localhost/recipe_site/img/<?php echo $comment_info["com_img"];?>" class="media-object" data-holder-rendered="true">
                </div>
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
							echo "<li class='page-item'><a href='?recipe_seq=$security_seq&page=1'>처음</a></li>";
						}
						// 현재 페이지가 1을 초과했을 때 출력한다.
						if($page > 1){
							//$pre 변수에 $page-1을 해준다.
							$pre = $page-1;
							//이전 버튼을 클릭할 시에 ($_GET('page') 값에 $pre 변수를 삽입 
							echo "<li class='page-item'><a href='?recipe_seq=$security_seq&page=$pre'>이전</a></li>";
						}
						//반복문을 사용하여, 블록 시작번호가 마지막 블록보다 작거나 같을 때 까지 반복한다 
						for($i=$block_start; $i<=$block_end; $i++){
							// 페이지와 $i가 같지 않을 시에 숫자를 출력한다.
							if($page != $i){
								// 페이지 숫자를 클릭할 시 ($_GET('page') 값에 $i(페이지의 숫자) 변수를 삽입
								echo "<li class='page-item'><a href='?recipe_seq=$security_seq&page=$i'>[$i]</a></li>";
							}
						}	
						//만약에 현재 블록이 블록의 총 갯수 미만일 경우
						if($page < $total_page){
							//$next 변수에 $page변수에 1을 더한 값을 삽입
							$next = $page +1;
							// 다음 버튼을 클릭할 시 ($_GET('page') 값에 $next 변수를 삽입
							echo "<li class='page-item'><a href='?recipe_seq=$security_seq&page=$next'>다음</a></li>";
						}
						//만약에 page가 총 페이지 수의 미만일 경우
						if($page < $total_page){
							// 마지막 버튼을 클릭할 시($_GET('page') 값에 총 페이지 수를 삽입 
							echo "<li class='page-item'><a href='?recipe_seq=$security_seq&page=$total_page'>마지막</a></li>";
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