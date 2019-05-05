<br><br>
<div align='center' class='fieldsetInscription'>
	<fieldset>
		<?php 
		extract($_GET);
		if(!empty($numero))
		{
			$leCours = getLeCour($numero);
		echo "<center><h2>	Inscription pour le ".$leCours['date']." a ".$leCours['heure']." de ".$leCours['type']." avec ".$leCours['nom']."	</h2></center>";
		}
		?>
		
		<form method='POST' action='index.php?action=validerInscription'>
		<input type='hidden' value='<?php echo $numero ; ?>' name='numero'>
			Votre Nom : <br>
			<input type='text' name='nomDeLinscrit' placeholder="Entrez votre nom">
			<br><br>
			Votre Prenom : <br>
			<input type='text' name='prenomDeLinscrit' placeholder="Entrez votre prenom">
			<br><br>
			Votre Email : <br>
			<input type='text' name='emailDeLinscrit' placeholder="Entrez votre email" size=30>
			<br><br>
			Date de Naissance :
			<select name="Jour">
				<?php for($i=1 ; $i <32 ; $i++)
				{
					if($i<10)
					{
						echo"<option value=0".$i.">0".$i."</option>";
					}
					else
					{
						echo"<option value=".$i.">".$i."</option>";
					}
				} ?>
			</select>
			/
			<?php $mois=['Janvier','Fevrier','Mars','Avril','Mai','Juin','Juillet','Aout','Septembre','Octobre','Novembre','Decembre']; ?>
			<select name='Mois'>
				<?php for($i=1 ; $i<13 ; $i++)
				{
					if($i<10)
					{
						echo"<option value=0".$i.">".$mois[$i-1]."</option>";
					}
					else
					{
						echo"<option value=".$i.">".$mois[$i-1]."</option>";
					}
				}?>
			</select>
			/
			<?php $anneeActuelle=date('Y');?>
			<select name='Annee'>
				<?php for ($i=$anneeActuelle ; $i > 1900 ; $i--)
				{
					echo"<option value=".$i.">".$i."</option>";
				}?>
			</select>
			<br><br>
			<input type='submit' value="S'inscrire">

		</form>
	</fieldset>
</div>