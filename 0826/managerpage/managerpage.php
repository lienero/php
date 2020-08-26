<?php
  include "../db/db.php";
  $sql_mem = mq("select mem_id, mem_email, mem_spicy from po_member");
  $sql_recipe = mq("select recipe_name, mem_id, recipe_seq from po_recipe");
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
  <link rel="stylesheet" href="../css/bootstrap.min.css" />
  <link rel="stylesheet" href="../css/bootstrap-theme.min.css" />
</head>

<body>
  <!-- Bootstrap의 콘텐츠는 항상 class="container"태그 내에 기술한다. 이것에 의해 폭이 자동 조정이 된다.-->
  <div class="container-fluid" style="border: 1px solid black;">
    <!-- 이것은 콘텐츠의 row(가로 열)를 작성하기 위한 컨테이너이다. 그리드 시스템에서는 이 class="row" 태그 안에 표시할 내용을 준비한다. 
           그로 인해, 이 class="row" 태그 안에 포함된 콘텐츠의 태그가 자동으로 가로로 나란히 정렬되거나, 세로로 정렬되거나 한다.-->
    <div class="row">
      <!-- 폭 조정을 하는 클래스 col-종류-숫자 형태로 작성한다 md:태블릿-->
      <div class="col-md-12">
        <!-- class="page-header"라는 스타일은 헤더 부분의 스타일 클래스-->
        <div class="page-header">
          <h3 class="text-info">관리자 페이지</h3>
          <br />
          <img src="../signup/img//logo.png" alt="" width="200" class="img-responsive left-block" />
        </div>
        <!-- <form class="form-inline"> : 입력폼의 입력 항목이 가로로 표시되게 된다. -->
        <form class="form-inline" action="./recipe_delete.php" method="POST">
          <fieldset>
            <legend>작성된 후기리스트</legend>
            <table class="table table-bordered">
              <tr class="info">
                <th>
                  <label>
                    <input type="checkbox" value="all" class="check_all" name="recipe" />&nbsp;선택
                  </label>
                </th>
                <th>제목</th>
                <th colspan="3">작성자</th>
              </tr>
              <!-- start recipe list -->
              <?
                while($recipe = $sql_recipe->fetch_array()) {
                  echo <<< html
                  <tr>
                    <td>
                      <label>
                        <input type="checkbox" value="$recipe[2]" name="recipe[]" class="check" />
                      </label>
                    </td>
                    <td>$recipe[0]</td>
                    <td>$recipe[1]</td>
                  </tr>
html;
                }
              ?>
              <!-- end recipe list -->
            </table>
            <div><input type="submit" class="btn btn-info pull-right" value="게시물 삭제"></div>
          </fieldset>
        </form>
        <!-- <sapn><a href="./recipe_delete.php" class="btn btn-info pull-right">게시물 삭제</a></sapn> -->
        <br /><br />
        <form class="form-inline" action="./member_delete.php" method="POST">
          <fieldset>
            <legend>회원 리스트</legend>
            <table class="table table-bordered">
              <tr class="info">
                <th style="width: 22%;">
                  <label>
                    <input type="checkbox" value="all" name="member" class="check_all2" />&nbsp;선택
                  </label>
                </th>
                <th style="width: 78%;">아이디</th>
              </tr>
              <!-- start member list -->
              <?
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
            <div><input type="submit" class="btn btn-info pull-right" value="게시물 삭제"></div>
          </fieldset>
        </form>
        <br /><br /><br />
        <div class="text-center">
          <a href="../index.php" class="btn btn-info">홈으로</a>
        </div>
      </div>
    </div>
  </div>
</body>

</html>