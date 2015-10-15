<html>
	<head>
		<title>Array functions</title>
	</head>
	<body>
	<?php 
		$numbers = array(1,2,3,4,5,6);
		print_r($numbers);
		echo '<br><br>';

		$a = array_shift($numbers); // shifts first element of an array and returns it
		echo 'a:' . $a . '<br>';
		print_r($numbers);
		echo '<br><br>';

		$b = array_unshift($numbers, 'first'); // prepends an element to an array, returns elements count 
		echo 'b:' . $b . '<br>';
		print_r($numbers);
		echo '<br><br>';

		$a = array_pop($numbers); // pops last element out of an array and returns it 
		echo 'a:' . $a . '<br>';
		print_r($numbers);
		echo '<br><br>';

		$b = array_push($numbers, 'last'); // pushes the element onto the end of an array, returns elements count 
		echo 'b:' . $b . '<br>';
		print_r($numbers);
		echo '<br><br>';
	?>
	</body>
</html>