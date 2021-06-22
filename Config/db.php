<?php

class db
{

    private $host = "localhost";
//  private $db_name="optimize";
    private $db_name = "example_app";
    private $username = "root";
//  private $username="agrowcey_project";
//  private $password="963580398Vj*";
    private $password = "";

    private $connection;

    public function getConnection()
    {
        $this->connection = null;
        try {

            $this->connection = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $this->connection->exec("set names UTF8");

        } catch (PDOException $exception) {
            echo "Contact Cloud_Based_Dairy !" . $exception->getMessage();
        }
        return $this->connection;
    }

    public function IUD($sql)
    {
        if ($this->connection == null) {
            $this->getConnection();
        }
        $stamnet = $this->connection->prepare($sql);
        $stamnet->execute();
    }

    public function Search($sql)
    {
        if ($this->connection == null) {
            $this->getConnection();
        }
        $stamnet = $this->connection->prepare($sql);
        $stamnet->execute();
        return $stamnet;
    }
}
