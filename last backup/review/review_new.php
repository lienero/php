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
    <script src="../js/review_new.js"></script>

    <title>new review</title>
    <style>
      #container {
        width:60%;
        margin:auto;
      }
      h2 {
        text-align: center;
        padding: 30px;
      }
      button {
        float: right;
      }
      #textarea {
        height: 500px;
      }
      #textarea {
        height: 500px;
        width: 100%;
        border: 1px solid gray;
      }
      p5 {
        font-size: 30px;
      }
      #button {
        margin-top: 10px;
      }
      @media all and (max-width:480px){
        #container {
          width: 90%;
          margin: 0px auto;
          font-size: 10px;
        }
        #textarea {
        height: 300px;
        width: 100%;
        border: 1px solid gray;
        }
        .button {
          width:70px;
          font-size: 10px;
          margin-top: 10px;
        }
        .option {
          height: 29px;
          font-size: 9px;
        }
        
        #changePhone {
          /* display: none; */
        }
      }
    </style>
  </head>
  <body>
    <div id="container">
      <h2>후기 작성 페이지</h2>
      <form action="./review_new_ok.php" method="POST"  enctype="multipart/form-data">
        <!-- category + title -->
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <select class="form-control" id="exampleFormControlSelect1" name="list">
                <option>방송인</option>
                <option>백종원</option>
                <option>이특</option>
                <option>방탄소년단</option>
                <option>유재석</option>
            </select>
          </div>
          <input type="text" class="form-control" aria-label="Text input with dropdown button" name="title">
        </div>
        <!-- change p + img -->
        <div class="input-group mb-3">
          <div class="btn-group btn-group-toggle" data-toggle="buttons" id="option">
            <label class="btn btn-secondary action option">
              <input type="radio" name="options" id="option1" checked> p1
            </label>
            <label class="btn btn-secondary option">
              <input type="radio" name="options" id="option2"> p2
            </label>
            <label class="btn btn-secondary option">
              <input type="radio" name="options" id="option3"> p3
            </label>
          </div>
          <!-- change p + img -->
          <div class="custom-file">
            <label class="custom-file-label" for="inputGroupFile01" id="changePhone">Choose file</label>
            <input type="file" class="custom-file-input" id="inputGroupFile01" name="inputGroupFile01[]" multiple>
          </div>
          
        </div>
        <!-- contant -->
        <div class="imgs_wrap text-center col-md-12">
                            <img id="img"/>
                        </div> 
        <div class="form-group">
          <textarea class="form-control" id="exampleFormControlTextarea1" name="text" rows="15"></textarea>
        </div>
        <!-- button -->
        <button class="btn btn-outline-success button" id="button">Success</button>
    </form>
    </div>
  </body>
</html>