<?php
    $input_data = 0; 
    while ($input_data<=10){
        echo "10보다 작거나 같아요!!".$input_data."<br/>";
        $input_data++;
    }
    echo "10보다 커요!!".$input_data."<br/>";
    
    $input_data = 0;
    do{
        echo "10보다 작거나 같아요!!".$input_data."<br/>";
        $input_data++;
    } 
    while ($input_data<=10);
    echo "10보다 커요!!".$input_data."<br/>";  
?>