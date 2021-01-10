<?php
  include "../mainpage/header.php";
    //입력값 확인
    if(isset($_GET['page'])){
      $page = $_GET['page'];
    }else{
      $page=1;
    }
    $sql2 = mq("select * from po_review order by review_seq");
    $num = mysqli_num_rows($sql2);
    $list = 10;
    $block_num = ceil($page/$list);
    $start = (($block_num-1)*$list)+1;
    $end = $start+$list-1;
    $total = ceil($num/10);
    if($end>$total){
      $end=$total;
  }
    $block = ceil($total/$list);
    $start_num = ($page-1) * 10;
    $sql3 = mq("SELECT review_seq, review_kind, review_name, review_date, mem_id FROM po_review order by review_seq limit $start_num,10");
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="../js/vendor/jquery-ui-1.10.3.custom.min.js"></script>
    <script type="text/javascript" src="../js/index.js"></script>
    <script src="../js/vendor/modernizr-custom.js"></script>
    <link rel="stylesheet" href="../css/index.css"> -->
    <link rel="stylesheet" href="../css/review.css">
    <!-- <link rel="stylesheet" href="../css/bootstrap-theme.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/bootstrap-theme.css">
    <link rel="stylesheet" href="../js/bootstrap.js">
    <link rel="stylesheet" href="../js/npm.js">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=M+PLUS+Rounded+1c" rel="stylesheet"> -->
    <title>review page</title>
   
  </head>
  <body style="background :#FFEAE5;">
    <br>
    <div id="container">
      <h2 class="lim_h2 text-center">後記掲示板</h2>
      <!-- Search form -->
      <!-- <form class="form-inline d-flex justify-content-center md-form form-sm mt-0 lim_form">
        <div class="input-group mb-3" id="searchG">
          <div class="input-group-prepend">
            <button class="btn dropdown-toggle form-control-sm " type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">전체</button>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="#">제목</a>
              <div role="separator" class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">작성자</a>
            </div>
          </div>
          <input type="text" class="form-control " placeholder="Search"  aria-label="Search" id="search">
        </div>
      </form> -->
      <!-- start review table -->
      <div>
        <table class="table table-hover" style="width:60%; margin:auto;">
          <thead class="thead-dark">
            <tr>
              <th scope="col">No</th>
              <th scope="col">分類</th>
              <th scope="col">後記題名</th>
              <th scope="col">作成日</th>
              <th scope="col">by</th>
            </tr>
          </thead>
          <tbody>
        <?php
          $temp = $start_num + 1;
          while($review = $sql3->fetch_array()) {
            echo <<< html
          
            <tr onClick = "location.href='./review_view.php?seq=$review[0]'">
              <th scope="row">$temp</th>
              <td>$review[1]</td>
              <td>$review[2]</td>
              <td>$review[3]</td>
              <td>$review[4]</td>
            </tr>
html;      
            $temp += 1;
          }
            ?>
          </tbody>
        </table>
        <!-- end table -->

        <!-- start page button -->
        <nav aria-label="Page navigation example" class="lim_nav text-center">
          <ul class="pagination justify-content-center">
            <!-- disabled is unlock button -->
            <?php
            if($page >1){
              $pre = $page-1;
            echo<<< html
            <li class="page-item disabled">
              <a class="page-link" href="?page=$pre" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
              </a>
            </li>
html;
            }
            ?>
          <?php  
          for($i = $start; $i <= $end; $i++){
            if($page != $i){
              echo "<li class='page-item'><a class='page-link' href='?page=$i'>$i</a></li>";
            }else{
              echo "<li class='page-item'><a class='page-link' href='#'><b>".$page."</b></a></li>";
            }
          }
          ?>
          <?php
            if($page < $total){
              $next = $page+1;
              echo<<< html
                <li class="page-item">
                  <a class="page-link" href="?page=$next" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                  </a>
                </li>
html;
          }
            ?>
          </ul>
        </nav>
        <!-- end page button -->

        <!-- button : new review (move page) -->
        <div class="text-right">
        <a href="./review_new.php" class="btn btn-outline-success a_float" id="button" tabindex="-1" role="button" aria-disabled="true" style="font-size: 1.5em;
        border: 3px solid #fff;
        border-radius: 4px; text-cen">new</a>
        </div>
    </div>
  </div>
  <!-- footer -->
  <?php include "../mainpage/footer.php"; ?>
  </body>
</html>