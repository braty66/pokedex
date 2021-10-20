<?php

class PokemonModel
{
    private $database;

    public function __construct($database){
        $this->database = $database;
    }

    public function getPokemones(){
        return $this->database->query("SELECT * FROM pokemon ");
    }

    public function getCancion($id){
        $SQL = "SELECT * FROM canciones WHERE idCancion = $id ";
        return $this->database->query($SQL);
    }
}