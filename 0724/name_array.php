<?php

    $name_array = array($_POST["lee"], $_POST["oh"], $_POST["choi"], $_POST["ha"] );
    
    $name_array[$_POST["lee"]] = 'babo1';
    $name_array[$_POST["oh"]] = 'babo2';
    $name_array[$_POST["choi"]] = 'babo3';
    $name_array[$_POST["ha"]] = 'babo4';
    
    echo $_POST["lee"], ":", $name_array[$_POST["lee"]],"<br/>";
    echo $_POST["oh"], ":", $name_array[$_POST["oh"]],"<br/>";
    echo $_POST["choi"], ":", $name_array[$_POST["choi"]],"<br/>";
    echo $_POST["ha"], ":", $name_array[$_POST["ha"]],
    "<br/>";