<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Import propre a cette page-->
  <link rel="stylesheet" href="{{ asset('css/home.css') }}">
  <link rel="stylesheet" href="{{ asset('css/admin-dashboard.css') }}">
  <!-- import commun a toutes les pages-->
  <link rel="stylesheet" href="{{ asset('css/fontawesome/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/header-footer.css') }}">

  <title>Dashboard Admin</title>
  
  
</head>

<body>
  <!--header-->
  @include('shared.header')

  <main class="admin-container">
    <!-- Header Section -->
    <div class="admin-header-section">
      <h1>Tableau de bord</h1>
      <div class="user-badge">
        <div>
          <p style="margin: 0; font-weight: 600;">{{ auth()->user()->name }}</p>
          <p style="margin: 5px 0 0 0; font-size: 12px; color: #999;">Administrateur</p>
        </div>
        <div class="avatar-circle">{{ substr(auth()->user()->name, 0, 1) }}</div>
      </div>
    </div>

    <!-- Stats Section -->
    <div class="admin-stats">
      <div class="stat-box blue">
        <div class="stat-number">{{ $totalOrders ?? 0 }}</div>
        <div class="stat-label">Commandes totales</div>
      </div>
      <div class="stat-box">
        <div class="stat-number">{{ $pendingOrders ?? 0 }}</div>
        <div class="stat-label">En attente</div>
      </div>
      <div class="stat-box green">
        <div class="stat-number">{{ $totalUsers ?? 0 }}</div>
        <div class="stat-label">Utilisateurs</div>
      </div>
      <div class="stat-box red">
        <div class="stat-number">{{ number_format($revenue ?? 0, 0, ',', ' ') }}</div>
        <div class="stat-label">Revenu FCFA</div>
      </div>
    </div>

    <!-- Content Grid -->
    <div class="admin-content-grid">
      <!-- Account Info -->
      <div class="admin-card">
        <h3>Informations du compte</h3>
        <div class="info-item">
          <span class="info-label">Nom complet</span>
          <span class="info-value">{{ auth()->user()->name }}</span>
        </div>
        <div class="info-item">
          <span class="info-label">Email</span>
          <span class="info-value">{{ auth()->user()->email }}</span>
        </div>
        <div class="info-item">
          <span class="info-label">Type de compte</span>
          <span class="info-value">
            <span class="badge badge-processing">Administrateur</span>
          </span>
        </div>
        <div class="info-item">
          <span class="info-label">Date d'inscription</span>
          <span class="info-value">{{ auth()->user()->created_at->format('d/m/Y') }}</span>
        </div>
      </div>

      <!-- Quick Stats -->
      <div class="admin-card">
        <h3>Statistiques rapides</h3>
        <div class="info-item">
          <span class="info-label">Commandes ce mois</span>
          <span class="info-value">{{ $totalOrders ?? 0 }}</span>
        </div>
        <div class="info-item">
          <span class="info-label">Clients actifs</span>
          <span class="info-value">{{ $totalUsers ?? 0 }}</span>
        </div>
        <div class="info-item">
          <span class="info-label">En attente de traitement</span>
          <span class="info-value">{{ $pendingOrders ?? 0 }}</span>
        </div>
        <div class="info-item">
          <span class="info-label">Revenus totaux</span>
          <span class="info-value">{{ number_format($revenue ?? 0, 0, ',', ' ') }} FCFA</span>
        </div>
      </div>
    </div>

    <!-- Orders Table -->
    <div class="orders-table">
      <h3>Commandes récentes</h3>
      <table>
        <thead>
          <tr>
            <th>ID Commande</th>
            <th>Client</th>
            <th>Montant</th>
            <th>Statut</th>
            <th>Date</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>#12345</td>
            <td>Kevin Gilbert</td>
            <td>45,500 FCFA</td>
            <td><span class="badge badge-pending">En attente</span></td>
            <td>24/11/2025</td>
          </tr>
          <tr>
            <td>#12344</td>
            <td>Marie Dupont</td>
            <td>78,200 FCFA</td>
            <td><span class="badge badge-completed">Complétée</span></td>
            <td>23/11/2025</td>
          </tr>
          <tr>
            <td>#12343</td>
            <td>Jean Martin</td>
            <td>32,100 FCFA</td>
            <td><span class="badge badge-completed">Complétée</span></td>
            <td>22/11/2025</td>
          </tr>
          <tr>
            <td>#12342</td>
            <td>Anne Leclerc</td>
            <td>156,750 FCFA</td>
            <td><span class="badge badge-processing">En cours</span></td>
            <td>21/11/2025</td>
          </tr>
        </tbody>
      </table>
    </div>
  </main>

  <!-- footer-->
  @include('shared.footer')

</body>

</html>