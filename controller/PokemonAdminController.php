<?php

class PokemonAdminController
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
        echo $this->printer->render("view/pokemonAdminView.html", $data);
    }
}