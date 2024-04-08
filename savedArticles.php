<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RSS Viewer - Articles sauvegardés</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <?php
        require_once("connexion.php");
        require_once("fonctions.php");
        // Présence d'un id provenant du formulaire de délétion
        if(isset($_POST["toDelete"])){ 
            $article = getArticleById($cnx, $_POST["toDelete"]);
            if(isset($article["img"])) unlink(substr($article["img"], 2)); //on enlève le "./" devant le lien de l'image pour le supprimer
            deleteById($cnx, $_POST["toDelete"]);
        }
        displayHeader(true);
        $data = getAllArticles($cnx);
        // Affichage des articles selon le même style que l'affichage des articles dans la page d'accueil
        echo "<div class='content flex-wrap'>";
        foreach ($data as $value) {
            echo "<fieldset class='saved-article pale-grey'>";
            echo "<h4>".$value["titre"]."</h4>";
            echo "<p>".$value["description"]."</p>";
            echo '<div class="plus-button"><a href="'.$value["link"].'">Voir plus</a></div>';
            echo "<form method='POST' action='savedArticles.php'>";
            echo '<input name="toDelete" type="hidden" value="'.$value["idArticle"].'">'; // input invisible contenant l'id de l'article à peut être supprimer
            echo "<br><div class='delete-button'><a onclick='javascript:this.parentNode.parentNode.submit()'>Supprimer</a></div>"; // bouton supprimer qui envoie le formulaire
            echo "</form>";
            if(!empty($value["img"])) echo "<div class='centered'><img src='".$value["img"]."'/></div>"; // absence d'image dans la base de donnée
            echo "</fieldset>";
        }
        echo "</div>";
        displayFooter();
    ?>
</body>
</html>