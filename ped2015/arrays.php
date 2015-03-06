<?php
/**
 * Created by PhpStorm.
 * User: cserrao
 * Date: 06/03/15
 * Time: 11:33
 */

$outro = array('carlos', 'eu');
$meuarray = array(5=>1,"wtf"=>"xpto",$outro,4,5,6,array('ped', '2015'));

print_r($meuarray);

echo $outro[0];

echo $meuarray["wtf"];

echo $meuarray[10][1];


?>