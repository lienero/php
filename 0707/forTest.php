<?php
for($mux = 2; $mux <=9; $mux++ ){
    echo $mux."단", "<br/>";
        for($mux_count = 1; $mux_count <= 9; $mux_count++){
            echo $mux." X ", $mux_count,"= ", $mux*$mux_count."<br/>";  
         }
}
?>