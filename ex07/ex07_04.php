
<?php

  $locale_table = 
  [	
    'イースター島'	=> 'Pacific/Easter',
    'モルディブ'	  => 'Indian/Maldives',
    'ローマ'		    => 'Europe/Rome',
    'モスクワ'		  => 'Europe/Moscow',
    'シドニー'		  => 'Australia/Sydney',
    'シンガポール'	=> 'Asia/Singapore',
    '平壌'		      => 'Asia/Pyongyang'
  ];
  $locale_japan = "日本";
  $time_zone_base = [$locale_japan => 'Asia/Tokyo'];
  $errmsg	= [];	// エラーメッセージ配列
	$pflg	= 0;		// POSTフラグ

//POST処理
if ($_SERVER['REQUEST_METHOD'] == "POST")
{
  $pflg = 1;
  //時刻のセット
  date_default_timezone_set($time_zone_base[$locale_japan]);
  $tm = time();
  $work = $locale_japan . ':' . date('y/m/d A h:i:s', $tm);
  // HTML特殊文字変換
  $msg	= htmlspecialchars($work, ENT_QUOTES) . '<br />';
  if (isset($_POST['locale']))
  {
    // 選択地域の現在時刻表示
    foreach($_POST['locale'] as $val)
    {
      date_default_timezone_set($locale_table[$val]);
      $work	 = $val . '：' . date("Y/m/d A h:i:s", $tm);
      // HTML特殊文字変換
      $msg	.= htmlspecialchars($work, ENT_QUOTES) . '<br />';
    }
  }
}
//GET処理
else 
{
  //チェックボックス作成
  $form_locale = '';
  foreach ($locale_table as $key => $val)
  {
    $form_locale .= '<input type="checkbox" name="locale[]" value="'.$key.'" />'.$key."<br />";
  }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ex07_04</title>
</head>
<body>
<h1>各地域の時刻表示</h1>
<?php
	// エラーメッセージ表示
	foreach($errmsg as $val)
	{
		echo $val, "<br />";
	}
?>
</div>
<?php
	// GET：地域選択「checkbox」の表示
	if (!$pflg)
	{
?>
<form action="<?= $_SERVER['SCRIPT_NAME'] ?>" method="post">
	<div>
		時刻を表示したい地域：<br />
		<?= $form_locale ?>
		<br/><input type="submit" name="btn" value="送信" />
	</div>
</form>
<?php
	}
	// POST：処理結果（地域別日時）の表示
	else
	{
		echo $msg;
	}
?>
</body>
</html>
