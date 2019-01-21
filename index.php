<?php 
include('box_office.php');
$box_office = box_office();
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
                        <a href="index.php"><img src="images/logo.png" alt="mycinema"></a>
                    </div>
                <div class="col-md-5">
                    <div class="search">
                        <form action="films.php" method="post">
                            <input type="text" id="recherche" name="motclee" placeholder="Film, genre, distributeur, membre">
                            <input type="submit" name="submit">
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
            
            <div class="col-md-5">
                <div class="box_office">
                    <div class="col-md-12">
                    <h1>Films a l'affiche !</h1>
                        <table class="table table-striped table-bordered table-hover table-condensed">
                            <tbody>
                                <tr>
                                    <th>Films</th>
                                    <th>Synopsis</th>
                                    <th>Salle</th>
                                </tr>

                                <?php foreach($box_office as $box_offices): ?>
                                <tr>
                                <td><img src="films/affiche.jpg" alt="affiches de films">
                                    <?= "<br>".$box_offices['titre']; ?></td>
                                <td><?= $box_offices['resum']; ?></td>
                                <td><?= $box_offices['numero_salle']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="row">
                    <div class="col-md-6">
                        <a href="member.php">
                            <div class="espace">
                                <h2 class="home_h2">Espace Membres</h2>
                            </div>
                        </a>
                    </div>
                    <a href="pass.php">
                        <div class="col-md-6">
                            <div class="espace">
                                <h3 class="home_abo">Abonnements</h3>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <a href="films.php">
                            <div class="block">
                                <h2 class="home_films">Films</h2>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <a href="avis.php">
                            <div class="block">
                                <h2 class="home_collations">Commentaires</h2>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer>
        
    </footer>
</body>
</html>