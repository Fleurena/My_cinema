<?php
    include('films/film_accueil.php');
    include('films/recherches_genres.php');
    include('films/recherches_distrib.php');
    include('films/recherches_genres_all.php');
    include('films/recherches_dates.php');
    include('films/recherches_mots_films.php');
    include('films/recherches_mots_genres.php');
    include('films/recherches_mots_distribs.php');
    include('films/recherches_membres.php');
    include('films/pagination.php');
    $nb_pages = nb_page();
    $page = current_page();
    $getfilm_acc = getfilm_acc();
    $get_names = get_name_genre();
    $get_name_distribs = get_name_distribs();
    $get_movies_by_genres = get_movies_by_genre();
    $get_date_movies = get_date_movies();
    $search_words = search_words();
    $search_words_genres = search_words_genres();
    $search_words_distribs = search_words_distribs();
    $getmembers = getmember();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>My Cinema</title>
    <link rel="stylesheet" type="text/css" href="films/style.css">
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
            <h1>Films</h1>

        <form action="films.php" method="GET">
            <p>
                <select name="genre">
                    <option value="null">Genres</option>
                    <?php foreach($get_names as $get_name){ ?>
                        <option value="<?= $get_name['nom'];?>"><?= $get_name['nom'];?></option>
                    <?php }?>
                </select>
                <select name="distrib">
                    <option value="null">Distributeurs</option>
                    <?php foreach($get_name_distribs as $get_name_distrib){ ?>
                        <option value="<?= $get_name_distrib['nom'];?>"><?= $get_name_distrib['nom'];?></option>
                    <?php }?>
                </select>
                <select name="date">
                    <option value="null">Années</option>
                    <?php foreach($get_date_movies as $get_date_movie){ ?>
                        <option value="<?= $get_date_movie['annee_prod'];?>"><?= $get_date_movie['annee_prod'];?></option>
                    <?php } ;?>
                </select>
                <input type="submit" name="submit">
            </p>
        </form>

        <?php 
            for($i = 1; $i < $nb_pages; $i++){ 
           echo "<a href='films.php?page=". $i . "&genre=". $_GET['genre']. "&distrib=". $_GET['distrib']."&date=".$_GET['date']."&submit=submit'>". $i . " </a>";
         } ?>

        <table class="table table-striped table-bordered table-hover table-condensed">
            <tbody>
                <tr>
                    <th class="th_titre">Affiches</th>
                    <th class="th_titre">Titres</th>
                    <th class="th_resum">Synopsis</th>
                    <th class="th_date">Date début</th>
                    <th class="th_date">Date fin</th>
                    <th class="th_date">Durée</th>
                    <th class="th_date">Année de production</th>
                </tr>

                <?php foreach($getmembers as $getmember): ?>
                <tr>
                    <td><img src="films/affiche.jpg" alt="affiches de films"></td>
                    <td class="td_titre"><?= $getmember['nom']; ?></td>
                    <td class="td_resum"><?= $getmember['prenom']; ?></td>
                    <td class="td_date"><?= $getmember['date_naissance']; ?></td>
                    <td class="td_date"><?= $getmember['email']; ?></td>
                    <td class="td_date"><?= $getmember['cpostal']; ?></td>
                    <td class="td_date"><?= $getmember['ville']; ?></td>
                </tr>
                <?php endforeach; ?>

                <?php foreach($search_words as $search_words): ?>
                <tr>
                    <td><img src="films/affiche.jpg" alt="affiches de films"></td>
                    <td class="td_titre"><?= $search_words['titre']; ?></td>
                    <td class="td_resum"><?= $search_words['resum']; ?></td>
                    <td class="td_date"><?= $search_words['date_debut_affiche']; ?></td>
                    <td class="td_date"><?= $search_words['date_fin_affiche']; ?></td>
                    <td class="td_date"><?= $search_words['duree_min']; ?></td>
                    <td class="td_date"><?= $search_words['annee_prod']; ?></td>
                </tr>
                <?php endforeach; ?>

                <?php foreach($search_words_genres as $search_words_genre): ?>
                <tr>
                    <td><img src="films/affiche.jpg" alt="affiches de films"></td>
                    <td class="td_titre"><?= $search_words_genre['titre']; ?></td>
                    <td class="td_resum"><?= $search_words_genre['resum']; ?></td>
                    <td class="td_date"><?= $search_words_genre['date_debut_affiche']; ?></td>
                    <td class="td_date"><?= $search_words_genre['date_fin_affiche']; ?></td>
                    <td class="td_date"><?= $search_words_genre['duree_min']; ?></td>
                    <td class="td_date"><?= $search_words_genre['annee_prod']; ?></td>
                </tr>
                <?php endforeach; ?>

                <?php foreach($search_words_distribs as $search_words_distrib): ?>
                <tr>
                    <td><img src="films/affiche.jpg" alt="affiches de films"></td>
                    <td class="td_titre"><?= $search_words_distrib['titre']; ?></td>
                    <td class="td_resum"><?= $search_words_distrib['resum']; ?></td>
                    <td class="td_date"><?= $search_words_distrib['date_debut_affiche']; ?></td>
                    <td class="td_date"><?= $search_words_distrib['date_fin_affiche']; ?></td>
                    <td class="td_date"><?= $search_words_distrib['duree_min']; ?></td>
                    <td class="td_date"><?= $search_words_distrib['annee_prod']; ?></td>
                </tr>
                <?php endforeach; ?>

                <?php foreach($get_movies_by_genres as $get_movies): ?>
                <tr>
                    <td><img src="films/affiche.jpg" alt="affiches de films"></td>
                    <td class="td_titre"><?= htmlspecialchars($get_movies['titre']); ?></td>
                    <td class="td_resum"><?= htmlspecialchars($get_movies['resum']); ?></td>
                    <td class="td_date"><?= htmlspecialchars($get_movies['date_debut_affiche']); ?></td>
                    <td class="td_date"><?= htmlspecialchars($get_movies['date_fin_affiche']); ?></td>
                    <td class="td_date"><?= htmlspecialchars($get_movies['duree_min']); ?></td>
                    <td class="td_date"><?= htmlspecialchars($get_movies['annee_prod']); ?></td>
                </tr>
                <?php endforeach; ?>

                <?php foreach($getfilm_acc as $getfilm): ?>
                <tr>
                    <td><img src="films/affiche.jpg" alt="affiches de films"></td>
                    <td class="td_titre"><?= $getfilm['titre']; ?></td>
                    <td class="td_resum"><?= $getfilm['resum']; ?></td>
                    <td class="td_date"><?= $getfilm['date_debut_affiche']; ?></td>
                    <td class="td_date"><?= $getfilm['date_fin_affiche']; ?></td>
                    <td class="td_date"><?= $getfilm['duree_min']; ?></td>
                    <td class="td_date"><?= $getfilm['annee_prod']; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php 
            for($i = 1; $i < $nb_pages; $i++){ 
           echo "<a href='films.php?page=". $i . "&genre=". $_GET['genre']. "&distrib=". $_GET['distrib']."&date=".$_GET['date']."&submit=submit'>". $i . " </a>";
         } ?>
        </div>
    </div>
 </div>
</div>
    <footer>  
    </footer>
</body>
</html>