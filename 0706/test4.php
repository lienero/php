<?php
	//변수
	$plus = 1;
	$minus = 1;
	$mult = 1;
	$div = 1;
	$remain = 1;
	$countPlus = 1;
	$countMinus = 1;
	
	//연산
	echo "연산";
	echo "<br>";
	echo $plus, " + 1 = ", $plus = $plus + 1;
	echo "<br>";
	echo $minus, " - 1 = ", $minus = $minus - 1;
	echo "<br>";
	echo $mult = $mult * 2;
	echo "<br>";
	echo $div = $div / 1;
	echo "<br>";
	echo $remain = $remain % 1;
	echo "<br>";
	echo $countPlus = ++$countPlus;
	echo "<br>";
	echo $countMinus = --$countMinus;
	echo "<br>";
	
	//변수 초기화
	$plus = 1;
	$minus = 1;
	$mult = 1;
	$div = 1;
	$remain = 1;
	$countPlus = 1;
	$countMinus = 1;
	$fn = "GyeongMin";
	$ln = " Lee";
	
	//대입연산
	echo "대입연산";
	echo "<br>";
	echo $plus, " + 1 = ", $plus += 1;
	echo "<br>";
	echo $minus, " - 1 = ", $minus -= 1;
	echo "<br>";
	echo $mult, " * 2  = ", $mult *= 2;
	echo "<br>";
	echo $div /= 1;
	echo "<br>";
	echo $remain %= 1;
	echo "<br>";
	echo $countPlus = ++$countPlus;
	echo "<br>";
	echo $countMinus = --$countMinus;
	echo "<br>";
	echo $fn .= $ln  
?>	