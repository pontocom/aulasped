<?php
class User {
	protected $db;
	protected $id;
	protected $uname;
	protected $pword;

	function __construct()
	{
		$this->db = mysql_connect('127.0.0.1', 'root', '');
		mysql_select_db('ped2014');
	}

	function set($uname, $pword)
	{
		$this->uname = $uname;
		$this->pword = $pword;
	}

	function save()
	{
		$sql = "INSERT INTO utilizador (uname, pword) VALUES ('".$this->uname."', '".sha1($this->pword)."')";

		$rs = mysql_query($sql, $this->db);

		return $rs;
	}

	function login($uname, $pword)
	{
		$sql = "SELECT * FROM utilizador WHERE uname='".$uname."' AND pword='".sha1($pword)."'";

		$rs = mysql_query($sql, $this->db);
		if(mysql_fetch_row($rs)) {
			$this->id = mysql_result($rs, 0, 'id');
			return true;
		} else return false;
	}

    function getLastId()
    {
        $sql = "SELECT max(id) as lastid FROM utilizador";
        $rs = mysql_query($sql, $this->db);
        if(mysql_fetch_row($rs)) {
            return mysql_result($rs, 0, 'lastid');
        }
    }
}
?>