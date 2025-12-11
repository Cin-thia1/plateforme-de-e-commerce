<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Liste des Produits</title>
    <link rel="stylesheet" href="{{ asset('css/style-liste-produit.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header-footer.css') }}">
    <script src="{{ asset('js/pagination.js') }}"></script>
    <script src="{{ asset('js/filtre-sous-categorie.js') }}"></script>
    
</head>
<body>
    <!-- Header partagé -->
    @include('shared.header')

    <div class="category-container">
        <section class="toolbar">
            <div class="container toolbar_row">
                <nav class="breadcrumbs" aria-label="Fil d'Ariane">
                    <a href="#">Accueil</a>
                    <span aria-hidden="true">></span>
                    <a href="#">Electronique</a>
                    <span aria-hidden="true">></span>
                    <strong>Appareils</strong>
                </nav>
            </div>
        </section>
       
        <main class="container layout">
            <aside class="sidebar" aria-label="Filtres de produits">
                <section class="filter">
                    <h3 class="filter-title">CATEGORIES</h3>
                    <form method="GET" action="{{ route('products.index') }}" id="filters-form">
                    <ul class="list-plain" id="filters-categories">
                        <li><label class="cat-option"><input type="checkbox" name="categories[]" value="Électronique" {{ in_array('Électronique', request('categories', [])) ? 'checked' : '' }} /><span>Électronique</span></label></li>
                        <li><label class="cat-option"><input type="checkbox" name="categories[]" value="Vêtements" {{ in_array('Vêtements', request('categories', [])) ? 'checked' : '' }} /><span>Vêtements</span></label></li>
                        <li><label class="cat-option"><input type="checkbox" name="categories[]" value="Électroménager" {{ in_array('Électroménager', request('categories', [])) ? 'checked' : '' }} /><span>Électroménager</span></label></li>
                        <li><label class="cat-option"><input type="checkbox" name="categories[]" value="Meubles" {{ in_array('Meubles', request('categories', [])) ? 'checked' : '' }} /><span>Meubles</span></label></li>
                        <li><label class="cat-option"><input type="checkbox" name="categories[]" value="Bijoux" {{ in_array('Bijoux', request('categories', [])) ? 'checked' : '' }} /><span>Bijoux</span></label></li>
                        <li><label class="cat-option"><input type="checkbox" name="categories[]" value="Cosmétiques" {{ in_array('Cosmétiques', request('categories', [])) ? 'checked' : '' }} /><span>Cosmétiques</span></label></li>
                        <!--<li><label class="cat-option"><input type="checkbox" value="Caméra & Photo" /><span>Caméra & Photo</span></label></li>
                        <li><label class="cat-option"><input type="checkbox" value="Accessoires" /><span>Accesoires</span></label></li>
                        <li><label class="cat-option"><input type="checkbox" value="Consoles de jeux & Manettes" /><span>Consoles de jeux & Manettes</span></label></li>
                        <li><label class="cat-option"><input type="checkbox" value="Composants informatiques" /><span>Composants informatiques</span></label></li>-->
                    </ul>
                </section>
                <hr class="barre">

                <section class="filter">
                    <h3 class="filter-title">PLAGE DE PRIX</h3>
                    <div class="price-range">
                        <div class="price-inputs">
                            <label>
                                <span class="sr-only">Prix minimum</span>
                                <input type="number" name= "min" id="min-price" placeholder="Min price" value="{{ request('min') }}"/>
                            </label>
                            <span class="sep">—</span>
                            <label>
                                <span class="sr-only">Prix maximum</span>
                                <input type="number" name="max" id="max-price" placeholder="Max price" value="{{ request('max') }}"/>
                            </label>
                        </div>
                        <ul class="list-plain pills">
                            <input type="hidden" name="min" id="filter-min" value="{{ request('min', '') }}">
                            <input type="hidden" name="max" id="filter-max" value="{{ request('max', '') }}">

                            <li><label><input type="radio" name="price_range" checked value="Tout prix" /> Tout prix</label></li>
                            <li><label><input type="radio" name="price_range" value="0-5000" {{ request('price_range') === '0-5000' ? 'checked' : '' }}/> Moins de 5000 FCFA</label></li>
                            <li><label><input type="radio" name="price_range" value="5000-10000" {{ request('price_range') === '5000-10000' ? 'checked' : '' }}/> 5000 FCFA à 10 000 FCFA</label></li>
                            <li><label><input type="radio" name="price_range" value="10000-50000" {{ request('price_range') === '10000-50000' ? 'checked' : '' }}/> 10 000 FCFA à 50 000 FCFA</label></li>
                            <li><label><input type="radio" name="price_range" value="50000-100000" {{ request('price_range') === '50000-100000' ? 'checked' : '' }}/> 50 000 FCFA à 100 000 FCFA</label></li>
                            <li><label><input type="radio" name="price_range" value="100000-500000" {{ request('price_range') === '100000-500000' ? 'checked' : '' }}/> 100 000 FCFA à 500 000 FCFA</label></li>
                            <li><label><input type="radio" name="price_range" value="500000-1000000" {{ request('price_range') === '500000-1000000' ? 'checked' : '' }}/> 500 000 FCFA à 1 000 000 FCFA</label></li>
                        </ul>
                    </div>
                </section>
                <hr class="barre">

                <section class="filter">
                    <h3 class="filter-title">MARQUES</h3>
                    <ul class="brand-grid">
                        <li><label><input type="checkbox" name="brands[]" value="Apple" {{ in_array('Apple', request('brands', [])) ? 'checked' : '' }}/> Apple</label></li>
                        <li><label><input type="checkbox" name="brands[]" value="Google" {{ in_array('Google', request('brands', [])) ? 'checked' : '' }}/> Google</label></li>
                        <li><label><input type="checkbox" name="brands[]" value="Samsung" {{ in_array('Samsung', request('brands', [])) ? 'checked' : '' }}/> Samsung</label></li>
                        <li><label><input type="checkbox" name="brands[]" value="HP" {{ in_array('HP', request('brands', [])) ? 'checked' : '' }}/> HP</label></li>
                        <li><label><input type="checkbox" name="brands[]" value="Sony" {{ in_array('Sony', request('brands', [])) ? 'checked' : '' }}/> Sony</label></li>
                        <li><label><input type="checkbox" name="brands[]" value="Xiaomi" {{ in_array('Xiaomi', request('brands', [])) ? 'checked' : '' }}/> Xiaomi</label></li>
                        <li><label><input type="checkbox" name="brands[]" value="LG" {{ in_array('LG', request('brands', [])) ? 'checked' : '' }}/> LG</label></li>
                        <li><label><input type="checkbox" name="brands[]" value="TECNO" {{ in_array('TECNO', request('brands', [])) ? 'checked' : '' }}/> TECNO</label></li>
                        <li><label><input type="checkbox" name="brands[]" value="DELL" {{ in_array('DELL', request('brands', [])) ? 'checked' : '' }}/> DELL</label></li>
                        <li><label><input type="checkbox" name="brands[]" value="Intel" {{ in_array('Intel', request('brands', [])) ? 'checked' : '' }}/> Intel</label></li>
                    </ul>
                </section>
            </form>
                <hr class="barre">
            </aside>

            <div class="page-container">
                <div class="separate-product search-bar">
                    <form action="/recherche" method="get" class="research-form">
                        <label for="q" class="visually-hidden">Rechercher</label>
                        <input id="q" name="q" type="search" placeholder=" Rechercher un appareil..." />
                        <button type="submit" aria-label="Rechercher"><i class="fas fa-search"></i></button>
                    </form>
                    <div>
                        <span>Trié par:</span>
                        <select name="" id="" class="option-value">
                            <option value="">Plus populaire</option>
                        </select>
                    </div>
                    <div>
                        <!-- Bouton pour ouverture et fermeture des filtres en mobile -->
                        <button type="button" class="filter-toggle">
                            <i class="fa-solid fa-filter"></i>
                        </button>
                    </div>
                </div>
                <div class="active-filters">
                    <div class="filter-apply" id="active-filters">
                        <span class="fonce">Filtres actifs :</span>
                    </div>
                    <div class="result-active-filters"><span id="results-count">{{$products->count()}}</span> <span class="fonce">Résultats</span></div>
                </div>

                <section class="product" id="product" aria-label="Liste des produits">
                    @foreach($products as $product)
                        <article class="product-cart" data-subcategory="{{ $product->sub_category ?? '' }}" data-brand="{{ $product->brand ?? '' }}" data-price="{{ $product->price ?? 0 }}">
                            <div class="product_cart_badge badge-hot">HOT</div>
                            <a href="#" class="product-cart_thumb">
                                <!--<img src="{{ $product->images[0] ?? 'assets/images/default.jpg' }}" alt="{{ $product->name }}" />-->
                                <img src="{{ count($product->images) ? asset('storage/' . $product->images[0]) : asset('assets/images/default.jpg') }}" alt="{{ $product->name }}">
                            </a>
                            <div class="product-cart_body">
                                <div class="rating" aria-label="Note : 4 sur 5">
                                    <span class="stars" aria-hidden="true">★★★★☆</span>
                                    <span class="count">(24)</span>
                                </div>
                                <span>{{ $product->name }}</span>
                                <div class="price">
                                    <span class="current">{{ number_format($product->price) }} FCFA</span>
                                </div>
                            </div>
                            <div class="product-cart_actions">
                                <button aria-label="Ajouter aux favoris"><i class="fa-solid fa-heart"></i></button>
                                <button aria-label="Comparer" onclick="window.location.href='products/edit/{{ $product->id }}'"><i class="fa-solid fa-eye"></i></button>
                                <button aria-label="Ajouter au panier" onclick="addToCart({{ $product->id }})"><i class="fa-solid fa-cart-shopping"></i></button>
                                <!--<button type="button"
                                  class="btn-delete-product border-0 bg-transparent p-0"
                                  data-id="{{ $product->id }}"
                                  aria-label="Supprimer le produit"
                                  title="Supprimer le produit">
                                  <i class="fa-solid fa-trash text-danger fa-lg"></i>
                                </button>-->
                              
                                <a href="{{ route('product.edit', $product->id) }}" class="btn-edit">Modifier</a>
                            </div>
                        </article>
                    @endforeach
                </section>

                <div class="pager" id="pager">
                    <nav class="pagination" aria-label="Pagination" id="pagination">
                        <button class="page-nav page-nav--precedente" href="#" aria-label="Page précédente">
                            <i class="fa-solid fa-arrow-left" aria-hidden="true"></i>
                        </button>
                    </nav>
                    <ol class="page-list" role="list">
                        <li><button class="page-lien is-active" aria-current="page">01</button></li>
                        <li><button class="page-lien">02</button></li>
                        <li><button class="page-lien">03</button></li>
                        <li><button class="page-lien">04</button></li>
                        <li><button class="page-lien">05</button></li>
                        <li><button class="page-lien">06</button></li>
                    </ol>
                    <nav class="pagination" aria-label="Pagination">
                        <button class="page-nav page-nav--suivante" aria-label="Page suivante">
                            <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
                        </button>
                    </nav>
                </div>
            </div>
        </main>
        
    </div>

    <!-- Footer partagé -->
    @include('shared.footer')

    <script src="{{ asset('js/savePanier.js') }}"></script>
    <script>
        document.querySelectorAll('#filters-form input').forEach(input => {
            input.addEventListener('change', () => {
                document.getElementById('filters-form').submit();
            });
        });
    </script>
    <script>
        function applyFilters() {
            let form = document.getElementById('filters-form');
            let params = new URLSearchParams(new FormData(form)).toString();
        
            fetch("{{ route('products.index') }}?" + params, {
                headers: { "X-Requested-With": "XMLHttpRequest" }
            })
            .then(response => response.json())
            .then(data => {
                // Remplacer la liste des produits
                document.getElementById('product-list').innerHTML = data.html;
        
                // Mettre à jour le nombre de résultats
                document.getElementById('results-count').innerText = data.count;
        
                // Mettre à jour l'affichage des filtres actifs
                updateActiveFilters();
            });
        }
        
        function updateActiveFilters() {
            let activeDiv = document.getElementById('active-filters');
            activeDiv.innerHTML = '<span class="fonce">Filtres actifs :</span>';
        
            document.querySelectorAll('#filters-form input').forEach(input => {
                if ((input.type === "checkbox" || input.type === "radio") && input.checked) {
                    activeDiv.innerHTML += `<span class="tag">${input.value}</span>`;
                }
                if (input.name === 'min' && input.value) {
                    activeDiv.innerHTML += `<span class="tag">Min: ${input.value}</span>`;
                }
                if (input.name === 'max' && input.value) {
                    activeDiv.innerHTML += `<span class="tag">Max: ${input.value}</span>`;
                }
            });
        }
        </script>
        
        
</body>
</html>
