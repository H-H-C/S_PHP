
<html>
<head>
<title></title>
</head>
<body>
<?php 
	$a = rand(1, 100);
	$b = rand(1, 100);
	$c = $a - $b;
	
	if ($c <= -50)
	{
		echo "$a + $b =  " . $a + $b;
	}
	else if ($c <= 0)
	{
		echo "$a * $b =  " . $a * $b;
	}
	else if ($c <= 50)
	{
		echo "$a - $b =  " . $a - $b;
	}
	else 
	{
		echo "$a / $b =  " . $a / $b;
	}
?>
</body>
</html>