<?php
include('./include.php');

function insert_avis()
{
	if(isset($_POST['avis']) AND isset($_POST['id']) AND isset($_POST['film']))
	{
		global $bdd;
		global $donnees;
		$id_film = id_film();

		$req = $bdd->prepare('INSERT INTO historique_membre(id_membre,id_film,date,avis) VALUES(:id, :film, NOW(), :avis)');

		$req->bindValue(':id', $_POST['id']);
		$req->bindValue(':film', $id_film);
		$req->bindValue(':avis', $_POST['avis']);

		$req->execute();
		return id_film();
	}
}

function id_film()
{
	if(isset($_POST['film']))
	{
		global $bdd;
		global $donnees;

		$req = $bdd->prepare('SELECT * FROM film WHERE titre = :film');

		$req->bindValue(':film', $_POST['film']);

		$req->execute();

		$donnees = $req->fetchAll();

		foreach ($donnees as $donnee) {
			$id_film = $donnee['id_film'];
		}
		return $id_film;
	}
}