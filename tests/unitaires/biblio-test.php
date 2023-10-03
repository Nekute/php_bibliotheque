<?php
require_once './vendor/autoload.php';
require_once "./tests/utils/couleurs.php";
echo PHP_EOL;
echo GREEN_BACKGROUND . BLACK;
echo "Tests : classe Bibliotheque";
echo RESET;
echo PHP_EOL;

$biblio = new \App\Bibliotheque("Bohol Hall");
$adherent = new \App\Adherent("Price", "Chloe", "chloeprice@gmail.com");
$livre = new \App\Livre("Le petit prince","9782070612758","Antoine de Saint-Exupéry",93);
$bluray = new \App\BluRay("Puss in boots : The last wish","Joel Crawford","1h40",2022);
$magazine = new \App\Magazine("Picsou magazine","1","21/02/1972");

$biblio->ajouterAdherent($adherent);
$biblio->ajouterMedia($livre);
$biblio->ajouterMedia($bluray);
$biblio->ajouterMedia($magazine);
$biblio->emprunterMedia("Le petit prince", $adherent);
dump($biblio->getMedias());