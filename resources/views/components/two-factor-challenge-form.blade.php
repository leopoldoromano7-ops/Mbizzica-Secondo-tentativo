<form method="POST" action="/two-factor-challenge">
    @csrf

    <label for="code" class="form-label">Codice a 6 cifre:</label>
    <input id="code" name="code" type="text" required />

    <button type="submit" class="btn btn-prumary mt-3">Conferma</button>
</form>