<?php
include('include.php');
$donnees = [];

	global $bdd;

	if(!empty($_POST['prenom']) AND !empty($_POST['motdepasse']) AND !empty($_POST['email']))
	{
	$req = $bdd->prepare('SELECT * FROM fiche_personne WHERE prenom = :prenom AND password = :password AND email = :email');

	$req->bindValue(':prenom', $_POST['prenom']);
	$req->bindValue(':password', $_POST['motdepasse']);
	$req->bindValue(':email', $_POST['email']);
	$req->execute();

	$donnees = $req->fetch();
	session_start();

	function session()
	{
		global $donnees;
		if(isset($_POST['prenom']) == $donnees['prenom'] AND isset($_POST['motdepasse']) == $donnees['password'] AND isset($_POST['email']) == $donnees['email'])
		{
			$_SESSION['motdepasse'] = $donnees['password'];
			$_SESSION['prenom'] = $_POST['prenom'];
			$_SESSION['email'] = $_POST['email'];
			$_SESSION['auth'] = $_SESSION['motdepasse'];
			$_SESSION['auth'] = $_SESSION['prenom'];
			$_SESSION['auth'] = $_SESSION['email'];
			/*echo "<h1>Bonjour " . $_SESSION['prenom']. "</h1>";*/
			/*session_destroy();*/
		}
		else
		{
			$_SESSION['flash']['danger'] = "Mauvaise saisie.";
			header('Location: ../member.php');
		}
	}

		if(!isset($_POST['prenom']) AND !isset($_POST['email']) AND !isset($_POST['motdepasse']))
		{
			$donnees = [];
			return $donnees;
		}
	}

	include('connex_historique.php');
	$get_historiques = get_historique();
	include('id.php');
	$get_ids = get_id();