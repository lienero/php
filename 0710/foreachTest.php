<?php
    $paper = array("copier", "inkject", "laser", "photo");
    
    $j = 0;
    foreach ($paper as $item){
        echo "$j: $item<br>";
        ++$j;
    }
    
    $paper = array('copier' => "Colier & Multiputpose",
                   'inkjet' => "Inkjet Printer",
                   'laser'  => "Laser Printer",
                   'photo'  => "Photographic paper");
    
    foreach ($paper as $item => $description){
        echo "$item: $description"."<br/>";
    }
    echo "<pre>";
    var_dump($paper);
    echo "<pre>";
    
    while (list($item, $description) = each($paper)){
        echo "$item: $description<br>";
    }
    
    $products = array(
        'paper' => array(
            'copier' => "Colier & Multiputpose",
            'inkjet' => "Inkjet Printer",
            'laser'  => "Laser Printer",
            'photo'  => "Photographic paper"),
        'pens' => array(
            'ball' => "Ball Point",
            'hilite' => "Highlighters",
            'market' => "Mark"),
        'misc' => array(
            'tape' => "Sticky",
            'glue' => "Adheslives",
            'clips' => "Paperclips"));
        
    echo "<pre>";
    foreach ($products as $section => $item) {
        foreach ($item as $key => $value)
            echo "$section:\t$key\t($value)<br>";
    }
?>