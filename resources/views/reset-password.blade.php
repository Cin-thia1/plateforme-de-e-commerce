<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Réinitialiser le mot de passe</title>

  <link rel="stylesheet" href="{{ asset('css/fontawesome/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/header-footer.css') }}">

  <link rel="stylesheet" href="{{ asset('css/reset-password.css') }}">
</head>

<body>
  <!--header-->
  @include('shared.header')

  <main class="form-container">

    <form action="#">
      <h2>Reinitialiser le mot de passe</h2>

      <p>
        Entrer un nouveau mot de passe robuste, facile à mémoriser
      </p>

      <div class="form-group">
        <label for="password">Mot de passe</label>
        <div class="input-wrapper">
          <input type="password" id="password" placeholder="8+ characters">

        </div>
      </div>

      <div class="form-group">
        <label for="confirm-password">Confirmer le mot de passe</label>
        <div class="input-wrapper">
          <input type="password" id="confirm-password">

        </div>
      </div>

      <button type="submit" class="btn-submit">
        <span>REINITIALISER</span>
        <i class="fas fa-arrow-right"></i>
      </button>
    </form>

  </main>

  <!-- footer-->
  @include('shared.header')

</body>

</html>