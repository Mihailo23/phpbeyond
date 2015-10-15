<html>
	<head>
		<title>Dates and times format</title>
	</head>
	<body>
	<?php 
		$timestamp = mktime(2,2,2,2,2,2000);

		function strip_zeros_from_time($not_formated = '') {
			$no_zeros = str_replace('*0', '', $not_formated);
			$cleared_string = str_replace('*', '', $no_zeros);
			return $cleared_string;
		}

		echo strip_zeros_from_time(strftime('The time is *%m/*%d/%y', $timestamp));

		echo '<hr>';

		$dt = time();
		$mysql_date = strftime("%Y-%m-%d %H:%M:%S", $dt);
		echo $mysql_date;
	?>
	</body>
</html>