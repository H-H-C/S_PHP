<!-- 開始 -->
<?php
//変数宣言
$errmsg = [];
$post = $_SERVER['REQUEST_METHOD'];

//自作h関数
function h($item)
{
  return htmlspecialchars($item, ENT_QUOTES);
}

//post処理
if ($post === 'POST')
{
  $month = h($_POST['month']);
  //リストボックスが選択されてるかのチェック
  if (!isset($month))
  {
    $errmsg[] = '月が選択されていません';
  }
}
else  //get処理
{
  $errmsg[] = 'htmlから入力してください';
}

//月チェック関数
function kisetu($month)
{
  switch ($month)
  {
    case 12:
    case 1:
    case 2:
      return '冬';

    case 3:
    case 4:
    case 5:
      return '春';

    case 6:
    case 7:
    case 8:
      return '夏';

    default:
      return '秋';
  }
}
?>

<?php
//エラーメッセージ
foreach ($errmsg as $val)
{
  echo $val . '<br />';
}
if (!count($errmsg))
{
  echo $month . '月は' . kisetu($month) . 'です';
}
?>