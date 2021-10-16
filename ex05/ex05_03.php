<?php
?>

<html>
<head>
<title></title>
</head>
<body>

<?php 
	$bmiErr = 
	[
		'やせ' => 18.5, 
		'標準' => 25, 
		'肥満' => 30, 
		'高度肥満' => 100
	];
	
	$err = [];
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$name = htmlspecialchars($_POST['name'], ENT_QUOTES);
		if (strlem($name) == 0)
		{
			$err[] =  '名前が入力されていません';
		} 
		$weight = htmlspecialchars($_POST['weight'], ENT_QUOTES);
		if (strlen($weight) == 0) 
		{
			$err[] = '体重が入力されていません';
		}
		else if (!is_numeric($weight) || $weight <= 0)
		{
			$err[] = '正しく体重を入力してください';
		}
		$height = htmlspecialchars($_POST['height'], ENT_QUOTES);
		if (strlen($height) == 0) 
		{
			$err[] = '身長が入力されていません';
		}
		else if (!is_numeric($height) || $height <= 0)
		{
			$err[] = '正しく身長を入力してください';
		}
	}
	
	<form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
	<div>
	氏名:<input type="text" name="name" value=""><br>
	体重:<input type="text" name="weight" value=""><br>
	身長:<input type="text" name="height" value=""><br>
	<input type="submit" value="送信">
	</div>
	</form>
	
?>

</body>
</html>