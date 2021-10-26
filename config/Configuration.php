<?php
class Configuration{

    private $config;
    
    public function createPokemonAdminController(){
        require_once ("controller/PokemonAdminController.php");
        return new PokemonAdminController($this->createPrinter(),$this->createPokemonModel());
    }
   

    public  function createAltaPokemonController(){
        require_once("controller/AltaPokemonController.php");
        return new AltaPokemonController($this->createPokemonModel(), $this->getLogger() , $this->createPrinter(),$this->createUpLoadFile());
    }

    public function createPokemonController(){
        require_once("controller/PokemonController.php");
        return new PokemonController( $this->createPrinter(),$this->createPokemonModel(),$this->createUpLoadFile());
    }
    
    public function createLoginController(){
        require_once("controller/LoginController.php");
        return new LoginController($this->getLogger() ,$this->createPrinter(),$this->usuarioModel());
    }

    private  function createPokemonModel(){
        require_once("model/PokemonModel.php");
        $database = $this->getDatabase();
        return new PokemonModel($database);
    }
    private  function usuarioModel(){
        require_once("model/UsuarioModel.php");
        $database = $this->getDatabase();
        return new UsuarioModel($database);
    }

    private  function createPresentacionesModel(){
        require_once("model/PresentacionesModel.php");
        $database = $this->getDatabase();
        return new PresentacionesModel($database);
    }

    private  function getDatabase(){
        require_once("helpers/MyDatabase.php");
        $config = $this->getConfig();
        return new MyDatabase($config["servername"], $config["username"], $config["password"], $config["dbname"]);
    }

    private  function getConfig(){
        if( is_null( $this->config ))
            $this->config = parse_ini_file("config/config.ini");

        return  $this->config;
    }

    private function getLogger(){
        require_once("helpers/Logger.php");
        return new Logger();
    }

    public function createRouter($defaultController, $defaultAction){
        include_once("helpers/Router.php");
        return new Router($this,$defaultController,$defaultAction);
    }
    public function  createUpLoadFile(){
        include_once ("helpers/UpLoadFile.php");
        return new UpLoadFile();
    }

    private function createPrinter(){
        require_once ('third-party/mustache/src/Mustache/Autoloader.php');
        require_once("helpers/MustachePrinter.php");
        return new MustachePrinter("view/partials");
    }

}