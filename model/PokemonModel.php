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
        $query = "UPDATE pokemon SET ";
        $flag = FALSE;
        
        if (isset($datos["sprite"])) {
            $query .= "sprite = '" . $datos["sprite"] . "'";
            $flag = TRUE;
        }
        
        if (isset($datos["nombre"])) {
            if ($flag)
                $query .= ",";
            
            $query .= "nombre = '" . $datos["nombre"] . "'";
            $flag = TRUE;
        }
        
        if (isset($datos["imagen"])) {
            if ($flag)
                $query .= ",";
            $query .= "imagen = '" . $datos["imagen"] . "'";
            $flag = TRUE;
        }
        
        if (isset($datos["tipo1"])) {
            if ($flag)
                $query .= ",";
            $query .= "tipo1 = '" . $datos["tipo1"] . "'";
            $flag = TRUE;
        }
        
        if (isset($datos["tipo2"])) {
            if ($flag)
                $query .= ",";
            $query .= "tipo2 = '" . $datos["tipo2"] . "'";
            $flag = TRUE;
        }
        
        if (isset($datos["descripcion"])) {
            if ($flag)
                $query .= ",";
            $query .= "descripcion = '" . $datos["descripcion"] . "'";
            
        }
        
        $query .= " WHERE numero = " . $datos["numero"] . ";";
        
        
        return $this->database->update($query);
    }
    public function deletePokemon($numero){
        $query="DELETE FROM pokemon WHERE numero = $numero";

        return $this->database->delete($query);

    }
}