<?php 
include('include.php');

$donnees = [];
function nb_page()
{
if(isset($_GET['date']))
{
	global $bdd;

	$film_per_page = 15;

	$req = $bdd->prepare('SELECT COUNT(*) AS nb_films FROM film WHERE annee_prod = :prod');

	$req->bindValue(':prod', $_GET['date']);
	$req->execute();
	$donnees = $req->fetch();
	$nb_film = $donnees['nb_films'];

// Number per pages
	$nb_pages = ceil($nb_film / $film_per_page);
	return $nb_pages;

}
if(!isset($_GET['date']))
	{
		$nb_pages = 1;
	}
}

function current_page()
{
	global $nb_pages;
	if(isset($_GET['page'])){
		$page = $_GET['page'];
		if($page>$nb_pages){
			$page = $nb_pages;
		}
	}
	else{
		$page = 1;
	}
	return $page;
}

	/*for($i = 1; $i <= $nb_pages; $i++)
	{
        echo "<a href='films.php?page=". $i . "?genre=". $_GET['genre']. "&distrib=". $_GET['distrib']."&date=".$_GET['date']."&submit=submit'>". $i . "</a>";
	}

$first_movie = ($page-1) * $movies_per_page;
*/