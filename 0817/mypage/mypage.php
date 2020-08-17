<?php
include $_SERVER['DOCUMENT_ROOT']."/recipe_site/db/db.php";
// 만들어 놓은 헤더 (홈, 프로필, 레시피, 게시판) 삽입(include)
include '../header/header.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Bootstrap</title>
    <script src="/recipe_site/js/jquery-3.5.1.min.js"></script>
    <script src="/recipe_site/js/bootstrap.min.js"></script>
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

    <link rel="stylesheet" href="/recipe_site/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/recipe_site/css/bootstrap-theme.min.css" />
</head>

<body>
    <!-- Bootstrap의 콘텐츠는 항상 class="container"태그 내에 기술한다. 이것에 의해 폭이 자동 조정이 된다.-->
    <div class="container-fluid" style="border:1px solid black;">
        <!-- 이것은 콘텐츠의 row(가로 열)를 작성하기 위한 컨테이너이다. 그리드 시스템에서는 이 class="row" 태그 안에 표시할 내용을 준비한다. 
           그로 인해, 이 class="row" 태그 안에 포함된 콘텐츠의 태그가 자동으로 가로로 나란히 정렬되거나, 세로로 정렬되거나 한다.-->
        <div class="row">
            <!-- 폭 조정을 하는 클래스 col-종류-숫자 형태로 작성한다 md:태블릿-->
            <div class="col-md-12">
                <!-- class="page-header"라는 스타일은 헤더 부분의 스타일 클래스-->
                <div class="page-header">
                    <h3 class="text-info">마이페이지</h3>
                    <br>
                    <img src="../img/picky_catB.png" alt="" width="200" class="img-responsive left-block">
                </div>
                <!-- <form class="form-inline"> : 입력폼의 입력 항목이 가로로 표시되게 된다. -->
                <form class="form-inline">
                    <fieldset>
                        <legend>체크박스다냥</legend>
                        <div class="checkbox">
                            <!--<label>태그는 양식 입력 창 (form control)을 설명하는 이름표다. 
                    label 요소로 묶인 텍스트를 클릭하면, form control(양식 입력 창)이 선택 됨.
                    <label for = 'id'> 는 해당 입력폼의 id를 지정함-->
                            재료&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;
                            <label>
                                <input type="checkbox" value="pig" /> 돼지고기&nbsp;&nbsp;
                            </label>
                            <label>
                                <input type="checkbox" value="cow" /> 소고기&nbsp;&nbsp;
                            </label>
                            <label>
                                <input type="checkbox" value="chicken" /> 닭고기&nbsp;&nbsp;
                            </label>
                            <label>
                                <input type="checkbox" value="vegetable" /> 채소&nbsp;&nbsp;
                            </label>
                            <label>
                                <input type="checkbox" value="fruit" /> 과일&nbsp;&nbsp;
                            </label>
                        </div>
                        </br>
                        <div class="checkbox">
                            매운맛&nbsp;: &nbsp;
                            <label>
                                <input type="checkbox" value="0" /> 안 매운맛&nbsp;
                            </label>
                            <label>
                                <input type="checkbox" value="1" /> 조금 매운맛&nbsp;&nbsp;
                            </label>
                            <label>
                                <input type="checkbox" value="2" /> 매운맛&nbsp;&nbsp;
                            </label>
                            <label>
                                <input type="checkbox" value="3" /> 그냥 죽여라냥&nbsp;&nbsp;
                            </label>
                        </div>
                    </fieldset>
                </form>
                </table>

                <div><a href="" class="btn btn-info pull-right">저장</a></div>
                <br><br>
                <fieldset>
                    <legend>내정보</legend>
                    <table class="table table-bordered">
                        <tr>
                            <th class="info" style="width: 17%;">ID:</th>
                            <td style="width: 83%;"></td>
                        </tr>
                        <tr>
                            <th class="info" style="width: 17%;">email:</th>
                            <td style="width: 83%;"></td>
                        </tr>
                    </table>
                </fieldset>
                <sapn><a href="" class="btn btn-info pull-right">정보수정</a></sapn>
                <sapn><a href="" class="btn btn-info pull-right">회원탈퇴</a></sapn>
                <br><br>
                <form class="form-inline">
                    <fieldset>
                        <legend>작성한 후기리스트</legend>
                        <table class="table table-bordered">
                            <tr class="info">
                                <th><label><input type="checkbox" value="all" class="check_all">&nbsp;선택</label></th>
                                <th>제목</th>
                                <th colspan="3">내용</th>
                            </tr>
                            <tr>
                                <td><label><input type="checkbox" value="num" class="check" /></label></td>
                                <td>오현우</td>
                                <td>오현우님이 살아계신다</td>
                            </tr>
                            <tr>
                                <td><label><input type="checkbox" value="num" class="check" /></label></td>
                                <td>오현우</td>
                                <td>오현우님은 살아계신다</td>
                            </tr>
                            <tr>
                                <td><label><input type="checkbox" value="num" class="check" /></label></td>
                                <td>오현우</td>
                                <td>오현우는 살아계신다</td>
                            </tr>
                        </table>
                    </fieldset>
                </form>
                <sapn><a href="" class="btn btn-info pull-right">게시물 삭제</a></sapn>
                <br><br>
                <form class="form-inline">
                    <fieldset>
                        <legend>좋아요 리스트</legend>
                        <table class="table table-bordered">
                            <tr class="info">
                                <th><label><input type="checkbox" value="all" class="check_all2">&nbsp;선택</label></th>
                                <th>제목</th>
                                <th colspan="3">내용</th>
                            </tr>
                            <tr>
                                <td><label><input type="checkbox" value="num" class="check2" /></label></td>
                                <td>오현우</td>
                                <td>오현우님이 살아계신다</td>
                            </tr>
                            <tr>
                                <td><label><input type="checkbox" value="num" class="check2" /></label></td>
                                <td>오현우</td>
                                <td>오현우님은 살아계신다</td>
                            </tr>
                            <tr>
                                <td><label><input type="checkbox" value="num" class="check2" /></label></td>
                                <td>오현우</td>
                                <td>오현우는 살아계신다</td>
                            </tr>
                        </table>
                    </fieldset>
                </form>
                <sapn><a href="" class="btn btn-info pull-right">좋아요 취소</a></sapn>
                <br><br><br>
                <div class="text-center"><a href="" class="btn btn-info">홈으로</a></div>
            </div>
        </div>
    </div>
</body>

</html>