<?php
/**
 * Created by PhpStorm.
 * User: carlosserrao
 * Date: 28/03/14
 * Time: 11:48
 */

class Pessoa {
    protected $db;
    protected $id;
    protected $nome;
    protected $email;
    protected $idtwitter;
    protected $idfacebook;
    protected $idutilizador;


    function __construct()
    {
        $this->db = mysql_connect('127.0.0.1', 'root', '');
        mysql_select_db('ped2014', $this->db);
    }

    public function set($nome, $email, $idtwitter='', $idfacebook='', $idutilizador)
    {
        $this->nome = $nome;
        $this->email = $email;
        $this->idtwitter = $idtwitter;
        $this->idfacebook = $idfacebook;
        $this->idutilizador = $idutilizador;
    }
    public function save()
    {
        $sql = "INSERT INTO pessoa (nome, email, idtwitter, idfacebook, idutilizador) VALUES ('".$this->nome."', '".$this->email."', '".$this->idtwitter."', '".$this->idfacebook."', ".$this->idutilizador.")";
        echo $sql;

        $rs = mysql_query($sql, $this->db);
        if($rs == false) return false;
    }

    public function getPessoa($idutilizador) {
        $sql = "SELECT * FROM pessoa WHERE idutilizador = ".$idutilizador;

        $rs = mysql_query($sql, $this->db);
        if(mysql_fetch_row($rs)) return true;
        else return false ;
    }



} 