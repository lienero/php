$(function () {
  $("#inputGroupFile01").change(function () {
    fileUploadAction();
  });
});

var sel_files = [];

$(document).ready(function () {
  $("#inputGroupFile01").on("change", handleImgFileSelect);
});

function fileUploadAction() {
  console.log("fileUploadAction");
  $("#inputGroupFile01").trigger("click");
}

function handleImgFileSelect(e) {
  // 이미지 정보들을 초기화
  sel_files = [];
  $(".imgs_wrap").empty();

  var files = e.target.files;
  var filesArr = Array.prototype.slice.call(files);

  var index = 0;
  filesArr.forEach(function (f) {
    if (!f.type.match("image.*")) {
      alert("확장자는 이미지 확장자만 가능합니다.");
      return;
    }

    sel_files.push(f);

    var reader = new FileReader();
    reader.onload = function (e) {
      var html =
        '<a href="javascript:void(0);" onclick="deleteImageAction(' +
        index +
        ')" id="img_id_' +
        index +
        '"><img src="' +
        e.target.result +
        "\" data-file='" +
        f.name +
        "' class='selProductFile' title='Click to remove' height='300px'></a><br><hr>";
      $(".imgs_wrap").append(html);
      index++;
    };
    reader.readAsDataURL(f);
  });
}
