<?php 

class Person {
	function say_hello() {
		echo "hello from inside a class<br>";
	}
}

$person = new Person(); // instanciranje klase
$person2 = new Person();

echo get_class($person) . "<br>";

if (is_a($person, 'Person')) {
	echo "It's a person<br>";
} else {
	echo "It's not a person<br>";
}

$person->say_hello();

?> 