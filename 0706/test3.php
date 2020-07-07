<?php
	/*첫번째 예제*/
	$username = "GyeongMin Lee";
	echo $username;
	echo "<br>";
	$currect_user = $username;
	echo $currect_user;
	
	/*두번째 예제*/
	echo "<br>";
	echo "<br>";
	$myarray_1 = array("one","two","three");
	$myarray_2 = array("one","two","three");
	echo "<br>";
	echo $myarray_1[1];
	echo "<br>";
	echo $myarray_2[2];
	
	/*세번째 예제*/
	echo "<br>";
	echo "<br>";
	$oxo = array(array('x1', 'x2', 'x3'),
				 array('y1', 'y2', 'y3'),
				 array('z1', 'z2', 'z3')
				 );
	echo @oxo[1][1];
?>	