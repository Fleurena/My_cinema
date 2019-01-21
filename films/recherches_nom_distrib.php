<?php
include('include.php');


	$distributeur = $_GET["distrib"];
	$genre = $_GET["genre"];

$req = $bdd->query('SELECT titre, resum, date_debut_affiche, date_fin_affiche, duree_min, annee_prod FROM film INNER JOIN distrib ON film.id_distrib = distrib.id_distrib LEFT JOIN genre ON film.id_genre = genre.id_genre WHERE distrib.nom = "'.$distributeur.'" AND genre.nom = "'.$genre.'" ORDER BY film.titre LIMIT 10');

while ($donnees = $req->fetch())
{
	echo "<div class='name_1'>" . $donnees['titre'] ."</div>
	<div class='resum_1'>" . $donnees['resum'] ."</div>
	<div class='start_1'>" . $donnees['date_debut_affiche'] ."</div>
	<div class='end_1'>" . $donnees['date_fin_affiche'] ."</div>
	<div class='min_1'>" . $donnees['duree_min'] ."</div>
	<div class='year_1'>" . $donnees['annee_prod'] ."</div>";
}

$req->closeCursor();
