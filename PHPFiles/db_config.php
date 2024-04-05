<?php
//$sname = "191.101.230.103:3306";
//$uname = "u522730041_bscs4bg5";
//$password = "#BSCS4Bprsdb";
//$db_name = "japanjobsdb";

define("dbname", "japanjobsdb");

class dbConnection
{
    private $server = "mysql:host=localhost:3306;dbname=" . dbname;
    private $uname = "root";
    private $password = "";
    private $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);
    protected $conn;

    public function dbConnect(){
        try{
            $this->conn = new PDO($this->server, $this->uname, $this->password, $this->options);
            return $this->conn;
        }
        catch (PDOException $err){
            ECHO "Problem occurred in trying to connect to the server: " . $err->getMessage();
        }
    }
}