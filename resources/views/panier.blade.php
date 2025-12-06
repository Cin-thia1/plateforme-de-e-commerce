<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Mon Panier d'Achat</title>
  <!-- import propre a cette page-->
  <link rel="stylesheet" href="{{ asset('css/panier.css') }}">
  <!-- import commun a toutes les pages-->
  <link rel="stylesheet" href="{{ asset('css/fontawesome/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/header-footer.css') }}">
</head>

<body onload="loadCartProducts()">
  <!--header-->
  @include('shared.header')

  <div class="page-container">

    <div class="cart-wrapper">

      <section class="shopping-cart">
        <h2>Votre Panier</h2>

        <div id="cart-container">
          <p><!-- Les articles du panier seront insérés ici dynamiquement --></p>
        </div>


        <!--<div class="cart-table-container">
          <table class="cart-table" id="panier-table">
            <thead>
              <tr>
                <th class="col-remove"></th>
                <th class="col-product">PRODUITS</th>
                <th class="col-price">PRIX</th>
                <th class="col-qty">QUANTITÉ</th>
                <th class="col-subtotal">SOUS-TOTAL</th>
              </tr>
            </thead>
            <tbody>
              
            </tbody>
          </table>
        </div>-->

        <div class="cart-actions">
          <button class="btn btn-shop">← RETOUR À LA BOUTIQUE</button>
          <button class="btn btn-update">METTRE À JOUR LE PANIER</button>
        </div>
      </section>

      <aside class="card-totals-section">

        <div class="card-totals">
          <h3>Totaux du Panier</h3>
          <div class="total-row">
            <span class="label">Sous-total</span>
            <span class="value total-sub"></span>
          </div>
          <div class="total-row">
            <span class="label">Livraison</span>
            <span class="value total-shipping">Gratuite</span>
          </div>
          <!--<div class="total-row">
            <span class="label">Réduction</span>
            <span class="value total-discount"></span>
          </div> -->
          <div class="total-row total-tax">
            <span class="label">Taxes (TVA)</span>
            <span class="value total-tax-value"></span>
          </div>
          <div class="total-row total-main">
            <span class="label">Total</span>
            <span class="value total-final"></span>
          </div>

          <button onclick="window.location.href='/commande'" class="btn btn-checkout">PROCÉDER AU PAIEMENT →</button>
        </div>

        <div class="coupon-code">
          <h4>Code Promo</h4>
          <div class="coupon-form">
            <input type="text" placeholder="Entrez votre code promo">
            <button class="btn btn-coupon">APPLIQUER LE COUPON</button>
          </div>
        </div>

      </aside>

    </div>
  </div>

  <!-- footer-->
  @include('shared.footer')

  <script src="{{ asset('js/savePanier.js') }}" defer></script>
  
</body>
</html>