<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RSS Viewer</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <?php
        require_once("fonctions.php");
        displayHeader();        
    ?>
    <div id="input-boxes">
        <div class="input-box">
            <label for="rss1">Premier lien RSS</label>
            <form class="link-form" id="form-1" method="POST" action="index.php" class="input-and-button">
                <input name="rss1" type="text">
                <input id="memory-1" class="hidden" type="text" value="" name="memory-1">
                <div id="submit-1" class="submit">Go</div>
            </form>
        </div>
        <div class="input-box">
            <label for="rss2">Deuxième lien RSS</label>
            <form class="link-form" id="form-2" method="POST" action="index.php" class="input-and-button">
                <input name="rss2" type="text">
                <input id="memory-2" class="hidden" type="text" value="" name="memory-2">
                <div id="submit-2" class="submit">Go</div>
            </form>
        </div>
    </div>
    <div class="content">
        <div id="left-content"><?php
            if(isset($_POST["rss1"]) && !empty($_POST["rss1"])){
                echo "<h1 class='centered'>".getTitle($_POST["rss1"])."</h1>";
                try {
                    getDataFromRSSURL($_POST["rss1"]);
                } catch (Exception $err) {
                    echo "<h1>Erreur lors du fetch.</h1>";
                }
            }
            if(isset($_POST["memory-2"]) && !empty($_POST["memory-2"])) echo $_POST["memory-2"];
        ?></div>
        <div id="right-content"><?php
            if(isset($_POST["rss2"]) && !empty($_POST["rss2"])){
                echo "<h1 class='centered'>".getTitle($_POST["rss2"])."</h1>";
                try {
                    getDataFromRSSURL($_POST["rss2"]);
                } catch (Exception $err) {
                    echo "<h1>Erreur lors du fetch.</h1>";
                }
            }
            if(isset($_POST["memory-1"]) && !empty($_POST["memory-1"])) echo $_POST["memory-1"];
        ?></div>
    </div>
    <?php displayFooter();?>
    <script src="index.js"></script>
</body>
</html>