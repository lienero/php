<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <title>review page</title>
    <script>
      
    </script>
    <style>
      table {
        width:60%;
        margin:auto;
      }
      #container {
        width: 70%;
        margin: 0px auto;
        padding: 20px;
        
      }
      a {
        float: right;
      }
      h2, nav, form {
        text-align: center;
        padding: 30px;
      }
      #search {
        border: 0px solid black;
        border-bottom: 1px solid black;
      }
      #searchG {
        width: 100%;
      }
      @media all and (max-width:480px){
        #container {
          width: 100%;
          margin: 0px auto;
          font-size: 10px;
        }
        #button {
          width:70px;
          font-size: 10px;
        }
      }
    </style>
  </head>
  <body>
    <div id="container">
      <h2>후기 게시판</h2>
      <!-- Search form -->
      <form class="form-inline d-flex justify-content-center md-form form-sm mt-0">
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
      </form>
      <!-- start review table -->
      <div>
        <table class="table table-hover">
          <thead class="thead-dark">
            <tr>
              <th scope="col">번호</th>
              <th scope="col">분류</th>
              <th scope="col">후기 제목</th>
              <th scope="col">작성 날짜</th>
              <th scope="col">작성자</th>
            </tr>
          </thead>
          <tbody>
            <tr onClick = "location.href='./review_view.php' ">
              <th scope="row">1</th>
              <td>백선생님</td>
              <td>계란 후라이 어렵지 않아요</td>
              <td>2020.8.13</td>
              <td>산체쓰</td>
            </tr>
            <tr onClick = "location.href='#' ">
              <th scope="row">1</th>
              <td>백선생님</td>
              <td>계란 후라이 어렵지 않아요</td>
              <td>2020.8.13</td>
              <td>산체쓰</td>
            </tr>
            <tr onClick = "location.href='#' ">
              <th scope="row">1</th>
              <td>백선생님</td>
              <td>계란 후라이 어렵지 않아요</td>
              <td>2020.8.13</td>
              <td>산체쓰</td>
            </tr>
            <tr onClick = "location.href='#' ">
              <th scope="row">1</th>
              <td>백선생님</td>
              <td>계란 후라이 어렵지 않아요</td>
              <td>2020.8.13</td>
              <td>산체쓰</td>
            </tr>
            <tr onClick = "location.href='#' ">
              <th scope="row">1</th>
              <td>백선생님</td>
              <td>계란 후라이 어렵지 않아요</td>
              <td>2020.8.13</td>
              <td>산체쓰</td>
            </tr>
            <tr onClick = "location.href='#' ">
              <th scope="row">1</th>
              <td>백선생님</td>
              <td>계란 후라이 어렵지 않아요</td>
              <td>2020.8.13</td>
              <td>산체쓰</td>
            </tr>
            <tr onClick = "location.href='#' ">
              <th scope="row">1</th>
              <td>백선생님</td>
              <td>계란 후라이 어렵지 않아요</td>
              <td>2020.8.13</td>
              <td>산체쓰</td>
            </tr>
          </tbody>
        </table>
        <!-- end table -->

        <!-- start page button -->
        <nav aria-label="Page navigation example">
          <ul class="pagination justify-content-center">
            <!-- disabled is unlock button -->
            <li class="page-item disabled">
              <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
              </a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
              <a class="page-link" href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
              </a>
            </li>
          </ul>
        </nav>
        <!-- end page button -->

        <!-- button : new review (move page) -->
        <a href="./review_new.php" class="btn btn-outline-success" id="button" tabindex="-1" role="button" aria-disabled="true">new</a>
    </div>
  </div>
  </body>
</html>