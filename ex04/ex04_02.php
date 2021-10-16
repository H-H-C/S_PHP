<?php
/*
 演習4-1
 Author:Ishii
 */
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>ex04_02.php</title>
<body>
<h1>入力結果表示</h1>
<?php
	$name = (htmlspecialchars($_POST['name'], ENT_QUOTES));
	if ($name == "")
	{
		echo '名前を入力してください<br>';
	}
	$age = (htmlspecialchars($_POST['age'], ENT_QUOTES));
	if ($age == "")
	{
		echo '年齢を入力してください<br>';
	}
	else if(!is_numeric($age))
	{
		echo '年齢が数値ではありません<br>';
	}
	else 
	{
		echo $_POST["age"], "歳の", $_POST["name"], "さん、いらっしゃい";
	}
?>		
</body>
</html>