<?php 
extract($_GET);

if(!empty($cour))
{
	include("modele/fonctions.php");
	$leCours = getLeCour($cour);
	
	echo"
	Vous allez vous inscrire au cour ".$leCours['type']." de ".$leCours['nom']." ".$leCours['prenom']." le ".$leCours['date']." à ".$leCours['heure']."
	";
}