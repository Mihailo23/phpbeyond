<?php 

class Person {
	function say_hello() {
		echo "hello from inside a class";
	}
}

$methods = get_class_methods('Person');

foreach($methods as $method) {
	echo $method . "<br>";
}

if(method_exists('Person', 'say_hello')) {
	echo "exists";
} else {
	echo "does not exist";
}

?>