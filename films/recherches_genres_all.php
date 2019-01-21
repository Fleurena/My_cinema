<?php
include('include.php');
$donnees = [];

function get_movies_by_genre()
{
	global $bdd;
	global $donnees;

	if(isset($_GET['genre']) AND $_GET['distrib'] == "null" AND $_GET['date'] == "null")
	{
		return get_genres();
	}
	elseif(isset($_GET['distrib']) AND $_GET['genre'] == "null" AND $_GET['date'] == "null")
	{
		return get_distribs();
	}
	elseif(isset($_GET['date']) AND isset($_GET['genre']) AND $_GET['genre'] == "null" AND $_GET['distrib'] == "null")
	{
		return get_date();
	}
	elseif(isset($_GET['genre']) AND isset($_GET['distrib']) AND $_GET['date'] == "null")
	{
		return get_both();
	}
	elseif(!isset($_GET['genre']) && !isset($_GET['distrib']) && !isset($_GET['date']) && !isset($_GET['null']))
	{
		$donnees = [];
		return $donnees;
	}
}

function get_genres()
{
	global $bdd;
	global $donnees;
	$page = current_page();
	$nb_pages = nb_page();
	$film_per_page = 15;
	
	$first_movie = ($page-1) * $film_per_page;

	if(isset($_GET['genre']))
	{
		$req = $bdd->prepare('SELECT * FROM film LEFT JOIN genre ON film.id_genre = genre.id_genre WHERE genre.nom = :genre ORDER BY film.titre LIMIT '.$first_movie.' , '.$film_per_page);

		$req->bindValue(':genre', $_GET['genre']);

		$req->execute();

		$donnees = $req->fetchAll();
		return $donnees;
	}
	if(!isset($_GET['genre']))
	{
		$donnees = [];
		return $donnees;
	}
}

function get_distribs()
{
	global $bdd;
	global $donnees;
	$page = current_page();
	$nb_pages = nb_page();
	$film_per_page = 15;
	
	$first_movie = ($page-1) * $film_per_page;

	if(isset($_GET['distrib']))
	{
		$req = $bdd->prepare('SELECT * FROM film LEFT JOIN distrib ON distrib.id_distrib = film.id_distrib WHERE distrib.nom = :distrib ORDER BY film.titre LIMIT '.$first_movie.' , '.$film_per_page);

		$req->bindValue(':distrib', $_GET['distrib']);

		$req->execute();

		$donnees = $req->fetchAll();
		return $donnees;
	}
	if(!isset($_GET['distrib']))
	{
		$donnees = [];
		return $donnees;
	}
}

function get_both()
{
	global $bdd;
	global $donnees;
	$page = current_page();
	$nb_pages = nb_page();
	
	$first_movie = ($page-1) * 15;

	if(isset($_GET['distrib']) AND isset($_GET['genre']))
	{
		$req = $bdd->prepare('SELECT * FROM film LEFT JOIN genre ON film.id_genre = genre.id_genre LEFT JOIN distrib ON distrib.id_distrib = film.id_distrib WHERE distrib.nom = :distrib AND genre.nom = :genre ORDER BY film.titre LIMIT '.$first_movie.' , 15');

		$req->bindValue(':distrib', $_GET['distrib']);
		$req->bindValue(':genre', $_GET['genre']);

		$req->execute();

		$donnees = $req->fetchAll();
		return $donnees;
	}
	if(!isset($_GET['distrib']) || !isset($_GET['genre']))
	{
		$donnees = [];
		return $donnees;
	}
}

function get_date()
{
	global $bdd;
	global $donnees;
	$page = current_page();
	$nb_pages = nb_page();
	$film_per_page = 15;
	
	$first_movie = ($page-1) * $film_per_page;

	if(isset($_GET['date']))
	{
		$date = $_GET['date'];
		$req = $bdd->prepare('SELECT * FROM film WHERE annee_prod = :prod ORDER BY titre LIMIT '.$first_movie.' , '.$film_per_page);

		$req->bindValue(':prod', $date);

		$req->execute();

		$donnees = $req->fetchAll();
		return $donnees;
	}
	if(!isset($_GET['date']))
	{
		$donnees = [];
		return $donnees;
	}
}