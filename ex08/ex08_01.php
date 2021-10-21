<?php
  $pflg = 0;
  $errmsg = [];
  //POST リクエスト
  if ($_SERVER['REQUEST_METHOD'] == 'POST')
  {
    $pflg = 1;
    $int = htmlspecialchars($_POST['int'], ENT_QUOTES);
    if (!strlen($int) || !is_numeric($int) || strpos($int, '.') !== FALSE)
    {
      $errmsg[] = '整数を入力してください';
    }
  }
  //GET リクエスト
  else 
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
  <title>ex08_01</title>
</head>
<body>
<h1>２進数・８進数・１６進数 表示</h1>
<?php 
  //エラーメッセージの表示
  foreach ($errmsg as $val) 
  {
    echo $val . "<br>";
  }
?>
<?php 
  if (!count($errmsg))
  {
    $work = sprintf("%dは、２進数では %b、８進数では %o、１６進数では %x です。", $int, $int, $int, $int);
		// HTMLのエンティティ（エスケープ）処理
		$msg = htmlspecialchars($work, ENT_QUOTES);
		echo $msg;
  }
?>
</body>
</html>