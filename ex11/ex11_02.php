
<?php
//セッション開始
  session_start();

  $errmsg = []; //エラーメッセージ
  $pflg = 0;  //POSTフラグ

  //自作関数
  function h($item)
  {
    return htmlspecialchars($item, ENT_QUOTES);
  }

  //POSTリクエスト
  if ($_SERVER['REQUEST_METHOD'] == 'post')
  {
    //POSTフラグON
    $pflg = 1;
    //全セッション変数削除
    $_SESSION = [];
    //クッキーのセッションキー削除（無効）
    if(isset($_COOKIE[session_name()]))
    {
      setcookie(session_name(), '', time()-42000, '/');
    }
    session_destroy();
    $msg = '切断しました';
  }
	//===== 初期（GET）：リクエスト処理  =====
  else 
  {
    //セッション情報の編集
    $msg = '';
    //セッション情報取得ループ
    foreach($_SESSION as $key => $val)
    {
      //セッション「変数」値
      $msg .= "[$key] $val<br/>";
    }
    //セッションIDの編集
    if (isset($_COOKIE[session_name()]))
    {
      $ses_name = $_COOKIE[session_name()];
    }
    else 
    {
      $ses_name = '';
    }
    $msg .= 'h＝クッキーのセッションID: ' . $ses_name;
  }
?>




<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ex11_02</title>
</head>
<body>
  <h1>セッション変数表示</h1>
  <?php
    foreach($errmsg as $val) 
    {
      echo $val . '<br />';
    }
  ?>
<?php
	// セッション情報表示
	echo $msg;
	// 初期（GET）リクエスト画面作成
	if(!$pflg)
	{
?>
<form action="<?= $_SERVER["SCRIPT_NAME"] ?>" method="post">
	<div>
		<br />
		<input type="submit" name="btn" value="切断" />　
		<input type="hidden" name="zzz" value="<?php time(); ?>" />　
	</div>
</form>
<?php
	}
 ?>
</body>
</html>