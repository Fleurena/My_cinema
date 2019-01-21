<?php
include('./include.php');

function updates()
{
if(isset($_POST['id']) AND isset($_POST['id_abos']))
{
	global $bdd;

	$req = $bdd->prepare('UPDATE membre SET id_abo = :id_abos WHERE id_membre = :id');

	$req->bindValue(':id_abos', $_POST['id_abos']);
	$req->bindValue(':id', $_POST['id']);

	$req->execute();
}
}