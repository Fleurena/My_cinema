<?php 
include('session.php');

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>My Cinema</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
</head>
<body>
    <header>
        <nav>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-5">
                    <a href="../index.html"><img id="logo" src="../images/logo.png" alt="mycinema"></a>
                </div>
                <div class="col-md-5">
                    <div class="search">
                        <form action="films.php" method="post">
                            <input type="text" id="recherche" name="motclee" placeholder="Nom d'un film">
                            <input class="recherches" type="submit" name="submit">
                        </form>
                    </div>
                </div>
            </div>    
        </nav>
    </header>

    <div class="container_body">
        <div class="row">
            <div class="col-md-2">
                <div class="container_nav">
                    <ul>
                        <li><a href="../index.html">Accueil</a></li>
                        <li><a href="../films2.php">films</a></li>
                        <li><a href="../member.php">Membres</a></li>
                        <li><a href="../pass.php">Abonnements</a></li>
                        <li><a href="../avis.php">Commentaires</a></li>
                    </ul>
                </div>
            </div>

        <div class="container_formulaire">
            <div class="col-md-12">

                <div class="row">
                    <form method="post" action="session.php">
                        <input type="hidden" name="cache">
                    <div class="col-md-12"><a href="logout.php">Déconnection</a></div>
                    </form>
                </div>

                <div class="row">
                	<div class="col-md-12">
                        <div class="profil">
                        <img src="../images/profil.jpg">
                        </div>
                    	<h2><?= "Bonjour ". $_SESSION['prenom']; ?></h2>
                	</div>
                </div>
                <div class="row">
                	<div class="col-md-12">
                        <?php $session = session(); ?>

                		<h3>Dernier films vues :</h3>
                		<table class="table table-striped table-bordered table-hover table-condensed">
                                <tr>
                                    <th>Affiches</th>
                                    <th>Titres</th>
                                    <th>Synopsie</th>
                                    <th>Durée</th>
                                    <th>Date dernier film</th>
                                    <th>Avis</th>
                                </tr>
                			<tbody>

				                <?php
		                			foreach($get_historiques as $get_historique): ?>
				                <tr>
				                    <td><img src="../films/affiche.jpg"></td>
				                    <td class="td_titre"><?= $get_historique['titre']; ?></td>
				                    <td><?= $get_historique['resum']; ?></td>
				                    <td class="td_date"><?= $get_historique['duree_min']; ?></td>
				                    <td class="td_date"><?= $get_historique['date']; ?></td>
                                    <td class="td_date"><?= $get_historique['avis']; ?></td>
				                </tr>
				                <?php endforeach; ?>
                			</tbody>
                		</table>
                	</div>
                </div>
        	</div>
        </div>
    </div>

    <footer>
        
    </footer>
</body>
</html>