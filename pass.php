<?php 
    include('pass/tarifs.php');
    include('pass/abonnes.php');
    include('pass/abonnes2.php');
    include('pass/catch_abo.php');
    include('pass/update.php');
    include('pass/delete.php');
    $updates = updates();
    $delete = delete();
    $tarifs = tarifs();
    $abonnes = abonnes();
    $abonnes2 = abonnes2();
    $catch_abos = catch_abos();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>My Cinema</title>
    <link rel="stylesheet" type="text/css" href="pass/style.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
</head>
<body>
    <header>
        <nav>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-5">
                    <a href="index.php"><img id="logo" src="images/logo.png" alt="mycinema"></a>
                </div>
                <div class="col-md-5">
                    <div class="search">
                        <form action="films.php" method="post">
                            <input type="text" id="recherche" name="motclee" placeholder="Film, genre, distributeur, membre">
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
                        <li><a href="index.php">Accueil</a></li>
                        <li><a href="films.php">films</a></li>
                        <li><a href="member.php">Membres</a></li>
                        <li><a href="pass.php">Abonnements</a></li>
                        <li><a href="avis.php">Commentaires</a></li>
                    </ul>
                </div>
            </div>

        <div class="container_formulaire">
            <div class="col-md-12">
                <h1>Abonnements</h1>
                <div class="row">
                    <div class="col-md-12">
                        <h2>Tarifs</h2>
                        <table class="table table-striped table-dark">
                                <tr>
                                    <th>Abonnement</th>
                                    <th>Explications</th>
                                    <th>Prix</th>
                                    <th>Durée</th>
                                </tr>
                            <tbody>

                            <?php foreach ($tarifs as $tarif): ?>
                            <tr>
                                <td><?= $tarif['nom']; ?></td>
                                <td><?= $tarif['resum']; ?></td>
                                <td><?= $tarif['prix']; ?></td>
                                <td><?= $tarif['duree_abo']; ?></td>
                            </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="col-md-12">
                        <h3>Ajouter et/ou modifier :</h3>
                        <form action="pass.php" method="POST">
                            <p>
                                ID :
                                <label for="id"></label><input type="text" name="id" id="id">
                                <select name="id_abos">
                                    <option value="null">Abonnements</option>
                                    <?php foreach($catch_abos as $catch_abo){ ?>
                                    <option value="<?= $catch_abo['id_abo'];?>"><?= $catch_abo['nom'];?></option>
                                    <?php }?>
                                </select>
                            <label for="envoyer"></label><input type="submit" name="submit" id="envoyer">
                        </p>
                        </form>
                            
                        <table class="table table-striped">
                                <tr>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Abonnement</th>
                                    <th>Prix</th>
                                    <th>Durée</th>
                                </tr>
                            <tbody>

                            <?php foreach ($abonnes as $abonne): ?>
                            <tr>
                                <td><?= $abonne['nom_f']; ?></td>
                                <td><?= $abonne['prenom']; ?></td>
                                <td><?= $abonne['nom_a']; ?></td>
                                <td><?= $abonne['prix']; ?></td>
                                <td><?= $abonne['duree_abo']; ?></td>
                            </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        <h3>Supprimer un abonnement :</h3>
                        <form action="pass.php" method="POST">
                            <p>
                                ID :
                                <label for="id_delete"></label><input type="text" name="id_delete" id="id_delete">
                            <label for="submit"></label><input type="submit" name="submit" id="submit">
                        </p>
                        </form>
                            
                        <table class="table table-striped">
                                <tr>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Abonnement</th>
                                    <th>Prix</th>
                                    <th>Durée</th>
                                </tr>
                            <tbody>

                            <?php foreach ($abonnes2 as $abonnes): ?>
                            <tr>
                                <td><?= $abonnes['nom_f']; ?></td>
                                <td><?= $abonnes['prenom']; ?></td>
                                <td><?= $abonnes['nom_a']; ?></td>
                                <td><?= $abonnes['prix']; ?></td>
                                <td><?= $abonnes['duree_abo']; ?></td>
                            </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>

    <footer>
        
    </footer>
</body>
</html>