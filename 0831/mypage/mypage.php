<?php
include $_SERVER['DOCUMENT_ROOT']."/recipe_site/db/db.php";
// 서버에 있는 아이디를 $userid 변수에 삽입
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
$userid = $_SESSION['mem_id'];
$sql = mq("select * from po_member where mem_id='".$userid."'");
// $sql에 있는 fetch_array(): 인덱스를 변수에 삽입
$member = $sql->fetch_array();
// 콤마를 기준으로 나눠서 배열로 저장
$filter_Array = explode(",", $member['mem_filter']); 
$spicy_Array = explode(",", $member['mem_spicy']);
// $email 변수에 데이터베이스에 있는 mem_email 삽입 
$email = $member['mem_email'];
// $filter_Array에 값이 존재하는 지 확인
$i = 0;
if($member['mem_filter'] != null){
    // 반복문을 이용하여 배열에 값이 null이 아닐 경우에 'checked' 문자열 삽입
    // count(배열) 배열의 총 숫자보다 i가 작을 때 까지 반복한다.
    while($i < count($filter_Array)){ 
        if($filter_Array[$i] != ""){
            $num[$i] = "checked"; 
        } else {
            $num[$i] = ""; 
        }
        $i++;
    }   
} else {
    while($i < 6){
        $num[$i] = "";
        $i++;
    }
}
echo "<br>";
$j = 0;
// $spicy_Array에 값이 존재하는 지 확인
if($member['mem_spicy']!= null){
    // 반복문을 이용하여 배열에 값이 null이 아닐 경우에 'checked' 문자열 삽입
    // count(배열) 배열의 총 숫자보다 i가 작을 때 까지 반복한다.
    while($j < count($spicy_Array)){ 
        if($spicy_Array[$j] != ""){
            $idx[$j] = "checked"; 
        } else {
            $idx[$j] = ""; 
        }
        $j++;
    }
} else {
    while($j < 4){
        $idx[$j] = "";
        $j++;
    }
}
//유저아이디 활용해서 현재 로그인되어있는 아이디의 리뷰 리스트 출력
$sql_review = mq("select review_seq, review_name, review_cont from po_review where mem_id = '".$userid."'");
////유저아이디 활용해서 현재 로그인되어있는 아이디의 좋아요 리스트 출력
$sql_like = mq("select likes from po_member where mem_id = '".$userid."'");
$like = $sql_like->fetch_array();

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>마이페이지</title>
    <script src="/recipe_site/js/jquery-3.5.1.min.js"></script>
    <script src="/recipe_site/js/bootstrap.min.js"></script>
    <script>
        // 체크박스를 모두 체크해주는 함수
        $(document).ready(function () {
            $(".check_all").click(function () {
                $(".check").prop("checked", this.checked);
            });
            $(".check_all2").click(function () {
                $(".check2").prop("checked", this.checked);
            });
        });
    </script>
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/mypage.css">
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
    <!-- Bootstrap의 콘텐츠는 항상 class="container"태그 내에 기술한다. 이것에 의해 폭이 자동 조정이 된다.-->
    <div class="container-fluid">
        <!-- 이것은 콘텐츠의 row(가로 열)를 작성하기 위한 컨테이너이다. 그리드 시스템에서는 이 class="row" 태그 안에 표시할 내용을 준비한다. 
           그로 인해, 이 class="row" 태그 안에 포함된 콘텐츠의 태그가 자동으로 가로로 나란히 정렬되거나, 세로로 정렬되거나 한다.-->
        <div class="row maypage_wrap">
            <!-- 폭 조정을 하는 클래스 col-종류-숫자 형태로 작성한다 md:태블릿-->
            <div class="col-md-12">
                <!-- class="page-header"라는 스타일은 헤더 부분의 스타일 클래스-->
                <div class="page-header">
                    <h3 class="text-info"><a href ="./mypage.php">마이페이지</a></h3>
                    <br>
                </div>
                <!-- <form class="form-inline"> : 입력폼의 입력 항목이 가로로 표시되게 된다. -->
                <form class="form-inline" method="get" action="./myfilter.php">
                    <fieldset>
                        <legend>체크박스다냥</legend>
                        <div class="checkbox">
                            <!--<label>태그는 양식 입력 창 (form control)을 설명하는 이름표다. 
                    label 요소로 묶인 텍스트를 클릭하면, form control(양식 입력 창)이 선택 됨.
                    <label for = 'id'> 는 해당 입력폼의 id를 지정함-->
                            재료&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;
                            <label>
                                <input type="checkbox" name="pork" value="pork" <?php echo $num[0];?>/>돼지고기&nbsp;&nbsp;
                            </label>
                            <label>
                                <input type="checkbox" name="beef" value="beef" <?php echo $num[1];?>/>소고기&nbsp;&nbsp;
                            </label>
                            <label>
                                <input type="checkbox" name="chicken" value="chicken" <?php echo $num[2];?>/>닭고기&nbsp;&nbsp;
                            </label>
                            <label>
                                <input type="checkbox" name="vegetable" value="vegetable" <?php echo $num[3];?>/>채소&nbsp;&nbsp;
                            </label>
                            <label>
                                <input type="checkbox" name="fruit" value="fruit" <?php echo $num[4];?>/>과일&nbsp;&nbsp;
                            </label>
                            <label>
                                <input type="checkbox" name="seasoning" value="seasoning" <?php echo $num[5];?>/>조미료&nbsp;&nbsp;
                            </label>
                        </div>
                        </br>
                        <div class="checkbox">
                            매운맛&nbsp;: &nbsp;
                            <label>
                                <input type="checkbox" name="spicy0" value="0" <?php echo $idx[0];?>/> 안 매운맛&nbsp;
                            </label>
                            <label>
                                <input type="checkbox" name="spicy1" value="1" <?php echo $idx[1];?>/> 조금 매운맛&nbsp;&nbsp;
                            </label>
                            <label>
                                <input type="checkbox" name="spicy2" value="2" <?php echo $idx[2];?>/> 매운맛&nbsp;&nbsp;
                            </label>
                            <label>
                                <input type="checkbox" name="spicy3" value="3" <?php echo $idx[3];?>/> 그냥 죽여라냥&nbsp;&nbsp;
                            </label>
                        </div>
                    </fieldset>
                    <div><input type="submit" class="btn btn-info pull-right" value="저장"></div>
                </form>
                <br><br>
                <fieldset>
                    <legend>내정보</legend>
                    <table class="table table-bordered">
                        <tr>
                            <th class="info" style="width: 17%;">ID:</th>
                            <td style="width: 83%;"><?php echo $userid ?></td>
                        </tr>
                        <tr>
                            <th class="info" style="width: 17%;">email:</th>
                            <td style="width: 83%;"><?php echo $email;?></td>
                        </tr>
                    </table>
                </fieldset>
                <sapn><a href="./member_modify.php" class="btn btn-info pull-right">정보수정</a></sapn>
                <sapn><a href="./member_withdrawal.php" class="btn btn-info pull-right">회원탈퇴</a></sapn>
                <br><br>
                <form class="form-inline" action="./review_delete.php" method="POST">
                    <fieldset>
                        <legend>작성한 후기리스트</legend>
                        <table class="table table-bordered">
                            <tr class="info">
                                <th><label><input type="checkbox" value="all" class="check_all">&nbsp;선택</label></th>
                                <th>제목</th>
                                <th colspan="3">내용</th>
                            </tr>
                           <!-- start -->
                           <?php
                                while($review = $sql_review->fetch_array()) {
                                echo <<< html
                            
                                <tr onClick = "location.href='../review/review_view.php?seq=$review[0]' ">
                                    <td><label><input type="checkbox" value="$review[0]" name="review[]" class="check" /></label></td>
                                    <td>$review[1]</td>
                                    <td>$review[2]</td>
                                </tr>
html;
                                }
                            ?>
                            <!-- end -->
                        </table>
                    </fieldset>
                <sapn><input type="submit" class="btn btn-info pull-right" value="게시물 삭제"></sapn>
                </form>
                <br><br>
                <form class="form-inline" action="./likes_delete.php" method="POST">
                    <fieldset>
                        <legend>좋아요 리스트</legend>
                        <table class="table table-bordered table-hover">
                            <tr class="info">
                                <th><label><input type="checkbox" value="all" class="check_all2">&nbsp;선택</label></th>
                                <th>제목</th>
                                <th colspan="3">내용</th>
                            </tr>
                            <!-- start -->
                            <?php
                                $arr = explode(',', $like[0]);
                                for($i=0; $i<count($arr); $i++){
                                
                                }
                                $i = 0;
                                while($i < count($arr)){
                                   $sql_likes = mq("select recipe_seq, recipe_name, recipe_contant from po_recipe where recipe_seq = '".$arr[$i]."'");
                                   $likes = $sql_likes->fetch_array();
                                   $i++;
                                echo <<< html
                            <tr onClick = "location.href='../recipe/recipe.php?seq=$likes[0]' ">
                                <td><label><input type="checkbox" value="$likes[0]" name="likes[]" class="check2" /></label></td>
                                <td>$likes[1]</td>
                                <td>$likes[2]</td>
                            </tr>
html;
                                }
                            ?>
                            <!-- end -->
                        </table>
                    </fieldset>
                <!--<sapn><a href="" class="btn btn-info pull-right">좋아요 취소</a></sapn>-->
                <sapn><input type="submit" class="btn btn-info pull-right" value="좋아요 취소"></sapn>
                </form>
                <br><br><br>
                <div class="text-center"><a href="" class="btn btn-info">홈으로</a></div>
            </div>
        </div>
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