<?php
?>

<html>
<head>
<title></title>
</head>
<body>
<?php 
while (true)
{
	if (stripos($_SERVER['HTTP_USER_AGENT'], 'Firefox') !== FALSE)
	{
		echo 'あなたのブラウザはFirefoxです';
		break;
	}
	if (stripos($_SERVER['HTTP_USER_AGENT'], 'Chrome') !== FALSE)
	{
		echo 'あなたのブラウザはChromeです';
		break;
	}
}
echo '<br/>';
echo $_SERVER['HTTP_USER_AGENT'];
?>
</body>
</html>