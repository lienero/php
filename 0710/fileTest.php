<?php
    if (file_exists("arrayFunTest.php")){
        echo "있음<br/>";
    } else {
        echo "없음<br/>";
    }
    
    $fh = fopen("testfile.txt", 'w') or die("파일 생성 불가");
    $text = <<<_END
    Line 1
    Line 2
    Line 3
_END;
    
   fwrite($fh, $text) or die("파일 쓰기 불가");
   fclose($fh);
   echo "파일 'testfile.txt' 쓰기 성공<br/>";
   
   $fh = fopen("testfile.txt", 'r') or die("파일을 불러올 수 없습니다.");
   for ($int = 0; $int < 3; $int++){
       $line = fgets($fh);
       echo $line."<br/>";
   }
   fclose($fh);
   
   $fh = fopen("testfile.txt", 'r') or die("파일을 불러올 수 없습니다.");
   for ($int = 0; $int < 3; $int++){
       $line_array[] = fgets($fh);
       echo $line_array[$int]."<br/>";
   }
   fclose($fh);
  
   copy('testfile.txt', './file_location/testfile2.txt') or die("파일을 복사할 수 없습니다.");
   echo "파일을 복사하는 것에 성공하였습니다.<br/>";
   
   if (!rename('./file_location/testfile2.txt', './file_location/testfile2.new'))  // !는 not 이고, !는 1(true) -> 0(false), 0(false) -> 1(true)로 만듬.
                                                   // rename은 성공했을 때 1이 나오기에 !를 써서 0으로, 반대도 같다.
   {
       echo "파일의 이름을 바꿀 수 없습니다.<br/>";
   } else {
       echo "파일을 'testfile2.new'로 이름을 바꾸는 데 성공하였습니다.<br/>";
   }
   
   if (!rename('./file_location/testfile2.new', './file_location/new_file.txt')) {
       echo "파일의 이름을 바꿀 수 없습니다.<br/>";
   } else {
       echo "파일을 'new_file.txt'로 이름을 바꾸는 데 성공하였습니다.<br/>";
   }
   
   if (unlink('./file_location/new_file.txt')) {
       echo "new_file.txt' 파일을 삭제했습니다.<br/>";
   } else {
       echo "파일을 삭제할 수 없습니다.<br/>";
   }
   
   $fh = fopen("testfile.txt", 'r+') or die("파일을 불러올 수 없습니다.");
   
   $text = fgets($fh)."저장 시간: ".date("Y년 n월 d일 H시 i분", time());;
   fseek($fh, 0, SEEK_END); //SEEK_END 파일의 끝으로 이동하여라
   fwrite($fh, "$text") or die("파일 쓰기 불가");
   fclose($fh);
   echo "'testfile.txt' 을 갱신 하였습니다.<br/>";
?>