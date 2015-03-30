<?php
/**
 * Created by PhpStorm.
 * User: cserrao
 * Date: 20/03/15
 * Time: 20:02
 */

class Account {
    protected $db;
    protected $id;
    protected $username;
    protected $pass;

    function __construct() {
        $this->db = mysql_connect("127.0.0.1", "root", "") or die("Não consegui ligar ao servidor de BD");

        mysql_select_db("ped2015", $this->db);
    }

    function set($u, $p) {
        $this->username = $u;
        $this->pass = $p;
    }

    function save()
    {
        $q = "INSERT INTO account (username, pass) VALUES ('".$this->username."', '".$this->pass."')";

        if(mysql_query($q, $this->db) != false) {
            return true;
        } else {
            return false;
        }
    }

    function login($u, $p) {
        $q = "SELECT * FROM account WHERE username='".$u."' AND pass ='".$p."'";

        $rs = mysql_query($q, $this->db);

        if(mysql_num_rows($rs)==0) {
            return false;
        } else {
            $this->id = mysql_result($rs, 0, 'id');
            $this->username = mysql_result($rs, 0, 'username');
            $this->pass = mysql_result($rs, 0, 'pass');
            return true;
        }
    }

    function __destruct() {
        mysql_close($this->db);
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getPass()
    {
        return $this->pass;
    }

    /**
     * @param mixed $pass
     */
    public function setPass($pass)
    {
        $this->pass = $pass;
    }
}

?>