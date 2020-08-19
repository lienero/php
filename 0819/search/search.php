<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div id="search_box">
    <form action="./search_result.php" method="get">
      <select name="catgo">
        <option value="content">내용</option>
        <option value="mem_id">아이디</option>
      </select>
      <input type="text" name="search" size="40" required="required" /> <button>검색</button>
    </form>
</div>
</body>
</html>
