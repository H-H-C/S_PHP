<?php
//変数宣言
$msg = '';
$errmsg = [];

//自作h関数
function h($item)
{
  return htmlspecialchars($item, ENT_QUOTES);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
  $dirname = h($_POST['dirname']);
  //入力チェック
  if ($dirname === '')
  {
    //入力がなければ
    $errmsg[] = 'フォルダ名が入力されていません';
  }
  //入力があれば
  else
  {
    //フォルダチェック
    $ok = is_dir($dirname);
    //フォルダがあれば
    if ($ok)
    {
      //フォルダを削除する
      $cd = getcwd();
      rmdir($dirname);
      $msg =  $cd . ' フォルダを削除しました';
    }
    //フォルダがなければ
    else
    {
      $errmsg[] = $dirname . 'がありません';
    }
  }
}
//GETできたら
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
  <title>ディレクトリ</title>
</head>

<body>
  <h1>フォルダ削除</h1>
  <?php
  foreach ($errmsg as $val)
  {
    echo $val . '<br />';
  }
  if (!count($errmsg))
  {
    echo $msg;
  }
  ?>
</body>

</html>