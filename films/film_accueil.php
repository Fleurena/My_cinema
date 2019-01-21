<?php 

include('include.php');

function getfilm_acc()
{ 
	global $bdd;

	if(!isset($_GET['genre']) AND !isset($_GET['distrib']) AND !isset($_GET['date']) AND !isset($_POST['motclee']))
	{
		$req = $bdd->prepare('SELECT * FROM film LIMIT 15');
		$req->execute();

		$donnees_movies = $req->fetchAll();
		return $donnees_movies;
	}
	else{
		$donnees_movies = [];
		return $donnees_movies;
	}
}