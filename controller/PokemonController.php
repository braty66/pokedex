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
        if (isset($_POST["nombre"])) {
            
            $datos["numero"] = $_GET["numero"];
            
            if (isset($_POST["nombre"])) {
                $datos["nombre"] = $_POST["nombre"];
            }
            if (isset($_POST["tipo1"])) {
                $datos["tipo1"] = $_POST["tipo1"];
            }
            if (isset($_POST["tipo2"])) {
                $datos["tipo2"] = $_POST["tipo2"];
            }
            if (isset($_POST["descripcion"])) {
                $datos["descripcion"] = $_POST["descripcion"];
            }
            if (isset($_POST["imagen"])) {
                $datos["imagen"] = $_POST["imagen"];
            }
            
            if (isset($datos["sprite"])) {
                $datos["sprite"] = $_POST["sprite"];
            }
            
            if ($this->pokemonModel->updatePokemon($datos)) {
                $_SESSION["mensaje"]["mensaje"] = "Pokemon modificado con exito";
                $_SESSION["mensaje"]["class"] = "w3-pale-green ";
                header('Location: /');
            } else {
                $_SESSION["mensaje"]["mensaje"] = "Error al actualizar el pokemon";
                $_SESSION["mensaje"]["class"] = "w3-pale-red ";
                $numero = $_GET["numero"];
                $data['pokemon'] = $this->pokemonModel->getDetallePokemon($numero);
                echo $this->printer->render("view/altaPokemon.html");
            }
            
        } else {
            $numero = $_GET["numero"];
            $data['pokemon'] = $this->pokemonModel->getDetallePokemon($numero);
            echo $this->printer->render("view/altaPokemon.html", $data);
        }
    }
    
}