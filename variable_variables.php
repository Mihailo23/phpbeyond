<html>
	<head>
		<title>Variable variables</title>
	</head>
	<body>
	<?php 
		$a = "hello";
		$hello = "Hello svima!";
		echo $$a; // ispisuje $(sadrzaj $a), tj. $hello, tj. Hello svima! 
		
		// Sta znaci $$var[1]:
		// #1 nadji prvi element, pa onda odredi vrednost dinamicki
		// #2 odredi vrednosti dinamicki, pa uzmi prvi element

		// Da se ne bi zbunjivali, koristimo {}
		// echo ${$var[1]} za #1
		// echo ${$var}[1] za #2
	?>
	</body>
</html>