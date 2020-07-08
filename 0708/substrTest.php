<?php
    echo "<br><br>";
    $str = "Hello World";
    $change_word = str_replace("world", "PHP World", $str);
    echo $change_word;
    
    echo "<br><br>";
    $fileName = "background.jpg";
    $execute = substr($fileName,-4,4); //뒤에서 부터 세는 게 확장자명으로 좋음
    if($execute == '.jpg' || $execute == ".png" || $execute == ".bmp" || $execute ==".gif"){
        echo "업로드한 파일은 이미지 파일입니다.<br/>";
    } else {
        echo "업로드한 파일은 이미지 파일이 아닙니다.<br/>";
    }
?>