<?php
/**
 * Created by JetBrains PhpStorm.
 * User: carlosserrao
 * Date: 3/6/13
 * Time: 1:09 AM
 * To change this template use File | Settings | File Templates.
 */
class User
{
    protected $id;
    protected $username;
    protected $password;

    function __construct()
    {

    }

    function __destruct()
    {

    }

    public function newUser($id, $username, $password)
    {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getUsername()
    {
        return $this->username;
    }
}
