<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Page non trouvée</title>

  <link rel="stylesheet" href="{{ asset('css/fontawesome/css/all.min.css')  }}">
  <link rel="stylesheet" href="{{ asset('css/header-footer.css')  }}">

  <link rel="stylesheet" href="{{ asset('css/page-not-found.css') }}">
</head>

<body>
  <!--header-->
  @include('shared.header')

  <main class="error-container">

    <img src="assets/images/page-not-found.png" alt="Illustration d'un robot cassé pour erreur 404">

    <h1>404, Page not founds</h1>

    <p>
      Something went wrong. It's look like the link is broken or the page is removed.
    </p>

    <div class="button-group">
      <a href="#" class="btn btn-primary">
        <i class="fas fa-arrow-left"></i>
        <span>GO BACK</span>
      </a>
      <a href="#" class="btn btn-outline">
        <i class="fas fa-home"></i>
        <span>GO TO HOME</span>
      </a>
    </div>

  </main>

  <!-- footer-->
  @include('shared.footer')

</body>

</html>