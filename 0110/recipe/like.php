
<?php
include $_SERVER['DOCUMENT_ROOT']."/recipe_site/db/db.php";
                        if(!isset($_SESSION)) 
                        { 
                            session_start(); 
                        } 
                        //세션에서 아이디를 가져와서 삽입
                        $userid = $_SESSION['mem_id'];
                        //변수에 comment_write_read.php에서 GET으로 가져온 ID값을 저장한다.
                        $recipe_id = $_GET['recipe_seq'];
                        //변수에 comment_write_read.php에서 가져온 like에 보안을 위해 걸어둔 26543을 다시 나눈 뒤 1을 더한 값을 저장
                        $like_count = ($_GET['like']/26543)+1;
                        //sql은 po_recipe의 필드에 있는 모든 값을 불러온다. 조건은 recipe_seq의 값이 $recipe_id의 값과 같을 경우에만
                        $sql=mq("SELECT * FROM po_recipe where recipe_seq=$recipe_id"); 
                        //배열로 저장.
                        $this_recipe = $sql->fetch_array();
                        //sql2는 po_member의 필드에 있는 모든 값을 불러온다. 조건은 id의 값이 $userid의 값과 같을 경우에만
                        $sql2=mq("SELECT * FROM po_member where mem_id='".$userid."'");
                        //배열로 저장
                        $member = $sql2->fetch_array();
                        //데이터베이스의 member 테이블의 likes 필드에 있는 값을 불러온다.
                        $mem_likes = $member['likes'];
                        //explode 함수는 delimeter값(,)을 기준으로 뒤에 있는 문자열을 나눈다.
                        $like_array = explode(",",$member['likes']);
                        //recipe_seq는 recipe_seq의 값을 배열로 변환
                        $recipe_seq = $this_recipe['recipe_seq'];
                        //isset $userid의 값이 들어 있는 경우에는 if를 실행
                        if(isset($userid)){
                            //if po_recipe안에 있는 [recipe_seq]값과 po_member안에 있는 [likes]값이 같을 경우 if를 실행하여 중복검사를 한다.
                            //$count = 1을 집어넣어 $count의 값이 1일 경우에만 if 조건을 실행.
                            //아닐 경우 $sql을 업데이트 한다. po_member의 likes 값을
                            if($member['likes']=="" || $like_array==""){
                                $sql = mq("update po_member set likes ='". $recipe_id."'where mem_id='".$userid."'");
                                $sql_like = mq("update po_recipe set recipe_likes = $like_count where recipe_seq = '".$recipe_id."'");
                                echo 
                                        "<script>
                                        alert('「いいね」しました。');
                                        history.back();
                                        </script>";

                            } else {
                                $count = 0;
                                //배열의 첫시작은 0부터 되야하는게 정상이고
                                //값은 2값이 나오는데 $i가 count보다 작거나 같으면 0,1,2로 3개의 값이 나오기 때문에 초과를 넣어야 한다.
                                for($i=0; $i<count($like_array); $i++){
                                    if($recipe_seq == $like_array[$i] || $recipe_seq == $mem_likes ){
                                        echo
                                        "<script>
                                        alert('すでに「いいね」しました。');
                                        history.back();
                                        </script>";
                                        $count = 1;
                                    }
                                }    
                                    if($count != 1) {
                                        $recipe_seq = $member['likes'].",".$recipe_seq;
                                        $sql = mq("update po_member set likes='".$recipe_seq."' where mem_id='".$userid."'");
                                        $sql_like = mq("update po_recipe set recipe_likes = $like_count where recipe_seq = '".$recipe_id."'");
                                        echo $like_count; 
                                        echo 
                                        "<script>
                                        alert('「いいね」しました。');
                                        history.back();
                                        </script>";
                                    }    
                                }
                            } else {
                                echo "<script>
                                alert('로그인을 해주세요.');
                                location.href='./comment_write_read.php';
                                </script>";
                                }
                            
                        