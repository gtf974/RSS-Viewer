<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RSS Viewer - Save</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <?php
        require_once("fonctions.php");
        displayHeader(true);
        echo "<div style='display:flex; align-items:center; flex-direction:column; min-height:100vh'>";
        if(isset($_POST["title"])){
            require_once("connexion.php");
            if(isset($_POST["image"]) && !empty($_POST["image"])){
                saveArticle($cnx, $_POST["title"], $_POST["link"], $_POST["description"], $_POST["image"]);
                echo "<p class='centered'>L'article a bien été enregistré ✅</p>";
                echo '<div class="plus-button"><a href="savedArticles.php">Voir les articles sauvegardés</a></div><br>';
                echo '<div class="plus-button"><a href="index.php">Retourner à l\'accueil</a></div>';
            } else {
                saveArticle($cnx, $_POST["title"], $_POST["link"], $_POST["description"]);
                echo "<p class='centered'>L'article a bien été enregistré ✅</p>";
                echo '<div class="plus-button"><a href="savedArticles.php">Voir les articles sauvegardés</a></div><br>';
                echo '<div class="plus-button"><a href="index.php">Retourner à l\'accueil</a></div>';
            }
        } else {
            echo "<p class='centered'>Erreur lors de l'envoi du formulaire ❌</p>";
            echo '<div class="plus-button"><a href="savedArticles.php">Voir les articles sauvegardés</a></div><br>';
            echo '<div class="plus-button"><a href="index.php">Retourner à l\'accueil</a></div>';
        }
        echo "</div>";
        displayFooter();
    ?>
</body>
</html>