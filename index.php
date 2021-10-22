<?php
session_start();
include_once("config/Configuration.php");

$module = $_GET["module"] ?? "pokemon";
$action = $_GET["action"] ?? "show";

$configuration = new Configuration();
$router = $configuration->createRouter( "createPokemonController", "show");

$router->executeActionFromModule($module,$action);