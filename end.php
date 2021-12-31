<?php

error_reporting(0);

$postingvalue=$_POST['val'];


$val= file_get_contents("Hiox.txt");

$array=(explode("\n",$val));

$result = preg_grep("/^$postingvalue/i", $array);


json_encode($result);

$string=implode("#",$result);

$output= explode("#",$string);

echo json_encode($output);

?>


