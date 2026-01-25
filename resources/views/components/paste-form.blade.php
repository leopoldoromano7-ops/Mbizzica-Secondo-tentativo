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
                <input type="file" name="attachment">
                <button type="submit" class="btn btn-primary">Salva</button>

        </form>

    </article>
</section>