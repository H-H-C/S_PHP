<?php
/*-----------------------------
	演習13-1 Author : 
 ------------------------------*/
$errmsg    = array();          // エラーメッセージ害列
$filename = 'ex13_01.txt';  //ファイルネーム
$data    = "";            // 読み込みデータ
$msg    = "";            // 処理結果

// ファイル：オープン：読込(r)モード
if (($fp = fopen($filename, "r")) === FALSE)
{
  $errmsg[] = $filename . " モード：r オープン（open） エラー";
}
else
{
  // ファイル：読込ループ
  while (!feof($fp))
  {
    // ファイル：行読込（ホワイトスペース・改行コード削除）
    $data = rtrim(fgets($fp));
    $msg .= htmlspecialchars($data, ENT_QUOTES) . "<br />";
  }
  // ファイル：クローズ
  fclose($fp);
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <title>ex13_01.php</title>
  <style>
    <!--
    #err {
      color: red;
    }
    -->
  </style>
</head>

<body>
  <h1>ファイル読込：行読込</h1>
  <div id="err">
    <?php
    // エラーメッセージ表示
    foreach ($errmsg as $val)
    {
      echo $val, "<br />";
    }
    if (count($errmsg))
    {
      echo "<br />";
    }
    ?>
  </div>
  <div>
    <?= $msg ?>
  </div>
</body>

</html>