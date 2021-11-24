<?php
$dir = 'data';
$ok = @chdir($dir);
$msg = '';
$errmsg = [];

if ($ok === true)
{
  $msg = getcwd();
}
else
{
  $errmsg[] = 'エラーです';
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ディレクトリ操作</title>
</head>

<body>
  <h1>カレントディレクトリ表示</h1>
  <?php foreach ($errmsg as $val)
  {
    echo $val . '<br />';
  }
  ?>
  <?= $msg ?>
</body>

</html>