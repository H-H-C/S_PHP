<?php
?>

<html>
<head>
<title></title>
</head>
<body>
<?php 
	$max = 0;
	$total = 0;
	
	for ($i = 1; $i <= 10; $i++)
	{
		$su = rand(1, 100);
		echo $su . " ";
		$total += $su;
		if ($max < $su)
		{
			$max = $su;
		}
	}
	echo '<br />';
	echo "合計は、${total}です";
	echo '<br />';
	echo "最大値は、${max}です";
?>
</body>
</html>