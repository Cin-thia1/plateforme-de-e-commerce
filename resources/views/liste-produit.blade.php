<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                    <ul class="list-plain" id="filters-categories">
                        <li><label class="cat-option"><input type="checkbox" value="Smartphones & Smartwatchs" /><span>Smartphones & Smartwatchs</span></label></li>
                        <li><label class="cat-option"><input type="checkbox" value="Ordinateurs portables" /><span>Ordinateurs portables</span></label></li>
                        <li><label class="cat-option"><input type="checkbox" value="Ordinateurs gaming" /><span>Ordinateurs gaming</span></label></li>
                        <li><label class="cat-option"><input type="checkbox" value="Tablettes" /><span>Tablettes</span></label></li>
                        <li><label class="cat-option"><input type="checkbox" value="Casques & Ecouteurs" /><span>Casques & Ecouteurs</span></label></li>
                        <li><label class="cat-option"><input type="checkbox" value="Télévisions & Home cinéma" /><span>Télévisions & Home cinéma</span></label></li>
                        <li><label class="cat-option"><input type="checkbox" value="Caméra & Photo" /><span>Caméra & Photo</span></label></li>
                        <li><label class="cat-option"><input type="checkbox" value="Accessoires" /><span>Accesoires</span></label></li>
                        <li><label class="cat-option"><input type="checkbox" value="Consoles de jeux & Manettes" /><span>Consoles de jeux & Manettes</span></label></li>
                        <li><label class="cat-option"><input type="checkbox" value="Composants informatiques" /><span>Composants informatiques</span></label></li>
                    </ul>
                </section>
                <hr class="barre">

                <section class="filter">
                    <h3 class="filter-title">PLAGE DE PRIX</h3>
                    <div class="price-range">
                        <div class="price-inputs">
                            <label>
                                <span class="sr-only">Prix minimum</span>
                                <input type="number" id="min-price" placeholder="Min price" />
                            </label>
                            <span class="sep">—</span>
                            <label>
                                <span class="sr-only">Prix maximum</span>
                                <input type="number" id="max-price" placeholder="Max price" />
                            </label>
                        </div>
                        <ul class="list-plain pills">
                            <li><label><input type="radio" name="choix-prix" checked value="Tout prix" /> Tout prix</label></li>
                            <li><label><input type="radio" name="choix-prix" value="Moins de 5000 FCFA" /> Moins de 5000 FCFA</label></li>
                            <li><label><input type="radio" name="choix-prix" value="5000 FCFA à 10 000 FCFA" /> 5000 FCFA à 10 000 FCFA</label></li>
                            <li><label><input type="radio" name="choix-prix" value="10 000 FCFA à 50 000 FCFA" /> 10 000 FCFA à 50 000 FCFA</label></li>
                            <li><label><input type="radio" name="choix-prix" value="50 000 FCFA à 100 000 FCFA" /> 50 000 FCFA à 100 000 FCFA</label></li>
                            <li><label><input type="radio" name="choix-prix" value="100 000 FCFA à 500 000 FCFA" /> 100 000 FCFA à 500 000 FCFA</label></li>
                            <li><label><input type="radio" name="choix-prix" value="500 000 FCFA à 1 000 000 FCFA" /> 500 000 FCFA à 1 000 000 FCFA</label></li>
                        </ul>
                    </div>
                </section>
                <hr class="barre">

                <section class="filter">
                    <h3 class="filter-title">MARQUES</h3>
                    <ul class="brand-grid">
                        <li><label><input type="checkbox" value="Apple" /> Apple</label></li>
                        <li><label><input type="checkbox" value="Google" /> Google</label></li>
                        <li><label><input type="checkbox" value="Samsung" /> Samsung</label></li>
                        <li><label><input type="checkbox" value="HP" /> HP</label></li>
                        <li><label><input type="checkbox" value="Sony" /> Sony</label></li>
                        <li><label><input type="checkbox" value="Xiaomi" /> Xiaomi</label></li>
                        <li><label><input type="checkbox" value="LG" /> LG</label></li>
                        <li><label><input type="checkbox" value="TECNO" /> TECNO</label></li>
                        <li><label><input type="checkbox" value="DELL" /> DELL</label></li>
                        <li><label><input type="checkbox" value="Intel" /> Intel</label></li>
                    </ul>
                </section>
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
                    <div class="result-active-filters"><span id="results-count">0</span> <span class="fonce">Résultats</span></div>
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
                              
                               <!-- <a href="{{ route('product.edit', $product->id) }}" class="btn-edit">Modifier</a>-->
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
</body>
</html>