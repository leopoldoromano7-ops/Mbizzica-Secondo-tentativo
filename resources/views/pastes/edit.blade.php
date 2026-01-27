<x-layout>
        <main class="container">
            <section class="row">
                <article class="col-12  text-center my-4">
                <h1 class="display">Modifica il Pastee</h1>
                </article>
            </section>
            {{-- Undefined variable $paste!!! mmi devo ricorda dipassare la variabile per i components --}}
            <x-paste-edit-form  :paste="$paste" />
        </main>
    </x-layout>