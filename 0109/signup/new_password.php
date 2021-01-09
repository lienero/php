<?php
  $id = $_GET['id'];
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/password.css">

    <link href="https://fonts.googleapis.com/css?family=M+PLUS+Rounded+1c" rel="stylesheet">

    <title>password</title >
    <style>
      body {
        text-align: center;
      }
    </style>
    <script src ="../js/checks.js"></script>
  </head>
<body>
    <div class="container">
        <form class="form-signin" action="./new_password_ok.php?id=<?php echo $id ?>" method="POST">
          <!--메인 로고 이미지-->    
          <div>
            <img src="../img/logo_huge_pink.png"  class="rounded mx-auto d-block" alt="">  
            </div> 
            <br>
            <div class="for">
                <span>-パスワード リセット-</span>
            </div>
            <br>
            <!--비밀번호 입력칸-->
            <div class="form-label-group">
                <input type="password" id="pw" class="form-control rounded mx-auto d-block" name="userpw" placeholder="パスワード" onKeyup="safetyPasswordPattern(this); isSame();" style="ime-mode:disabled;" required>
                <label for="pw"><font style="vertical-align: inherit;"></font></label>
            </div>
            <div id="makyText">:: パスワードをご入力ください　(대소문자, 숫자, 특수문자 포함) ::</div>
            <br>
            <div></div>
            <!--비밀번호 확인 입력칸-->
            <div class="form-label-group">
                <input type="password" id="pwcheck" class="form-control rounded mx-auto d-block" name="userpwconfirm" placeholder="パスワード確認" onKeyup="isSame()" style="ime-mode:disabled;" required>
                <label for="pwcheck"><font style="vertical-align: inherit;"></font></label>
            </div>
            <div id="same">パスワードを確認します。</div>
            <br>
            <br>
            <br>
            <!--입력을 완료한다음 회원가입 완료 버튼-->
            <div>
              <button class="btn btn-outline-success rounded mx-auto d-block" id="success">次へ</button>
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>