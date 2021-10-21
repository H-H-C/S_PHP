<?php
/*
 演習7-3  Author:Ishii
 */
// 曜日配列
$weekday_tbl	= array(1 => "月", "火", "水", "木", "金", "土", "日");

$errmsg	= array();		// エラーメッセじ配列
$pflg	= 0;			// POSTフラグ
$month	= "";			// 月
$day	= "";			// 日

//===== POST：リクエスト処理  =====
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	$pflg = 1;
	// 月チェック
	$month = $_POST["month"];
	if (strlen($month) == 0)
	{
		$errmsg[] = "月が入力されていません";
	}
	elseif (!is_numeric($month))
	{
		$errmsg[] = "月を正しく入力してください";
	}
	// 日チェック
	$day = $_POST["day"];
	if (strlen($day) == 0)
	{
		$errmsg[] = "日が入力されていません";
	}
	elseif (!is_numeric($day))
	{
		$errmsg[] = "日を正しく入力してください";
	}
	// 誕生日の曜日表示
	if (!count($errmsg))
	{
		// 月・日チェック  ※2月29日をOKにする：2008年 --> 閏年（北京オリンピック）
		if (!checkdate($month, $day, 2008))
		{
			$errmsg[] = "月日を正しく入力してください";
		}
		else
		{
			// 2月29日 ---> 3月1日
			if($month == "2" && $day == "29")
			{
				$month	= "3";
				$day	= "1";
			}
			$msg = "";
			// タイムゾーン設定
			date_default_timezone_set('Asia/Tokyo');
			// 現在の年・月・日
			$tm = time();
			$yy = date("Y", $tm);
			// 今年の誕生日経過チェック
			if (mktime(0, 0, 0, $month, $day, $yy) < $tm)
			{
				// 今年の誕生日経過：年更新
				$yy++;
			}
			// ５回の誕生日・曜日表示
			for($i = 0; $i < 5; $i++)
			{
				$tm		 = mktime(0, 0, 0, $month, $day, $yy + $i);
				$work	 = ($i + 1) . "回目：". date("Y/m/d", $tm) . "(". $weekday_tbl[date("N", $tm)]. ")";
				// HTML特殊文字変換
				$msg	.=  htmlspecialchars($work, ENT_QUOTES);
				$msg	.= "<br />";
			}
		}
	}
	// HTML特殊文字変換
	$month	= htmlspecialchars($_POST["month"], ENT_QUOTES);
	$day	= htmlspecialchars($_POST["day"], ENT_QUOTES);
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>ex07_03.php</title>
<style>
<!--
	#err {color:red;}
-->
</style>
</head>
<body>
<h1>５年間の誕生日の曜日</h1>
<div id="err">
<?php
	// エラーメッセージ表示
	foreach($errmsg as $val)
	{
		echo $val, "<br />";
	}
?>
</div>
<?php
	// 初回とエラー時の画面
	if($pflg == 0 || count($errmsg) > 0)
	{
?>
<form action="<?= $_SERVER["SCRIPT_NAME"] ?>" method="post">
	<div>
		誕生日：
		<input type="text" name="month" value="<?= $month ?>" size="2" />月
		<input type="text" name="day" value="<?= $day ?>" size="2" />日
		<br /><br/>
		<input type="submit" value="送信" />
	</div>
</form>
<?php
	}
	// エラーなし画面
	else
	{
		echo $msg;
	}
?>
</body>
</html>
