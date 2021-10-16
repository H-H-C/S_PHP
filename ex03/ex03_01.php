<?php
?>

<html>
<head>
<title></title>
</head>
<body>
<?php 
	$ary = 
	[
			'越' => 'ベトナム',
			'正' => 'スリランカ',
			'緬' => 'ミャンマー',
			'比' => 'フィリピン',
			'尼' => 'インドネシア',
			'蒙' => 'モンゴル',
			'老' => 'ラオス',
			'泰' => 'タイ',
			'馬' => 'マレーシア'
	];
	foreach ($ary as $key => $country)
	{
		echo "[$key]:$country";
		echo '<br />';
	}
?>
</body>
</html>