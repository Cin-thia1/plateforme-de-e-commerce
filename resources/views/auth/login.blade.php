<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
  <link rel="stylesheet" href="{{ asset('css/header-footer.css') }}">
  <link rel="stylesheet" href="{{ asset('css/reset-password.css') }}">
  <link rel="stylesheet" href="{{ asset('css/fontawesome/css/all.min.css') }}">
</head>

<body>
  <!--header-->
  @include('shared.header')

  <main class="form-container">

    <form method="POST" action="{{ route('login') }}">
      @csrf
      
      <h2>Se connecter</h2>
      <p>
        Entrer votre adresse email et votre mot de passe pour vous connecter
      </p>

      <div class="form-group">
        <label for="password">Adresse email</label>
        <div class="input-wrapper">
          <input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" >
          <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
      </div>

      <div class="form-group">
        <label for="confirm-password">Mot de passe</label>
        <div class="input-wrapper">
          <input type="password" id="confirm-password" name="password" required autocomplete="current-password"/>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
      </div>
      <!-- Remember Me -->
      <div class="block mt-4">
          <label for="remember_me" class="inline-flex items-center">
              <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
              <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
          </label>
      </div>
      @csrf

      <button type="submit" class="btn-submit">
        <span>{{ __('Log in') }}</span>
        <i class="fas fa-arrow-right"></i>
      </button>
      <div class="links-group" style="margin-top: 20px;">
        <p style="text-align: start;">
          @if (Route::has('password.request'))
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
              {{ __('Forgot your password?') }}
            </a>
          @endif
        </p>

      </div>

      <hr class="separator">

      <div class="links-group">
        
        <p>
          Pas de compte ? <a href="/register" class="link-sign">S'inscrire</a>
        </p>
      </div>
    </form>
  </main>

  <!-- footer-->
  @include('shared.footer')

</body>



</html>