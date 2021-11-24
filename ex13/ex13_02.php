<?php
$errmsg = [];   //エラーメッセージ
$filename = 'data/ex13_01.txt'; //ファイル名
$data = '';   //読み込みファイル
$msg = '';    //処理結果


//ファイル：オープン（読み込みrモード）
if (($fp = @fopen($filename, 'r')) === FALSE)
{
  $errmsg[] = $filename . 'モード：rオープンエラー';  //読み込み権限がなかったら
}
else
{
  while (($c = fgetc($fp)) !== FALSE)
  {
    // 改行文字（コード）判断
    if ($c === "\n")
    {
      // 改行
      $msg .= "<br />";
    }
    else
    {
      // 改行以外
      $msg .= $c;
    }
  }
  //ファイルクローズ
  fclose($fp);
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ex13_02</title>
</head>

<body>
  <h1>ファイル読み込み</h1>
  <?php
  foreach ($errmsg as $val)
  {
    echo $val . '<br />';
  }
  if (count($errmsg))
  {
    echo "<br />";
  }
  ?>

  <?= $msg ?>
</body>

</html>