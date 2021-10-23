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
        echo $this->printer->render("view/pokemonView.html", $data);
    }
    
    public function buscar()
    {
        $filter = $_GET["busqueda"];
        $data['pokemones'] = $this->pokemonModel->getBusquedaPokemones($filter);
        if (empty($data['pokemones'])) {
            $data['pokemones'] = $this->pokemonModel->getPokemones();
            $data['noEncontrado'] = $filter;
        }
        echo $this->printer->render("view/pokemonView.html", $data);
    }
    
    public function detalle()
    {
        $numero = $_GET["numero"];
        $data['pokemon'] = $this->pokemonModel->getDetallePokemon($numero);
        
        echo $this->printer->render("view/pokemonDetalle.html", $data);
        
    }
    
    public function iniciarSesion(){
        
        
    }
    
}