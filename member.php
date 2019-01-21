<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>My Cinema</title>
    <link rel="stylesheet" type="text/css" href="member/style.css">
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
                <h1>Membres</h1>
                <div class="row">
                    <div class="col-md-6">
                        <h2>Connexion</h2>
                        <form class="form_members" action="member/connexion.php" method="post">
                            <p>
                                Prenom :
                                <label for="prenom"></label><input type="text" name="prenom" class="prenom" id="prenom" required /><br /><br />
                                Mot de passe :
                                <input type="password" name="motdepasse" class="motdepasse" required/><br /><br />
                                Adresse email :
                                <input type="email" name="email" class="email" required/><br /><br />
                                <input type="submit" name="envoyer" class="envoyer" value="Se connecter" />
                                <?php if(isset($_SESSION['flash'])): ?>
                                    <?php foreach ($_SESSION['flash'] as $type => $message): ?>
                                        <p class="alert alert-<?= $type; ?>">
                                            <?= $message; ?>
                                    <?php endforeach; ?>
                                    <?php unset($_SESSION['flash']); ?>
                                <?php endif; ?>
                            </p>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <h2>Inscription</h2>
                        <form class="form_members" action="formulaire.php" method="post">
                        <p>
                            Nom :
                            <label for="nom"></label><input type="text" name="nom" class="nom" id="nom" /><br /><br />
                            Prenom :
                            <label for="prenom2"></label><input type="text" name="prenom" class="prenom" id="prenom2" /><br /><br />
                            Mot de passe :
                            <input type="password" name="motdepasse" class="motdepasse"/><br /><br />
                            Retapez votre<br>
                            mot de passe :
                            <input type="password" name="motdepasse2" class="motdepasse2"/><br /><br />
                            Adresse email :
                            <input type="email" name="email" class="email"/><br /><br />
                            Date de naissance :
                            <input type="date" name="naissance" class="naissance"/><br /><br />
                            <input type="submit" name="envoyer" class="envoyer" value="Valider"/>
                        </p>
                        </form>
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