<?php
require_once './vendor/autoload.php';
require_once "./tests/utils/couleurs.php";
echo PHP_EOL;
echo GREEN_BACKGROUND . BLACK;
echo "Tests : classe Adherent";
echo RESET;
echo PHP_EOL;

echo "Test n°1 : vérifier que la date d’adhésion, si non précisée à la création, est égale à la date du jour \n";
$adherent = new \App\Adherent("Price", "Chloe", "chloeprice@gmail.com");
$dateNow = new DateTime();
if ($adherent->getDateAdhesion()->format("d/m/Y") == $dateNow->format("d/m/Y")) {
    echo GREEN . "Test ok" . RESET;
} else {
    echo RED . "Test pas ok" . RESET;
}

echo "\n";
echo "Test n°2 : vérifier que la date d’adhésion, si précisée à la création, est bien prise en compte \n";
$dateAdhesion = DateTime::createFromFormat("d/m/Y", "12/12/2000");
$adherent = new \App\Adherent("Price", "Chloe", "chloeprice@gmail.com", "12/12/2000");
if ($adherent->getDateAdhesion() == $dateAdhesion) {
    echo GREEN . "Test ok" . RESET;
} else {
    echo RED . "Test pas ok" . RESET;
}
echo "\n";
echo "Test n°3 : vérifier que le numéro d’adhérent, à la création, est valide\n";
$adherent = new \App\Adherent("Price", "Chloe", "chloeprice@gmail.com", "12/12/2000");
if (str_contains($adherent->getNumero(), "AD-")
    && strlen($adherent->getNumero()) == 9
    && is_numeric(substr($adherent->getNumero(), -6))) {
    echo GREEN . "Test ok" . RESET;
} else {
    echo RED . "Test pas ok" . RESET;
}

echo "\n";
echo "Test n°4 : vérifier que l’adhésion est valable (valide) quand la date d’adhésion n’est pas dépassée (moins d’un an) \n";
$adherent = new \App\Adherent("Price", "Chloe", "chloeprice@gmail.com", "12/12/2022");
if ($adherent->checkAdhesionValide()){
    echo GREEN . "Date d'adhesion : {$adherent->getDateAdhesion()->format("d/m/Y")}, date valide" . RESET;
} else {
    echo RED . "Date d'adhesion : {$adherent->getDateAdhesion()->format("d/m/Y")}, date invalide" . RESET;
}

echo "\n";
echo "Test n°5 : vérifier que l’adhésion est renouvelée \n";
$adherent = new \App\Adherent("Price", "Chloe", "chloeprice@gmail.com", "12/12/2022");
echo "Date initiale de l'adherent : ".$adherent->getDateAdhesion()->format("d/m/Y")."\n";
if ($adherent->renouvelerAdhesion()){
    echo "Date renouvelée de l'adherent : ".$adherent->getDateAdhesion()->format("d/m/Y")."\n";
    echo GREEN . "Test ok" . RESET;
} else {
    echo RED . "Test pas ok" . RESET;
}