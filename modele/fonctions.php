<?php
require'connexion.php';

function supprimerInscription($cour,$inscrit){
	$bdd= connect();
	$res=$bdd->prepare('DELETE FROM inscription WHERE id_cours='.$cour.' AND id_inscrit='.$inscrit.'');
	$res->execute(array($cour,$inscrit));
}

function initialisationPDF($cour,$inscrit) {
	$bdd= connect();
	$res=$bdd->prepare("SELECT * FROM cours, inscrit, inscription, enseignant
	WHERE cours.id_cours=inscription.id_cours
	AND	inscrit.id_inscrit=inscription.id_inscrit
	AND enseignant.id_enseignant=cours.id_enseignant
	AND inscription.id_inscrit=".$inscrit." AND inscription.id_cours=".$cour." ");
	$res->execute(array($cour,$inscrit));
	$info = $res -> fetch(PDO::FETCH_OBJ);
		$lesInfo['nom'] = $info-> nom_inscrit ;
		$lesInfo['prenom'] = $info-> prenom_inscrit ;
		$lesInfo['date'] = $info-> dates_cours ;
		$lesInfo['heure'] = $info-> heure_cours ;
		$lesInfo['prof'] = $info-> nom_enseignant ;
		$JourTab=array('','Lundi','Mardi','Jeudi','Vendredi','Samedi','Dimanche');
		$lesInfo['jour']=$JourTab[$lesInfo['date']];
	return $lesInfo ; 
}

function getLesCours()
{  
	$cours = array();/*
	require dirname(__FILE__). "/connexion.php"; */
	$Jour = array("","Lundi","Mardi","Mercredi","Jeudi","Vendredi","Samedi","Dimanche");
	$numero=1 ;
	$bdd=connect();
	$sqlCours=$bdd->prepare("SELECT * FROM cours ORDER BY dates_cours , heure_cours");
	$sqlCours->execute();
	while($unCour = $sqlCours->fetch(PDO::FETCH_OBJ))
	{
		$id = $unCour->id_cours ;
		$date = $unCour->dates_cours ;
		$heure = $unCour->heure_cours ;
		$idEnseignant = $unCour->id_enseignant ;
		$idType = $unCour->id_type ;
		
		$sqlEnseignant=$bdd->prepare("SELECT nom_enseignant , prenom_enseignant FROM enseignant WHERE id_enseignant=".$idEnseignant);
		$sqlEnseignant->execute(array($idEnseignant));
		$leProf= $sqlEnseignant->fetch(PDO::FETCH_OBJ);
		$nom = strtoupper ($leProf->nom_enseignant);
		$prenom = $leProf->prenom_enseignant;
		
		$sqlType=$bdd->prepare("SELECT * FROM type_cours WHERE id_type=".$idType);
		$sqlType->execute(array($idType));
		$leType= $sqlType->fetch(PDO::FETCH_OBJ);
		$type= $leType->libelle_type;
		
		$cours[$numero]['id']=$id;
		$cours[$numero]['date']=$Jour[$date] ;
		$cours[$numero]['heure']=$heure ;
		$cours[$numero]['nom']=$nom ;
		$cours[$numero]['prenom']=$prenom ;
		$cours[$numero]['type']=$type ;
		
		$numero+=1 ;
	}
	return $cours;
}

function getLeCour($leCour)
{
	$bdd=connect();
	$ceCour = array();
	$Jour = array("","Lundi","Mardi","Mercredi","Jeudi","Vendredi","Samedi","Dimanche");
	
	$sqlCour=$bdd->prepare("SELECT * FROM cours WHERE id_cours=".$leCour);
	$sqlCour->execute(array($leCour));
	$infoCour= $sqlCour->fetch(PDO::FETCH_OBJ);
	
		$ceCour['id']= $infoCour->id_cours ;
		$ceCour['date']= $Jour[$infoCour->dates_cours] ;
		$ceCour['heure']= $infoCour->heure_cours ; 
		
		$idEnseignant = $infoCour->id_enseignant ;
		$idType = $infoCour->id_type ;
		
	$sqlEnseignant=$bdd->prepare("SELECT nom_enseignant , prenom_enseignant FROM enseignant WHERE id_enseignant=".$idEnseignant);
	$sqlEnseignant->execute(array($idEnseignant));
	$leProf= $sqlEnseignant->fetch(PDO::FETCH_OBJ);
	$nom = strtoupper ($leProf->nom_enseignant);
	$prenom = $leProf->prenom_enseignant;
	
		$ceCour['nom']=$nom;
		$ceCour['prenom']=$prenom;
	
	$sqlType=$bdd->prepare("SELECT * FROM type_cours WHERE id_type=".$idType);
	$sqlType->execute(array($idType));
	$leType= $sqlType->fetch(PDO::FETCH_OBJ);
	$type= $leType->libelle_type;
	
		$ceCour['type']=$type;
		
	return $ceCour ;
}
function inscrireCours() {
// récup numéro cours
$numero = $_REQUEST["numero"];
return $numero;
}
function validerInscription($nom,$prenom,$email,$Jour,$Mois,$Annee,$numero)
{
	$prenom = ucwords($prenom);
	$bdd=connect();
	(string) $naissance = "".$Annee."-".$Mois."-".$Jour."" ;
	$nom=strtoupper($nom);
	$sqlvaliderInscription=$bdd->prepare("INSERT INTO inscrit(nom_inscrit,prenom_inscrit,email_inscrit,dateNaissance_inscrit) VALUES ('".$nom."','".$prenom."','".$email."','".$naissance."') ");
	$sqlvaliderInscription->execute(array($nom,$prenom,$email,$naissance));
	
	
	$sql2=$bdd->prepare('SELECT * FROM inscrit WHERE nom_inscrit="'.$nom.'" and prenom_inscrit="'.$prenom.'" ORDER BY id_inscrit ASC');
	$sql2->execute(array($nom,$prenom));
	$unId=$sql2->fetch(PDO::FETCH_OBJ);
	$id=$unId->id_inscrit ;
	
	
	$sql3=$bdd->prepare ('INSERT INTO inscription VALUES ('.$id.','.$numero.') ');
	$sql3->execute(array($id,$numero));
	
	
		
}

function getLesInscription($lesCours){
	$bdd=connect();
	for($i=1 ; $i <=sizeof($lesCours) ; $i++)
	{
		$AI[$i]['id']=$lesCours[$i]['id'];
		$AI[$i]['date']=$lesCours[$i]['date'];
		$AI[$i]['heure']=$lesCours[$i]['heure'];
		$AI[$i]['type']=$lesCours[$i]['type'];
		$AI[$i]['nom']=$lesCours[$i]['nom'];
		$AI[$i]['prenom']=$lesCours[$i]['prenom'];	
		$AI[$i]['nbInscrit']=0;
		$nb=0;
		
		$SLTinscription=$bdd->prepare("SELECT * FROM inscription WHERE id_cours='".$AI[$i]['id']."' ");
		$SLTinscription->execute(array($AI[$i]['id']));
		while($unInscrit = $SLTinscription->fetch(PDO::FETCH_OBJ))
		{
			$nb+=1;
			$AI[$i]['nbInscrit']=$nb ;
			$AI[$i][$nb]['id']=$unInscrit->id_inscrit ;
			
			$SLTinfoInscrit=$bdd->prepare("SELECT * FROM inscrit WHERE id_inscrit=".$AI[$i][$nb]['id']." ");
			$SLTinfoInscrit->execute(array($AI[$i][$nb]['id']));
			while($infoInscrit = $SLTinfoInscrit->fetch(PDO::FETCH_OBJ))
			{
				$AI[$i][$nb]['nom'] = $infoInscrit->nom_inscrit;
				$AI[$i][$nb]['prenom'] = $infoInscrit->prenom_inscrit;
			}
		}
		
	}
	return $AI ;
}

?>