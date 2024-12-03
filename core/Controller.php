<?php
//namespace BWB\Framework\mvc;  

abstract class Controller{

    /**
     * Cette propriété correspond à la variable superglobale $_GET
     * elle sera initialisé à la création du controleur
     * @var array
     */
    private $get;
    /**
     * Cette propriété correspond à la variable superglobale $_POST
     * elle sera initialisé à la création du controleur
     * méthode utilisée pour ajouter une ressource
     * @var array
     */
    private $post;
    /**
     * Cette propriété correspond à la variable superglobale $_PUT
     * elle sera initialisé à la création du controleur
     * méthode utilisée pour mettre à jour une ressource
     * @var array
     */
    private $put;

    function __construct(){}

    /**
     * retourne la propriété $get afin de la rendre disponible aux développeur souhaitant étendre cette classe
     * @return void
     */
    protected function inputGet(): void{}

    /**
     * retourne la propriété $post afin de la rendre disponible aux développeur souhaitant étendre cette classe
     * @return void
     */
    protected function inputPost(): void{}

    /**
     * retourne la propriété $put afin de la rendre disponible aux développeur souhaitant étendre cette classe
     * @return void
     */
    protected function inputPut(): void{}

    /**
     * la méthode render affiche la vue sélectionnée grace au premier argument
     * la méthode utilise les indirections pour générer dynamiquement les noms de variables
     * utilisées dans la vue
     * @param string $pathToView chemin du fichier ou template de vue demandé
     * @param array $datas la valeur par defaut permet de retourner des vues statiques
     * @return void
     */
    final protected function render(): void{}
}