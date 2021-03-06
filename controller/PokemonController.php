<?php

class PokemonController
{
    
    private $pokemonModel;
    private $printer;
    private $upLoadFile;
    
    public function __construct($printer, $pokemonModel, $upLoadFile)
    {
        $this->pokemonModel = $pokemonModel;
        $this->printer = $printer;
        $this->upLoadFile = $upLoadFile;
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
            $data['mensaje']['mensaje'] = "No se encontro al pokémon: " . $filter;
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
        
        //Si tengo post, hago la modificacion
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
            
            if ($_FILES && isset($_FILES["imagen"]) && $_FILES["imagen"]["size"] != 0) {
                $datos["imagen"] = time() . "_imagen_" . $_FILES["imagen"]["name"];
                if (!$this->upLoadFile->guardarImagen($_FILES["imagen"], $datos["imagen"])) {
                    $this->falla();
                }
            }
            
            if ($_FILES && isset($_FILES["sprite"]) && $_FILES["sprite"]["size"] != 0) {
                $datos["sprite"] = time() . "_sprite_" . $_FILES["sprite"]["name"];
                if (!$this->upLoadFile->guardarImagen($_FILES["sprite"], $datos["sprite"])) {
                    $this->falla();
                }
            }
            
            if ($this->pokemonModel->updatePokemon($datos)) {
                $_SESSION["mensaje"]["mensaje"] = "Pokemon modificado con exito";
                $_SESSION["mensaje"]["class"] = "w3-pale-green ";
                header('Location: /');
            } else {
                $_SESSION["mensaje"]["mensaje"] = "Error al actualizar el pokemon";
                $_SESSION["mensaje"]["class"] = "w3-pale-red ";
                $this->falla();
            }
            
        } //Si no, llamo a la vista con los datos
        else {
            $this->falla();
        }
    }
    
    public function delete()
    {
        
        $numero = $_GET['numero'];
        
        if ($this->pokemonModel->deletePokemon($numero)) {
            $_SESSION["mensaje"]["mensaje"] = "Pokemon eliminado con exito";
            $_SESSION["mensaje"]["class"] = "w3-pale-green ";
            header('Location: /');
        } else {
            $_SESSION["mensaje"]["mensaje"] = "Error al eliminar el pokemon";
            $_SESSION["mensaje"]["class"] = "w3-pale-red ";
            header('Location: /');
            
            
        }
    }
    
    private function falla()
    {
        $numero = $_GET["numero"];
        $data['pokemon'] = $this->pokemonModel->getDetallePokemon($numero);
        echo $this->printer->render("view/altaPokemon.html", $data);
        die();
    }
    
}