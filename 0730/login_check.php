<?php
    // 절대 경로 파일을 불러옴
    include 'db_info.php';
    
    
    // session 등록을 위해 초기화
    session_start();
    
    $id = $_POST['id'];
    $password = $_POST['pwd'];
    $check = "SELECT * FROM user WHERE u_id = '$id'";
    $result = $mysqli->query($check);
    
    //!empty(변수) : 변수의 값이 비어있는 값인지 확인, !empty(변수) = 비어있지 않으면 참 
    //num_rows : 데이터 열수를 반환
    if(!empty($result) && $result->num_rows == 1) {
        //fetch_array(데이터타입) : 숫자형 인덱스 배열 or 문자형 연관 배열
        $row = $result->fetch_array(3); #1 is MYSQLI_NUM 2 is equivalent to MYSQLI_ASSOC 3 is MYSQLI_BOTH
        if($row['password']==$password) {
            //$_SESSION['userid'] : userid를 서버에 저장
            $_SESSION['userid'] = '$id';
            // isset() : 변수에 값이 있는지 확인 true or false(ex : null)
            if(isset($_SESSION['userid'])){
                echo "Successfully signed in";
                // header() : raw HTTP header를 클라이언트에게 보낸다. (사이트 이동)                
                header("location: /index.php");
            } else {
                echo "Error to save session variable";
                header("location: login.php");
            }
        } else {
            echo "Wrong password or id";
            header("location: login.php");
        }  
    } else {
        echo "잘못된 패스워드 혹은 아이디입니다.";
        header("location: login.php");
    }
?>