<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Confirmer code de recuperation</title>

  <link rel="stylesheet" href="{{ asset('css/fontawesome/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/header-footer.css') }}">

  <link rel="stylesheet" href="{{ asset('css/forget-password.css') }}">
</head>

<body>

  <!--header-->
  @include('shared.header')

  <main class="form-container">

    <form action="#">
      <h2>Code de vérification</h2>

      <p class="description">
        Entrer le code de vérification envoyé a votre adresse email .
        
      </p>

      <div class="form-group">
        <label for="code">Code</label>
        <input type="text" id="code" >
      </div>

      <button type="submit" class="btn-submit">
        <span  onclick="window.location.href='reset-password.html';" style="cursor: pointer;">VERIFIER</span>
        <i class="fas fa-arrow-right"></i>
      </button>

      <hr class="separator">

      <div class="links-group">
        <p>
          Vous avez deja un compte? <a href="login.html" class="link-sign">Connectez vous</a>
        </p>
      </div>

      <p class="customer-service-note">
        Vous pourrez contacter <a href="#" class="link-service">le support client</a> pour vous aider à restaurer votre compte.
      </p>
    </form>

  </main>

  <!-- footer-->
  @include('shared.footer')

</body>

</html>