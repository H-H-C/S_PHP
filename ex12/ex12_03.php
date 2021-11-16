<?php

//自作h関数
function h($item)
{
  return htmlspecialchars($item, ENT_QUOTES);
}

//変数宣言
$errmsg = [];   //エラーメッセージを配列に格納していく
$pflg = 0;
$hankei = "";
$tyokei    = "";      // 直径
$ensyu    = "";      // 円周
$menseki  = "";      // 面積:
$post = $_SERVER['REQUEST_METHOD'] === 'POST';

//post処理
if ($post)
{
  $pflg = 1;
  $hankei = h($_POST['hankei']);
  if ($hankei === "" || !is_numeric($hankei))
  {
    $errmsg[] = '値が正しく入力されていません';
  }
  else if (!count($errmsg))
  {
    //円の計算
    list($tyokei, $ensyu, $menseki) = en($hankei);
  }
}
//自作関数 円計算
function en($hankei)
{
  return array($hankei * 2, $hankei * 2 * PI(), $hankei * $hankei * PI());
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>12_03</title>
</head>

<body>
  <h1>円計算</h1>
  <!-- エラーメッセージ処理 -->
  <?php
  foreach ($errmsg as $val)
  {
    echo $val . '<br />';
  }
  ?>

  <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
    <div>
      <label for="hankei">半径：</label>
      <input type="text" name="hankei" value="<?= $hankei ?>" size="4">
      <input type="submit" value="計算">
    </div>
  </form>

  <!-- 検索結果 -->
  <?php
  if ($pflg == 1 && !count($errmsg))
  {
    //全部が通ったら最終処理出力
    echo "<div>\n";
		echo "半径:$hankei<br/>";
		echo "直径:$tyokei<br/>";
		echo "円周:$ensyu<br/>";
		echo "面積:$menseki<br/>";
		echo "</div>\n";
  }
  ?>
</body>

</html>