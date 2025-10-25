document.addEventListener('DOMContentLoaded', () => {
    // 1. SÉLECTION ET CONSTANTES
    const cartItems = document.querySelectorAll('.cart-item');
    const totalSubElement = document.querySelector('.total-sub');
    const totalFinalElement = document.querySelector('.total-final');
    const updateCartBtn = document.querySelector('.btn-update');

    // TAUX DE CONVERSION FIXE DEMANDÉ : 1 USD = 550 FCFA
    const USD_TO_FCFA = 550; 
    
    // Valeurs initiales en USD (pour la conversion)
  //  const DISCOUNT_USD = 24; &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&
    const TAX_RATE = 0.0825; // Taux de taxe (8.25%)
    
    // Conversion des valeurs fixes en FCFA
    //const DISCOUNT_FCFA = Math.round(DISCOUNT_USD * USD_TO_FCFA);&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&
    const SHIPPING_FEE_FCFA = 0; 
    
    /**
     * Convertit le prix USD stocké dans data-price en FCFA.
     */
    function convertToFCFA(usdPrice) {
        return Math.round(usdPrice * USD_TO_FCFA);
    }

    /**
     * Formate un montant en devise FCFA.
     */
    function formatCurrency(amount) {
        // Utilisation de la locale fr-FR et de la devise XOF pour le formatage des milliers
        let formatted = amount.toLocaleString('fr-FR', { 
            style: 'currency', 
            currency: 'XOF',
            minimumFractionDigits: 0,
            maximumFractionDigits: 0
        });
        
        // Remplacement de 'XOF' par 'FCFA'
        return formatted.replace('XOF', 'FCFA'); 
    }

    /**
     * Met à jour le prix fixe (barré et actuel) affiché pour un article.
     */
    function updateItemPrices(itemRow) {
        const usdPrice = parseFloat(itemRow.dataset.price);
        //const fcfaPrice = convertToFCFA(usdPrice);
        const fcfaPrice = usdPrice;

        const priceContainer = itemRow.querySelector('.col-price');
        
        // Mise à jour du prix barré (si existe)
        const oldPriceDel = priceContainer.querySelector('.old-price');
        if (oldPriceDel) {
            const oldUsdPrice = 99; // Prix de l'Article 1 avant réduction (valeur statique)
            oldPriceDel.textContent = formatCurrency(convertToFCFA(oldUsdPrice));
            
            // Mise à jour du prix courant (pour le cas avec réduction/barré)
            const currentPriceSpan = priceContainer.querySelector('.current-price');
            currentPriceSpan.textContent = formatCurrency(fcfaPrice);
        } else {
            // Pour les produits sans prix barré (Article 2)
            priceContainer.textContent = formatCurrency(fcfaPrice);
        }
    }


    /**
     * Calcule le sous-total d'une ligne de produit (Prix FCFA * Quantité).
     */
    function calculateItemSubtotal(itemRow) {
        const usdPrice = parseFloat(itemRow.dataset.price);
        //const fcfaPrice = convertToFCFA(usdPrice);
        const fcfaPrice = usdPrice;

        const quantityInput = itemRow.querySelector('.qty-input');
        const quantity = parseInt(quantityInput.value);
        
        const itemSubtotal = fcfaPrice * quantity;

        const subtotalCell = itemRow.querySelector('.col-subtotal');
        subtotalCell.textContent = formatCurrency(itemSubtotal);
    }

    /**
     * Calcule et met à jour tous les totaux du panier.
     */
    function updateCartTotals() {
    let globalSubtotal = 0;

    // 1. Calcul du sous-total global
    const currentItems = document.querySelectorAll('.cart-item');
    currentItems.forEach(itemRow => {
        const usdPrice = parseFloat(itemRow.dataset.price);
        const fcfaPrice = usdPrice;
        const quantity = parseInt(itemRow.querySelector('.qty-input').value);
        globalSubtotal += fcfaPrice * quantity;
    });

    // 🧮 Si le panier est vide → tout mettre à zéro
    if (globalSubtotal <= 0 || currentItems.length === 0) {
        totalSubElement.textContent = formatCurrency(0);
        document.querySelector('.total-tax-value').textContent = formatCurrency(0);
        totalFinalElement.textContent = formatCurrency(0);
        return;
    }

    // 2. Calcul des taxes
    const taxAmount = Math.round(globalSubtotal * TAX_RATE);

    // 3. Calcul du total final (sous-total + taxes + livraison)
    const finalTotal = globalSubtotal + SHIPPING_FEE_FCFA + taxAmount;

    // 4. Mise à jour de l'affichage
    totalSubElement.textContent = formatCurrency(globalSubtotal);
    document.querySelector('.total-tax-value').textContent = formatCurrency(taxAmount);
    totalFinalElement.textContent = formatCurrency(finalTotal);

    // 5. Mise à jour des sous-totaux individuels
    currentItems.forEach(calculateItemSubtotal);
}


    /**
     * Logique pour modifier la quantité
     */
    function changeQuantity(input, change) {
        let currentValue = parseInt(input.value);
        let newValue = currentValue + change;
        const min = parseInt(input.min) || 1; 

        if (newValue >= min) {
            input.value = newValue;
            
            const itemRow = input.closest('.cart-item');
            calculateItemSubtotal(itemRow); 
            updateCartTotals(); 
        }
    }

    // 2. MISE EN PLACE DES ÉVÉNEMENTS

    cartItems.forEach(itemRow => {
        const qtyInput = itemRow.querySelector('.qty-input');
        const minusBtn = itemRow.querySelector('.qty-minus');
        const plusBtn = itemRow.querySelector('.qty-plus');

        minusBtn.addEventListener('click', () => changeQuantity(qtyInput, -1));
        plusBtn.addEventListener('click', () => changeQuantity(qtyInput, 1));
        
        // Mise à jour des prix affichés au chargement (conversion USD -> FCFA)
        updateItemPrices(itemRow); 
    });

    updateCartBtn.addEventListener('click', (e) => {
        e.preventDefault();
        updateCartTotals();
        alert("Le panier a été mis à jour avec succès !");
    });
    
    // 3. INITIALISATION AU CHARGEMENT DE LA PAGE
    updateCartTotals();
});

// 4. Chargement des commandes mise au panier et sauvegarde dans le localStorage

// Récupération de la liste depuis le localStorage (ou tableau vide)
let articlesList = JSON.parse(localStorage.getItem("articles")) || [];

// Sélection du tbody du tableau
const tbody = document.querySelector("#panier-table tbody");

// Fonction d’affichage du tableau
function afficheArticles(liste) {
  // On vide le tableau avant de le reconstruire
  tbody.innerHTML = "";

  if (!liste || liste.length === 0) {
    const ligneVide = document.createElement("tr");
    const cellule = document.createElement("td");
    cellule.colSpan = 5;
    cellule.style.textAlign = "center";
    cellule.textContent = "Aucun article n'a été ajouté au panier 😕";
    ligneVide.appendChild(cellule);
    tbody.appendChild(ligneVide);
  } else {
    liste.forEach((p, index) => {
      const tr = document.createElement("tr");
      tr.classList.add("cart-item");
      tr.dataset.price = p.prixArticle;

      tr.innerHTML = `
        <td class="col-remove">
          <button class="remove-btn" title="Supprimer l'article" data-index="${index}">
            <span aria-hidden="true">&times;</span>
          </button>
        </td>
        <td class="col-product">
          <p class="product-name">${p.nomArticle}</p>
        </td>
        <td class="col-price">${p.prixArticle}</td>
        <td class="col-qty">
          <div class="quantity-control">
            <button class="qty-minus">-</button>
            <input type="number" class="qty-input" value="1" min="1">
            <button class="qty-plus">+</button>
          </div>
        </td>
        <td class="col-subtotal"></td>
      `;

      tbody.appendChild(tr);
    });

    // Après avoir affiché toutes les lignes, on ajoute les écouteurs sur les boutons "supprimer"
    const boutonsSuppr = tbody.querySelectorAll(".remove-btn");

    boutonsSuppr.forEach(btn => {
      btn.addEventListener("click", function () {
        const index = parseInt(this.dataset.index); // ici, la variable est bien définie
        supprimerArticle(index);
      });
    });
  }

  console.log("Articles dans le panier :", liste);
}

// Fonction de suppression d’un article
function supprimerArticle(index) {
  // Vérifie que l’index est valide
  if (index >= 0 && index < articlesList.length) {
    articlesList.splice(index, 1); // Supprime l’article du tableau
    localStorage.setItem("articles", JSON.stringify(articlesList)); // Met à jour le stockage local
    
    afficheArticles(articlesList); // Rafraîchit l’affichage du tableau
    
    // ⚡ Met à jour immédiatement les totaux après suppression
    setTimeout(() => {
      const event = new Event('DOMContentLoaded');
      document.dispatchEvent(event); // Relance la logique principale pour recalculer
    }, 50);

    console.log(`Article supprimé (index ${index})`);
  } else {
    console.warn("Index invalide lors de la suppression :", index);
  }
}


// Affiche le tableau au chargement
afficheArticles(articlesList);

