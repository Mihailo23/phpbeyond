<?php 

class Person {
	function say_hello() {
		echo "hello from inside the class " . get_class($this) . "<br>";
	}

	function hello()
	{
		$this->say_hello();
	}
}

$person = new Person();

$person->say_hello();
$person->hello();


?> 