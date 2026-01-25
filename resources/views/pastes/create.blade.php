<x-layout>
    
    {{-- messagio di sucesso --}}
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

        <main class="container">
            <section class="row">
                <article class="col-12 text-center">
                    <h1 class="display">Crea nuovo Paste</h1>
                </article>
            </section>
            
            <x-paste-form />

        </main>
</x-layout>