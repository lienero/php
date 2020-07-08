<?php
    ini_set('display_errprs', '0');
    
    $input_data = $_GET["val"];
    $input_len = strlen($input_data);
    $input_switch = substr($input_data, 0, 1);
    $input_value = substr($input_data, 1, ($input_len-1));
    
    switch ($input_switch){
        case 0:
            magic_1();
            break;
        case 1:
            magic_2($input_value);
            break;
        case 2:
            magic_3($input_value);
            break;
        case 3:
            magic_4($input_value);
            break;
        case 4:
            magic_5($input_value);
            break;
        case 5:
            magic_6($input_value);
            break;
        case 6:
            result_page($input_value);
    }
    
    function magic_1(){
        echo "1단계 하단의 숫자 중 생각하신 숫자가 있으십니까?<br/>";
        for($num = 1; $num <50; $num++){
            if($num%10 == 0) {
                echo "<br />";
            }
            
            if($num%2 == 1){
                echo $num."&nbsp;&nbsp;&nbsp;&nbsp;";
            }
        }
        echo "<br />";
        echo "<button id=\"btnfun1\" name=\"btnfun1\" onClick='location.href=\"magic.php?val=11\"'>존재함</button>";
        echo "<button id=\"btnfun2\" name=\"btnfun2\" onClick='location.href=\"magic.php?val=10\"'>존재하지 않음</button>";        
    }
    function magic_2($currect_value){
        $in_count = 0;
        $line_count = 0;
        echo "2단계 하단의 숫자 중 생각하신 숫자가 있으십니까?<br/>";
        for($num = 2; $num <50; $num++){
            if($in_count == 2) {
                $num += 2;
                $in_count = 0;
            }
            if($num<51) {
            echo $num."&nbsp;&nbsp;&nbsp;&nbsp;";
            $in_count++;
            }
            if($line_count != 0 && $line_count%5 == 0) {
                echo "<br/>";
                //$line_count = 0;
            }
            $line_count++;
        }
        echo "<br />";
        echo "<button id=\"btnfun1\" name=\"btnfun1\" onClick='location.href=\"magic.php?val=2".($currect_value+2)."\"'>존재함</button>";
        echo "<button id=\"btnfun2\" name=\"btnfun2\" onClick='location.href=\"magic.php?val=2".($currect_value+0)."\"'>존재하지 않음</button>";        
    }
    
    function magic_3($currect_value){
        $in_count = 0;
        $line_count = 0;
        echo "3단계 하단의 숫자 중 생각하신 숫자가 있으십니까?<br/>";
        for($num = 4; $num <=50; $num++){
            if($in_count == 4) {
                $num += 4;
                $in_count = 0;
            }
            if($num<51) {
            echo $num."&nbsp;&nbsp;&nbsp;&nbsp;";
            $in_count++;
            }
            if($line_count != 0 && $line_count%5 == 0) {
                echo "<br/>";
                //$line_count = 0;
            }
            $line_count++;
        }
        echo "<br />";
        echo "<button id=\"btnfun1\" name=\"btnfun1\" onClick='location.href=\"magic.php?val=3".($currect_value+4)."\"'>존재함</button>";
        echo "<button id=\"btnfun2\" name=\"btnfun2\" onClick='location.href=\"magic.php?val=3".($currect_value+0)."\"'>존재하지 않음</button>";      
    }
    function magic_4($currect_value){
        $in_count = 0;
        $line_count = 0;
        echo "4단계 하단의 숫자 중 생각하신 숫자가 있으십니까?<br/>";
        for($num = 4; $num <=50; $num++){
            if($in_count == 8) {
                $num += 8;
                $in_count = 0;
              
            }
            if($num<51) {
            echo $num."&nbsp;&nbsp;&nbsp;&nbsp;";
            $in_count++;
            }
            if($line_count != 0 && $line_count%5 == 0) {
                echo "<br/>";
                //$line_count = 0;
            }
            $line_count++;
        }
        echo "<br />";
        echo "<button id=\"btnfun1\" name=\"btnfun1\" onClick='location.href=\"magic.php?val=4".($currect_value+8)."\"'>존재함</button>";
        echo "<button id=\"btnfun2\" name=\"btnfun2\" onClick='location.href=\"magic.php?val=4".($currect_value+0)."\"'>존재하지 않음</button>";
    }
    function magic_5($currect_value){
        $in_count = 0;
        $line_count = 0;
        echo "5단계 하단의 숫자 중 생각하신 숫자가 있으십니까?<br/>";
        for($num = 8; $num <=50; $num++){
            if($in_count == 16) {
                $num += 16;
                $in_count = 0;
            }
            if($num<51) {
            echo $num."&nbsp;&nbsp;&nbsp;&nbsp;";
            $in_count++;
            }
            if($line_count != 0 && $line_count%5 == 0) {
                echo "<br/>";
                //$line_count = 0;
            }
            $line_count++;
        }
        echo "<br />";
        echo "<button id=\"btnfun1\" name=\"btnfun1\" onClick='location.href=\"magic.php?val=5".($currect_value+16)."\"'>존재함</button>";
        echo "<button id=\"btnfun2\" name=\"btnfun2\" onClick='location.href=\"magic.php?val=5".($currect_value+0)."\"'>존재하지 않음</button>";
    }
    function magic_6($currect_value){
        $in_count = 0;
        $line_count = 0;
        echo "6단계 하단의 숫자 중 생각하신 숫자가 있으십니까?<br/>";
        for($num = 32; $num <=50; $num++){
            if($in_count == 32) {
                $num += 32;
                $in_count = 0;
            }
            if($num<51) {
            echo $num."&nbsp;&nbsp;&nbsp;&nbsp;";
            $in_count++;
            }
            if($line_count != 0 && $line_count%5 == 0) {
                echo "<br/>";
                //$line_count = 0;
            }
            $line_count++;
        }
        echo "<br />";
        echo "<button id=\"btnfun1\" name=\"btnfun1\" onClick='location.href=\"magic.php?val=6".($currect_value+32)."\"'>존재함</button>";
        echo "<button id=\"btnfun2\" name=\"btnfun2\" onClick='location.href=\"magic.php?val=6".($currect_value+0)."\"'>존재하지 않음</button>";
    }
    function result_page($input_value) {
        echo "당신이 찾고있는 숫자는".$input_value."입니다.";
        echo "<button id=\"btnfun1\" name=\"btnfun1\" onClick='location.href=\"magic.html\"'>다시하기</button>";
    }
?>