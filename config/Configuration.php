<?php
class Configuration{

    private $config;

    public  function createPresentacionesController(){
        require_once("controller/PresentacionesController.php");
        return new PresentacionesController( $this->createPresentacionesModel() , $this->createPrinter());
    }

    public  function createAltaPokemonController(){
        require_once("controller/AltaPokemonController.php");
        return new AltaPokemonController($this->getLogger() , $this->createPrinter());
    }

    public function createPokemonController(){
        require_once("controller/PokemonController.php");
        return new PokemonController( $this->createPrinter(),$this->createPokemonModel());
    }
    
    public function createLoginController(){
        require_once("controller/LoginController.php");
        return new LoginController($this->getLogger() ,$this->createPrinter());
    }

    private  function createPokemonModel(){
        require_once("model/PokemonModel.php");
        $database = $this->getDatabase();
        return new PokemonModel($database);
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

    private function createPrinter(){
        require_once ('third-party/mustache/src/Mustache/Autoloader.php');
        require_once("helpers/MustachePrinter.php");
        return new MustachePrinter("view/partials");
    }

}