<?php
  include "../mainpage/header.php";
  $ddd = $_GET['seq'];
  $sql_read = mq("SELECT * FROM po_review WHERE review_seq = '".$ddd."'");
  $read = $sql_read->fetch_array();
  $sql_img = mq("SELECT review_img FROM po_review_seq WHERE review_seq = '".$ddd."' ");
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"> -->
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script> -->

    <title>review view</title>
    <style>
      #container {
        width:60%;
        margin:auto;
        padding-top: 3%;
      }
      h2 {
        text-align: center;
        padding: 10px;
      }
      .row {
        text-align: right;
      }
      @media all and (max-width:480px){
        #container {
          width: 90%;
          margin: 0px auto;
          font-size: 10px;
        }
      }
      #text{
        text-align: center;
      }
      .img{
        text-align: center;
      }
    </style>
    <?php 
          echo "
            <script>
            $( document ).ready( function() {
                $( '#text' ).html( '<p>".$read[4]."</p>');
            } );
            </script>
          ";
       ?>
  </head>
  <body>
    <div id="container">
      <h2><?= $read[3] ?></h2>
      <div class = "text-right">
        番組: <?= $read[2] ?>
      </div>
      <br>
      <div class = "text-right">
        by: <?= $read[1] ?>
      </div>
      <br>
      <div class = "text-right"> 
        作成日: <?= $read[5] ?>
      </div>
      <br>
      <hr>
      <div class="img">
        <?php
          while($review = $sql_img->fetch_array()) {
            echo "<img class=\"mb-3\" src = \"img/$review[0]\" style =\"height: 350px;\">";
        } ?>
      </div>
      <!-- 내용이 들어오는 장소 -->
      <div id="text">
            
      </div>

        
    </div>
    <!-- footer -->
    <?php include "../mainpage/footer.php"; ?>
  </body>
</html>