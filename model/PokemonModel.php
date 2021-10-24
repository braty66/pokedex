<?php

class PokemonModel
{
    private $database;
    
    public function __construct($database)
    {
        $this->database = $database;
    }
    
    public function getPokemones()
    {
        return $this->database->query("SELECT * FROM pokemon ");
    }
    
    public function getBusquedaPokemones($filter)
    {
        
        $query = "SELECT * FROM pokemon
         WHERE nombre LIKE '%" . $filter . "%'OR
          tipo1 LIKE '%" . $filter . "%'OR
          tipo2 LIKE '%" . $filter . "%' OR
          numero LIKE '%" . $filter . "%'";
        return $this->database->query($query);
    }
    
    public function getDetallePokemon($numero)
    {
        $query = "SELECT * FROM pokemon WHERE  numero = $numero";
        return $this->database->query($query);
    }
    
    public function createPokemon($datos)
    {
        $query = "INSERT INTO pokemon (numero, sprite, nombre, imagen, tipo1, tipo2, descripcion)
            VALUES ('" . $datos["numero"] .
            "', '" . $datos["sprite"] .
            "', '" . $datos["nombre"] .
            "', '" . $datos["imagen"] .
            "', '" . $datos["tipo1"] .
            "', '" . $datos["tipo2"] .
            "', '" . $datos["descripcion"] .
            "');";
        
        return $this->database->insert($query);
        
    }
    
    public function updatePokemon($datos)
    {
    
    }
}