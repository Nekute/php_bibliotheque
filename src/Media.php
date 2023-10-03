<?php

namespace App;

abstract class Media
{
    protected string $titre;
    protected \DateInterval $dureeEmprunt;

    /**
     * @param string $titre
     */
    public function __construct(string $titre) {
        $this->titre = $titre;
    }

    /**
     * @return string
     */
    public function getTitre(): string {
        return $this->titre;
    }

    /**
     * @param string $titre
     */
    public function setTitre(string $titre): void {
        $this->titre = $titre;
    }

    /**
     * @return \DateInterval
     */
    public function getDureeEmprunt(): \DateInterval {
        return $this->dureeEmprunt;
    }

    abstract function getInformations();
}