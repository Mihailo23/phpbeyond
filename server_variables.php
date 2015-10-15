<html>
	<head>
		<title>Server Variables</title>
	</head>
	<body>
	<?php 
	echo 'SERVER_NAME:' . $_SERVER['SERVER_NAME'] . '<br>';
	echo 'SERVER_ADDR:' . $_SERVER['SERVER_ADDR'] . '<br>';
	echo 'SERVER_PORT:' . $_SERVER['SERVER_PORT'] . '<br>';
	echo 'DOCUMENT_ROOT:' . $_SERVER['DOCUMENT_ROOT'] . '<br>';
	echo '<br>';
	echo '<pre>';
	print_r($_SERVER);
	echo '</pre>';
	?>
	</body>
</html>