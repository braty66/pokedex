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
        $SQL = "SELECT * FROM Usuario WHERE email = \"$email\" AND password = \"$pass\"";
        return $this->database->query($SQL);
    }
}