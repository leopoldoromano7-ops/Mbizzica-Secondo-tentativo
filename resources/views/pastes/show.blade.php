<x-layout >
    <main class="container">
        <section class="row">
            <article class="col-12 text-center">
                <h1 class="display">Dettaglio paste</h1>
            </article>
        </section>
        <section class="row">
            <x-paste-card :paste="$paste" />
        </section>
    </main>
</x-layout>