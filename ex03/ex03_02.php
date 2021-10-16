<?php
?>

<html>
<head>
<title></title>
</head>
<body>
<?php 
$su = array();
for($i = 0; $i < 10; $i++)
{
	echo ($su[] = rand(0, 100))." ";
}
do
{
	$kijun = rand(0, 100);
	echo "<br />基準{$kijun}より大きい値は、";
	
	foreach($su as $val)
	{
		if ($val > $kijun)
			echo "$val ";
	}
}while($kijun > 10);
?>
</body>
</html>