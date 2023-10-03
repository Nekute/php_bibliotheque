<?php

namespace App;


class Adherent
{
    private string $numero;
    private string $nom;
    private string $prenom;
    private string $email;
    private \DateTime $dateAdhesion;

    /**
     * @param string $nom
     * @param string $prenom
     * @param string $email
     * @param ?string $dateAdhesion
     */
    public function __construct(string $nom, string $prenom, string $email, ?string $dateAdhesion = null) {
        $this->numero = $this->genererNumero();
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        if ( $dateAdhesion != null) {
            $dateAdhesion = \DateTime::createFromFormat("d/m/Y", $dateAdhesion);
        } else {
            $dateAdhesion = new \DateTime();
        }
        $this->dateAdhesion = $dateAdhesion;
    }

    private function genererNumero(): string {
        return "AD-" . str_pad(strval(rand(0, 999999)), 6, "0", STR_PAD_LEFT);
    }

    public function getInformations(): string {
        $numero = "Numero : $this->numero";
        $nom = "Nom : $this->nom";
        $prenom = "Prenom : $this->prenom";
        $email = "Email : $this->email";
        $dateAdhesion = "Date d'adhesion : {$this->dateAdhesion->format("d/m/Y")}";
        return "$numero\n$nom\n$prenom\n$email\n$dateAdhesion";
    }

    public function checkAdhesionValide(): bool {
        if ($this->dateAdhesion->diff(new \DateTime())->y != 0) {
            return false;
        }
        return true;
    }

    public function renouvelerAdhesion(): bool {
        try {
            $this->dateAdhesion->add(new \DateInterval("P1Y"));
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * @return string
     */
    public function getNumero(): string {
        return $this->numero;
    }

    /**
     * @param string $numero
     */
    public function setNumero(string $numero): void {
        $this->numero = $numero;
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
     * @return string
     */
    public function getPrenom(): string {
        return $this->prenom;
    }

    /**
     * @param string $prenom
     */
    public function setPrenom(string $prenom): void {
        $this->prenom = $prenom;
    }

    /**
     * @return string
     */
    public function getEmail(): string {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void {
        $this->email = $email;
    }

    /**
     * @return \DateTime
     */
    public function getDateAdhesion(): \DateTime {
        return $this->dateAdhesion;
    }

    /**
     * @param \DateTime $dateAdhesion
     */
    public function setDateAdhesion(\DateTime $dateAdhesion): void {
        $this->dateAdhesion = $dateAdhesion;
    }

}