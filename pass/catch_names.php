<?php
include('./include.php');

$donnees = [];

function catch_names_abos()
{
if(isset($_POST['id']))
{
	global $bdd;
	global $donnees;

	$req = $bdd->prepare('SELECT m.*, a.nom AS nom_a, f.nom AS nom_f, f.prenom AS prenom, a.prix AS prix, a.duree_abo AS duree_abo FROM membre AS m LEFT JOIN fiche_personne AS f ON m.id_fiche_perso = f.id_perso WHERE id_membre = :id');

	$req->bindValue(':id', $_POST['id']);

	$req->execute();

	$donnees = $req->fetchAll();
	return $donnees;
}
if(!isset($_POST['id']))
	{
		$donnees = [];
		return $donnees;
	}
}