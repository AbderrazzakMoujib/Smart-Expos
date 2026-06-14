<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="robots" content="noindex,nofollow">
  <title>Accès Dashboard — Smart Expos</title>
  <link rel="icon" href="{{ asset('favicon.ico') }}">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap">
  <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">
</head>
<body class="db-login-body">

<div class="db-login">

  <div class="db-login__card">

    <div class="db-login__logo">
      <img src="{{ asset('assets/img/logo_smart.webp') }}" alt="Smart Expos">
    </div>

    <div class="db-login__header">
      <h1 class="db-login__title">Espace Privé</h1>
      <p class="db-login__sub">Accès réservé au personnel Smart Expos</p>
    </div>

    @if($errors->any())
    <div class="db-login__error">
      <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
      {{ $errors->first() }}
    </div>
    @endif

    <form action="{{ route('dashboard.login.post') }}" method="POST" class="db-login__form">
      @csrf

      <div class="db-login__field">
        <label for="email">Email</label>
        <div class="db-login__input-wrap">
          <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
          <input type="email" id="email" name="email" value="{{ old('email') }}"
                 placeholder="votre@email.com" autocomplete="email" required>
        </div>
      </div>

      <div class="db-login__field">
        <label for="password">Mot de passe</label>
        <div class="db-login__input-wrap">
          <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0110 0v4"/></svg>
          <input type="password" id="password" name="password"
                 placeholder="••••••••" autocomplete="current-password" required>
        </div>
      </div>

      <button type="submit" class="db-login__btn">
        Se connecter
        <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
      </button>
    </form>

  </div>

  <div class="db-login__bg" aria-hidden="true"></div>

</div>

</body>
</html>
