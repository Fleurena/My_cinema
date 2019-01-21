<?php
include('./include.php');

function delete()
{
if(isset($_POST['id_delete']))
{
	global $bdd;

	$req = $bdd->prepare('UPDATE membre SET id_abo = null WHERE id_membre = :id');

	$req->bindValue(':id', $_POST['id_delete']);

	$req->execute();
}
}