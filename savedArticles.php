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
        if(isset($_POST["toDelete"])){
            $article = getArticleById($cnx, $_POST["toDelete"]);
            if(isset($article["img"])) unlink(substr($article["img"], 2));
            deleteById($cnx, $_POST["toDelete"]);
        }
        displayHeader(true);
        $data = getAllArticles($cnx);
        echo "<div class='content flex-wrap'>";
        foreach ($data as $value) {
            echo "<fieldset class='saved-article pale-grey'>";
            echo "<h4>".$value["titre"]."</h4>";
            echo "<p>".$value["description"]."</p>";
            echo '<div class="plus-button"><a href="'.$value["link"].'">Voir plus</a></div>';
            echo "<form method='POST' action='savedArticles.php'>";
            echo '<input name="toDelete" type="hidden" value="'.$value["idArticle"].'">';
            echo "<br><div class='delete-button'><a onclick='javascript:this.parentNode.parentNode.submit()'>Supprimer</a></div>";
            echo "</form>";
            if(!empty($value["img"])) echo "<div class='centered'><img src='".$value["img"]."'/></div>";
            echo "</fieldset>";
        }
        echo "</div>";
        displayFooter();
    ?>
</body>
</html>