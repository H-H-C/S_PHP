<?php
?>

<html>
<head>
<title></title>
</head>
<body>
	<?php 
		
		$num1  = (htmlspecialchars($_POST['num1'], ENT_QUOTES));
		$num2  = (htmlspecialchars($_POST['num2'], ENT_QUOTES));
		$enzan = (htmlspecialchars($_POST['enzan'], ENT_QUOTES));
		
			if (is_numeric($num1) && is_numeric($num2))
			{
				switch($enzan)
				{
					case "+":
						$ans = $num1 + $num2;
						break;
					case "-":
						$ans = $num1 - $num2;
						break;
					case "*":
						$ans = $num1 * $num2;
						break;
					case '/':
						$ans = $num1 / $num2;
						break;
					case "%":
						$ans = $num1 % $num2;
						break;
				}
				
			}
			if(isset($ans))
			{
				echo "$num1$enzan$num2=$ans";
			}
			else
			{
				echo '正しく入力してください';
			}
	?>
</body>
</html>