<?php

class AltaPokemonController
{
    
    private $log;
    private $printer;
    private $pokemonModel;
    private $upLoadFile;
    
    
    public function __construct($pokemonModel, $logger, $printer, $upLoadFile)
    {
        $this->pokemonModel = $pokemonModel;
        $this->log = $logger;
        $this->printer = $printer;
        $this->upLoadFile = $upLoadFile;
    }
    
    
    function show()
    {
        
        
        if (isset($_POST["numero"])) {
            
            $datos["numero"] = $_POST["numero"];
            $datos["nombre"] = $_POST["nombre"];
            $datos["tipo1"] = $_POST["tipo1"];
            $datos["tipo2"] = $_POST["tipo2"];
            $datos["descripcion"] = $_POST["descripcion"];
            
            
            if (isset($_FILES) && isset($_FILES["imagen"]) && $_FILES["imagen"]["size"] != 0) {
                $datos["imagen"] = time() . "_imagen_" . $_FILES["imagen"]["name"];
                if (!$this->upLoadFile->guardarImagen($_FILES["imagen"], $datos["imagen"])) {
                    echo $this->printer->render("view/altaPokemon.html");
                    die();
                }
            } else {
                $_SESSION["mensaje"]["mensaje"] = "Es necesario agregar la imagen";
                $_SESSION["mensaje"]["class"] = "w3-pale-red";
                echo $this->printer->render("view/altaPokemon.html");
                die();
            }
            
            if (isset($_FILES) && isset($_FILES["sprite"]) && $_FILES["sprite"]["size"] != 0) {
                $datos["sprite"] = time() . "_sprite_" . $_FILES["sprite"]["name"];
                if (!$this->upLoadFile->guardarImagen($_FILES["sprite"], $datos["sprite"])) {
                    echo $this->printer->render("view/altaPokemon.html");
                    die();
                }
            } else {
                $_SESSION["mensaje"]["mensaje"] = "Es necesario agregar el sprite";
                $_SESSION["mensaje"]["class"] = "w3-pale-red";
                echo $this->printer->render("view/altaPokemon.html");
                die();
            }
            
            
            if ($this->pokemonModel->createPokemon($datos)) {
                $_SESSION["mensaje"]["mensaje"] = "Pokemon creado con exito";
                $_SESSION["mensaje"]["class"] = "w3-pale-green ";
                header('Location: /');
            } else {
                $_SESSION["mensaje"]["mensaje"] = "Error al crear el pokemon, asegurate que el pokemon no haya sido creado";
                $_SESSION["mensaje"]["class"] = "w3-pale-red ";
                echo $this->printer->render("view/altaPokemon.html");
            }
            
        } else {
            echo $this->printer->render("view/altaPokemon.html");
        }
    }
    
}