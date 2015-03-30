<?php
/**
 * Created by PhpStorm.
 * User: cserrao
 * Date: 27/03/15
 * Time: 09:52
 */

class Contacts {
    protected $bd;
    protected $id;
    protected $nome;
    protected $morada;
    protected $email;
    protected $iduser;


    function __construct()
    {
        $this->db = mysql_connect("127.0.0.1", "root", "") or die("Não consegui ligar ao servidor de BD!!!");
        mysql_select_db("ped2015", $this->db);

    }

    function set($nome, $morada, $email, $iduser) {
        $this->nome =$nome;
        $this->morada =$morada;
        $this->email = $email;
        $this->iduser = $iduser;
    }

    function save()
    {
        $q = "INSERT INTO contacts (nome, email, morada, id_user) VALUES ('".$this->nome."', '".$this->email."', '".$this->morada."', ".$this->iduser.")";

        if(mysql_query($q, $this->db) == false) {
            return false;
        }

        return true;
    }

    function load ($id) {
        $q = "SELECT * FROM contacts WHERE id=".$id;

        $rs = mysql_query($q, $this->db);

        mysql_fetch_row($rs);

        $this->id = mysql_result($rs, 0, "id");
        $this->nome = mysql_result($rs, 0, "nome");
        $this->email = mysql_result($rs, 0, "email");
        $this->morada = mysql_result($rs, 0, "morada");
    }

    function listall($iduser) {
        $q = "SELECT * FROM contacts WHERE id_user = ".$iduser;

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
        $q = "DELETE FROM contacts WHERE id = ".$id;

        $rs = mysql_query($q, $this->db);

        return true;
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
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @return mixed
     */
    public function getMorada()
    {
        return $this->morada;
    }

    /**
     * @param mixed $morada
     */
    public function setMorada($morada)
    {
        $this->morada = $morada;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }



    function __destruct()
    {
        mysql_close($this->db);
    }
}
?>