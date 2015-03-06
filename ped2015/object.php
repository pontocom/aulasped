<?php
class User {
    protected $username;
    protected $password;

    function __construct($username, $password) {
        $this->username = $username;
        $this->password = $password;
    }

    function printData() {
        echo $this->username;
        echo $this->password;
    }
}

$user = new User("user", "pass");
$user->printData();

?>