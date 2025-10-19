document.addEventListener('DOMContentLoaded', () => {
    // 1. SÉLECTION ET CONSTANTES
    const cartItems = document.querySelectorAll('.cart-item');
    const totalSubElement = document.querySelector('.total-sub');
    const totalFinalElement = document.querySelector('.total-final');
    const updateCartBtn = document.querySelector('.btn-update');

    // TAUX DE CONVERSION FIXE DEMANDÉ : 1 USD = 550 FCFA
    const USD_TO_FCFA = 550; 
    
    // Valeurs initiales en USD (pour la conversion)
    const DISCOUNT_USD = 24; 
    const TAX_RATE = 0.0825; // Taux de taxe (8.25%)
    
    // Conversion des valeurs fixes en FCFA
    const DISCOUNT_FCFA = Math.round(DISCOUNT_USD * USD_TO_FCFA);
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
        const fcfaPrice = convertToFCFA(usdPrice);
        
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
        const fcfaPrice = convertToFCFA(usdPrice);
        
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

        // 1. Calculer le sous-total global (en FCFA)
        cartItems.forEach(itemRow => {
            const usdPrice = parseFloat(itemRow.dataset.price);
            const fcfaPrice = convertToFCFA(usdPrice);
            const quantity = parseInt(itemRow.querySelector('.qty-input').value);
            globalSubtotal += fcfaPrice * quantity;
        });

        // 2. Appliquer la réduction et calculer le sous-total imposable
        const subtotalAfterDiscount = globalSubtotal - DISCOUNT_FCFA;

        // 3. Calculer les taxes (en FCFA)
        const taxAmount = Math.round(subtotalAfterDiscount * TAX_RATE);

        // 4. Calculer le total final
        const finalTotal = subtotalAfterDiscount + SHIPPING_FEE_FCFA + taxAmount;

        // 5. Mettre à jour l'affichage
        totalSubElement.textContent = formatCurrency(globalSubtotal);
        document.querySelector('.total-discount').textContent = formatCurrency(DISCOUNT_FCFA);
        document.querySelector('.total-tax-value').textContent = formatCurrency(taxAmount);
        totalFinalElement.textContent = formatCurrency(finalTotal); 

        // S'assurer que les sous-totaux individuels sont également mis à jour
        cartItems.forEach(calculateItemSubtotal);
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