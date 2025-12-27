<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
  <link rel="stylesheet" href="{{ asset('css/reset-password.css') }}">
  <link rel="stylesheet" href="{{ asset('css/header-footer.css') }}">
  <link rel="stylesheet" href="{{ asset('css/fontawesome/css/all.min.css') }}">
</head>

<body>
  <!--header-->
  @include('shared.header')

  <main class="form-container">

    <form method="POST" action="{{ route('register') }}">
      @csrf
      <h2>S'inscrire</h2>

      <p>
        Entrer vos informations pour creer un compte.
      </p>
      <div class="form-group">
        <label for="Nom">Nom</label>
        <div class="input-wrapper">
          <input type="text" id="name" name="name" :value="old('name')" required placeholder="Simo">
          <x-input-error :messages="$errors->get('name')" class="mt-2" style="color: red" />
        </div>
      </div>
      <div class="form-group">
        <label for="firstname">Prénom</label>
        <div class="input-wrapper">
          <input type="text" id="firstname" name="firstname" :value="old('firstname')" required placeholder="Arthur">
          <x-input-error :messages="$errors->get('firstname')" class="mt-2" style="color: red" />
        </div>
      </div>
      <div class="form-group">
        <label for="password">Adresse email</label>
        <div class="input-wrapper">
          <input type="email" id="email" name="email" :value="old('email')" required placeholder="exemple@texte.domaine">
          <x-input-error :messages="$errors->get('email')" class="mt-2" style="color: red" />
        </div>
      </div>

      <div class="form-group">
        <label for="confirm-password">Mot de passe</label>
        <div class="input-wrapper">
          <input type="password" id="password" type="password" name="password" required autocomplete="new-password">
          <x-input-error :messages="$errors->get('password')" class="mt-2" style="color: red" />
        </div>
      </div>
      <div class="form-group">
        <label for="confirm-password">Confirmer le mot de passe</label>
        <div class="input-wrapper">
          <input type="password" id="confirm-password" type="password" name="password_confirmation" required autocomplete="new-password">
          <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" style="color: red" />
        </div>
      </div>
      

      <button type="submit" class="btn-submit">
        <span>INSCRIPTION</span>
        <i class="fas fa-arrow-right"></i>
      </button>
      <hr class="separator">

      <div class="links-group">
        <p>
          Vous avez deja un compte? <a href="/login" class="link-sign">Connectez vous</a>
        </p>
      </div>
    </form>
  </main>

  <!-- footer-->
  @include('shared.footer')

</body>



</html>