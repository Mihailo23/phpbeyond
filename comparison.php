<?php

class Box {
	public $name = "box";
}

$box = new Box();
$box_reference = $box;
$box_clone = clone $box;

$box_changed = clone $box;
$box_changed->name = "changed box";

$another_box = new Box();

// == proverava samo da li su atributi isti
// SVE JASNO!!!
?>