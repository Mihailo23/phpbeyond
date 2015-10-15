<html>
	<head>
		<title>Dates and times UNIX</title>
	</head>
	<body>
	<?php 
		echo time();
		echo '<br>';
		echo mktime(2, 30, 45, 10, 1, 2009);
		echo '<br>';
		// check date
		echo checkdate(12, 31, 2000) ? 'true' : 'false';
		echo '<br>';
		echo checkdate(2, 31, 2000) ? 'true' : 'false';
		echo '<br>';

		$unix_timestamp = strtotime('now');
		echo $unix_timestamp . '<br>';
	?>
	</body>
</html>