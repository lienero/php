<?php
//$_SERVER['DOCUMENT_ROOT'] = 현재 사이트가 위치한 서버상의 위치
include $_SERVER['DOCUMENT_ROOT']."/recipe_site/db/db.php";
session_start();

    $userid = $_SESSION['userid'];
    //myfilter.php 에서 get값을 받아온다
    $pork = $_GET['pork'];
    $beef = ','.$_GET['beef'];
    $chicken = ','.$_GET['chicken'];
    $vegetable = ','.$_GET['vegetable'];
    $fruit = ','.$_GET['fruit'];
    $seasoning = ','.$_GET['seasoning'];
    
    $spicy0 = $_GET['spicy0'];
    $spicy1 = ','.$_GET['spicy1'];
    $spicy2 = ','.$_GET['spicy2'];
    $spicy3 = ','.$_GET['spicy3'];
    

    if(isset($userid)){
        // $sql에 .$uid. 와 같은 id를 가진 쿼리를 삽입
        $sql = mq("select * from member where mem_id='".$userid."'");
        // $sql에 있는 fetch_array(): 인덱스를 변수에 삽입
        $member = $sql->fetch_array();
        if($member['mem_filter'] || $member['mem_spicy']){
            $sql = mq("update member set mem_filter = '".$pork.$beef.$chicken.$vegetable.$fruit.$seasoning."' where mem_id='".$userid."'");
            $sql = mq("update member set mem_spicy = '".$spicy0.$spicy1.$spicy2.$spicy3."' where mem_id='".$userid."'");
            echo "<script>
            alert('필터링이 수정되었습니다.'); history.back();</script>";
        } else {
            $sql = mq("update member set mem_filter = '".$pork.$beef.$chicken.$vegetable.$fruit.$seasoning."' where mem_id='".$userid."'");
            $sql = mq("update member set mem_spicy = '".$spicy0.$spicy1.$spicy2.$spicy3."' where mem_id='".$userid."'");
            echo "<script>
            alert('필터링이 등록되었습니다.'); history.back();</script>";
        }
        
    } else {
        echo "<script>alert('로그인을 해주세요.'); history.back();</script>";
    }
?>