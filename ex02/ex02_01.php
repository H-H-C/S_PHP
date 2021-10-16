<?php
?>

<html>
<head>
<title></title>
</head>
<body>

<?php 
	$a = rand(1, 10);
	if($a <= 5)
	{
		echo $a . 'は5以上です';
	}
	else 
	{
		echo $a . 'は5以上ではありません';
	}
	echo 'aaa';
?>
</body>
</html>