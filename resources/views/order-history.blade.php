<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/order-history.css') }}">
  <link rel="stylesheet" href="{{ asset('css/fontawesome/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/header-footer.css') }}">

  <title>Order History</title>
</head>

<body>

   <!--header-->
  @include('shared.header')

  <div class="container">
    <aside>
      <ul>
        <li  onclick="window.location.href='dashboard.html';" style="cursor: pointer;"><i class="fa-solid fa-layer-group"></i>Tableau de bord</li>
        <li class="active" onclick="window.location.href='order-history.html';" style="cursor: pointer;"><i class="fas fa-history"></i>Historique des commandes</li>
        <li onclick="window.location.href='panier.html';" style="cursor: pointer;"><i class="fas fa-shopping-cart"></i>Panier</li>
        <li onclick="window.location.href='page-favoris.html';" style="cursor: pointer;"><i class="fas fa-heart"></i>Favoris</li>
        <li onclick="window.location.href='profile.html';" style="cursor: pointer;"><i class="fa-solid fa-gear"></i>Setting</li>
        <li><i class="fa-solid fa-right-from-bracket"></i>Log-out</li>
      </ul>
    </aside>
    <div class="main">
      <h1>Order History</h1>
      <table class="orders-table">
        <thead>
          <tr><th>Commande</th><th>Date</th><th>Articles</th><th>Total</th><th>Moyen</th><th>Statut</th></tr>
        </thead>
        <tbody id="orders-table-body">
          <!-- JS remplira ici -->
        </tbody>
      </table>
      <!-- inclure le script -->
      <script src="./assets/js/order-history.js" defer></script>
    </div>

  </div>

  <!-- footer-->
  @include('shared.footer')

</body>

</html>