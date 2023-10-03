<?php

namespace App;

class Bibliotheque
{
    private string $nom;
    /**
     * @var Adherent[]
     * @var Emprunt[]
     * @var Media[]
     */
    private array $recensement;

    /**
     * @param string $nom
     */
    public function __construct(string $nom) {
        $this->nom = $nom;
    }

    public function ajouterMedia(Media $media) {
        $this->recensement["medias"][] = $media;
    }

    public function ajouterAdherent(Adherent $adherent): void {
        $this->recensement["adherents"][] = $adherent;
    }

    public function emprunterMedia(Media|string $media, Adherent $adherent): bool {
        if (gettype($media) == "string") {
            foreach ($this->recensement["medias"] as $mediaTab) {
                if ($mediaTab->getTitre() == $media) {
                    $this->recensement["emprunts"][] = new Emprunt($adherent, $mediaTab);
                    return true;
                }
            }
            return false;
        } else {
            $this->recensement["emprunts"][] = new Emprunt($adherent, $media);
            return true;
        }
    }

    public function getAdherents(): array {
        return $this->recensement["adherents"];
    }

    public function getMedias(): array {
        return $this->recensement["medias"];
    }

    public function getEmprunts(): array {
        return $this->recensement["emprunts"];
    }

    /**
     * @return string
     */
    public function getNom(): string {
        return $this->nom;
    }

    /**
     * @param string $nom
     */
    public function setNom(string $nom): void {
        $this->nom = $nom;
    }

    /**
     * @return array
     */
    public function getRecensement(): array {
        return $this->recensement;
    }

    /**
     * @param array $recensement
     */
    public function setRecensement(array $recensement): void {
        $this->recensement = $recensement;
    }

}