<?php
/**
 * Created by PhpStorm.
 * User: cserrao
 * Date: 20/03/15
 * Time: 20:23
 */

class Contacts {
    protected $db;
    protected $id;
    protected $nome;
    protected $morada;
    protected $email;
    protected $id_user;

    function __construct() {
        $this->db = mysql_connect("127.0.0.1", "root", "") or die("Não consegui ligar ao servidor de BD");

        mysql_select_db("ped2015", $this->db);
    }

    function set($nome, $morada, $email, $uid) {
        $this->nome = $nome;
        $this->morada = $morada;
        $this->email = $email;
        $this->id_user = $uid;
    }

    function save()
    {
        $q = "INSERT INTO contacts (nome, morada, email, id_user) VALUES ('".$this->nome."', '".$this->morada."', '".$this->email."', ".$this->id_user.")";

        if(mysql_query($q, $this->db) != false) {
            return true;
        } else {
            return false;
        }
    }

    function load($id) {
        $q = "SELECT * FROM contactos WHERE id=".$id;

        $rs = mysql_query($q, $db);

        mysql_fetch_row($rs);

        $this->id = mysql_result($rs, 0, "id");
        $this->nome = mysql_result($rs, 0, "nome");
        $this->nome = mysql_result($rs, 0, "morada");
        $this->email = mysql_result($rs, 0, "email");
        $this->id_user = mysql_result($rs, 0, "id_user");
    }

    function listall($id_user) {
        $q = "SELECT * FROM contacts WHERE id_user=".$id_user;

        $rs = mysql_query($q, $this->db);

        $values = array();
        $n=0;
        while($row = mysql_fetch_array($rs, MYSQL_ASSOC)) {
            $values[$n] = $row;
            $n++;
        }

        return $values;

    }

    function delete($id)
    {
        $q = "DELETE FROM contactos WHERE id=".$id;

        if(mysql_query($q, $db) == false) {
            return false;
        } else {
            return true;
        }
    }

}

?>