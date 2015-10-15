<html>
	<head>
		<title>Reference assignment</title>
	</head>
	<body>
	
	<?php 

	$a = 1;
	$b = $a;
	$b = 2;
	echo 'a:' . $a . ', b:' . $b . '<br>';
	// a:1, b:2

	$a = 1;
	$b =& $a; // reference
	$b = 2;
	echo 'a:' . $a . ', b:' . $b . '<br>';
	// a:2, b:2

	unset($b);
	echo 'a:' . $a . ', b:' . $b . '<br>';

	?>

	</body>
</html>