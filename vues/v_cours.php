<br>
<div id="contenu"  class="tabCours" >
<fieldset>
	<table align="center">
		<thead>
			<tr>
				<th>
					<center>
					Date
					</center>
				</th>
				<th>
					<center>
					Heure
					</center>
				</th>
				<th>
					<center>
					Enseignant
					</center>
				</th>
				<th>
					<center>
					Instrument
					</center>
				</th>
				<th>
					<center>
					S'inscrire
					</center>
				</th>
			</tr>
		</thead>
		<tbody>
	<?php
	foreach($lesCours as $unCours)
	{
		$numero=$unCours['id'];
		echo "
		<tr>
			<td>
				<center>
				".$lesCours[$numero]['date']."
				</center>
			</td>
			<td>
				<center>
				".$lesCours[$numero]['heure']."
				</center>
			</td>
			<td>
				<center>
				".$lesCours[$numero]['nom']." ".$lesCours[$numero]['prenom']."
				</center>
			</td>
			<td>
				<center>
				".$lesCours[$numero]['type']."
				</center>
			</td>
			<td>
				<center>
					<button class='butCours'>
						<a href='index.php?action=inscription&numero=".$numero."' >
							S'inscrire
						</a>
					</button>
				</center>
			</td>
		</tr>";
	}
	?>
		</tbody>
	</table>
</fieldset>
</div>
