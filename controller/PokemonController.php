<?php

class PokemonController
{
    
    private $pokemonModel;
    private $printer;
    
    public function __construct($printer, $pokemonModel)
    {
        $this->pokemonModel = $pokemonModel;
        $this->printer = $printer;
    }
    
    public function show()
    {
        $data['pokemones'] = $this->pokemonModel->getPokemones();
        
        //Me fijo si estoy logueado
        if (isset($_SESSION["email"])) {
            $data["admin"] = TRUE;
        }
        
        //muestro si hay mensajes
        $data["mensaje"] = $_SESSION["mensaje"];
        unset($_SESSION["mensaje"]);
        
        
        echo $this->printer->render("view/pokemonView.html", $data);
    }
    
    public function buscar()
    {
        $filter = $_GET["busqueda"];
        $data['pokemones'] = $this->pokemonModel->getBusquedaPokemones($filter);
        if (empty($data['pokemones'])) {
            $data['pokemones'] = $this->pokemonModel->getPokemones();
            $data['mensaje']['class'] = "w3-pale-red";
            $data['mensaje']['mensaje'] = "No se encontro al poquemon: " . $filter;
        }
        
        echo $this->printer->render("view/pokemonView.html", $data);
    }
    
    public function detalle()
    {
        $numero = $_GET["numero"];
        $data['pokemon'] = $this->pokemonModel->getDetallePokemon($numero);
        
        echo $this->printer->render("view/pokemonDetalle.html", $data);
        
    }
    
    function modificar()
    {
        echo $this->printer->render("view/altaPokemon.html");
    }
    
}