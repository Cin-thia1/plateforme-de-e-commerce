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
        <div class="stat-number">{{ $totalOrders }}</div>
        <div class="stat-label">Commandes totales</div>
      </div>
      <div class="stat-box orange">
        <div class="stat-number">{{ $pendingOrders }}</div>
        <div class="stat-label">En attente</div>
      </div>
      <div class="stat-box green">
        <div class="stat-number">{{ $deliveredOrders }}</div>
        <div class="stat-label">Livrées</div>
      </div>
      <div class="stat-box purple">
        <div class="stat-number">{{ $totalUsers }}</div>
        <div class="stat-label">Utilisateurs</div>
      </div>
      <div class="stat-box red">
        <div class="stat-number">{{ number_format($revenue, 0, ',', ' ') }}</div>
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
          <span class="info-label">Commandes totales</span>
          <span class="info-value">{{ $totalOrders }}</span>
        </div>
        <div class="info-item">
          <span class="info-label">Commandes en attente</span>
          <span class="info-value">{{ $pendingOrders }}</span>
        </div>
        <div class="info-item">
          <span class="info-label">Commandes livrées</span>
          <span class="info-value">{{ $deliveredOrders }}</span>
        </div>
        <div class="info-item">
          <span class="info-label">Clients actifs</span>
          <span class="info-value">{{ $totalUsers }}</span>
        </div>
        <div class="info-item">
          <span class="info-label">Revenus totaux</span>
          <span class="info-value">{{ number_format($revenue, 0, ',', ' ') }} FCFA</span>
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
          @forelse($recentOrders as $orderItem)
          <tr>
            <td>#{{ $orderItem->order_id }}</td>
            <td>{{ $orderItem->order->user->name ?? 'N/A' }}</td>
            <td>{{ number_format(($orderItem->product->price ?? 0) * $orderItem->quantite, 0, ',', ' ') }} FCFA</td>
            <td>
              @if($orderItem->type === 'en attente')
                <span class="badge badge-pending">En attente</span>
              @elseif($orderItem->type === 'livree')
                <span class="badge badge-completed">Livrée</span>
              @else
                <span class="badge badge-processing">En cours</span>
              @endif
            </td>
            <td>{{ $orderItem->created_at->format('d/m/Y') }}</td>
          </tr>
          @empty
          <tr>
            <td colspan="5" style="text-align: center; padding: 20px; color: #999;">Aucune commande disponible</td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </main>

  <!-- footer-->
  @include('shared.footer')

</body>

</html>