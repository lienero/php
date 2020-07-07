<?php
	//첫번째 예제
	$author = "GyeongMin Lee";
	
	echo "dodo, dododo, dodododo, dododododododo, dodododododododododo,
	
	-$author.";
	
	/*두번째 예제*/
	echo "<br>";
	echo "<br>";
	$author_2 = "Gildong Hong";
	$text = "dodo, dododo, dodododo, dododododododo, dodododododododododo,
	
	-author_2.";
	echo $text;
	
	/*세번째 예제*/
	echo "<br>";
	echo "<br>";
	$author_3 = "John";
	
	echo <<< _END
	This is a headlines,
	This is the first line,
	This is the second,
	-Written by $author_3.
_END;

	//숫자에서 문자열로 자동 변환
	echo "<br>";
	$number = 12345 * 67890;
	echo substr($number, 3, 1); // substr(문자열변환, 시작점, 길이)
	
	// 문자열에서 숫자로의 자동 변환
	echo "<br>";
	$pi = "3.1415927";
	$radius = 5;
	echo $pi * ($radius * $radius);
	
	// 간단한 함수 사용법
	function longdate($timestamp){
		return date("l F jS Y", $timestamp);
	}
	
	echo "<br>";
	echo "<br>";
	/*간단한 함수 사용*/
	echo longdate(time());
	
?>	