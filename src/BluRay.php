<?php

namespace App;

class BluRay extends Media
{
    private  string $auteur;
    private  string $duree;
    private int $anneeSortie;

    /**
     * @param string $titre
     * @param string $auteur
     * @param string $duree
     * @param int $anneeSortie
     */
    public function __construct(string $titre,string $auteur, string $duree, int $anneeSortie) {
        parent::__construct($titre);
        $this->auteur = $auteur;
        $this->duree = $duree;
        $this->anneeSortie = $anneeSortie;
        $this->dureeEmprunt = new \DateInterval("P15D");
    }

    function getInformations() : string {
        $sortie = "Date de sortie : $this->anneeSortie";
        $auteur = "Auteur : $this->auteur";
        $titre = "Titre : $this->titre";
        $duree = "Duree : $this->duree";
        return "$sortie\n$auteur\n$titre\n$duree";
    }
}