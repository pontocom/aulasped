<?php
class Person {
	protected $db;
	protected $id;
	protected $name;
	protected $email;
	protected $twitter;
	protected $facebook;
	protected $iduser;

	function __construct()
	{
		$this->db = mysql_connect('127.0.0.1', 'root', '');
		mysql_select_db('ped2014');
	}

	function set($name, $email, $twitter='', $facebook='', $iduser)
	{
		$this->name = $name;
		$this->email = $email;
        $this->twitter = $twitter;
        $this->facebook = $facebook;
        $this->iduser = $iduser;
	}

	function save()
	{
		$sql = "INSERT INTO pessoa (iduser, nome, email, twitter, facebook) VALUES (".$this->iduser.", '".$this->name."', '".$this->email."', '".$this->twitter."', '".$this->facebook."')";

		$rs = mysql_query($sql, $this->db);

		return $rs;
	}
}
?>