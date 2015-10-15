<html>
	<head>
		<title>References as function arguments</title>
	</head>
	<body>
	
	<?php 

	function ref_test(&$var){
		$var = $var * 2;
	}
	$a = 10;
	ref_test($a);
	echo $a . '<br>';
	ref_test($a);
	echo $a . '<br>';
	ref_test($a);
	echo $a . '<br>';

	?>

	</body>
</html>