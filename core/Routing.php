<?php
class Routing{
    /**
     * Tableau associatif representant le fichier de configuration
     * @var Array 
     */
    private $config;

    /**
     * @var array 
     */
    private $uri;

    /**
     * Tableau representant le route correspondente à l'uri
     * @var array 
     */
    private $route;

    /**
     * le controleur correspondant à la route trouvée
     * @var string
     */
    private $controller;

    /**
     * Tableau d'arguments a passer à la méthode du controleur
     * @var array
     */
    private $args;

    /**
     * La chaine representant le verbe http
     * @var string
     */
    private $method;

    function __construct() {}

    /**
     * Execute l'algorithme de routage
     * @return void
     */
    private function execute(): void {}

    /**
     * Compare la longueur des tableaux
     * @return void
     */
    private function isEqual(): void {}

    /**
     * Retourne la clé (le controleur) dans le tableau des routes
     * @return void
     */
    private function getValue(): void {}

    /**
     * Ajoute l'élément variable de l'URI dans la liste des arguments
     * @return void
     */
    private function addArgument(): void {}

    /**
     * Effectue la comparaison des éléments 
     * Entre l'URI (UNIFORM RESOURCE IDENTIFIER) et la route
     * @return void
     */
    private function compare(): void {}

    /**
     * Invoque la méthode selectionnée
     * @return void
     */
    private function invoke(): void {}
}