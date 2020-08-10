<html>

<?php
    $url = 'https://www.youtube.com/watch?v=PVcpF7J2oXs';
	/*preg_match('/[\\?\\&]v=(["\\?\\&]+)/', $url, $matches) :
	첫 번째 인수 : 정규식 표현 작성. : 대괄호([])로 묶은 안의 값은 그 중 어느 값이든 일치하면 된다.
	두 번째 인수 : 검색 대상 문자열.
	세 번째 인수 : 배열 변수 반환. 패턴 매치에서 매칭된 값을 배열로 저장.
	반환값 : 매칭에 성공하면 1, 실패하면 0이 반환*/
    preg_match('/[\\?\\&]v=(["\\?\\&]+)/', $url, $matches);
    $id = $matches[1];
    $width  = "800px";
    $height = "450px";
?>
<!-- iframe 요소를 이용하면 해당 웹 페이지 안에 어떠한 제한 없이 또 다른 하나의 웹 페이지를 삽입할 수 있다. -->
<iframe id="ytplayer" type="text/html" width="<?php echo $width;?>" height="<?php echo $height?>"
src="https://www.youtube.com/embed/<?php echo $id?> ?rel=0&showinfo=0&color=white&iv_load_policy=3" 
frameborder="0" allowfullscreen></iframe>
</html>