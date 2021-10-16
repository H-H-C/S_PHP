<?php
/*
 演習5-4
 Author:Ishii
 */
?>

<?php
	$bmi_tbl	= array("やせ" => 18.5, "標準" => 25, "肥満" => 30, "高度肥満" => 99999);
	$errmsg		= array();			// エラーメッセージ配列
	$pflg		= 0;				// POSTフラグ
	$name		= "";				// 氏名
	$taiju		= "";				// 体重
	$sintyo		= "";				// 身長
	
	//===== ポスト：リクエスト処理  =====
	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$pflg = 1;			// POSTフラグ：ON

		//----- 入力チェック -----
		// 氏名
		$name = $_POST["namae"];
		if (strlen($name) == 0)
		{
			$errmsg[] = "名前が入力されていません";
		}
		// 体重
		$taiju = htmlspecialchars($_POST["taiju"], ENT_QUOTES);
		if (strlen($taiju) == 0)
		{
			$errmsg[$taiju] = "体重が入力されていません";
		}
		elseif (!is_numeric($taiju) || 0 >= $taiju)
		{
			$errmsg[] = "正しく体重を入力してください";
		}
		// 身長
		$sintyo = htmlspecialchars($_POST["sintyo"], ENT_QUOTES);
		if (strlen($sintyo) == 0)
		{
			$errmsg[] = "身長が入力されていません";
		}
		elseif (!is_numeric($sintyo) || 0 >= $sintyo)
		{
			$errmsg[] = "正しく身長を入力してください";
		}
	}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<style type="text/css">
<!--
	#err {color:red;}	
-->
</style>
<title>ex05_04.php</title>
</head>
<body>
<h1>ＢＭＩ判定</h1>
<?php 
	// 初回（GET）又は エラー有り（POST)
	if($pflg == 0 || count($errmsg) > 0)
	{
		// エラーメッセージ表示
		if(count($errmsg) > 0)
		{
			echo "<div id=\"err\">";
			foreach($errmsg as $val)
			{
				echo $val, "<br />";
			}
			echo "</div>";
			echo "<br />";
		}
?>
<form action="<?= $_SERVER["PHP_SELF"] ?>" method="post">
	<div>氏名<input type="text" name="namae" value="<?= $name ?>" size="10" /></div>
	<br />
	<div>体重<input type="text" name="taiju" value="<?= $taiju ?>" size="3" /></div>
	<br />
	<div>身長<input type="text" name="sintyo" value="<?= $sintyo ?>" size="3" /></div>
	<br />
	<div><input type="submit" value="送信" /></div>
</form>
<?php
	}
	else
	{
		// エラー無し：結果表示 
		$bmi = $taiju * 10000 / ($sintyo * $sintyo);
		foreach($bmi_tbl as $key => $val)
		{
			if ($bmi < $val)
			{
				$bmi_msg = $key;
				break;
			}
		}
?>
	<div>
		<?= $name ?>さんのBMIは、 <?= $bmi ?> で 「<?= $bmi_msg ?>」 です。<br />
	</div>
<?php
	}
?>
</body>
</html>
