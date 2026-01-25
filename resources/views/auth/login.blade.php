<x-layout>

    <main class="container">
        <section class="row">
            <article class="col-12 text-center">
                <h1 class="display">Login</h1>
            </article>
        </section>
            
        <x-login-form />
        <lead class="text-center mt-3">
            Non hai un account? <a href="{{ route('register') }}">Registrati</a>
        </lead>
        <lead class="text-center mt-3">
            <a href="{{ route('password.request') }}">Hai dimenticato la password?</a>
        </lead>

    </main>

</x-layout>