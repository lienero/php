<?php  
	class module {
		function mobileConcertCheck() {
            $mobileArray = array(
                  "iphone"
                , "lgtelecom"
                , "skt"
                , "mobile"
                , "samsung"
                , "nokia"
                , "blackberry"
                , "android"
                , "sony"
                , "phone"
            );
			$checkCount = 0;
			//sizeof() 함수는 배열의 크기를 나타내는 함수로 count 함수의 별칭입니다. 여기서 배열의 크기란 배열에 포함된 모든 요소의 개수를 의미합니다.
			for($num = 0; $num < sizeof($mobileArray); $num++) {
				/*preg_match('/[\\?\\&]v=(["\\?\\&]+)/', $url, $matches) :
				첫 번째 인수 : 정규식 표현 작성. : 대괄호([])로 묶은 안의 값은 그 중 어느 값이든 일치하면 된다.
				두 번째 인수 : 검색 대상 문자열.
				세 번째 인수 : 배열 변수 반환. 패턴 매치에서 매칭된 값을 배열로 저장.
				반환값 : 매칭에 성공하면 1, 실패하면 0이 반환*/
				// strtolower() 이 함수는 문자열에서 대문자를 소문자로 변환한다.
				//$_SERVER['HTTP_USER_AGENT'] : 사용자의 웹접속환경 정보를 담고 있는 PHP전역변수
				if(preg_match("/$mobileArray[$num]/", strtolower($_SERVER['HTTP_USER_AGENT']))) {
                                        $checkCount++;
                                        break;
                }
			}
			return ($checkCount >= 1) ? "mobile" : "computer";
		}
	}
	
	$obj = new module();

	if($obj -> mobileConcertCheck() == "mobile") {
		include './mobile/main.php';
	} else {
		include './PC/main.php';
	}
	
?>