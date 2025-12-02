/*******************************************
 * 1.  Gestion LOCALSTORAGE
 *******************************************/
function getCart() {
    return JSON.parse(localStorage.getItem("cart")) || [];
}

function saveCart(cart) {
    localStorage.setItem("cart", JSON.stringify(cart));
}

function addToCart(id) {
    let cart = getCart();
    let item = cart.find(p => p.id == id);

    if (item) item.qty++;
    else cart.push({ id, qty: 1 });

    saveCart(cart);
}

function removeFromCart(id) {
    let cart = getCart().filter(p => p.id !== id);
    saveCart(cart);
    loadCartProducts();
}

function increaseQty(id) {
    let cart = getCart();
    let item = cart.find(p => p.id === id);
    
    if (item) {
        item.qty++;
        saveCart(cart);
        loadCartProducts();
    }
}

function decreaseQty(id) {
    let cart = getCart();
    let item = cart.find(p => p.id === id);

    // Empêcher la quantité de descendre en dessous de 1
    if (item && item.qty > 1) {
        item.qty--;
        saveCart(cart);
        loadCartProducts();
    } else {
        // Si on tente de descendre en dessous de 1 → rien ne se passe
        return;
    }
}


/*******************************************
 * 2.  Format monétaire FCFA
 *******************************************/
function formatFCFA(amount) {
    return amount.toLocaleString("fr-FR") + " FCFA";
}

/*******************************************
 * 3.  Calcul des totaux
 *******************************************/
function calculateTotals(products, cart) {
    let subtotal = 0;
    const TAX_RATE = 0.0825;   // 8.25%
    const SHIPPING = 0;

    products.forEach(product => {
        let item = cart.find(c => c.id === product.id);
        if (item) subtotal += product.price * item.qty;
    });

    let tax = Math.round(subtotal * TAX_RATE);
    let finalTotal = subtotal + tax + SHIPPING;

    document.querySelector(".total-sub").textContent = formatFCFA(subtotal);
    document.querySelector(".total-tax-value").textContent = formatFCFA(tax);
    document.querySelector(".total-final").textContent = formatFCFA(finalTotal);
}

/*******************************************
 * 4.  Chargement des produits depuis Laravel
 *******************************************/
function loadCartProducts() {
    let cart = getCart();

    if (cart.length === 0) {
        document.getElementById("cart-container").innerHTML =
            "<p style='padding:20px;'>Votre panier est vide.</p>";
        document.querySelector(".total-sub").textContent = "0 FCFA";
        document.querySelector(".total-tax-value").textContent = "0 FCFA";
        document.querySelector(".total-final").textContent = "0 FCFA";
        return;
    }

    let ids = cart.map(p => p.id);

    fetch("/cart/products", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({ ids })
    })
        .then(res => res.json())
        .then(products => {
            let html = "";

            products.forEach(product => {
                let item = cart.find(p => p.id == product.id);

                html += `
                <div class="cart-item" 
                     data-price="${product.price}"
                     style="
                        display:flex;
                        justify-content:space-between;
                        align-items:center;
                        background:#fff;
                        padding:15px;
                        margin-bottom:12px;
                        border-radius:10px;
                        box-shadow:0 2px 5px rgba(0,0,0,0.1);
                     ">

                    <!-- IMAGE -->
                    <img src="${product.image}" width="100" style="border-radius:8px;">

                    <!-- INFOS PRODUIT -->
                    <div style="flex:1; margin-left:20px;">
                        <h3 style="margin:0; font-size:18px;">${product.name}</h3>
                        <p style="margin:5px 0; color:gray;">${product.small_description}</p>
                        <button onclick="removeFromCart(${product.id})"
                                style="
                                    background:#eee;
                                    border:none;
                                    padding:6px 10px;
                                    border-radius:6px;
                                    cursor:pointer;
                                ">
                            <i class="fas fa-trash-alt"></i> Supprimer
                        </button>
                    </div>

                    <!-- PRIX & QUANTITÉ -->
                    <div style="text-align:right;">
                        <p style="color:gray;">${formatFCFA(product.price)}</p>
                        <h2>${formatFCFA(product.price * item.qty)}</h2>

                        <div style="display:flex; gap:10px; margin-top:10px;">
                            <button onclick="decreaseQty(${product.id})"
                                style="width:35px; height:35px; border:none; border-radius:6px; background:#ffb38a; font-size:20px;">
                                -
                            </button>

                            <input type="text" value="${item.qty}" disabled
                                style="width:40px; text-align:center;">

                            <button onclick="increaseQty(${product.id})"
                                style="width:35px; height:35px; border:none; border-radius:6px; background:#ff9650; font-size:20px;">
                                +
                            </button>
                        </div>
                    </div>
                </div>
                `;
            });

            document.getElementById("cart-container").innerHTML = html;

            // Recalculer les totaux
            calculateTotals(products, cart);
        });
}

// Charger le panier à l’ouverture de la page
document.addEventListener("DOMContentLoaded", loadCartProducts);
