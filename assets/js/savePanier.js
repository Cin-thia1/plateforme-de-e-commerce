function saveToNavigate(nomArticle, prixArticle, quantite) {

    const article = {
        nomArticle: nomArticle,
        prixArticle: prixArticle,
        quantite: quantite
    };

    let articlesList = JSON.parse(localStorage.getItem("articles")) || [];

    articlesList.push(article);

    localStorage.setItem("articles", JSON.stringify(articlesList));

    alert("Article ajoute au panier");

    console.log(articlesList);
}

function viderPanier() {
    localStorage.removeItem("articles");
}


/*const btn = document.getElementById("ajoutBox");

btn.addEventListener("click", () =>{

    const nom = document.getElementById("nomArticle").textContent;

    const prix = parseFloat(document.getElementById("prixArticle").textContent);

    saveToNavigate(nom, prix, 1)
})
*/
