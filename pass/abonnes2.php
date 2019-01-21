<?php
include('./include.php');

$donnees = [];
function abonnes2()
{
	global $bdd;
	global $donnees;

if(isset($_POST['id_delete']))
{

	$req = $bdd->prepare('SELECT m.*, a.nom AS nom_a, f.nom AS nom_f, f.prenom AS prenom, a.prix AS prix, a.duree_abo AS duree_abo FROM membre AS m LEFT JOIN abonnement AS a ON m.id_abo = a.id_abo LEFT JOIN fiche_personne AS f ON m.id_fiche_perso = f.id_perso WHERE id_membre = :id_delete');

	$req->bindValue(':id_delete', $_POST['id_delete']);

	$req->execute();

	$donnees = $req->fetchAll();
	return $donnees;
}
if(!isset($_POST['id_delete']))
	{
		$donnees = [];
		return $donnees;
	}
}