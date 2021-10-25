<?php

class LoginController
{
    
    private $usuarioModel;
    private $log;
    private $printer;
    
    public function __construct($logger, $printer, $usuarioModel)
    {
        $this->usuarioModel = $usuarioModel;
        $this->log = $logger;
        $this->printer = $printer;
    }
    
    function show()
    {
        echo $this->printer->render("view/iniciarSesionView.html");
    }
    
    function login()
    {
        $login = $this->usuarioModel->getUsuario($_POST["email"], $_POST["pass"]);
        if ($login) {
            $_SESSION["id"] = $login["id"];
            $_SESSION["nombre"] = $login["nombre"];
            $_SESSION["email"] = $login["email"];
            $_SESSION["mensaje"]["class"] = "w3-green";
            $_SESSION["mensaje"]["mensaje"] = "Login correcto";
            header('Location: /');
        } else {
            $data["class"] = "error";
            $data["mensaje"] = "Usuario o contraseña incorrectos";
            echo $this->printer->render("view/iniciarSesionView.html", $data);
        }
    }
    
    function logout()
    {
        session_destroy();
        session_start();
        $_SESSION["mensaje"]["class"] = "w3-green";
        $_SESSION["mensaje"]["mensaje"] = "Sesion cerrada";
        header('Location: /');
    }
    
}