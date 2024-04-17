const deleteButtons = document.querySelectorAll(".delete");

//Ajout d'un évènement au click sur tous les boutons supprimer de la page des articles sauvegardés pour demander une confirmation de suppression
deleteButtons.forEach(button => button.addEventListener("click", () => {
    let html = "<div class='delete-screen'>";
    html += "   <div class='delete-box'>";
    html += "       <p>Êtes-vous sûr de vouloir supprimer l'article ?</p>";
    html += "       <div class='button-flex'>";
    html += "           <a href='savedArticles.php' class='plus-button'>Annuler</a>";
    html += "           <form action='savedArticles.php' method='POST'>";
    html += "               <input name='toDelete' type='hidden' value='"+button.dataset.id+"'>"; //Input caché avec comme input l'id de l'article à supprimer
    html += "               <div class='delete-button'><a onclick='javascript:this.parentNode.parentNode.submit()'>Supprimer</a></div>"
    html += "           </form>";
    html += "       </div>";
    html += "   </div>";
    html += "</div>";
    document.body.innerHTML += html;
}));