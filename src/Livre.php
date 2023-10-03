<?php

namespace App;

class Livre extends Media
{
    private string $isbn;
    private string $auteur;
    private int $nbPages;

    /**
     * @param string $titre
     * @param string $isbn
     * @param string $auteur
     * @param int $nbPages
     */
    public function __construct(string $titre,string $isbn, string $auteur, int $nbPages) {
        parent::__construct($titre);
        $this->isbn = $isbn;
        $this->auteur = $auteur;
        $this->nbPages = $nbPages;
        $this->dureeEmprunt = new \DateInterval("P21D");
    }

    public function getInformations() : string {
        $isbn = "ISBN : $this->isbn";
        $auteur = "Auteur : $this->auteur";
        $titre = "Titre : $this->titre";
        $nbpages = "Nombre de pages : $this->nbPages";
        return "$isbn\n$auteur\n$titre\n$nbpages";
    }


}