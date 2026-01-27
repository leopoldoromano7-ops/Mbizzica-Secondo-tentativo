
  <form method="POST" action="{{ route('login') }}">
    @csrf

    <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input type="email" class="form-control" id="email" placeholder="la tua email" name="email">
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" class="form-control" id="password" placeholder="Usa caratteri speciali ed altro" name="password">
    </div>
    <button type="submit" class="btn btn-primary mt-3">Entera</button>
  </form>
