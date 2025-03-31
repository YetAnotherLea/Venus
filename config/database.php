<?php

class Database {
    protected $db;
    protected $server = "localhost";
    protected $dbname = "meetic";
    protected $user = "root";
    protected $pass = "tIAvsp4E";
    
    public function __construct() {
        $this->connection();
    }
    
    public function connection() {
        try
        {
            $this->db = new PDO ("mysql:host=$this->server;dbname=$this->dbname", $this->user, $this->pass);
        } catch (PDOException $e){
            print "Erreur :" . $e->getMessage() . "<br/>";
            die;
        }
    }
}

$db = new Database();
$connect = $db->connection();
