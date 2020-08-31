<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous"></script>
    <script src="../js/recipe_new.js"></script>

    <title>new review</title>
    <style>
        #container {
            width: 60%;
            margin: auto;
        }
        h2 {
            text-align: center;
            margin: 30px;
        }
        #textimg {
            width: 70%;
        }
        #textarea {
            height: 330px;
        }
        #explan {
            height: 150px;
        }
        .mainImg {
            float: none;
            margin: 0 auto; 
        }
        .input-group-text {
            height: 100 %;
        }
        .group {
            height: 75%;
        }
        .selProductFile {
            display: inline-block;
        }
        #addedFormDiv_1 {
            width: 100%;
        }
        .one {
            margin-bottom: 33px;
        }
        #buttonNew {
            margin-bottom: 33px;
            float: right;
        }
    </style>
</head>

<body>
    <div id="container">
        <h2>레시피 작성 페이지</h2>
        <form name="baseForm" action="" method="post">
            <!-- first row -->
            <div class="row">
                <!-- recipe name -->
                <div class="input-group col-md-6 group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Recipe name</span>
                    </div>
                    <input type="text" aria-label="Recipe name" class="form-control">
                </div>
                <!-- main image -->
                <div class="col-md-6" style="float-left">
                    <div class="input-group mb-3">
                        <div class="custom-file">
                            <label class="custom-file-label" for="inputGroupFile02">파일</label>
                            <input type="file" class="custom-file-input" name="imgMain" id="imgMain">
                        </div>
                    </div>
                </div>
            </div>
            <!-- s row -->
            <div class="row">
                <!-- recipe contant -->
                <div class="input-group col-md-6 group">
                    <!-- recipe contant -->
                    <div class="input-group-prepend mb-3">
                        <span class="input-group-text" id="textarea">With textarea</span>
                    </div>
                    <textarea class="form-control mb-3" aria-label="With textarea"></textarea>
                    <!-- recipe contant -->
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3">유튜브 입력</span>
                        </div>
                        <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                    </div>
                    <!-- recipe 스파이시 -->
                    <div class="input-group-prepend mb-3">
                        <span class="input-group-text" id="basic-addon3">매운맛 선택</span>
                    </div>
                    <div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups">
                        <div class="btn-group mr-2" role="group" aria-label="First group">
                            <button type="button" class="btn btn-secondary">1</button>
                            <button type="button" class="btn btn-secondary">2</button>
                            <button type="button" class="btn btn-secondary">3</button>
                            <button type="button" class="btn btn-secondary">4</button>
                        </div>
                    </div>
                </div> 
                <!-- main img -->
                <div class="col-md-6 text-center" id="mainImg">
                    <p> - 미리보기 화면 -</p>
                    <img id="LoadImg" src="" width="300px">
                </div>
            </div>
            <div class="row">
                <!-- Category -->
                <div class="input-group mb-3 col-md-12">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Options</label>
                    </div>
                    <select class="custom-select" id="inputGroupSelect01">
                        <option selected>인물</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                    <select class="custom-select" id="inputGroupSelect02">
                        <option selected>방송</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                    <select class="custom-select" id="inputGroupSelect03">
                        <option selected>테마</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <!-- food -->
                <div class="input-group col-md-12 mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">First food</span>
                    </div>
                    <input type="text" aria-label="food" class="form-control">
                    <input type="text" aria-label="how" class="form-control">
                </div>
            </div>
                <input type="hidden" name="count" value="0">
                <!-- 폼을 삽입할 DIV -->
                <div id="addedFormDiv"></div>
            <div class="row">
                <div class="input-group col-md-12 mb-3">
                    <input type="button" class="btn btn-outline-danger" value="추가" id="addFood">
                    <input type="button" class="btn btn-outline-danger" value="삭제" id="delFood">
                </div>
            </div>

            <div class="input-group mb-3">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="input_imgs" aria-describedby="inputGroupFileAddon03" multiple>
                    <label class="custom-file-label" for="input_imgs">Choose file</label>
                </div>
            </div>
            
            <div class="row">
                <!-- explanation with picture -->
                <div class="input-group col-md-8">
                    <input type="hidden" name="count_1" value="0">
                    <!-- 폼을 삽입할 DIV -->
                    <div id="addedFormDiv_1"></div>
                </div>

                <div class="input-group col-md-4 mb-3">
                    <div class="row">
                    <div class="input_wrap">
                        <!-- <input type="file" class="custom-file-input" id="input_imgs" multiple/> -->
                    </div>
                        <!-- main img -->        
                        <div class="imgs_wrap text-center col-md-12">
                            <img id="img"/>
                        </div>   
                    </div>
                </div>
            </div>

            <!-- button -->
            <input class="btn btn-outline-danger" value="등록하기" id="buttonNew">
        </form>
    </div>
</body>
</html>