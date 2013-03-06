<?
	function lb($lines=1)
	{
		for($n=0;$n<$lines;$n++)
			echo "<br>";
	}

	$a = array(3 => 1, "xpto" => 2, 3, array(1, 2, "qqcoisa"));
	print_r($a);
	
	
	foreach ($a as $valor)
	{
		echo $valor;
		lb();
	}
	
	
	lb(5);
	
	var_dump($a);
	
	lb();

	echo $a[0];

	lb();
	
	
	define("MYCONSTANTE", 2);
	
	echo MYCONSTANTE;
	
	lb();
	echo __LINE__;
	lb();
	echo __FILE__;
	
?>