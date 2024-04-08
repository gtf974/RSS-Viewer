// Eléments du DOM
const left = document.getElementById("left-content"); // div des articles à gauche de la page d'accueil
const right = document.getElementById("right-content"); // div des articles à droite de la page d'accueil
const button1 = document.getElementById("submit-1"); // bouton d'envoi pour le lien 1 (gauche)
const button2 = document.getElementById("submit-2"); // bouton d'envoi pour le lien 2 (droite)
const hidden1 = document.getElementById("memory-1"); // input invisible pour stocker les articles de la partie de droite
const hidden2 = document.getElementById("memory-2"); // input invisible pour stocker les articles de la partie de gauche
const form1 = document.getElementById("form-1"); // formulaire pour le lien 1 (gauche)
const form2 = document.getElementById("form-2"); // formulaire pour le lien 2 (droite)

// Events au click
button1.addEventListener("click", () => {
    if (right.innerHTML != "") hidden1.value = right.innerHTML; // si présence d'articles dans la div à droite, on stocke l'information dans l'input invisible hidden1
    form1.submit(); // on envoie le formulaire
});

button2.addEventListener("click", () => {
    if (left.innerHTML != "") hidden2.value = left.innerHTML; // si présence d'articles dans la div à gauche, on stocke l'information dans l'input invisible hidden2
    form2.submit(); // on envoie le formulaire
});