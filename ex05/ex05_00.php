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
</body>
</html>