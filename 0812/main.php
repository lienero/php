<html>
<head>
	<meta charset="utf-8" />
	<title>PC용 접속</title>
	<link href="./css/jquery.bxslider.css" rel="stylesheet" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script src="./js/jquery.bxslider.js"></script>

</head>
<body>
	<!-- class="bxslider" 슬라이더가 될 컨텐츠 부분입니다. -->
	<ul class="bxslider">
		<li><img src="./images/test1.jpg" title="응? 너뭐하냐?"/></li>
		<li><img src="./images/test2.jpg" /></li>
		<li><img src="./images/test3.jpg" title="벗겨라!!"/></li>
	</ul>
	
	<script type="text/javascript"> 
		// $(document).ready(function(){ : 모든 html 페이지가 화면에 뿌려지고 나서 저 ready안에 서술된 이벤트들이 동작준비를 함
		$(document).ready(function(){ 
			// $('.bxslider').bxSlider(){: 슬라이더를 생성
			var slider = $('.bxslider').bxSlider({
				// 옵션
				/*  * 옵션
					* auto: true - 이미지 회전이 자동으로 시작합니다.
					* speed: 500 - 이미지가 다음 이미지로 바뀌는데 걸리는 시간입니다. 단위는 ms(mili seconds) 입니다. 500 ms가 기본값 입니다.
					* pause: 4000 - 하나의 이미지가 멈춰서 보여지는 시간입니다. 4000ms 가 기본값입니다.
					* mode 'fade' - 이미지가 교체되는 방식입니다. 'fade', 'horizontal', 'vertical' 을 사용할 수 있습니다. 각각 fade in/fade out, 수평 스크롤, 수직 스크롤 방식으로 이미지가 교체됩니다.
					* autoControls: true - 시작 중지 버튼을 보여지게 합니다.
					* pager: true - 페이지 바로가기 버튼을 보여지게 합니다.
					* captions 옵션을 true로 하면 이미지의 title속성값이 이미지 하단에 캡션으로 보여집니다.
				*/
				auto: true,
				speed: 500,
				pause: 4000,
				mode:'fade',
				autoControls: true,
				pager:true,
				captions: true,
			});
			/* 반응형웹에서 bxSlider 를 사용할때 화면 크기에 따라 슬라이더 자체를 감췄다가 보여주는 경우 
				슬라이더가 다시 표시되지 않는 경우가 있습니다. 
				이때는 bxSlider의 reloadSlider(); : 메소드를 호출해 주면 다시 보여집니다. */
			// window.matchMedia()를 이용해서 접속하는 웹브라우저의 가로 크기에 따라 다른 작업을 할 수 있습니다. 
			var mql = window.matchMedia("screen and (max-width: 768px)");
			// mql.addListener: 사이즈가 변할 때의 이벤트 발생을 감지
			mql.addListener(function(e) {
				if(!e.matches) {
					// 슬라이드를 리로드한다
					slider.reloadSlider();
				}
			});
		});
	</script>
</body>
</html>