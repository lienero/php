<?php
    $lotto_num = array(1, 2, 3, 4, 5, 6);
    $input_num = array($_POST["num1"], $_POST["num2"], $_POST["num3"], $_POST["num4"],$_POST["num5"], $_POST["num6"]);
    $count = 0; 
    for ($num_count = 0; $num_count <6; $num_count++) {
        $input_num[$num_count] == $lotto_num[$num_count] ? $count++ : $count;
    }
    
    switch ($count){
        case 6:
            echo "1등"; "당신 차례입니다";
            break;
        case 5:
            echo "2등";
            break;
        case 4:
            echo "3등";
            break;
        case 3:
            echo "4등";
            break;
        default:
            echo "다음기회에...";
            break;
    }
    
?>