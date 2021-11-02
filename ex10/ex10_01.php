
<?php
  $errmsg = [];

  //自作関数
  function h($item)
  {
    return htmlspecialchars($item, ENT_QUOTES);
  }

  
  //POSTリクエスト
  if ($_SERVER['REQUEST_METHOD'] == 'POST') 
  {
    //関数宣言
    $nick = h($_POST['nick']);
    // $nick = htmlspecialchars($_POST["nick"], ENT_QUOTES);

		if(!strlen($nick))
    {
      $errmsg[] = '値が入力されていません';
    }
    else
		{
			// クッキー保存：ニックネーム
			setcookie("ex10_01[nick]", $nick, time() + 3 * 60);
		}
  }
  else  //GETなら
  {
    $errmsg[] = 'htmlから入力してください';
  }
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ex10_01</title>
</head>
<body>
<h1>クッキー保存</h1>
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
	if(!count($errmsg))
	{
		echo "ニックネームを保存しました";
	}
?>
</body>
</html>