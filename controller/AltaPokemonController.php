<?php

class AltaPokemonController
{
    
    private $log;
    private $printer;
    private $pokemonModel;
    
    
    public function __construct($pokemonModel, $logger, $printer)
    {
        $this->pokemonModel = $pokemonModel;
        $this->log = $logger;
        $this->printer = $printer;
    }
    
    
    function show()
    {
        
        if (isset($_POST["numero"])) {
            $datos["numero"] = $_POST["numero"];
            $datos["nombre"] = $_POST["nombre"];
            $datos["tipo1"] = $_POST["tipo1"];
            $datos["tipo2"] = $_POST["tipo2"];
            $datos["descripcion"] = $_POST["descripcion"];
            $datos["imagen"] = $_POST["imagen"];
            $datos["sprite"] = $_POST["sprite"];
            
            if ($this->pokemonModel->createPokemon($datos)) {
                $_SESSION["mensaje"]["mensaje"] = "Pokemon creado con exito";
                $_SESSION["mensaje"]["class"] = "w3-pale-green ";
                header('Location: /');
            }else{
                $_SESSION["mensaje"]["mensaje"] = "Error al crear el pokemon, asegurate que el pokemon no haya sido creado";
                $_SESSION["mensaje"]["class"] = "w3-pale-red ";
                echo $this->printer->render("view/altaPokemon.html");
            }
            
        } else {
            echo $this->printer->render("view/altaPokemon.html");
        }
    }
    
}