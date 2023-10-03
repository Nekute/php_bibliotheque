<?php

namespace App;

class Magazine extends Media
{
    private int $numero;
    private \DateTime $datePublication;

    /**
     * @param string $titre
     * @param int $numero
     * @param string $datePublication
     */
    public function __construct(string $titre,int $numero, string $datePublication) {
        parent::__construct($titre);
        $this->numero = $numero;
        $this->datePublication = \DateTime::createFromFormat("d/m/Y", $datePublication);
        $this->dureeEmprunt = new \DateInterval("P10D");
    }

    function getInformations() : string {
        $titre = "Titre : $this->titre";
        $numero = "Numero : $this->numero";
        $datePublicaton = "date de publication : $this->datePublication";
        return "$titre\n$numero\n$datePublicaton";
    }
}