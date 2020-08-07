// 일정시간마다 할일
// 첫번째 이미지 스윽
// 사라지고 두번째 이미지가 나타나도록
// 마지막 이미지가 나타난 다음에 첫번째 이미지로 만들기
$(function(){
    var slides=$('.slide_box img'),
    slideCount= slides.length,
    //slides의 이미지 개수가 몇개인지 확인하기 위한 장지
    //확인하기 위해서는 console.log('slides');를 이용해본다
    currentIndex = 0;
    //슬라이드가 구분하기 위한 시작값 무엇으로 써도 상관 없다.

    //해당시간이 지나면 한번만 할일
    // var timer =setTimeout(할 일,1000);
    // clearTimeout(timer); 멈출 때
    //일정시간마다 할 일
    // var timter =setInterval(할 일,시간);
    // clerTimeout(timer); 멈출 때
    
    //jquery 배열처럼 들어 올때(object)중 특정번째 요소를 선택할 때 .eq(숫자에 맞는 요소 equivanlent-> 동등하다.)사용
    //object 확인하는 방법. ex)console.log('slides');라고 function안에 기입 후 
    //브라우저에서 F12를 눌러본 다음 console 확인

    //요소를 서서히 나타나도록 .fadeIn()
    //요소가 서서히 사라지도록 .fadeOut()
    slides.eq(currentIndex).fadeIn();
    var timer = undefined; //timer의 값은 지정되어 있지 않음
    console.log(slides)
    if (!timer) { 
        timer= setInterval(showNextSlide,3500);
        //타이머의 값이 지정되어 있지 않으면  setInterval(showNextSlide,3500);을 실행시켜 주세요
        }
   
     function showNextSlide(){

        var nextIndex = (currentIndex +1) % slideCount;
        //cI가 0일 경우 nI는 1, cI가 1일 경우 nI는 2, cI가 2일 경우 nI는 3, cI가 3일 경우 nI는 0
        // slideCount가 4일 경우 
        // 1 % 4 = 1을 4로 못나누니까 나머지는 1
        // 2 % 4 = 2를 4로 나누면 나머지가 2
        // 3 % 4 = 3을 사로 나누면 나머지가 3
        // 4 % 4 = 0
        slides.eq(currentIndex).fadeOut();
        slides.eq(nextIndex).fadeIn();
        currentIndex = nextIndex;

        // 현재 슬라이드는 사라지고
        // 다음 슬라이드가 나타난다.
        // slides.eq(0).fadeOut();
        // slides.eq(1).fadeIn();

        // 3.5초가 지나면

        // slides.eq(1).fadeOut();
        // slides.eq(2).fadeIn();

        // 3.5초가 지나면

        // slides.eq(2).fadeOut();
        // slides.eq(3).fadeIn();

        // 3.5초가 지나면

        // slides.eq(3).fadeOut();
        // slides.eq(0).fadeIn();

        // 이 숫자가 들어오게 만들기

        function timeron(){   
            if (!timer) { 
            timer= setInterval(showNextSlide,3500);
            //타이머의 값이 지정되어 있지 않으면  setInterval(showNextSlide,3500);을 실행시켜 주세요
            }
        }  
        function timeroff(){   
            if (timer) { 
            clearInterval(timer);
            timer= undefined;
            //타이머의 값이 지정되어 있으면  setInterval(showNextSlide,3500);을 없애주시고 undefined를 넣어주세요
            }
        }
        slides.mouseover(function(){
            timeroff();
        })
        .mouseout(function(){
            timeron();
        });
        
        $("#menubar-menus li").stop().mouseenter(function(event) {
            $(this).find("div").parent().css("background", "none");
            $(this).find("div").parent().children("a").css("color", "#000");
            $(this).find("div").slideDown("fast");
        }).mouseleave(function() {
            $(this).find("div:visible").slideUp(50, function() {
                // #menubar-menus li:hover 처리를 하지 않을 경우 아래 라인 활성,
                $(this).parent().css({"background":"none","opacity":"0.7}"});
                $(this).parent().children("a").css("color", "#FFF");
            });
        });
            // var $aside = $('aside'),
            //     $button = $('aside button');
            var $aside = $('aside'),
                $button = $aside.find('button'),
                $duration = 300;
            
             //같은 버튼 하나로 두가지 행동이 될 때 
             //클래스 추가 -> 선택자.addClass('newClass');
             //클래스 삭제 -> 선택자.removeClass('newClass');
             //클래스가 만약에 클릭할 당시에 저 newClass가 없으면 클래스를 만들어 주고, 있으면 newClass를 지워주는 역할을 할 때는 -> 선택자.toggleClass('newClass');
             // ※hasClass('b') -> 조건문에서만 사용. a요소에 b라는 클라스가 있으면 true 없으면 false
             //h
             //클래스 전부 대소문자 구분하기 때문에 대소문자 꼭 확인!
        


    }
});