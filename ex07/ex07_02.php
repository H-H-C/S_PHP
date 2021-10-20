<?php

$weekday_tbl = 
[
  1 => "月", "火", "水", "木", "金", "土", "日"
];

//POSTリクエスト//
if ($_SERVER['REQUEST_METHOD'] == "POST")
{
  //年月日
  $year = $_POST['year'];
  $month = $_POST['month'];
  $day = $_POST['day'];
  //タイムゾーン設定
  date_default_timezone_set('Asia/Tokyo');
	// 指定・年月日の曜日表示
  $tm = mktime(0, 0, 0, $month, $day, $year);
  $msg = date("Y年m月d日は、".$weekday_tbl[date("N", $tm)]."曜日です", $tm);
}
//GETリクエスト
else 
{
  $msg = 'htmlから入力してください';
}
// HTML特殊文字変換
$msg = htmlspecialchars($msg, ENT_QUOTES);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>ex07_02.php</title>
<style>
<!--
	#err {color:red;}
-->
</style>
</head>
<body>
<h1>曜日計算</h1>
	<div>
		<?= $msg ?>
	</div>
</body>
</html>
