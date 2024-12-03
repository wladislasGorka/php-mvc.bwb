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
     * Tableau representant la route correspondente à l'uri
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

    function __construct() {
        $conf = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT']."/config/routing.json"), true);
        $this->config = $conf;
        // echo "<pre>"; var_dump($this->config); echo "</pre>";
    }

    /**
     * Execute l'algorithme de routage
     * @return void
     */
    public function execute(): void {
        $uri = parse_url($_SERVER['REQUEST_URI']);
        $this->uri = explode("/",$uri['path']);
        $this->method = $_SERVER['REQUEST_METHOD'];

        foreach($this->config as $key => $value) {
            $route = explode("/",$key);
            if($this->isEqual($route,$uri)) {
                if($this->compare($route, $this->uri)){
                    $this->route = $route;
                    $this->controller = $this->getValue($value);
                    $this->invoke();
                }
            }
        }
        // echo "<pre>"; var_dump($this->uri); echo "</pre>";
        // echo "<pre>"; var_dump($this->args); echo "</pre>";
        // echo "<pre>"; var_dump($this->method); echo "</pre>";
    }

    /**
     * Compare la longueur des tableaux
     * @return bool
     */
    private function isEqual($route,$uri): bool {
        return count($route) == count($this->uri);
    }

    /**
     * Retourne la clé (le controleur) dans le tableau des routes
     * @return string
     */
    private function getValue(string $controler): string {
        return explode(":",$controler)[0];
    }

    /**
     * Ajoute l'élément variable de l'URI dans la liste des arguments
     * @return void
     */
    private function addArgument($index): void {
        push($this->args, $index);
    }

    /**
     * Effectue la comparaison des éléments 
     * Entre l'URI (UNIFORM RESOURCE IDENTIFIER) et la route
     * @return bool
     */
    private function compare($route,$uri): bool {
        for($i= 0;$i<count($route);$i++) {
            if($route[$i] != $uri[$i] && $route[$i] != "(:)") {
                return false;
            }
            if($route[$i] == "(:)") {
                $this->addArgument($i);
            }
        }
        return true;
    }

    /**
     * Invoque la méthode selectionnée
     * @return void
     */
    private function invoke(): void {}
}