<?php
    $paper[] = "Colier";
    $paper[] = "Inkjet";
    $paper[] = "Laser";
    $paper[] = "Photo";
    
    echo "<pre>";
    print_r($paper);
    echo "<pre>";
    
    echo "<pre>";
    var_dump($paper);
    echo "<pre>";
    
    $paper[0] = "Colier";
    $paper[1] = "Inkjet";
    $paper[2] = "Laser";
    $paper[3] = "Photo";
    
    echo "<pre>";
    print_r($paper);
    echo "<pre>";
    
    echo "<pre>";
    var_dump($paper);
    echo "<pre>";
    
    for ($i = 0; $i < 4; $i++){
        echo "$i: $paper[$i]<br/>";
    }
   
    $paper['copier'] = "Colier & Multiputpose";
    $paper['inkjet'] = "Inkjet Printer";
    $paper['laser'] = "Laser Printer";
    $paper['photo'] = "Photographic paper";
    
    echo $paper['laser']."<br/>";
    var_dump($paper);

?>