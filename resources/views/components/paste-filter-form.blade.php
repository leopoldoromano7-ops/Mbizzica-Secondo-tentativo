<form method="GET" action="{{ route('pastes.index') }}" class="mb-3">

    <div class="row g-2">
        <div class="col-md-6">
            <input  class="form-control" type="text" name="q"   placeholder="Cerca..."value="{{ request('q') }}">
        </div>

        <div class="col-md-4">
            <select name="tag" class="form-control">
                <option value="">Tutti</option>
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}"
                        {{ request('tag') == $tag->id ? 'selected' : '' }}>
                        {{ $tag->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-2 d-grid">
            <button class="btn btn-primary" type="submit">Filtra</button>
        </div>
    </div>

</form>
