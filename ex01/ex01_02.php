<?php
?>

<html>
<head>
<title></title>
</head>
<body>

<?php 
	$a = 1234;
	$b = 23.4;
	
	echo $a + $b . '<br />';
	echo $a - $b . '<br />';;
	echo $a * $b . '<br />';
	echo $a / $b . '<br />';
	echo $a % $b . '<br/>';
?>

<?php 
	$a = '1234AB';
	$b = '23CD';
	
	echo (int)$a + (int)$b . '<br />';
	echo (int)$a - (int)$b . '<br />';;
	echo (int)$a * (int)$b . '<br />';
	echo (int)$a / (int)$b . '<br />';
	echo (int)$a % (int)$b . '<br />';
?>
</body>
</html>