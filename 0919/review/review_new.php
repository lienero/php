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
      <form action="">
        <!-- category + title -->
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">방송 종류</button>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <a class="dropdown-item" href="#">Something else here</a>
              <div role="separator" class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Separated link</a>
            </div>
          </div>
          <input type="text" class="form-control" aria-label="Text input with dropdown button">
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
            <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
          </div>
          
        </div>
        <!-- contant -->
        <div class="input-group">
          <div contentEditable="true" id="textarea"> 
            <!-- you can put your photos here -->
            <img src="http://t2.gstatic.com/images?q=tbn:ANd9GcQCze-mfukcuvzKk7Ilj2zQ0CS6PbOkq7ZhRInnNd1Yz3TQzU4e&t=1" />
          </div>
        </div>
        <!-- button -->
        <button type="button" class="btn btn-outline-success button" id="button">Success</button>
    </form>
    </div>
  </body>
</html>