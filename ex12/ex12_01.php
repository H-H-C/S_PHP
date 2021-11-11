<?php

//自作関数
function h($item)
{
  return htmlspecialchars($item, ENT_QUOTES);
}

//変数宣言
$nen = ['平年', 'うるう年'];
$errmsg = [];

//post処理
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
  $year = h($_POST['year']);

  if (!strlen($year) || !is_numeric($year))
  {
    $errmsg[] = '値が正しく入力されていません';
  }
}
//get処理
else    //get処理
{
  $errmsg[] = 'htmlから入力てください';
}

//うるう年チェック関数
function uru($yy)
{
  $chk_time = mktime(0, 0, 0, 3, 0, $yy);
  //うるう年チェック
  return date("j", $chk_time) == 29;
}

if (count($errmsg))
{
  foreach ($errmsg as $val)
  {
    echo $val . "<br />";
  }
}
else
{
  echo $year . "年は" . $nen[(int)uru($year)] . "です";
}
?>

<!-- <!DOCTYPE html>
<html lang="ja">

<\