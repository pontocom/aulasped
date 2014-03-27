<?php

	$aarr = array('Antunes', 'Beatriz');
	$arr = array('Carlos', 'Pedro', 'Antunes', $aarr, 10 => 'Joao', 'Joana');

	print_r($arr);

	echo $arr[3][1]; // Beatriz

	echo "<br>";

	echo json_encode($arr);

	echo '<br>';

	echo serialize($arr);

?>