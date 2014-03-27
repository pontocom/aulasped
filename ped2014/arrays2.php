<?php
/**
 * Created by PhpStorm.
 * User: carlosserrao
 * Date: 21/03/14
 * Time: 21:25
 */

    $arr2 = array('Elisabete', 'Antunes');

    $arr = array('Carlos', 'Pedro', 'Joana', 3, 4, 10 => $arr2);

    print_r($arr);

    //var_dump($arr);

    echo json_encode($arr);

    echo serialize($arr);

?>