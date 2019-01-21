<?php

include('include.php');

function search_words_distribs()
{
$donnees = [];

if(isset($_POST['motclee']))
{
	global $bdd;
	global $donnees;

	$req = $bdd->prepare('SELECT * FROM film LEFT JOIN distrib ON film.id_genre = distrib.id_distrib WHERE distrib.nom = :motclee ORDER BY film.titre');

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
