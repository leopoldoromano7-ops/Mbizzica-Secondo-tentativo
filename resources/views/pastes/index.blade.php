<x-layout>

        <main class="container">
            <section class="row">
                <article class="col-12 text-center">
                    <h1 class="display">Tutti i paste</h1>
                </article>
            </section>
            <section class="row">

                <x-paste-filter-form :tags="$tags" />

                @foreach ($pastes as $paste)
                    <article class="col-12 col-md-3">
                        <x-paste-card :paste="$paste" />
                    </article>
                 @endforeach


            </section>
        </main>
</x-layout>