<?php
$food = array('fruits' => array('orange', 'banana', 'apple'),
              'veggie' => array('carrot', 'collard', 'pea'));

// 재귀 count 수
echo count($food,COUNT_RECURSIVE);
//결과 8
echo "<br><br>";
//보통 count 수
echo count($food);
// 결과: 2

?>