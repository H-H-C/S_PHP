<?php
//変数宣言
$errmsg = [];
$msg = '';
$dirname = '';
//自作h関数
function h($item)
{
  return htmlspecialchars($item, ENT_QUOTES);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST')  //POST処理
{
  //入力チェック  
  $dirname = h($_POST['dirname']);
  if (!strlen($dirname))
  {
    //入力が空なら
    $errmsg[] = 'フォルダ名が入力されていません';
  }
  //フォルダ作成
  if (!count($errmsg))
  {
    //ディレクトリ作成
    if (file_exists($dirname) === FALSE)
    {
      var_dump($dirname);
      mkdir($dirname);
      $msg .= " フォルダを作成しました";
    }
    else
    {
      $errmsg[] = 'フォルダが作成できませんでした';
    }
  }
}
else  //GETできたとき
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
  <title>ディレクトリ</title>
</head>

<body>
  <h1>フォルダ作成</h1>
  <?php   //エラーがあれば
  foreach ($errmsg as $val)
  {
    echo $val . '<br />';
  }
  ?>
  <?php   //エラーがなければ
  if (!count($errmsg))
  {
    echo $msg;
  }
  ?>
</body>

</html>