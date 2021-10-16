<?php
?>

<html>
<head>
<title></title>
</head>
<body>
<?php 
	$su = [];
	
	for ($i = 0; $i < 100; $i++)
	{
		$su[] = rand(1, 50);
		echo $su[$i]. ' ';
		if($i % 10 == 9)
		{
			echo '<br>';
		}
	}
	echo '-------------------------------------';
	echo '-----------------------';
	echo '<br>';
	for ($j = 1; $j <= 50; $j++)
	{
		$cnt = 0;
		foreach ($su as $value)
		{
			if ($value == $j)
			{
				$cnt++;
			}
		}
		echo "$j:$cnt ";
		if ($j % 10 == 0)
		{
			echo '<br>';
		}
	}
?>
</body>
</html>