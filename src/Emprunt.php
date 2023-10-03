<?php

namespace App;

class Emprunt
{
    private Adherent $adherent;
    private Media $media;
    private \DateTimeImmutable $dateEmprunt;
    private \DateTime $dateRetourEstimee;
    private ?\DateTime $dateRetourReel;

    /**
     * @param Adherent $adherent
     * @param Media $media
     * @param string $dateEmprunt
     */
    public function __construct(Adherent $adherent, Media $media) {
        $this->adherent = $adherent;
        $this->media = $media;
        $this->dateEmprunt = new \DateTimeImmutable();
        $this->dateRetourEstimee = $this->calculerDateRetourEstimee();
        $this->dateRetourReel = null;
    }

    private function calculerDateRetourEstimee(): \DateTime {

        return \DateTime::createFromImmutable($this->dateEmprunt->add($this->media->getDureeEmprunt()));
    }

    public function checkIfEnCours(): bool {
        return $this->dateRetourReel === null;
    }

    public function checkIfEnAlerte(): bool {
        return $this->dateRetourEstimee > new \DateTime() && $this->dateRetourReel === null;
    }

    public function checkIfDureeDepassee(): bool {
        return $this->dateRetourReel != null && $this->dateRetourReel > $this->dateRetourEstimee;
    }

    /**
     * @return Adherent
     */
    public function getAdherent(): Adherent {
        return $this->adherent;
    }

    /**
     * @param Adherent $adherent
     */
    public function setAdherent(Adherent $adherent): void {
        $this->adherent = $adherent;
    }

    /**
     * @return Media
     */
    public function getMedia(): Media {
        return $this->media;
    }

    /**
     * @param Media $media
     */
    public function setMedia(Media $media): void {
        $this->media = $media;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getDateEmprunt(): \DateTimeImmutable {
        return $this->dateEmprunt;
    }

    /**
     * @param \DateTime $dateEmprunt
     */
    public function setDateEmprunt(\DateTime $dateEmprunt): void {
        $this->dateEmprunt = $dateEmprunt;
    }

    /**
     * @return \DateTime
     */
    public function getDateRetourEstimee(): \DateTime {
        return $this->dateRetourEstimee;
    }

    /**
     * @param \DateTime $dateRetourEstimee
     */
    public function setDateRetourEstimee(\DateTime $dateRetourEstimee): void {
        $this->dateRetourEstimee = $dateRetourEstimee;
    }

    /**
     * @return \DateTime
     */
    public function getDateRetourReel(): ?\DateTime {
        return $this->dateRetourReel;
    }

    /**
     * @param \DateTime $dateRetourReel
     */
    public function aRendu(?string $date): void {
        if ($date != null){
            $date = \DateTime::createFromFormat("d/m/Y", $date);
        } else {
            $date = new \DateTime();
        }
        $this->dateRetourReel = $date;
    }

}