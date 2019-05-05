<?php
if(!isset($_REQUEST['action']))
    $action = 'accueil';
else
    $action = $_REQUEST['action'];

// vue qui crée l’en-tête de la page
include("vues/v_entete.php") ;

switch($action)
{
    case 'accueil':
	  // vue qui crée le contenu de la page d’accueil
        include("vues/v_accueil.php");
        break;
	case 'voirCours' :
		include("modele/fonctions.php");
        $lesCours = getLesCours();
        include("vues/v_cours.php");
        break;
	case 'inscription' :
		include("modele/fonctions.php");
		$numero = inscrireCours();
		include("vues/v_formulaireInscription.php");
		break;
	case 'validerInscription' :
		extract($_POST);
		include("modele/fonctions.php");
		validerInscription($nomDeLinscrit,$prenomDeLinscrit,$emailDeLinscrit,$Jour,$Mois,$Annee,$numero);
		include("vues/v_validerInscription.php");
		break;
	case 'voirInscription' :
		include("modele/fonctions.php");
		$lesCours=getLesCours();
		$AI=getLesInscription($lesCours);
		include("vues/v_voirInscription.php");
		break;
	case 'pdfInscription' :
		include("modele/fonctions.php");
		$cour=$_GET['cour'];
		$indice=$_GET['indice'];
		$infoPDF=initialisationPDF($cour,$indice);
		include("vues/v_pdf_inscription.php");
		break;
	case 'supInscription' :
		include("modele/fonctions.php");
		$cour=$_GET['cour'];
		$indice=$_GET['indice'];
		supprimerInscription($cour,$indice); 
		header('location: index.php?action=voirInscription');
		break;
}

// vue qui crée le pied de page
include("vues/v_pied.php") ;
?>
