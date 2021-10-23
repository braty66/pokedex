<?php

class MyDatabase{
    private $connection;

    public function __construct($servername, $username, $password, $dbname){
        $this->connection = mysqli_connect($servername, $username,$password, $dbname);
        $this->connection->set_charset("utf8");

        if (!$this->connection) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }

    public function __destruct(){
        mysqli_close($this->connection);
    }

    public function query($sql){
        $databaseResult = mysqli_query($this->connection, $sql);

        if (mysqli_num_rows($databaseResult) <= 0)
            return [];
    
        if (mysqli_num_rows($databaseResult) == 1)
            return mysqli_fetch_assoc($databaseResult);

        return mysqli_fetch_all($databaseResult,MYSQLI_ASSOC);
    }
}