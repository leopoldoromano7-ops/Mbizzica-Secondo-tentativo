
  <form action="{{ route('password.confirm') }}" method="POST">
    @csrf
    <div class="mb-3">
      <label for="password" class="form-label">Conferma Password</label>
      <input type="password" class="form-control" id="password" placeholder="Usa caratteri speciali ed altro" name="password">
    </div>
    <button type="submit" class="btn btn-primary mt-3">Conferma</button>
  </form>
