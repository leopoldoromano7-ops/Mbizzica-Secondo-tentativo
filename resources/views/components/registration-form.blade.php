<form method="POST" action="{{ route('register') }}">
  @csrf

  <div class="mb-3">
    <label for="name" class="form-label">Nome</label>
    <input type="text" class="form-control" id="name" placeholder="il tuo nome" name="name">
  </div>

  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" placeholder="la tua email" name="email">
  </div>

  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" placeholder="Usa caratteri speciali ed altro" name="password">
  </div>

  <div class="mb-3">
    <label for="password_confirmation" class="form-label">Conferma Password</label>
    <input type="password" class="form-control" id="password_confirmation" placeholder="Conferma password" name="password_confirmation">
  </div>

  <button type="submit" class="btn btn-primary mt-3">Registrati</button>
</form>
