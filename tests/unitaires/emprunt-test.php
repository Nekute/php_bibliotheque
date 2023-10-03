<?php
require_once './vendor/autoload.php';
require_once "./tests/utils/couleurs.php";
echo PHP_EOL;
echo GREEN_BACKGROUND . BLACK;
echo "Tests : classe Emprunt";
echo RESET;
echo PHP_EOL;

$adherent = new \App\Adherent("Price", "Chloe", "chloeprice@gmail.com");
$livre = new \App\Livre("Le petit prince","9782070612758","Antoine de Saint-Exupéry",93);
$bluray = new \App\BluRay("Puss in boots : The last wish","Joel Crawford","1h40",2022);
$magazine = new \App\Magazine("Picsou magazine","1","21/02/1972");


echo "Test n°1 : vérifier que la date d’emprunt, à la création, est égale à la date du jour \n";
$emprunt = new \App\Emprunt($adherent,$magazine);
$dateNow = new DateTime();
if ($emprunt->getDateEmprunt()->format("d/m/Y") == $dateNow->format("d/m/Y")) {
    echo GREEN . "Test ok" . RESET;
} else {
    echo RED . "Test pas ok" . RESET;
}

echo "\n";
echo "Test n°2 : vérifier que la date de retour estimée, à la création, est égale à la date du jour + 21 jours pour l’emprunt d’un livre \n";
$emprunt = new \App\Emprunt($adherent,$livre);
if ($emprunt->getDateEmprunt()->diff($emprunt->getDateRetourEstimee())->d == 21) {
    echo GREEN . "Test ok" . RESET;
} else {
    echo RED . "Test pas ok" . RESET;
}

echo "\n";
echo "Test n°3 : vérifier que la date de retour estimée, à la création, est égale à la date du jour + 15 jours pour l’emprunt d’un blu-ray \n";
$emprunt = new \App\Emprunt($adherent,$bluray);
if ($emprunt->getDateEmprunt()->diff($emprunt->getDateRetourEstimee())->d == 15) {
    echo GREEN . "Test ok" . RESET;
} else {
    echo RED . "Test pas ok" . RESET;
}

echo "\n";
echo "Test n°4 : vérifier que la date de retour estimée, à la création, est égale à la date du jour + 10 jours pour l’emprunt d’un magazine \n";
$emprunt = new \App\Emprunt($adherent,$magazine);
if ($emprunt->getDateEmprunt()->diff($emprunt->getDateRetourEstimee())->d == 10) {
    echo GREEN . "Test ok" . RESET;
} else {
    echo RED . "Test pas ok" . RESET;
}

echo "\n";
echo "Test n°5 : vérifier que l’emprunt est en cours quand la date de retour n’est pas renseignée \n";
$emprunt = new \App\Emprunt($adherent,$magazine);
if ($emprunt->checkIfEnCours()) {
    echo GREEN . "Test ok" . RESET;
} else {
    echo RED . "Test pas ok" . RESET;
}

echo "\n";
echo "Test n°5 : vérifier que l’emprunt est en alerte quand la date de retour estimée est antérieure à la date du jour et que l’emprunt est en cours \n";
$emprunt = new \App\Emprunt($adherent,$magazine);
$emprunt->setDateRetourEstimee(DateTime::createFromFormat("d/m/Y","10/10/2020"));
if ($emprunt->checkIfEnAlerte()) {
    echo RED . "Test pas ok" . RESET;
} else {
    echo GREEN . "Test ok" . RESET;
}

echo "\n";
echo "Test n°5 : vérifier que la durée de l’emprunt a été dépassée quand la date de retour est postérieure à la date de retour estimée \n";
$emprunt = new \App\Emprunt($adherent,$magazine);
$emprunt->aRendu("10/10/2024");
if (!$emprunt->checkIfDureeDepassee()) {
    echo RED . "Test pas ok" . RESET;
} else {
    echo GREEN . "Test ok" . RESET;
}