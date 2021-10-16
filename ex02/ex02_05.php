<?php
?>

<html>
<head>
<title></title>
</head>
<body>

<table border>
	<tr>
		<th>×</th>
		<?php 
		for($i = 11; $i < 20; $i++)
		{ ?>
		<th>
		<?php 
			echo $i; 
		?>
		</th>
		<?php 
			} 
		?>
	</tr>
	
	<?php 
		for($i = 11; $i < 20; $i++)
		{ 
	?>
	<tr>
		<th><?php echo $i; ?></th>
		<?php 
			for($j = 11; $j < 20; $j++)
			{ 
		?>
		<td>
		<?php 
			echo $i * $j; 
		?>
		</td>
		<?php 
			}
		?>
	</tr>
	<?php 
		} 
	?>

</body>
</html>