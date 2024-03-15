<?php
//$sname = "191.101.230.103:3306";
//$uname = "u522730041_bscs4bg5";
//$password = "#BSCS4Bprsdb";
//$db_name = "u522730041_prsdb";

define("dbname", "bnwza7tffhvgdkzapjly");

class dbConnection
{
    private $server = "mysql:host=bnwza7tffhvgdkzapjly-mysql.services.clever-cloud.com:3306;dbname=" . dbname;
    private $uname = "uwmuqh3ombk4qrf0";
    private $password = "mO2J4svv71lz53VPN0b8";
    private $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    protected $conn;

    public function dbConnect()
    {
        try {
            $this->conn = new PDO($this->server, $this->uname, $this->password, $this->options);
            return $this->conn;
        } catch (PDOException $err) {
            echo "Problem occurred in trying to connect to the server: " . $err->getMessage();
        }
    }
}