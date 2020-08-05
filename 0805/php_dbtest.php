<?php
	include $_SERVER['DOCUMENT_ROOT']."/member/db/db.php";
?>

<form method="post">
	<input type = "submit" name="test" id="id_value" value="RUN" /><br/>
</form>

<?php
	function testfun()
	{
		$mk_table_sql = fopen("./dbtest.sql","r");
		$sql_line = '';
		while (!feof($mk_table_sql)) {
			$line_of_text = fgets($mk_table_sql);//fgets is one lien readdir
			$sql_line = "$sql_line"."$line_of_text";
			echo "$line_of_text<br>";
		}
		fclose($mk_table_sql);
		
		echo "<br>";
		echo $sql_line;
		$sql = mq("$sql_line");
		echo "<br>";
		echo $sql;
	}
	
	if(array_key_exists('test',$_POST)){
		testfun();
	}

?>	