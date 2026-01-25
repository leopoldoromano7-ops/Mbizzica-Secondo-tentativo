<x-layout>

    <main class="container">
        <section class="row">
            <article class="col-12 text-center">
                <h1 class="display">Registrazione</h1>
            </article>
        </section>

        <x-registration-form />
        <lead class="text-center mt-3">
            Hai già un account? <a href="{{ route('login') }}">Accedi</a>
        </lead>
    </main>

</x-layout>