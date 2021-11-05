<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>
    <?php 
    
      //セッション開始
      session_start();

      //セッション：現在時刻
      $_SESSION['time'] = time();

      //セッション：セッションID
      $_SESSION['session_id'] = session_id();

      //リダイレクト:セッション情報表示画面
      header('Location: ex11_02.php');

      //終了
      exit;

    ?>
  </title>
</head>
<body>
  
</body>
</html>