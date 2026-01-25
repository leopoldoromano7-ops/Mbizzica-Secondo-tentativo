<x-layout>
    <main class="container">
        <section class="row">
            <article class="col-12 text-center mt-5">
                <h5>Password dimenticata? Invia la tua email e riceverai un link per reimpostarla</h1>
            </article>
        </section>

        <section class="row justify-content-center mt-4">
            <article class="col-12 col-md-6">
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input class="form-control" type="email" name="email" id="email" value="{{ old('email') }}" required>
                    </div>
                    <button type="submit" class="btn btn-warning w-100">Reimposta la password</button>
                </form>
            </article>
        </section>
    </main>
</x-layout>
