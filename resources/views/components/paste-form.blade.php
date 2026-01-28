<section class="row justify-content-center">
    <article class="col-12 col-md-8">

        <form method="POST" action="{{ route('paste.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Titolo</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Contenuto</label>
                <textarea class="form-control" cols="30" rows="10" id="content" name="content"></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Visibilità</label>
                <div>
                    
                <label>
                    <input type="radio" name="visibility" value="0" checked>
                    Pubblico
                </label>
                <label class="ms-3">
                    <input type="radio" name="visibility" value="2">
                    NON elencato
                </label>
                    @auth
                    <label class="ms-3">
                        <input type="radio" name="visibility" value="1">
                        Privato
                    </label>
                    @endauth
                </div>
            </div>

            <div class="mb-3">
                <label for="tags" class="form-label">Tags</label>
                <input type="text" class="form-control" id="tags" name="tags"
                       value="{{ old('tags') }}">
            </div>

            <input type="file" name="attachment">
            <button type="submit" class="btn btn-primary">Invia</button>

        </form>

    </article>
</section>
