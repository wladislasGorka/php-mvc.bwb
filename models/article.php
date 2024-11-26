<?php
class Article {
    private $id;
    private $titre;
    private $contenu;
    private $auteur;
    private $date;

    public function getId() {
        return $this->id;
    }
    public function setId( $id ) {
        $this->id = $id;
    }

    public function getTitre() {
        return $this->titre;
    }
    public function setTitre( $titre ) {
        $this->titre = $titre;
    }

    public function getContenu() {
        return $this->contenu;
    }
    public function setContenu( $contenu ) {
        $this->contenu = $contenu;
    }

    public function getAuteur() {
        return $this->auteur;
    }
    public function setAuteur( $auteur ) {
        $this->auteur = $auteur;
    }

    public function getDate() {
        return $this->date;
    }
    public function setDate( $date ) {
        $this->date = $date;
    }
}