<?php

class User {

    protected $con;
    protected $username;
    protected $password;
    protected $nome;
    protected $morada;
    protected $email;
    protected $telefone;
    protected $foto;

    function  __construct() {
        $this->con = mysql_connect("127.0.0.1", "zend", "") or die('Não consegui ligar ao SGBD!!!');
        mysql_select_db("agenda");
    }

    function newUser($username, $password, $nome, $morada, $email, $telefone, $foto) {
        $this->username = $username;
        $this->password = $password;
        $this->nome = $nome;
        $this->morada = $morada;
        $this->email = $email;
        $this->telefone = $telefone;
        $this->foto = $foto;

        $query = "INSERT INTO agenda_info (nome, morada, email, telefone, foto, login, pwd, isadmin) VALUES ('" . $nome . "', '" . $morada . "', '" . $email. "', '" . $telefone . "', '" . $foto . "', '" . $username . "', '" . md5($password) . "', 0)";

        if (!mysql_query($query, $this->con)) {
            $this->close();
        } else {
            $this->close();
        }
    }

    public function load($id)
    {
        $query = "SELECT * FROM agenda_info WHERE id_entry = ".$id;
        $rs = mysql_query($query, $this->con);

        $this->username = mysql_result($rs, 0, "login");
        $this->password = mysql_result($rs, 0, "pwd");
        $this->nome = mysql_result($rs, 0, "nome");
        $this->morada = mysql_result($rs, 0, "morada");
        $this->email = mysql_result($rs, 0, "email");
        $this->telefone = mysql_result($rs, 0, "telefone");
        $this->foto = mysql_result($rs, 0, "foto");
    }

    public function delete($id)
    {
        $query = "DELETE FROM agenda_info WHERE id_entry = ".$id;
        mysql_query($query, $this->con);

        $this->username = "";
        $this->password = "";
        $this->nome = "";
        $this->morada = "";
        $this->email = "";
        $this->telefone = "";
        $this->foto = "";
    }

    public function update($id, $nome, $morada, $email, $telefone, $foto)
    {
        if($nome!="") $this->nome = $nome;
        if($morada!="") $this->morada = $morada;
        if($email!="") $this->email = $email;
        if($telefone!="") $this->telefone = $telefone;
        if($foto!="") $this->foto = $foto;

        $query = "UPDATE agenda_info SET nome='".$nome."', morada='".$morada."', telefone='".$telefone."', email='".$email."' WHERE id_entry =".$id;

        mysql_query($query, $this->con);

   }

    public function close()
    {
        mysql_close($this->con);
    }


    public function getUsername() {
        return $this->username;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getMorada() {
        return $this->morada;
    }

    public function setMorada($morada) {
        $this->morada = $morada;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getTelefone() {
        return $this->telefone;
    }

    public function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

}

$user = new User();
$user->load(14);

var_dump($user);

$user->update(14, "Zé XPTO", "", "", "", "");

var_dump($user);

$user->delete(14);

var_dump($user);
?>
