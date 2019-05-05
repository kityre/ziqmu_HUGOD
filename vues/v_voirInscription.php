
<br><br>
<?php
for($i=1 ; $i <=sizeof($AI) ; $i++)
{
?>
<div align="center" class="fieldsetVoirInscription">
	<fieldset>
		<?php 
		echo "
		<h3><b>Cour: ".$AI[$i]['id']."</b>&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;".$AI[$i]['date']."&nbsp&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;".$AI[$i]['heure'].
		"&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;".$AI[$i]['nom']."&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;".$AI[$i]['nbInscrit']." participant(s)</h3>";
		if($AI[$i]['nbInscrit'] !=0) {
			echo"
			<table align='center'>
				<thead>
					<tr style='background-color:grey;'>
						<th>
							Place
						</th>
						<th>
							Nom
						</th>
						<th>
							Prenom
						</th>
						<th>
							PDF
						</th>
						<th>
							Supprimer
						</th>
					</tr>
				</thead>
				<tbody>";
				for($nb=1 ; $nb <= ($AI[$i]['nbInscrit']) ; $nb ++ ) {
					echo "
						<tr>
							<td>
								<center>
									<b>
										".$nb."
									</b>
								</center>
							</td>
							<td>
								<center>
									".$AI[$i][$nb]['nom']."
								</center>
							</td>
							<td>
								<center>
									".$AI[$i][$nb]['prenom']."
								</center>
							</td>
							<td>
								<center>
									<a href='index.php?action=pdfInscription&cour=".$AI[$i]['id']."&indice=".$AI[$i][$nb]['id']."' >
										<img src='images/pdf2.png' />
									</a>
								</center>
							</td>
							<td>
								<center>
									<a href='index.php?action=supInscription&cour=".$AI[$i]['id']."&indice=".$AI[$i][$nb]['id']."' >
										<button>
											Supprimer
										</button>
									</a>
								</center>
							</td>
						</tr>";
				}
			}
			else {
				echo "<center> Pas d'inscription pour ce cour</center>";
			}
			echo "
			</tbody>
		</table>";		
		?>
	</fieldset>
</div>
	<br>
	
<?php
}
?>