<?php
class DB
{
    private $pdo;
    public $result;
    function __construct()
    {
        try {
            return $this->pdo = new PDO("mysql:host=localhost;dbname=db_cmrfw",'root','',[PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION]);
            echo 'connected';
        } catch (Exception $e) {
            echo $e;
        }
        
        
    }
    public function select($select,$from,$where=null)
    {
        if($where){
            $req=$this->pdo->prepare("SELECT $select FROM $from WHERE $where");
            $req->execute();
            return $this->result = $req->fetchAll();
        }else{
            $req=$this->pdo->prepare("SELECT $select FROM $from");
            $req->execute();
            return $this->result = $req->fetchAll();
        }
    }
}