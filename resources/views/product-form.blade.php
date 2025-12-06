<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <link rel="stylesheet" href="{{ asset('css/product-form.css') }}">
  <link rel="stylesheet" href="{{ asset('css/header-footer.css') }}">
  <link rel="stylesheet" href="{{ asset('css/fontawesome/css/all.min.css') }}">

  <title>Product Form</title>
</head>

<body>

  <!--header-->
  @include('shared.header')

  <div class="container">
    <aside>
      <ul>
        <li onclick="window.location.href='dashboard.html';" style="cursor: pointer;"><i
            class="fa-solid fa-layer-group"></i>Tableau de bord</li>
        <li onclick="window.location.href='order-history.html';" style="cursor: pointer;"><i
            class="fas fa-history"></i>Historique des commandes</li>
        <li onclick="window.location.href='panier.html';" style="cursor: pointer;"><i
            class="fas fa-shopping-cart"></i>Panier</li>
        <li onclick="window.location.href='page-favoris.html';" style="cursor: pointer;"><i
            class="fas fa-heart"></i>Favoris</li>
        <li onclick="window.location.href='profile.html';" style="cursor: pointer;" class="active"><i
            class="fa-solid fa-gear"></i>Setting</li>
        <li><i class="fa-solid fa-right-from-bracket"></i>Log-out</li>
      </ul>
    </aside>
    <div class="main">
      <section class="account-setting">
        <!--<h2>Add A Product</h2>-->
        <h2>{{ isset($product) ? 'Modify A Product' : 'Add A Product' }}</h2>
        <form class="product-form" data-product-id="{{ $product->id ?? '' }}"
          data-action="{{ isset($product) ? route('product.update', $product->id) : route('products.store') }}"
          data-method="{{ isset($product) ? 'PUT' : 'POST' }}"
          data-saved-category="{{ old('category', $product->category ?? '') }}"
          data-saved-subcategory="{{ old('subCategory', $product->sub_category ?? '') }}">
          @csrf
          @if(isset($product))
          @method('PUT')
          @endif
          <div class="images-group">
            <div class="form-group">
              <button type="button" class="button primary-button add-image-btn">
                {{ isset($product) ? 'ADD NEW IMAGES' : 'ADD AN IMAGE' }}
              </button>
            </div>
            <div class="uploaded-images">
              @if(isset($product) && is_array($product->images) && count($product->images) > 0)
              @foreach($product->images as $img)
              <div class="form-group uploaded-image existing-image" data-image-path="{{ $img }}">
                <img src="{{ asset($img) }}" alt="Image actuelle">
                <span class="delete-old" title="Supprimer cette image">
                  <i class="fa-solid fa-trash"></i>
                </span>
              </div>
              @endforeach
              @endif
            </div>
          </div>

          <div class="input-group">
            <div class="form-row">
              <div class="form-group full-width">
                <label for="productName">Product Name</label>
                <input type="text" id="productName" name="productName" placeholder="MSI Pulse GL66"
                  value="{{ old('productName', $product->name ?? '') }}" required>
              </div>
              <div class="form-group full-width">
                <label for="brand">Brand</label>
                <input type="text" id="brand" name="brand" placeholder="MSI"
                  value="{{ old('brand', $product->brand ?? '') }}" required>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group full-width">
                <label for="category">Category</label>
                <select id="category" name="category" required>
                  <option value="">Choisir une catégorie</option>
                  @php
                  $categories = ['Électronique','Vêtements','Électroménager','Meubles','Bijoux','Cosmétiques'];
                  $selectedCategory = old('category', $product->category ?? '');
                  @endphp
                  @foreach($categories as $cat)
                  <option value="{{ $cat }}" {{ $selectedCategory===$cat ? 'selected' : '' }}>
                    {{ $cat }}
                  </option>
                  @endforeach
                </select>
              </div>

              <div class="form-group full-width">
                <label for="subCategory">Sub-category</label>
                <select id="subCategory" name="subCategory" required>
                  <option value="">Choisir une sous-catégorie</option>
                </select>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group full-width">
                <label for="stock">Stock</label>
                <input type="number" id="stock" name="stock" min="0" required
                  value="{{ old('stock', $product->stock ?? '') }}" placeholder="1207">
              </div>
              <div class="form-group full-width">
                <label for="price">Price</label>
                <input type="number" id="price" name="price" min="0" step="100" required
                  value="{{ old('price', $product->price ?? '') }}" placeholder="80000">
              </div>
            </div>

            <div class="form-group">
              <label for="smallDescription">Small description</label>
              <input type="text" id="smallDescription" name="smallDescription" required
                value="{{ old('smallDescription', $product->small_description ?? '') }}"
                placeholder="Lorem ipsum dolor sit amet.">
            </div>

            <div class="form-group">
              <label for="description">Description</label>
              <textarea id="description" name="description" rows="6" required
                placeholder="Description détaillée du produit...">{{ old('description', $product->description ?? '') }}</textarea>
            </div>

            <button type="submit" class="button primary-button save-changes">{{ isset($product) ? 'MODIFY' : 'ADD'
              }}</button>
          </div>
        </form>

      </section>
    </div>
  </div>

  <!--footer-->
  @include('shared.footer')
  <script src="{{ asset('js/product-form.js') }}"></script>
  {{-- <script src="{{ asset('js/header-footer.js') }}"></script> --}}
</body>

</html>