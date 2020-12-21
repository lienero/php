<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="css/login2.css">

    <!-- google sign-in api -->
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <meta name="google-signin-client_id"
        content="521937207453-apclabkc4j6kei9f4nb1b2iolkh7poqe.apps.googleusercontent.com">

    <link rel="../css/bootstrap.css">

    <link href="https://fonts.googleapis.com/css?family=M+PLUS+Rounded+1c" rel="stylesheet">

    <title>login</title>
    
    <script>
        var google_sign_in = false; // assume

        function do_click_google_signin() {
            google_sign_in = true;
        }

        function onSignIn( googleUser ) {
            if ( google_sign_in ) {
                // Process sign-in
                var profile = googleUser.getBasicProfile();


                window.location.href="google_login.php?id="+ profile.getName() +"&email=" + profile.getEmail() + "&rank=" + profile.getId();
            }
        }
    </script>
    <style>
        #google {
            width: 100%;
        }
    </style>
</head>

<body>
    <div class="container">

        <div class="row" style="width: 100%; justify-content: center;">

            <form class="form-signin" action="login_ok.php" method="POST">
                <!--메일 로고 이미지-->
                <div>
                    <img src="../img/logo_huge_pink.png" class="rounded mx-auto d-block" alt="">
                </div>
                <br>
                <!--아이디 입력칸-->
                <div class="form-label-group">
                    <input type="text" id="mem_id" name="mem_id" class="form-control rounded mx-auto d-block"
                        placeholder="ID" required="" autofocus="">
                    <label for="mem_id">
                        <font style="vertical-align: inherit;"></font>
                    </label>
                </div>
                <!--비밀번호 입력칸-->
                <div class="form-label-group">
                    <input type="password" id="mem_pw" name="mem_pw" class="form-control rounded mx-auto d-block"
                        placeholder="password" required="">
                    <label for="mem_pw">
                        <font style="vertical-align: inherit;"></font>
                    </label>
                </div>
                <!--로그인 버튼-->
                <button class="btn btn-lg btn-primary btn-block rounded mx-auto d-block" type="submit">
                    <font style="vertical-align: inherit;">ログイン</font>
                </button>
                <!--구글 로그인 버튼-->
                <div class="g-signin2" id="google-signin2" onclick="return do_click_google_signin();" data-onsuccess="onSignIn"></div>

                <!--아이디 찾기 / 비밀번호 찾기 링크-->
                <div class="forget">
                    <a href="id.html">IDをお忘れの方</a> | <a href="password.html">パスワードをお忘れの方</a>
                    | <a href="signup.php">新規登録</a>
                </div>

            </form>
        </div>
    </div>
</body>

</html>