<?php

class AltaPokemonController
{
    
    private $log;
    private $printer;

    public function __construct( $logger, $printer)
    {
        
        $this->log = $logger;
        $this->printer = $printer;
    }

    function show()
    {
        echo $this->printer->render("view/altaPokemon.html");
    }

}