<?php

include('include.php');

function search_words_genres()
{
$donnees = [];

if(isset($_POST['motclee']))
{
	global $bdd;
	global $donnees;

	$req = $bdd->prepare('SELECT * FROM film LEFT JOIN genre ON film.id_genre = genre.id_genre WHERE genre.nom = :motclee ORDER BY film.titre');

	$req->bindValue(':motclee', $_POST['motclee']);
	$req->execute();

	$donnees = $req->fetchAll();
	return $donnees;
}
if(!isset($_POST['motclee']))
	{
		$donnees = [];
		return $donnees;
	}
}
