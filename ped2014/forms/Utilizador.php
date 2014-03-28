<?php
/**
 * Created by PhpStorm.
 * User: carlosserrao
 * Date: 28/03/14
 * Time: 10:41
 */

class Utilizador {

    protected $db;
    protected $id;
    protected $uname;
    protected $pword;

    function __construct()
    {
        $this->db = mysql_connect('127.0.0.1', 'root', '');
        mysql_select_db('ped2014', $this->db);
    }

    public function set($username, $password)
    {
        $this->uname = $username;
        $this->pword = $password;
    }
    public function save()
    {
        $sql = "INSERT INTO utilizador (uname, pword) VALUES ('".$this->uname."', '".sha1($this->pword)."')";

        $rs = mysql_query($sql, $this->db);
        if($rs == false) return false;
    }

    public function login($username, $password) {
        $sql = "SELECT * FROM utilizador WHERE uname = '".$username."' AND pword = '".sha1($password)."'";

        $rs = mysql_query($sql, $this->db);
        if(mysql_fetch_row($rs))
        {
            $this->id = mysql_result($rs, 0, 'id');
            return true;
        }
        else return false ;
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
    public function getId()
    {
        return $this->id;
    }

}