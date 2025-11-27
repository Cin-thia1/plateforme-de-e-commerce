<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ma Liste de Souhaits</title>
  <link rel="stylesheet" href="<?php echo e(asset('css/page-favoris.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('css/fontawesome/css/all.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('css/header-footer.css')); ?>">
</head>

<body>
  <!--header-->
  <?php echo $__env->make('shared.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

  <main class="wishlist-container">
    <h2>Produits Favoris</h2>

    <table class="wishlist-table">
      <thead>
        <tr>
          <th scope="col">Produits</th>
          <th scope="col">Prix</th>
          <th scope="col">Etat du stock</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td data-label="Products">
            <div class="product-info">
              <strong>Bose Sport Earbuds - Wireless Earphones</strong>
              <span>Bluetooth in Ear Headphones for Workouts and Running, Triple Black</span>
            </div>
          </td>
          <td data-label="Price">
            <div class="price">
              <span class="current-price">122989 FCFA</span>
            </div>
          </td>
          <td data-label="Stock Status">
            <span class="stock-status in-stock">En stock</span>
          </td>
          <td data-label="Actions">
            <div class="actions">
              <button class="btn-add-cart primary">
                <i class="fas fa-shopping-cart"></i>
                <span>Ajouter au panier</span>
              </button>
              <button class="btn-remove" aria-label="Remove item">&times;</button>
            </div>
          </td>
        </tr>

        <tr>
          <td data-label="Products">
            <div class="product-info">
              <strong>Bose Sport Earbuds - Wireless Earphones</strong>
              <span>Bluetooth in Ear Headphones for Workouts and Running, Triple Black</span>
            </div>
          </td>
          <td data-label="Price">
            <div class="price">
              <span class="current-price">122989 FCFA</span>
            </div>
          </td>
          <td data-label="Stock Status">
            <span class="stock-status in-stock">En stock</span>
          </td>
          <td data-label="Actions">
            <div class="actions">
              <button class="btn-add-cart primary">
                <i class="fas fa-shopping-cart"></i>
                <span>Ajouter au panier</span>
              </button>
              <button class="btn-remove" aria-label="Remove item">&times;</button>
            </div>
          </td>
        </tr>

        <tr>
          <td data-label="Products">
            <div class="product-info">
              <strong>Bose Sport Earbuds - Wireless Earphones</strong>
              <span>Bluetooth in Ear Headphones for Workouts and Running, Triple Black</span>
            </div>
          </td>
          <td data-label="Price">
            <div class="price">
              <span class="current-price">122989 FCFA</span>
            </div>
          </td>
          <td data-label="Stock Status">
            <span class="stock-status in-stock">En stock</span>
          </td>
          <td data-label="Actions">
            <div class="actions">
              <button class="btn-add-cart primary">
                <i class="fas fa-shopping-cart"></i>
                <span>Ajouter au panier</span>
              </button>
              <button class="btn-remove" aria-label="Remove item">&times;</button>
            </div>
          </td>
        </tr>

        <tr>
          <td data-label="Products">
            <div class="product-info">
              <strong>Bose Sport Earbuds - Wireless Earphones</strong>
              <span>Bluetooth in Ear Headphones for Workouts and Running, Triple Black</span>
            </div>
          </td>
          <td data-label="Price">
            <div class="price">
              <span class="current-price">122989 FCFA</span>
            </div>
          </td>
          <td data-label="Stock Status">
            <span class="stock-status in-stock">En stock</span>
          </td>
          <td data-label="Actions">
            <div class="actions">
              <button class="btn-add-cart primary">
                <i class="fas fa-shopping-cart"></i>
                <span>Ajouter au panier</span>
              </button>
              <button class="btn-remove" aria-label="Remove item">&times;</button>
            </div>
          </td>
        </tr>

        <tr>
          <td data-label="Products">
            <div class="product-info">
              <strong>Bose Sport Earbuds - Wireless Earphones</strong>
              <span>Bluetooth in Ear Headphones for Workouts and Running, Triple Black</span>
            </div>
          </td>
          <td data-label="Price">
            <div class="price">
              <span class="current-price">122989 FCFA</span>
            </div>
          </td>
          <td data-label="Stock Status">
            <span class="stock-status out-of-stock">En stock</span>
          </td>
          <td data-label="Actions">
            <div class="actions">
              <button class="btn-add-cart primary">
                <i class="fas fa-shopping-cart"></i>
                <span>Ajouter au panier</span>
              </button>
              <button class="btn-remove" aria-label="Remove item">&times;</button>
            </div>
          </td>
        </tr>

      </tbody>
    </table>
  </main>

  <!-- footer-->
  <?php echo $__env->make('shared.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

</body>

</html><?php /**PATH D:\PROGRAMMATION WEB 4\plateforme-de-e-commerce\resources\views/page-favoris.blade.php ENDPATH**/ ?>