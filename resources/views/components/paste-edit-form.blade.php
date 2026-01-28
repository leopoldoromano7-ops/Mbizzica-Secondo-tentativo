<section class="row justify-content-center mt-5">
    <article class="col-12 col-md-8 mt-5">

        <form method="POST" action="{{ route('paste.update', $paste->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Titolo</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $paste->title) }}">
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Contenuto</label>
                <textarea class="form-control" cols="30" rows="10" id="content" name="content">{{ old('content', $paste->content) }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Visibilità</label>
                <div>
                    <label>
                        <input type="radio" name="visibility" value="0" {{ old('visibility', $paste->visibility) == 0 ? 'checked' : '' }}>
                        Pubblico
                    </label>
                    <label class="ms-3">
                        <input type="radio" name="visibility" value="1" {{ old('visibility', $paste->visibility) == 1 ? 'checked' : '' }}>
                        Privato
                    </label>
                    <label class="ms-3">
                        <input type="radio" name="visibility" value="2" {{ old('visibility', $paste->visibility) == 2 ? 'checked' : '' }}>
                        Non elencato
                    </label>
                </div>
            </div>
            
            {{-- taggs --}}
            <div class="mb-3">
                <label for="tags" class="form-label">Tags</label>
                <input type="text" class="form-control" id="tags" name="tags"
                       value="{{ old('tags', $paste->tags->pluck('name')->implode(', ')) }}">
            </div>

            <input type="file" name="attachment">

            <button type="submit" class="btn btn-primary">Aggiorna</button>
        </form>

    </article>
</section>
