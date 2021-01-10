<?php
  include $_SERVER['DOCUMENT_ROOT']."/recipe_site/mainpage/header.php";
  $sql_mem = mq("select mem_id, mem_email, mem_spicy from po_member");
  $sql_review = mq("select review_name, mem_id, review_seq from po_review");
?>
<!DOCTYPE html>
<html lang="ko">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Bootstrap</title>
  <script src="../js/jquery-3.5.1.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
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

<body>
  <!-- Bootstrap의 콘텐츠는 항상 class="container"태그 내에 기술한다. 이것에 의해 폭이 자동 조정이 된다.-->
  <div class="container-fluid" style="border: 1px solid black;">
    <!-- 이것은 콘텐츠의 row(가로 열)를 작성하기 위한 컨테이너이다. 그리드 시스템에서는 이 class="row" 태그 안에 표시할 내용을 준비한다. 
           그로 인해, 이 class="row" 태그 안에 포함된 콘텐츠의 태그가 자동으로 가로로 나란히 정렬되거나, 세로로 정렬되거나 한다.-->
    <div class="row" style ="width : 100%;">
      <!-- 폭 조정을 하는 클래스 col-종류-숫자 형태로 작성한다 md:태블릿-->
      <div class="col-md-12">
        <!-- class="page-header"라는 스타일은 헤더 부분의 스타일 클래스-->
        <div class="page-header">
          <h3 class="text-info">マネージャーページ</h3>
          <br />
          <img src="../signup/img/logo.png" alt="" width="200" class="img-responsive left-block" />
        </div>
        <!-- <form class="form-inline"> : 입력폼의 입력 항목이 가로로 표시되게 된다. -->
        <form class="form-inline" action="./review_delete.php" method="POST">
          <fieldset>
            <legend>後記リスト</legend>
            <table class="table table-bordered">
              <tr class="info">
                <th>
                  <label>
                    <input type="checkbox" value="all" class="check_all" name="review" />&nbsp;選択
                  </label>
                </th>
                <th>題目</th>
                <th colspan="3">内容</th>
              </tr>
              <!-- start review list -->
              <?php
                while($review = $sql_review->fetch_array()) {
                  echo <<< html
                  <tr>
                    <td>
                      <label>
                        <input type="checkbox" value="$review[2]" name="review[]" class="check" />
                      </label>
                    </td>
                    <td>$review[0]</td>
                    <td>$review[1]</td>
                  </tr>
                html;
                }
              ?>
              <!-- end review list -->
            </table>
            <div><input type="submit" class="btn btn-info pull-right" value="削除"></div>
          </fieldset>
        </form>
        <!-- <sapn><a href="./recipe_delete.php" class="btn btn-info pull-right">게시물 삭제</a></sapn> -->
        <br /><br />
        <form class="form-inline" action="./member_delete.php" method="POST">
          <fieldset>
            <legend>会員リスト</legend>
            <table class="table table-bordered">
              <tr class="info">
                <th style="width: 22%;">
                  <label>
                    <input type="checkbox" value="all" name="member" class="check_all2" />&nbsp;選択
                  </label>
                </th>
                <th style="width: 78%;">ID</th>
              </tr>
              <!-- start member list -->
              <?php
                while($member = $sql_mem->fetch_array()) {
                  echo <<< html
                  <tr>
                    <td>
                      <label><input type="checkbox" value="$member[0]" name="member[]" class="check2" /></label>
                    </td>
                    <td>$member[0]</td>
                  </tr>
html;
                }
              ?>
              <!-- end member list -->
            </table>
            <div><input type="submit" class="btn btn-info pull-right" value="削除"></div>
          </fieldset>
        </form>
        <br /><br /><br />
        <div class="text-center">
          <a href="../index.php" class="btn btn-info">ホームへ</a>
        </div>
      </div>
    </div>
  </div>
</body>

</html>