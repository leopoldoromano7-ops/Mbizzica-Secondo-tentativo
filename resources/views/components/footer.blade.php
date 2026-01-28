<footer class="bg-dark text-white py-4 text-center">
  <div class="container">
    <div class="row align-items-center">

      <div class="col-md-6 mb-3 mb-md-0">
        <p class="mb-1"><strong>Iscriviti alla nostra newsletter</strong></p>
      </div>

      <div class="col-md-6">
        <form action="{{ route('send.email') }}" method="POST" class="d-flex gap-2 justify-content-end">
          @csrf
          <input type="text" name="username" class="form-control form-control-sm" placeholder="Nome" required>
          <input type="email" name="email" class="form-control form-control-sm" placeholder="Email" required>
          <button type="submit" class="btn btn-primary btn-sm">Iscriviti</button>
        </form>
      </div>

    </div>
  </div>
</footer>
