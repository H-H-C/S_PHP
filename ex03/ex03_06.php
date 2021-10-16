<?php
?>

<html>
<head>
<title></title>
</head>
<body>
<?php 
	$Array = 
	[
			-6 => 10,
			'a' => 'abc',
			0 => '#20',
			2 => 2,
			'10.5' => '-15',
			'5a' => '+15',
			11 => '12b'
	];
	foreach ($Array as $key => $value)
	{
		echo "$key:$value<br>";
	}
?>
</body>
</html>