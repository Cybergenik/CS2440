<?php

$test_string = "   Hello     World!   ";
var_dump($test_string);
$test_string = str_replace(' ', '', $test_string); 
var_dump($test_string);

?>