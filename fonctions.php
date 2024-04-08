<?php
    
    /**
     * Récupère l'article par son idArticle
     *
     * @param  PDO $cnx
     * @param  string $link
     * @return PDOStatement
     */
    function getArticleByLink($cnx, $link){
        $sql = "SELECT * FROM archive WHERE link='$link'";
        $res = $cnx->query($sql);
        if(!$res) return false;
        return $res->fetch();
    }
    
    /**
     * Récupère l'article par son lien d'article
     *
     * @param  PDO $cnx
     * @param  string $id
     * @return PDOStatement
     */
    function getArticleById($cnx, $id){
        $sql = "SELECT * FROM archive WHERE idArticle='$id'";
        $res = $cnx->query($sql);
        if(!$res) return false;
        return $res->fetch();
    }
    
    /**
     * Enregistre un article dans la bdd et s'il y a une image, l'enregistre aussi
     *
     * @param  PDO $cnx
     * @param  string $title
     * @param  string $link
     * @param  string $description
     * @param  string $imgLink
     * @return void
     */
    function saveArticle($cnx, $title, $link, $description, $imgLink=null){
        if(!getArticleByLink($cnx, $link)){ //vérification de l'existence de l'article, si oui, on ne le réenregistre pas
            $imgPath = null;
            if(isset($imgLink)){
                $imgName = uniqid();
                $imgPath = "./img/".$imgName.".png";
                file_put_contents($imgPath, file_get_contents($imgLink));
            }
            $sql = "INSERT INTO archive (titre, description, link, img) VALUES (?,?,?,?)";
            $cnx->prepare($sql)->execute([$title, $description, $link, $imgPath]);
        }
    }
    
    /**
     * Récupère tous les articles
     *
     * @param  PDO $cnx
     * @return PDOStatement
     */
    function getAllArticles($cnx){
        return $cnx->query("SELECT * FROM archive")->fetchAll();
    }
    
    /**
     * Supprime un article par son Id
     *
     * @param  PDO $cnx
     * @param  string $id
     * @return void
     */
    function deleteById($cnx, $id){
        $cnx->query("DELETE FROM archive WHERE idArticle=$id");
    }
    
    /**
     * Tronque la chaîne à environ 132 caractères (à partir de 132, on tronquera au prochain espace)
     *
     * @param  string $string
     * @return string
     */
    function formatTo128Char($string){
        if(strlen($string) > 132){
            $index = 132;
            while(substr($string, $index, 1) != " ") $index--;
            return substr($string, 0, $index)." (...)";
        }
        return $string;
    }
    
    /**
     * Retourne le nom de domaine via un lien
     *
     * @param  string $string
     * @return string
     */
    function getTitle($string){
        return substr(substr($string, strpos($string, "www.")), 0, strpos(substr($string, strpos($string, "www.")), "/"));
    }
    
    /**
     * Formatte une chaîne contenant des caractères spéciaux (balises et apostrophes)
     *
     * @param  string $str
     * @return string
     */
    function formatToDisplay(String $str){
        return htmlspecialchars(str_replace("\\", "", $str));
    }   
     
    /**
     * Récupère les datas d'un flux RSS distant
     *
     * @param  string $link
     * @return void
     */
    function getDataFromRSSURL (String $link) : void{
        $elt = new SimpleXMLElement(file_get_contents($link));
        $nodes = $elt->xpath('channel/item');
        define("MAX_ELEMENT", 5);

        $nbMax = 0;
        foreach($elt as $key => $value){
            if($nbMax<MAX_ELEMENT) {
                if (!empty($nodes)){
                    // attribut channel regroupant tout
                    foreach ($value as $key2 => $value2) {
                        if($key2 == "item" && $nbMax < MAX_ELEMENT) {
                            echo "<fieldset class='pale-grey'>";
                            echo "<form method='POST' action='save.php'>";
                            // 1, 2, 3, 4: Inputs hidden qui s'autoremplissent afin d'envoyer les informations au serveur
                            echo "  <input type='hidden' name='title' value='".formatToDisplay($value2->title)."'>"; // 1
                            echo "  <input type='hidden' name='link' value='".$value2->link."'>"; // 2
                            echo "  <input type='hidden' name='description' value='".formatToDisplay($value2->description)."'>"; // 3
                            echo "<h4>".$value2->title."</h4><p>".formatToDisplay(formatTo128Char($value2->description))."</p><div class='plus-button'><a target='_blank' href='".$value2->link."'>Voir plus</a></div><br><div class='plus-button'><a onclick='javascript:this.parentNode.parentNode.submit()'>Enregistrer</a></div><br>";
                            if(isset($value2->enclosure) && isset($value2->enclosure->attributes()->url) && !empty($value2->enclosure->attributes()->url)){
                                echo "  <input type='hidden' name='image' value='".$value2->enclosure->attributes()->url."'>"; // 4
                                echo "<div class='centered'><img src='".$value2->enclosure->attributes()->url."'/></div>";
                            }
                            else if(isset($value2->media) && isset($value2->media->attributes()->url) && !empty($value2->media->attributes()->url)){
                                echo "  <input type='hidden' name='image' value='".$value2->media->attributes()->url."'>"; // 4
                                echo "<div class='centered'><img src='".$value2->media->attributes()->url."'/></div>";
                            }
                            echo "</form>";
                            echo "</fieldset>";
                            $nbMax++;
                        }
                    }
                } else {
                    // attribut channel regroupant juste l'entête
                    if($key  != "channel"){
                        echo "<fieldset class='pale-grey'>";
                        echo "<form method='POST' action='save.php'>";
                        // 1, 2, 3, 4: Inputs hidden qui s'autoremplissent afin d'envoyer les informations au serveur
                        echo "  <input type='hidden' name='title' value='".formatToDisplay($value->title)."'>"; // 1
                        echo "  <input type='hidden' name='link' value='".$value->link."'>"; // 2
                        echo "  <input type='hidden' name='description' value='".formatToDisplay($value->description)."'>"; // 3
                        echo "<h4>".$value->title."</h4><p>".formatToDisplay(formatTo128Char($value->description))."</p><div class='plus-button'><a target='_blank' href='".$value->link."'>Voir plus</a></div><br><div class='plus-button'><a onclick='javascript:this.parentNode.parentNode.submit()'>Enregistrer</a></div><br>";
                        if(isset($value->enclosure) && isset($value->enclosure->attributes()->url) && !empty($value->enclosure->attributes()->url)){
                            echo "  <input type='hidden' name='image' value='".$value->enclosure->attributes()->url."'>"; // 4
                            echo "<div class='centered'><img src='".$value->enclosure->attributes()->url."'/></div>";
                        }
                        else if(isset($value->media) && isset($value->media->attributes()->url) && !empty($value->media->attributes()->url)){
                            echo "  <input type='hidden' name='image' value='".$value->media->attributes()->url."'>"; // 4
                            echo "<div class='centered'><img src='".$value->media->attributes()->url."'/></div>";
                        }
                        echo "</form>";
                        echo "</fieldset>";
                        $nbMax++;
                    }
                }
            }
        }
    }
    
    /**
     * Affiche un header
     *
     * @param  bool $isMargined
     * @return void
     */
    function displayHeader($isMargined = false){
        if($isMargined) echo "<div class='margined-header'>";
        else echo "<div class='header'>";
        echo "  <span class='header-title'>RSS Viewer</span>";
        echo "  <a href='index.php' class='nav-item'>Accueil</a>";
        echo "  <a href='savedArticles.php' class='nav-item'>Articles sauvegardés</a>";
        echo "</div>";
    }
        
    /**
     * Affiche un footer
     *
     * @return void
     */
    function displayFooter(){
        echo "<div class='footer'>";
        echo "  <span>Copyright © - RSS Viewer 2024 - Gaëtan Bandama et Théau Cadet</span>";
        echo "</div>";
    }

?>