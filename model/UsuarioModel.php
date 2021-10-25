<?php

class UsuarioModel
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function getUsuario($email, $pass)
    {
        $passHash = md5($pass);
        $SQL = "SELECT * FROM Usuario WHERE email = \"$email\" AND password = \"$passHash\"";
        return $this->database->query($SQL);
    }
}