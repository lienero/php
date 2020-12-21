<?php
include $_SERVER['DOCUMENT_ROOT']."/recipe_site/mainpage/header.php";
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
if(isset($_GET['page'])){
    $page = $_GET['page'];
  }else{
    $page=1;
  }
  $sql2 = mq("select * from po_review order by review_seq");
  $num1 = mysqli_num_rows($sql2);
  $list = 10;
  $block_num = ceil($page/$list);
  $start = (($block_num-1)*$list)+1;
  $end = $start+$list-1;
  $total = ceil($num1/10);
  if($end>$total){
    $end=$total;
}
  $block = ceil($total/$list);
  $start_num = ($page-1) * 10;
//유저아이디 활용해서 현재 로그인되어있는 아이디의 리뷰 리스트 출력
$sql_review = mq("select review_seq, review_name, review_cont from po_review where mem_id = '".$userid."'order by review_seq limit $start_num,10");

if(isset($_GET['page1'])){
    $page1 = $_GET['page1'];
  }else{
    $page1=1;
  }
  $sql9 = mq("select * from po_recipe order by recipe_seq");
  $num2 = mysqli_num_rows($sql9);
  $list1 = 10;
  $block_num1 = ceil($page1/$list1);
  $start1 = (($block_num1-1)*$list1)+1;
  $end1 = $start1+$list1-1;
  $total1 = ceil($num2/10);
  if($end1>$total1){
    $end1=$total1;
}
  $block1 = ceil($total1/$list1);
  $start_num1 = ($page1-1) * 10;
////유저아이디 활용해서 현재 로그인되어있는 아이디의 좋아요 리스트 출력
$sql_like = mq("select likes from po_member where mem_id = '".$userid."'");
$like = $sql_like->fetch_array();
// 10개씩 나눠야함 > 배열에 저장해서 그에 맞게 

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>마이페이지</title>
    <!-- <script src="/recipe_site/js/jquery-3.5.1.min.js"></script>
    <script src="/recipe_site/js/bootstrap.min.js"></script> -->
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
                            
                                <tr>
                                    <td><label><input type="checkbox" value="$review[0]" name="review[]" class="check" /></label></td>
                                    <td onClick = "location.href='../review/review_view.php?seq=$review[0]' ">$review[1]</td>
                                    <td>$review[2]</td>
                                </tr>
html;
                                }
                            ?>
                            <!-- end -->
                        </table>
                    </fieldset>
                    <?php
                    if($page > 1){
                          //$pre 변수에 $page-1을 해준다.
                        $pre = $page-1;
                       //이전 버튼을 클릭할 시에 ($_GET('page')값에 $pre변수를 삽입
                          echo "<li class='page-item'><a href='?page=$pre&page1=$page1'>이전</a></li>";
                          }
                    //만약에 현재 블록이 블록의 총 갯수 미만일 경우
                    if($page < $total){
                    //$next 변수에 $page변수에 1을 더한 값을 삽입
                    $next = $page+1;
                    // 다음 버튼을 클릭할 시 ($_GET('page')값에 $next 변수를 삽입
                        echo "<li class='page-item'><a href='?page=$next&page1=$page1'>다음</a></li>";
                            }
                    ?>
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
                                // var_dump($arr);
                                $start_count = $start_num1;
                                for($i=0; $i<10; $i++){
                                    // 배열의 자리표가 스타트부터 10개씩 추려력 > 새로운 배열에 10개를 저장
                                    if(isset($arr[$start_count])) {
                                        $arr_page[$i] = $arr[$start_count];
                                        $start_count = $start_count + 1;
                                    }
                                }
                                $i = 0;
                                while($i < 10){

                                    if(isset($arr_page[$i])) {
                                        $sql_likes = mq("select recipe_seq, recipe_name, recipe_contant from po_recipe where recipe_seq = '".$arr_page[$i]."' ");
                                        // $i++;
                                        if($likes = $sql_likes->fetch_array()) {
                                            echo <<< html
                                        <tr>
                                            <td><label><input type="checkbox" value="$likes[0]" name="likes[]" class="check2" /></label></td>
                                            <td onClick = "location.href='../recipe/recipe.php?seq=$likes[0]' ">$likes[1]</td>
                                            <td>$likes[2]</td>
                                        </tr>
html;
                                        }
                                   } 
                                   $i++;
                                }
                            ?>
                            <!-- end -->
                        </table>
                    </fieldset>
                    <?php
                    if($page1 > 1){
                          //$pre 변수에 $page-1을 해준다.
                        $pre1 = $page1-1;
                       //이전 버튼을 클릭할 시에 ($_GET('page')값에 $pre변수를 삽입
                          echo "<li class='page-item'><a href='?page=$page&page1=$pre1'>이전</a></li>";
                          }
                    //만약에 현재 블록이 블록의 총 갯수 미만일 경우
                    if($page1 < $total1){
                    //$next 변수에 $page변수에 1을 더한 s값을 삽입
                    $next1 = $page1+1;
                    // 다음 버튼을 클릭할 시 ($_GET('page')값에 $next 변수를 삽입
                        echo "<li class='page-item'><a href='?page=$page&page1=$next1'>다음</a></li>";
                            }
                    ?>
                <!--<sapn><a href="" class="btn btn-info pull-right">좋아요 취소</a></sapn>-->
                <sapn><input type="submit" class="btn btn-info pull-right" value="좋아요 취소"></sapn>
                </form>
                <br><br><br>
                <div class="text-center"><a href="" class="btn btn-info">홈으로</a></div>
            </div>
        </div>
    </div>
    <!-- footer -->
    <?php include "../mainpage/footer.php"; ?>
</body>

</html>