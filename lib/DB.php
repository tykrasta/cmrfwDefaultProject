<?php
class DB
{
    protected $pdo;
    public $result;
    function __construct()
    {
        $this->pdo = new PDO("mysql:host={$_ENV['DB_HOST']};dbname={$_ENV['DB_NAME']};","{$_ENV['DB_USER']}","{$_ENV['DB_PASS']}",[PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION]);            
        return $this->pdo;

    }
    public function select($select,$from,$where=null,$order=false,$group=false)
    {       
        $order = preg_replace('/cmr_/','',$from);
        if($where){
            if(!$order){
                $req=$this->pdo->prepare("SELECT $select FROM $from WHERE $where order by {$order}_id asc");
                $req->execute();
                return $this->result = $req->fetchAll();
            }else{
                $req=$this->pdo->prepare("SELECT $select FROM $from WHERE $where order by {$order}_id desc");
                $req->execute();
                return $this->result = $req->fetchAll();
            }
        }else{
            if($group){
                $req=$this->pdo->prepare("SELECT $select FROM $from GROUP by {$group}");
                $req->execute();
                return $this->result = $req->fetchAll();
            }else{
                $req=$this->pdo->prepare("SELECT $select FROM $from");
                $req->execute();
                return $this->result = $req->fetchAll();  
            }
        }
    }
    public function insert($into,$value,$where=null)
    {
        if($where){
            $req=$this->pdo->prepare("INSERT INTO $into VALUES ($value) WHERE $where");
            $req->execute();
            return $this;            
        }else{
            $req=$this->pdo->prepare("INSERT INTO $into VALUES ($value)");
            $req->execute();
            return $this;        
        }
    }
    public function update($table,$set,$where=null)
    {
        if($where){
            $req=$this->pdo->prepare("UPDATE $table SET $set WHERE $where");
            $req->execute();
            return $this;            
        }else{
            $req=$this->pdo->prepare("UPDATE $table SET $set");
            $req->execute();
            return $this;        
        }
    }
}