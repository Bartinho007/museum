<?php

$database = new Database();

class Database
{

    private $conn;

    public function __construct()
    {
        $conf = parse_ini_file("Database.ini");

        $this->conn = new PDO('mysql:host=' . $conf["host"] . ':' . $conf["port"] . ';charset=' . $conf["db_enc"] . ';dbname=' . $conf["db"], $conf["db_usr"], $conf["db_pwd"]);
    }

    function get($sql, $params = [])
    {
        $result = $this->conn->prepare($sql);
        foreach ($params as $key => $value) {
            $result->bindValue(":$key", $value);
        }
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
}
