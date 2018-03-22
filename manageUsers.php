<?php
session_start();
include "header.php";
require "backend.php";

$arrayUser = new Backend();
$db = new Database();


?>


<center>
	<h1> Administration Work'n Share </h1>
	<table>
		<caption> Membres Work'n Share <br><br></caption>

		<thead>
			<tr>
				<th>Identifiant</th>
				<th>Nom</th>
				<th>Prénom</th>
				<th>Email</th>
				<th>N° abonnement</th>

				<th>Statut</th>
				<th>Supprimer</th>
				<th>Débannir</th>
			</tr>
		</thead>
		<?php

			$arrayUser->result = $arrayUser->getUserDataFromDataBase();
			var_dump($arrayUser->result);
			foreach ($arrayUser->result = $db->fetchQuery() as $data) {
		?>
		<tbody>
			<tr>
				<?php

					echo $arrayUser->displayContent($data, 'idUser');
					/*echo $arrayUser->getUserDataFromDataBase('idUser');
					echo $arrayUser->getUserDataFromDataBase('nameUser');
					echo $arrayUser->getUserDataFromDataBase('surnameUser');
					echo $arrayUser->getUserDataFromDataBase('emailUser');
					echo $arrayUser->getUserDataFromDataBase('subscription');*/

			}

				?>
			</tr>
		</tbody>
	</table>
</center>
