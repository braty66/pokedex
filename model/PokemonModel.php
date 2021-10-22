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

    public function getBusquedaPokemones($filter){

        $query = "SELECT * FROM pokemon
         WHERE nombre LIKE '%". $filter ."%'OR
          tipo1 LIKE '%". $filter ."%'OR 
          tipo2 LIKE '%". $filter ."%' OR
          numero LIKE '%". $filter ."%'";
        return $this->database->query($query);
    }
}