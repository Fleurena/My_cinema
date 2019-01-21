<?php 
   include('avis/id.php');
   include('avis/insert.php');
   include('avis/last_com.php');
   $last_com = last_com();
   $insert_avis = insert_avis();
   $ids = id();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>My Cinema</title>
    <link rel="stylesheet" type="text/css" href="avis/style.css">
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
                <h1>Commentaires</h1>
                <div class="row">
                    <div class="col-md-12">
                        <h2>Ajouter votre avis !</h2>
                        <form action="avis.php" method="POST">
                            <p>
                                <input class="form-control" type="text" name="id" placeholder="votre id" required><br>
                                <input class="form-control" type="text" name="id_confirm" placeholder="Retaper votre id" required><br>
                                <input class="form-control" type="text" name="film" placeholder="Titre du film" required><br>
                                <textarea class="form-control" name="avis" rows="5" cols="110" placeholder="Votre avis" required></textarea><br>
                                <input class="btn-primary" type="submit" name="submit">
                            </p>
                        </form>
                    </div>

                    <div class="col-md-12">
                        <h3>Derniers Commentaires de films :</h3>
                            
                        <table class="table table-striped table-hover">
                            <tr>
                                <th>Affiche</th>
                                <th>Film</th>
                                <th>Prénom</th>
                                <th>Commentaire</th>
                                <th>Date</th>
                            </tr>
                            <tbody>

                            <?php foreach ($ids as $id): ?>
                            <tr>
                                <td><img src="./films/affiche.jpg" alt="affiches de films"></td>
                                <td><?= $id['titre']; ?></td>
                                <td><?= $id['prenom']; ?></td>
                                <td><?= $id['avis']; ?></td>
                                <td><?= $id['date']; ?></td>
                            </tr>
                            <?php endforeach; ?>

                            <?php foreach ($last_com as $last): ?>
                            <tr>
                                <td><img src="./films/affiche.jpg" alt="affiches de films"></td>
                                <td><?= $last['titre']; ?></td>
                                <td><?= $last['prenom']; ?></td>
                                <td><?= $last['avis']; ?></td>
                                <td><?= $last['date']; ?></td>
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