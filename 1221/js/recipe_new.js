$(function() {
    $("#addFood").click(function () {
        addForm();
    });
    $("#delFood").click(function () {
        delForm();
    });
    $("#imgMain").change(function () {
        readURL(this);
    });
    $("#input_imgs").change(function () {
        fileUploadAction();
    });
});

var count = 0;
function addForm(){
    var addedFormDiv = document.getElementById("addedFormDiv");
    var str = "";
    str+="<div class=\"row\">";
    str+="<div class=\"input-group col-md-12 mb-3\">";
    str+="<div class=\"input-group-prepend\">";
    str+="<span class=\"input-group-text\">First food</span>";
    str+="</div>";                
    str+="<input type=\"text\" aria-label=\"food\" name=\"food[]\" class=\"form-control\">";
    str+="</div>";
    str+="</div>";
    // 추가할 폼(에 들어갈 HTML)                
    var addedDiv = document.createElement("div"); // 폼 생성
    addedDiv.id = "added_"+count; // 폼 Div에 ID 부여 (삭제를 위해)
    addedDiv.innerHTML  = str; // 폼 Div안에 HTML삽입
    addedFormDiv.appendChild(addedDiv); // 삽입할 DIV에 생성한 폼 삽입
    count++;
    document.baseForm.count.value=count;
    // 다음 페이지에 몇개의 폼을 넘기는지 전달하기 위해 히든 폼에 카운트 저장
}

// delete form
function delForm(){
    var addedFormDiv = document.getElementById("addedFormDiv");                
    if(count > 0){ // 현재 폼이 두개 이상이면
        var addedDiv = document.getElementById("added_"+(--count));
        // 마지막으로 생성된 폼의 ID를 통해 Div객체를 가져옴
        addedFormDiv.removeChild(addedDiv); // 폼 삭제 
    }else{ // 마지막 폼만 남아있다면
        document.baseForm.reset(); // 폼 내용 삭제
    }
}

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#LoadImg').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

var sel_files = [];

$(document).ready(function() {
    $("#input_imgs").on("change", handleImgFileSelect);
}); 

function fileUploadAction() {
    console.log("fileUploadAction");
    $("#input_imgs").trigger('click');
}

function handleImgFileSelect(e) {

    // 이미지 정보들을 초기화
    sel_files = [];
    $(".imgs_wrap").empty();

    var files = e.target.files;
    var filesArr = Array.prototype.slice.call(files);

    var index = 0;
    filesArr.forEach(function(f) {
        if(!f.type.match("image.*")) {
            alert("확장자는 이미지 확장자만 가능합니다.");
            return;
        }

        sel_files.push(f);

        var reader = new FileReader();
        reader.onload = function(e) {
            var html = "<a href=\"javascript:void(0);\" onclick=\"deleteImageAction("+index+")\" id=\"img_id_"+index+"\"><img src=\"" + e.target.result + "\" data-file='"+f.name+"' class='selProductFile' title='Click to remove' height='150px'></a><br><hr>";
            $(".imgs_wrap").append(html);
            index++;

        }
        reader.readAsDataURL(f);
        
    });

    addFormRecipe(sel_files.length);
}

function addFormRecipe(count){
    var temp = count;

    var str = "";
    str+="<div class=\"input-group one\">";                
    str+="<div class=\"input-group-prepend\">";
    str+="<span class=\"input-group-text\" id=\"explan\" width=\"330px\">With textarea</span>";
    str+="</div>";
    str+="<textarea class=\"form-control\" id=\"textimg\" aria-label=\"With textarea\" name=\"sub_img[]\"></textarea>";
    str+="</div>"; 

    str2 = str;
    while(temp > 1) {
        str += str2;
        temp--;
    }

    $("#addedFormDiv_1").html(str);
}