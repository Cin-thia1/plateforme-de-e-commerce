<?php
/**
 * Template Name: Page order history
 */

get_header(); ?>

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
      <table>
        <thead>
          <tr>
            <th>Order ID</th>
            <th>Status</th>
            <th>Date</th>
            <th>Total</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>#1001</td>
            <td data-status="Completed">Completed</td>
            <td>2025-10-25</td>
            <td>150 000 FCFA</td>
          </tr>
          <tr>
            <td>#1002</td>
            <td data-status="In Progress">In Progress</td>
            <td>2025-10-27</td>
            <td>85 500 FCFA</td>
          </tr>
          <tr>
            <td>#1003</td>
            <td data-status="In Progress">In Progress</td>
            <td>2025-10-28</td>
            <td>45 000 FCFA</td>
          </tr>
          <tr>
            <td>#1004</td>
            <td data-status="Cancelled">Cancelled</td>
            <td>2025-10-26</td>
            <td>120 000 FCFA</td>
          </tr>
          <tr>
            <td>#1005</td>
            <td data-status="Completed">Completed</td>
            <td>2025-10-20</td>
            <td>95 000 FCFA</td>
          </tr>
          <tr>
            <td>#1006</td>
            <td data-status="In Progress">In Progress</td>
            <td>2025-10-28</td>
            <td>250 000 FCFA</td>
          </tr>
          <tr>
            <td>#1007</td>
            <td data-status="In Progress">In Progress</td>
            <td>2025-10-28</td>
            <td>78 500 FCFA</td>
          </tr>
          <tr>
            <td>#1008</td>
            <td data-status="Completed">Completed</td>
            <td>2025-10-15</td>
            <td>320 000 FCFA</td>
          </tr>
          <tr>
            <td>#1009</td>
            <td data-status="In Progress">In Progress</td>
            <td>2025-10-26</td>
            <td>165 000 FCFA</td>
          </tr>
          <tr>
            <td>#1010</td>
            <td data-status="In Progress">In Progress</td>
            <td>2025-10-28</td>
            <td>450 000 FCFA</td>
          </tr>
          <tr>
            <td>#1011</td>
            <td data-status="Cancelled">Cancelled</td>
            <td>2025-10-27</td>
            <td>280 000 FCFA</td>
          </tr>
        </tbody>
      </table>
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

  </div>

 <?php get_footer(); ?>