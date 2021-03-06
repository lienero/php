<?php
include $_SERVER['DOCUMENT_ROOT']."/recipe_site/db/db.php";
include "signup/method/password.php";
// 서버에 있는 아이디를 $userid변수에 삽입
if(isset($_SESSION['mem_id'])){
    $userid = $_SESSION['mem_id'];
}
?>
    

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>main_page</title>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="./js/vendor/jquery-ui-1.10.3.custom.min.js"></script>
    <script type="text/javascript" src="./js/index.js"></script>
    <script src="./js/vendor/modernizr-custom.js"></script>
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/bootstrap-theme.css">
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/bootstrap-theme.css">
    <link rel="stylesheet" href="./js/bootstrap.js">
    <link rel="stylesheet" href="./js/npm.js">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=M+PLUS+Rounded+1c" rel="stylesheet">
</head>

<body style="background :#FFEAE5;">

    <div class="container main_top">
        <div class="row">
            <!--row로 열 만들기-->
            <div class="col-md-2 box1 text-center">
                <!--그리드로 행 나누기 로고버튼-->
                <a href="/recipe_site/index.php"><img src="./img/logo_pink.png" alt="" class=""></a>
            </div>
            <?php
            if(isset($_SESSION['mem_id'])){
                ?>
            <div class="col-md-2 box1 text-center row">
                <div class="login_button_wrap">
                <?php
                $sql = mq("select * from po_member where mem_id='".$userid."'");
                // $sql에 있는 fetch_array(): 인덱스를 변수에 삽입
                $member = $sql->fetch_array();
                if($member['rank'] == "manager"){
                ?>
                    <a href="./signup/logout.php"><button class="btn login_button">ログアウト</button></a>
                    <a href="./managerpage/managerpage.php"><button class="btn login_button2">マネージャーページ</button></a>
                <?php    
                } else {
                ?>    
                    <a href="./signup/logout.php"><button class="btn login_button">ログアウト</button></a>
                    <a href="./mypage/mypage.php"><button class="btn login_button2">マイページ</button></a>
                <?php     
                }
                ?>     
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
                    <a href="./signup/login.php"><button class="btn login_button">ログイン</button></a>
                    <a href="./signup/signup.php"><button class="btn login_button2">新規取得</button></a>
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
                        <option value="recipe_contant">Content</option>
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
                <button type="button" class="btn btn-default unlocked_inactive">KR</button>
                <button type="button" class="btn btn-info locked_active">JP</button>
                <span>&nbsp;&nbsp;&nbsp;&nbsp;</span>
                <div class="img-wrap">
                    <a href="#"><img src="./img/facebook.png" alt=""></a>
                    <a href="#"><img src="./img/youtube.png" alt=""></a>
                </div>
            </div>
        </div>
        <!--숨겨진 버튼구역-->
        <nav class="navbar row navbar_margin">
            <div class="row category_button">
                <button class="navbar-toggler hidden-lg hidden-md hidden-sm category_button" type="button"
                    data-toggle="collapse" data-target="#collapsibleNavbar">
                    <img src="./img/category.png" alt="">
                </button>
            </div>
        </nav>
    </div>
    <!--카테고리구역-->
    <div class="container-fluid text-center" style="justify-content: center;">
        <div class="collapse navbar-collapse" id="collapsibleNavbar" style="align-items:center;">
            <!--네브바 아이디 추가-->
            <ul class="navbar-nav col-md-12">
                <li class="nav-item col-md-3"> <a class="nav-link disabled" href="./categorypage/category.php">カテゴリー </a> </li>
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
                <li class="nav-item col-md-3"> <a class="nav-link" href="../recipe_site/review/review.php">後記</a> </li>
                <!-- <li class="nav-item col-md-20"> <a class="nav-link" href="#">マイページ</a> </li>  마이페이지-->

            </ul>
        </div>
        </nav>
    </div>
    <br>
    <!--캐러셀구역-->
    <div class="container container-wrap">
        <div class="row pictur_box1 overflow-hidden">
            <div id="carousel-example-generic" class="carousel slide row">
                <!--캐러셀 아이디-->
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <img src="./img/cook1.jpg" alt="" class="img-responsive flex-auto d-none d-md-block img-fluid">
                    </div>
                    <div class="item">
                        <img src="./img/cook2.jpg" alt="" class="img-responsive flex-auto d-none d-md-block img-fluid">
                    </div>
                    <div class="item">
                        <img src="./img/cook3.jpg" alt="" class="img-responsive flex-auto d-none d-md-block img-fluid">
                    </div>
                </div>
                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                </a>
            </div>
        </div>
    </div>
    <br>
    <!--레시피 추천-->
    <div class="container recipe_recommendation_box">
        <div class="row content_box1 img-fluid">
            <div class="content_box1_title">
                <div class="content_box1_title_content row">最新レシピ
                    <span class="">
                    <?php
                        if(isset($_SESSION['mem_id'])){
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
                        ?> 
                        <button class="board_new btn board_button">
                           
                        <a href="./recipe/recipe_new.php" style="color:white;">作成</a>
                        </button>
                        <?php
                        };
                    ?>
                    </span>
                </div>
                <?php
                // 기본 통합 검색 용 쿼리 문 작성
                $str_sql = "select * from po_recipe";
                $new_sql = $str_sql;
                $like_sql = $str_sql; 
                if(isset($_SESSION['mem_id'])){
                    // 배열에 값을 넣은 수 만큼 반복한다.
                    for($k=0; $k < $count; $k++){
                        if($k == 0) {
                            $str_sql .= " where recipe_spicy != '$new_Spicy_Array[$k]'";
                        }
                        // 쿼리 문에 필터링을 위해 문자열 합침 ($new_Spicy_Array[$k])
                        $str_sql .= " AND recipe_spicy != '$new_Spicy_Array[$k]'";
                        $new_sql = $str_sql;
                        $like_sql = $str_sql;      
                    }
                    // 배열에 값을 넣은 수 만큼 반복한다.
                    for($l=0; $l < $countf; $l++){
                        if($count == 0) {
                            $str_sql .= " where recipe_food not like '%$new_Filter_Array[$l]%'";
                        }
                        // 쿼리 문에 필터링(not like)을 위해 문자열 합침 (%$new_Filter_Array[$l]%')
                        // not like : 특정 값이 들어가진 않은 값을 검색
                        $str_sql .= " AND recipe_food not like '%$new_Filter_Array[$l]%'";
                        $new_sql = $str_sql;
                        $like_sql = $str_sql;    
                    }
                }    
                    $new_sql .= " order by recipe_date desc limit 0,4";
                    $sql3 = mq($new_sql);
                        while($recipe_info = $sql3->fetch_array()){      
                    ?>        
                    <div class="col-md-3 col-sm-3">
                        <a href="../recipe_site/recipe/recipe.php?recipe_seq=<?php echo $security_seq=password_hash($recipe_info["recipe_seq"], PASSWORD_DEFAULT);?>"><img class="card-img-top img-responsive img-rounded" src="http://localhost/recipe_site/img/<?php echo $recipe_info["img"];?>" style="width: 212px; height: 160px;"></a>
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
                 ?> 
                </div>
            </div>
        </div>
    </div>
    <br>
    <!--후기-->
    <div class="container review_box">
        <div class="row content_box1 img-fluid">
            <div class="content_box1_title">
                <div class="content_box1_title_content row">おすすめレシピ
                <span class="">
                        <?php
                        if(isset($_SESSION['mem_id'])){
                        ?>
                        <button class="board_new btn board_button2"><a href="./recipe/recipe_new.php" style="color:white;">作成</a></button>
                        <?php
                        }
                        ?>
                </span>
                </div>
                <?php
                $like_sql .= " order by recipe_likes desc limit 0,4";
                $sql3 = mq($like_sql);
                    while($recipe_info = $sql3->fetch_array()){
                        ?>
                    
                <div class="col-md-3 col-sm-3">
                    <a href="recipe/recipe.php?recipe_seq=<?php echo $security_seq=password_hash($recipe_info["recipe_seq"], PASSWORD_DEFAULT);?>"><img class="card-img-top img-responsive img-rounded" src="http://localhost/recipe_site/img/<?php echo $recipe_info["img"];?>" style="width: 212px; height: 160px;" text-center></a>
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
                 ?> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--푸터구역-->
    <div class="container-fluid footer_wrap">
        <footer class="footer_margin">
            <h3 class="footer_main">開発者</h3>
            <div class="col-md-5">
                <div class="text-center footer_box1"><a href="https://github.com/imlimchill"
                        style="font-weight: 900; color: white; font-size: 1.3em;"><img src="./img/github-logo.png"
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
                        style="font-weight: 900; color: white; font-size: 1.3em;"><img src="./img/github-logo.png"
                            alt="">&nbsp;姜和林(カン・ファリム)</a>
                    <br>林彩浄(イム・チェジョン |
                    チーム・リーダー)
                    <br>林彩浄(イム・チェジョン |
                    チーム・リーダー)
                    <br>林彩浄(イム・チェジョン |
                    チーム・リーダー)
                </div>
            </div>
            <div class="col-md-2 text-center"><img src="./img/main_git.png" alt="">
                <div class=" text-center git_address">チームGitアドレス</div>
            </div>

            <div class="col-md-5">
                <div class="text-center footer_box2"><a href="https://github.com/lienero"
                        style="font-weight: 900; color: white; font-size: 1.3em;"><img src="./img/github-logo.png"
                            alt="">&nbsp;李京珉(イ・ギョンミン)</a>
                    <br>林彩浄(イム・チェジョン |
                    チーム・リーダー)
                    <br>林彩浄(イム・チェジョン |
                    チーム・リーダー)
                    <br>林彩浄(イム・チェジョン |
                    チーム・リーダー)
                </div>
                <div class="text-center footer_box1"><a href="https://github.com/hyunwooOh1230"
                        style="font-weight: 900; color: white; font-size: 1.3em;"><img src="./img/github-logo.png"
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