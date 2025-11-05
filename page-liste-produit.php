<?php
/**
 * Template Name: Page liste produit
 * 
 */

get_header(); ?>
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
            <li><label class="cat-option"><input type="checkbox" value="Smartphones & Smartwatchs" /><span>Smartphones &
                  Smartwatchs</span></label></li>
            <li><label class="cat-option"><input type="checkbox" value="Ordinateurs portables" /><span>Ordinateurs
                  portables</span></label></li>
            <li><label class="cat-option"><input type="checkbox" value="Ordinateurs gaming" /><span>Ordinateurs
                  gaming</span></label></li>
            <li><label class="cat-option"><input type="checkbox" value="Tablettes" /><span>Tablettes</span></label></li>
            <li><label class="cat-option"><input type="checkbox" value="Casques & Ecouteurs" /><span>Casques &
                  Ecouteurs</span></label></li>
            <li><label class="cat-option"><input type="checkbox" value="Télévisions & Home cinéma" /><span>Télévisions &
                  Home cinéma</span></label></li>
            <li><label class="cat-option"><input type="checkbox" value="Caméra & Photo" /><span>Caméra &
                  Photo</span></label></li>
            <li><label class="cat-option"><input type="checkbox" value="Accessoires" /><span>Accesoires</span></label>
            </li>
            <li><label class="cat-option"><input type="checkbox" value="Consoles de jeux & Manettes" /><span>Consoles de
                  jeux & Manettes</span></label></li>
            <li><label class="cat-option"><input type="checkbox" value="Composants informatiques" /><span>Composants
                  informatiques</span></label></li>
          </ul>
        </section>
        <hr class="barre">

        <section class="filter">
          <h3 class="filter-title">PLAGE DE PRIX</h3>
          <div class="price-range">
            <div class="price-inputs">
              <label>
                <span class="sr-only">Prix minimum</span>
                <input type="number" placeholder="Min price" />
              </label>
              <span class="sep">—</span>
              <label>
                <span class="sr-only">Prix maximum</span>
                <input type="number" placeholder="Max price" />
              </label>    
            </div>
            <ul class="list-plain pills">
              <li><label><input type="radio" name="choix-prix" checked value="Tout prix" /> Tout prix</label></li>
              <li><label><input type="radio" name="choix-prix" value="Moins de 5000 FCFA" /> Moins de 5000 FCFA</label>
              </li>
              <li><label><input type="radio" name="choix-prix" value="5000 FCFA à 10 000 FCFA" /> 5000 FCFA à 10 000
                  FCFA</label></li>
              <li><label><input type="radio" name="choix-prix" value="10 000 FCFA à 50 000 FCFA" /> 10 000 FCFA à 50 000
                  FCFA</label></li>
              <li><label><input type="radio" name="choix-prix" value="50 000 FCFA à 100 000 FCFA" /> 50 000 FCFA à 100
                  000 FCFA</label></li>
              <li><label><input type="radio" name="choix-prix" value="100 000 FCFA à 500 000 FCFA" /> 100 000 FCFA à 500
                  000 FCFA</label></li>
              <li><label><input type="radio" name="choix-prix" value="500 000 FCFA à 1 000 000 FCFA" /> 500 000 FCFA à 1
                  000 000 FCFA</label>
              </li>

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
              <option value="">Plus populaire </option>
            </select>
          </div>

        </div>
        <div class="active-filters">
          <div class="filter-apply" id="active-filters">
            <span class="fonce">Filtres actifs :</span>
            <!--<span class="chip">Electronique <i class="fa-solid fa-xmark"></i></span>-->
          </div>
          <div class="result-active-filters">60 4567 <span class="fonce">Résultats</span></div>
        </div>


        <section class="product" id="product" aria-label="Liste des produits">
          <article class="product-cart">
            <div class="product_cart_badge badge-hot">HOT</div>
            <a href="#" class="product-cart_thumb">
              <img src="assets/images/samsung-a-56.jpg" alt="Samsung A56" />
            </a>
            <div class="product-cart_body">
              <div class="rating" aria-label="Note : 4 sur 5">
                <span class="stars" aria-hidden="true">★★★★☆</span>
                <span class="count">(24)</span>
              </div>
              <span>Samsung A56</span>
              <div class="price">
                <span class="old">322 000 FCFA</span>
                <span class="current">294 000 FCFA</span>

              </div>
            </div>
            <div class="product-cart_actions">
              <button aria-label="Ajouter aux favoris"><i class="fa-solid fa-heart"></i></button>
              <button aria-label="Comparer"><i class="fa-solid fa-eye"></i></button>
              <button aria-label="Ajouter au panier" onclick="saveToNavigate('Samsung A56', 294000, 1)"><i
                  class="fa-solid fa-cart-shopping"></i></button>
            </div>
          </article>

          <article class="product-cart">
            <div class="product_cart_badge badge-hot">HOT</div>
            <a href="#" class="product-cart_thumb">
              <img src="assets/images/iphone-12-pro.jpg" alt="iPhone 12 pro" />
            </a>
            <div class="product-cart_body">
              <div class="rating" aria-label="Note : 5 sur 5">
                <span class="stars" aria-hidden="true">★★★★★</span>
                <span class="count">(24)</span>
              </div>
              <span>iPhone 12 Pro</span>
              <div class="price">
                <span class="old">370 000 FCFA</span>
                <span class="current">312 000 FCFA</span>

              </div>
            </div>
            <div class="product-cart_actions">
              <button aria-label="Ajouter aux favoris"><i class="fa-solid fa-heart"></i></button>
              <button aria-label="Comparer"><i class="fa-solid fa-eye"></i></button>
              <button aria-label="Ajouter au panier" onclick="saveToNavigate('iPhone 12 Pro', 312000, 1)"><i
                  class="fa-solid fa-cart-shopping"></i></button>
            </div>
          </article>

          <article class="product-cart">
            <div class="product_cart_badge badge-best">BEST DEALS</div>
            <a href="#" class="product-cart_thumb">
              <img src="assets/images/casque-sans-fil.jpg" alt="Casque sans fil" />
            </a>
            <div class="product-cart_body">
              <div class="rating" aria-label="Note : 5 sur 5">
                <span class="stars" aria-hidden="true">★★★★★</span>
                <span class="count">(24)</span>
              </div>
              <span>iPhone 12 Pro</span>
              <div class="price">
                <span class="old">370 000 FCFA</span>
                <span class="current">312 000 FCFA</span>

              </div>
            </div>
            <div class="product-cart_actions">
              <button aria-label="Ajouter aux favoris"><i class="fa-solid fa-heart"></i></button>
              <button aria-label="Comparer"><i class="fa-solid fa-eye"></i></button>
              <button aria-label="Ajouter au panier"><i class="fa-solid fa-cart-shopping"></i></button>
            </div>
          </article>

          <article class="product-cart">
            <div class="product_cart_badge badge-hot">HOT</div>
            <a href="#" class="product-cart_thumb">
              <img src="assets/images/samsung-a-56.jpg" alt="Samsung A56" />
            </a>
            <div class="product-cart_body">
              <div class="rating" aria-label="Note : 4 sur 5">
                <span class="stars" aria-hidden="true">★★★★☆</span>
                <span class="count">(24)</span>
              </div>
              <span>Samsung A56</span>
              <div class="price">
                <span class="old">322 000 FCFA</span>
                <span class="current">294 000 FCFA</span>

              </div>
            </div>
            <div class="product-cart_actions">
              <button aria-label="Ajouter aux favoris"><i class="fa-solid fa-heart"></i></button>
              <button aria-label="Comparer"><i class="fa-solid fa-eye"></i></button>
              <button aria-label="Ajouter au panier"><i class="fa-solid fa-cart-shopping"></i></button>
            </div>
          </article>

          <article class="product-cart">
            <div class="product_cart_badge badge-hot">HOT</div>
            <a href="#" class="product-cart_thumb">
              <img src="assets/images/iphone-12-pro.jpg" alt="iPhone 12 Pro" />
            </a>
            <div class="product-cart_body">
              <div class="rating" aria-label="Note : 5 sur 5">
                <span class="stars" aria-hidden="true">★★★★★</span>
                <span class="count">(68)</span>
              </div>
              <span>iPhone 12 Pro</span>
              <div class="price">
                <span class="old">370 000 FCFA</span>
                <span class="current">312 000 FCFA</span>

              </div>
            </div>
            <div class="product-cart_actions">
              <button aria-label="Ajouter aux favoris"><i class="fa-solid fa-heart"></i></button>
              <button aria-label="Comparer"><i class="fa-solid fa-eye"></i></button>
              <button aria-label="Ajouter au panier"><i class="fa-solid fa-cart-shopping"></i></button>
            </div>
          </article>
          <article class="product-cart">
            <div class="product_cart_badge badge-hot">HOT</div>
            <a href="#" class="product-cart_thumb">
              <img src="assets/images/iphone-12-pro.jpg" alt="iPhone 12 Pro" />
            </a>
            <div class="product-cart_body">
              <div class="rating" aria-label="Note : 5 sur 5">
                <span class="stars" aria-hidden="true">★★★★★</span>
                <span class="count">(68)</span>
              </div>
              <span>iPhone 12 Pro</span>
              <div class="price">
                <span class="old">370 000 FCFA</span>
                <span class="current">312 000 FCFA</span>

              </div>
            </div>
            <div class="product-cart_actions">
              <button aria-label="Ajouter aux favoris"><i class="fa-solid fa-heart"></i></button>
              <button aria-label="Comparer"><i class="fa-solid fa-eye"></i></button>
              <button aria-label="Ajouter au panier"><i class="fa-solid fa-cart-shopping"></i></button>
            </div>
          </article>
          <article class="product-cart">
            <div class="product_cart_badge badge-hot">HOT</div>
            <a href="#" class="product-cart_thumb">
              <img src="assets/images/samsung-a-56.jpg" alt="Samsung A56" />
            </a>
            <div class="product-cart_body">
              <div class="rating" aria-label="Note : 4 sur 5">
                <span class="stars" aria-hidden="true">★★★★☆</span>
                <span class="count">(24)</span>
              </div>
              <span>Samsung A56</span>
              <div class="price">
                <span class="old">322 000 FCFA</span>
                <span class="current">294 000 FCFA</span>

              </div>
            </div>
            <div class="product-cart_actions">
              <button aria-label="Ajouter aux favoris"><i class="fa-solid fa-heart"></i></button>
              <button aria-label="Comparer"><i class="fa-solid fa-eye"></i></button>
              <button aria-label="Ajouter au panier"><i class="fa-solid fa-cart-shopping"></i></button>
            </div>
          </article>

          <article class="product-cart">
            <div class="product_cart_badge badge-new">NEW</div>
            <a href="#" class="product-cart_thumb">
              <img src="assets/images/smartwatch-x-pro.jpg" alt="Smartwatch X Pro" />
            </a>
            <div class="product-cart_body">
              <div class="rating" aria-label="Note : 4.5 sur 5">
                <span class="stars" aria-hidden="true">★★★★☆</span>
                <span class="count">(90)</span>
              </div>
              <span>Smartwatch X Pro</span>
              <div class="price">
                <span class="old">105 000 FCFA</span>
                <span class="current">95 500 FCFA</span>

              </div>
            </div>
            <div class="product-cart_actions">
              <button aria-label="Ajouter aux favoris"><i class="fa-solid fa-heart"></i></button>
              <button aria-label="Comparer"><i class="fa-solid fa-eye"></i></button>
              <button aria-label="Ajouter au panier"><i class="fa-solid fa-cart-shopping"></i></button>
            </div>
          </article>

          <article class="product-cart">
            <div class="product_cart_badge badge-hot">HOT</div>
            <a href="#" class="product-cart_thumb">
              <img src="assets/images/tablette-ultra-11.jpg" alt="Tablette Android Ultra 11 pouces" />
            </a>
            <div class="product-cart_body">
              <div class="rating" aria-label="Note : 4 sur 5">
                <span class="stars" aria-hidden="true">★★★★☆</span>
                <span class="count">(45)</span>
              </div>
              <span>Tablette Ultra 11"</span>
              <div class="price">
                <span class="old">200 000 FCFA</span>
                <span class="current">180 000 FCFA</span>

              </div>
            </div>
            <div class="product-cart_actions">
              <button aria-label="Ajouter aux favoris"><i class="fa-solid fa-heart"></i></button>
              <button aria-label="Comparer"><i class="fa-solid fa-eye"></i></button>
              <button aria-label="Ajouter au panier"><i class="fa-solid fa-cart-shopping"></i></button>
            </div>
          </article>
          <article class="product-cart">
            <div class="product_cart_badge badge-hot">HOT</div>
            <a href="#" class="product-cart_thumb">
              <img src="assets/images/samsung-a-56.jpg" alt="Samsung A56" />
            </a>
            <div class="product-cart_body">
              <div class="rating" aria-label="Note : 4 sur 5">
                <span class="stars" aria-hidden="true">★★★★☆</span>
                <span class="count">(24)</span>
              </div>
              <span>Samsung A56</span>
              <div class="price">
                <span class="old">322 000 FCFA</span>
                <span class="current">294 000 FCFA</span>

              </div>
            </div>
            <div class="product-cart_actions">
              <button aria-label="Ajouter aux favoris"><i class="fa-solid fa-heart"></i></button>
              <button aria-label="Comparer"><i class="fa-solid fa-eye"></i></button>
              <button aria-label="Ajouter au panier"><i class="fa-solid fa-cart-shopping"></i></button>
            </div>
          </article>

          <article class="product-cart">
            <div class="product_cart_badge badge-sale">SALE -20%</div>
            <a href="#" class="product-cart_thumb">
              <img src="assets/images/enceinte-portable-pro.jpg" alt="Enceinte Portable Bluetooth" />
            </a>
            <div class="product-cart_body">
              <div class="rating" aria-label="Note : 5 sur 5">
                <span class="stars" aria-hidden="true">★★★★★</span>
                <span class="count">(155)</span>
              </div>
              <span>Enceinte Portable Pro</span>
              <div class="price">
                <span class="old">35 000 FCFA</span>
                <span class="current">28 000 FCFA</span>

              </div>
            </div>
            <div class="product-cart_actions">
              <button aria-label="Ajouter aux favoris"><i class="fa-solid fa-heart"></i></button>
              <button aria-label="Comparer"><i class="fa-solid fa-eye"></i></button>
              <button aria-label="Ajouter au panier"><i class="fa-solid fa-cart-shopping"></i></button>
            </div>
          </article>

          <article class="product-cart">
            <div class="product_cart_badge badge-new">NEW</div>
            <a href="#" class="product-cart_thumb">
              <img src="assets/images/chargeur-sans-fil.jpg" alt="Chargeur Sans Fil Rapide" />
            </a>
            <div class="product-cart_body">
              <div class="rating" aria-label="Note : 4 sur 5">
                <span class="stars" aria-hidden="true">★★★★☆</span>
                <span class="count">(52)</span>
              </div>
              <span>Chargeur Sans Fil</span>
              <div class="price">
                <span class="current">12 500 FCFA</span>
              </div>
            </div>
            <div class="product-cart_actions">
              <button aria-label="Ajouter aux favoris"><i class="fa-solid fa-heart"></i></button>
              <button aria-label="Comparer"><i class="fa-solid fa-eye"></i></button>
              <button aria-label="Ajouter au panier"><i class="fa-solid fa-cart-shopping"></i></button>
            </div>
          </article>

          <article class="product-cart">
            <div class="product_cart_badge badge-best">BEST DEALS</div>
            <a href="#" class="product-cart_thumb">
              <img src="assets/images/laptop-13-pro.jpg" alt="Ordinateur Portable Pro 13 pouces" />
            </a>
            <div class="product-cart_body">
              <div class="rating" aria-label="Note : 5 sur 5">
                <span class="stars" aria-hidden="true">★★★★★</span>
                <span class="count">(310)</span>
              </div>
              <span>Laptop Pro 13"</span>
              <div class="price">
                <span class="old">720 000 FCFA</span>
                <span class="current">650 000 FCFA</span>

              </div>
            </div>
            <div class="product-cart_actions">
              <button aria-label="Ajouter aux favoris"><i class="fa-solid fa-heart"></i></button>
              <button aria-label="Comparer"><i class="fa-solid fa-eye"></i></button>
              <button aria-label="Ajouter au panier"><i class="fa-solid fa-cart-shopping"></i></button>
            </div>
          </article>
          <article class="product-cart">
            <div class="product_cart_badge badge-hot">HOT</div>
            <a href="#" class="product-cart_thumb">
              <img src="assets/images/samsung-a-56.jpg" alt="Samsung A56" />
            </a>
            <div class="product-cart_body">
              <div class="rating" aria-label="Note : 4 sur 5">
                <span class="stars" aria-hidden="true">★★★★☆</span>
                <span class="count">(24)</span>
              </div>
              <span>Samsung A56</span>
              <div class="price">
                <span class="old">322 000 FCFA</span>
                <span class="current">294 000 FCFA</span>

              </div>
            </div>
            <div class="product-cart_actions">
              <button aria-label="Ajouter aux favoris"><i class="fa-solid fa-heart"></i></button>
              <button aria-label="Comparer"><i class="fa-solid fa-eye"></i></button>
              <button aria-label="Ajouter au panier"><i class="fa-solid fa-cart-shopping"></i></button>
            </div>
          </article>

          <article class="product-cart">
            <div class="product_cart_badge badge-hot">HOT</div>
            <a href="#" class="product-cart_thumb">
              <img src="assets/images/écouteurs-pro.jpg" alt="Écouteurs sans fil Intra-Auriculaires" />
            </a>
            <div class="product-cart_body">
              <div class="rating" aria-label="Note : 4 sur 5">
                <span class="stars" aria-hidden="true">★★★★☆</span>
                <span class="count">(188)</span>
              </div>
              <span>Ecouteurs Pro Buds</span>
              <div class="price">
                <span class="old">25 000 FCFA</span>
                <span class="current">18 000 FCFA</span>

              </div>
            </div>
            <div class="product-cart_actions">
              <button aria-label="Ajouter aux favoris"><i class="fa-solid fa-heart"></i></button>
              <button aria-label="Comparer"><i class="fa-solid fa-eye"></i></button>
              <button aria-label="Ajouter au panier"><i class="fa-solid fa-cart-shopping"></i></button>
            </div>
          </article>

          <article class="product-cart">
            <div class="product_cart_badge badge-new">NEW</div>
            <a href="#" class="product-cart_thumb">
              <img src="assets/images/console-game-go.jpg" alt="Console de Jeu Portable" />
            </a>
            <div class="product-cart_body">
              <div class="rating" aria-label="Note : 5 sur 5">
                <span class="stars" aria-hidden="true">★★★★★</span>
                <span class="count">(75)</span>
              </div>
              <span>Console GameGO</span>
              <div class="price">
                <span class="current">250 000 FCFA</span>
              </div>
            </div>
            <div class="product-cart_actions">
              <button aria-label="Ajouter aux favoris"><i class="fa-solid fa-heart"></i></button>
              <button aria-label="Comparer"><i class="fa-solid fa-eye"></i></button>
              <button aria-label="Ajouter au panier"><i class="fa-solid fa-cart-shopping"></i></button>
            </div>
          </article>

          <article class="product-cart">
            <div class="product_cart_badge badge-sale">SALE -30%</div>
            <a href="#" class="product-cart_thumb">
              <img src="assets/images/camera-sport-4k.jpg" alt="Caméra Sport 4K" />
            </a>
            <div class="product-cart_body">
              <div class="rating" aria-label="Note : 4.5 sur 5">
                <span class="stars" aria-hidden="true">★★★★☆</span>
                <span class="count">(112)</span>
              </div>
              <span>Caméra Sport Ultra</span>
              <div class="price">
                <span class="old">80 000 FCFA</span>
                <span class="current">56 000 FCFA</span>

              </div>
            </div>
            <div class="product-cart_actions">
              <button aria-label="Ajouter aux favoris"><i class="fa-solid fa-heart"></i></button>
              <button aria-label="Comparer"><i class="fa-solid fa-eye"></i></button>
              <button aria-label="Ajouter au panier"><i class="fa-solid fa-cart-shopping"></i></button>
            </div>
          </article>
          <article class="product-cart">
            <div class="product_cart_badge badge-hot">HOT</div>
            <a href="#" class="product-cart_thumb">
              <img src="assets/images/samsung-a-56.jpg" alt="Samsung A56" />
            </a>
            <div class="product-cart_body">
              <div class="rating" aria-label="Note : 4 sur 5">
                <span class="stars" aria-hidden="true">★★★★☆</span>
                <span class="count">(24)</span>
              </div>
              <span>Samsung A56</span>
              <div class="price">
                <span class="old">322 000 FCFA</span>
                <span class="current">294 000 FCFA</span>

              </div>
            </div>
            <div class="product-cart_actions">
              <button aria-label="Ajouter aux favoris"><i class="fa-solid fa-heart"></i></button>
              <button aria-label="Comparer"><i class="fa-solid fa-eye"></i></button>
              <button aria-label="Ajouter au panier"><i class="fa-solid fa-cart-shopping"></i></button>
            </div>
          </article>

          <article class="product-cart">
            <div class="product_cart_badge badge-best">BEST DEALS</div>
            <a href="#" class="product-cart_thumb">
              <img src="assets/images/disque-dur.jpg" alt="Disque Dur Externe 2To" />
            </a>
            <div class="product-cart_body">
              <div class="rating" aria-label="Note : 5 sur 5">
                <span class="stars" aria-hidden="true">★★★★★</span>
                <span class="count">(240)</span>
              </div>
              <span>Disque dur 2 To</span>
              <div class="price">
                <span class="current">75 000 FCFA</span>
              </div>
            </div>
            <div class="product-cart_actions">
              <button aria-label="Ajouter aux favoris"><i class="fa-solid fa-heart"></i></button>
              <button aria-label="Comparer"><i class="fa-solid fa-eye"></i></button>
              <button aria-label="Ajouter au panier"><i class="fa-solid fa-cart-shopping"></i></button>
            </div>
          </article>
          <article class="product-cart">
            <div class="product_cart_badge badge-hot">HOT</div>
            <a href="#" class="product-cart_thumb">
              <img src="assets/images/samsung-a-56.jpg" alt="Samsung A56" />
            </a>
            <div class="product-cart_body">
              <div class="rating" aria-label="Note : 4 sur 5">
                <span class="stars" aria-hidden="true">★★★★☆</span>
                <span class="count">(24)</span>
              </div>
              <span>Samsung A56</span>
              <div class="price">
                <span class="old">322 000 FCFA</span>
                <span class="current">294 000 FCFA</span>

              </div>
            </div>
            <div class="product-cart_actions">
              <button aria-label="Ajouter aux favoris"><i class="fa-solid fa-heart"></i></button>
              <button aria-label="Comparer"><i class="fa-solid fa-eye"></i></button>
              <button aria-label="Ajouter au panier"><i class="fa-solid fa-cart-shopping"></i></button>
            </div>
          </article>

          <article class="product-cart">
            <div class="product_cart_badge badge-best">BEST DEALS</div>
            <a href="#" class="product-cart_thumb">
              <img src="assets/images/casque.png" alt="Casque Sans Fil Premium" />
            </a>
            <div class="product-cart_body">
              <div class="rating" aria-label="Note : 4.5 sur 5">
                <span class="stars" aria-hidden="true">★★★★☆</span>
                <span class="count">(120)</span>
              </div>
              <span>Casque Sans Fil Premium</span>
              <div class="price">
                <span class="old">60 000 FCFA</span>
                <span class="current">45 000 FCFA</span>

              </div>
            </div>
            <div class="product-cart_actions">
              <button aria-label="Ajouter aux favoris"><i class="fa-solid fa-heart"></i></button>
              <button aria-label="Comparer"><i class="fa-solid fa-eye"></i></button>
              <button aria-label="Ajouter au panier"><i class="fa-solid fa-cart-shopping"></i></button>
            </div>
          </article>

          <article class="product-cart">
            <div class="product_cart_badge badge-new">NEW</div>
            <a href="#" class="product-cart_thumb">
              <img src="assets/images/smartwatch-x-pro.jpg" alt="Smartwatch X Pro" />
            </a>
            <div class="product-cart_body">
              <div class="rating" aria-label="Note : 4.5 sur 5">
                <span class="stars" aria-hidden="true">★★★★☆</span>
                <span class="count">(90)</span>
              </div>
              <span>Smartwatch X Pro</span>
              <div class="price">
                <span class="old">105 000 FCFA</span>
                <span class="current">95 500 FCFA</span>

              </div>
            </div>
            <div class="product-cart_actions">
              <button aria-label="Ajouter aux favoris"><i class="fa-solid fa-heart"></i></button>
              <button aria-label="Comparer"><i class="fa-solid fa-eye"></i></button>
              <button aria-label="Ajouter au panier"><i class="fa-solid fa-cart-shopping"></i></button>
            </div>
          </article>

          <article class="product-cart">
            <div class="product_cart_badge badge-hot">HOT</div>
            <a href="#" class="product-cart_thumb">
              <img src="assets/images/tablette-ultra-11.jpg" alt="Tablette Android Ultra 11 pouces" />
            </a>
            <div class="product-cart_body">
              <div class="rating" aria-label="Note : 4 sur 5">
                <span class="stars" aria-hidden="true">★★★★☆</span>
                <span class="count">(45)</span>
              </div>
              <span>Tablette Ultra 11"</span>
              <div class="price">
                <span class="old">200 000 FCFA</span>
                <span class="current">180 000 FCFA</span>

              </div>
            </div>
            <div class="product-cart_actions">
              <button aria-label="Ajouter aux favoris"><i class="fa-solid fa-heart"></i></button>
              <button aria-label="Comparer"><i class="fa-solid fa-eye"></i></button>
              <button aria-label="Ajouter au panier"><i class="fa-solid fa-cart-shopping"></i></button>
            </div>
          </article>

          <article class="product-cart">
            <div class="product_cart_badge badge-sale">SALE -20%</div>
            <a href="#" class="product-cart_thumb">
              <img src="assets/images/enceinte-portable-pro.jpg" alt="Enceinte Portable Bluetooth" />
            </a>
            <div class="product-cart_body">
              <div class="rating" aria-label="Note : 5 sur 5">
                <span class="stars" aria-hidden="true">★★★★★</span>
                <span class="count">(155)</span>
              </div>
              <span>Enceinte Portable Pro</span>
              <div class="price">
                <span class="old">35 000 FCFA</span>
                <span class="current">28 000 FCFA</span>

              </div>
            </div>
            <div class="product-cart_actions">
              <button aria-label="Ajouter aux favoris"><i class="fa-solid fa-heart"></i></button>
              <button aria-label="Comparer"><i class="fa-solid fa-eye"></i></button>
              <button aria-label="Ajouter au panier"><i class="fa-solid fa-cart-shopping"></i></button>
            </div>
          </article>

          <article class="product-cart">
            <div class="product_cart_badge badge-new">NEW</div>
            <a href="#" class="product-cart_thumb">
              <img src="assets/images/chargeur-sans-fil.jpg" alt="Chargeur Sans Fil Rapide" />
            </a>
            <div class="product-cart_body">
              <div class="rating" aria-label="Note : 4 sur 5">
                <span class="stars" aria-hidden="true">★★★★☆</span>
                <span class="count">(52)</span>
              </div>
              <span>Chargeur Sans Fil</span>
              <div class="price">
                <span class="current">12 500 FCFA</span>
              </div>
            </div>
            <div class="product-cart_actions">
              <button aria-label="Ajouter aux favoris"><i class="fa-solid fa-heart"></i></button>
              <button aria-label="Comparer"><i class="fa-solid fa-eye"></i></button>
              <button aria-label="Ajouter au panier"><i class="fa-solid fa-cart-shopping"></i></button>
            </div>
          </article>

          <article class="product-cart">
            <div class="product_cart_badge badge-best">BEST DEALS</div>
            <a href="#" class="product-cart_thumb">
              <img src="assets/images/laptop-13-pro.jpg" alt="Ordinateur Portable Pro 13 pouces" />
            </a>
            <div class="product-cart_body">
              <div class="rating" aria-label="Note : 5 sur 5">
                <span class="stars" aria-hidden="true">★★★★★</span>
                <span class="count">(310)</span>
              </div>
              <span>Laptop Pro 13"</span>
              <div class="price">
                <span class="old">720 000 FCFA</span>
                <span class="current">650 000 FCFA</span>

              </div>
            </div>
            <div class="product-cart_actions">
              <button aria-label="Ajouter aux favoris"><i class="fa-solid fa-heart"></i></button>
              <button aria-label="Comparer"><i class="fa-solid fa-eye"></i></button>
              <button aria-label="Ajouter au panier"><i class="fa-solid fa-cart-shopping"></i></button>
            </div>
          </article>

          <article class="product-cart">
            <div class="product_cart_badge badge-hot">HOT</div>
            <a href="#" class="product-cart_thumb">
              <img src="assets/images/écouteurs-pro.jpg" alt="Écouteurs sans fil Intra-Auriculaires" />
            </a>
            <div class="product-cart_body">
              <div class="rating" aria-label="Note : 4 sur 5">
                <span class="stars" aria-hidden="true">★★★★☆</span>
                <span class="count">(188)</span>
              </div>
              <span>Écouteurs Pro Buds</span>
              <div class="price">
                <span class="old">25 000 FCFA</span>
                <span class="current">18 000 FCFA</span>

              </div>
            </div>
            <div class="product-cart_actions">
              <button aria-label="Ajouter aux favoris"><i class="fa-solid fa-heart"></i></button>
              <button aria-label="Comparer"><i class="fa-solid fa-eye"></i></button>
              <button aria-label="Ajouter au panier"><i class="fa-solid fa-cart-shopping"></i></button>
            </div>
          </article>

          <article class="product-cart">
            <div class="product_cart_badge badge-new">NEW</div>
            <a href="#" class="product-cart_thumb">
              <img src="assets/images/console-game-go.jpg" alt="Console de Jeu Portable" />
            </a>
            <div class="product-cart_body">
              <div class="rating" aria-label="Note : 5 sur 5">
                <span class="stars" aria-hidden="true">★★★★★</span>
                <span class="count">(75)</span>
              </div>
              <span>Console GameGO</span>
              <div class="price">
                <span class="current">250 000 FCFA</span>
              </div>
            </div>
            <div class="product-cart_actions">
              <button aria-label="Ajouter aux favoris"><i class="fa-solid fa-heart"></i></button>
              <button aria-label="Comparer"><i class="fa-solid fa-eye"></i></button>
              <button aria-label="Ajouter au panier"><i class="fa-solid fa-cart-shopping"></i></button>
            </div>
          </article>

          <article class="product-cart">
            <div class="product_cart_badge badge-sale">SALE -30%</div>
            <a href="#" class="product-cart_thumb">
              <img src="assets/images/camera-sport-4k.jpg" alt="Caméra Sport 4K" />
            </a>
            <div class="product-cart_body">
              <div class="rating" aria-label="Note : 4.5 sur 5">
                <span class="stars" aria-hidden="true">★★★★☆</span>
                <span class="count">(112)</span>
              </div>
              <span>Caméra Sport Ultra</span>
              <div class="price">
                <span class="old">80 000 FCFA</span>
                <span class="current">56 000 FCFA</span>

              </div>
            </div>
            <div class="product-cart_actions">
              <button aria-label="Ajouter aux favoris"><i class="fa-solid fa-heart"></i></button>
              <button aria-label="Comparer"><i class="fa-solid fa-eye"></i></button>
              <button aria-label="Ajouter au panier"><i class="fa-solid fa-cart-shopping"></i></button>
            </div>
          </article>
          <article class="product-cart">
            <div class="product_cart_badge badge-sale">SALE -30%</div>
            <a href="#" class="product-cart_thumb">
              <img src="assets/images/camera-sport-4k.jpg" alt="Caméra Sport 4K" />
            </a>
            <div class="product-cart_body">
              <div class="rating" aria-label="Note : 4.5 sur 5">
                <span class="stars" aria-hidden="true">★★★★☆</span>
                <span class="count">(112)</span>
              </div>
              <span>Caméra Sport Ultra</span>
              <div class="price">
                <span class="old">80 000 FCFA</span>
                <span class="current">56 000 FCFA</span>

              </div>
            </div>
            <div class="product-cart_actions">
              <button aria-label="Ajouter aux favoris"><i class="fa-solid fa-heart"></i></button>
              <button aria-label="Comparer"><i class="fa-solid fa-eye"></i></button>
              <button aria-label="Ajouter au panier"><i class="fa-solid fa-cart-shopping"></i></button>
            </div>
          </article>
          <article class="product-cart">
            <div class="product_cart_badge badge-sale">SALE -30%</div>
            <a href="#" class="product-cart_thumb">
              <img src="assets/images/camera-sport-4k.jpg" alt="Caméra Sport 4K" />
            </a>
            <div class="product-cart_body">
              <div class="rating" aria-label="Note : 4.5 sur 5">
                <span class="stars" aria-hidden="true">★★★★☆</span>
                <span class="count">(112)</span>
              </div>
              <span>Caméra Sport Ultra</span>
              <div class="price">
                <span class="old">80 000 FCFA</span>
                <span class="current">56 000 FCFA</span>

              </div>
            </div>
            <div class="product-cart_actions">
              <button aria-label="Ajouter aux favoris"><i class="fa-solid fa-heart"></i></button>
              <button aria-label="Comparer"><i class="fa-solid fa-eye"></i></button>
              <button aria-label="Ajouter au panier"><i class="fa-solid fa-cart-shopping"></i></button>
            </div>
          </article>



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

<?php get_footer(); ?>