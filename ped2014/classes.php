<?php
/**
 * Created by PhpStorm.
 * User: carlosserrao
 * Date: 21/03/14
 * Time: 21:31
 */

class foo
{
    var $myvar = 3;

    function foobar()
    {
        return $this->myvar;
    }
}

$obj = new foo();
echo $obj->foobar();

echo __FILE__;

?>