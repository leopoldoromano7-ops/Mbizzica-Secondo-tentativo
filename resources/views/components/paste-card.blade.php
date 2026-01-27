<div class="card">
  <div class="card-body">
    <h5 class="card-title">{{ $paste->title }}</h5>
    <p class="card-text">{{ $paste->content }}</p>

    @if ($paste->attachment_path && $paste->file_path)
      <p class="card-text"><strong>Allegato presente</strong></p>
      <a href="{{ asset('storage/' . $paste->attachment_path) }}" target="_blank" class="btn btn-primary">
        Visualizza allegato
      </a>
        <a href="{{ asset('storage/' . $paste->attachment_path) }}" download class="btn btn-success">
        Scarica allegato
      </a>
    @else
      <p class="card-text">Nessun allegato</p>
    @endif

    @if($paste->tags->count())
      <p>
          <strong>Tags:</strong>
          @foreach($paste->tags as $tag)
              <span class="badge bg-secondary">{{ $tag->name }}</span>
          @endforeach
      </p>
    @endif


      @if($paste->file_path)
        <a href="{{ route('paste.download', $paste->id) }}" class="btn btn-warning">
            Scarica file testo
        </a>
    @endif

    @if($paste->visibility == 0 || $paste->visibility == 2)
        <p>Link condivisibile:</p>
        <input type="text" value="{{ url('/paste/'.$paste->url) }}" readonly>
    @endif

    @if(auth()->check() && auth()->id() === $paste->user_id)
        <a href="{{ route('paste.edit', $paste->id) }}" class="btn btn-primary">
          Modifica
        </a>
      @endif

    @if(auth()->check() && auth()->id() === $paste->user_id)
        <form action="{{ route('paste.destroy', $paste->id) }}" method="POST"
          onclick="return confirm('Sei sicuro di voler eliminare questa paste?');">
          @csrf
          @method('DELETE')
        <button type="submit" class="btn btn-danger">Elimina</button>
      </form>
    @endif
    {{-- metodo direttamente con dowload per via del lo sotrage link --}}
{{-- @if($paste->file_path)
  <a href="{{ asset('storage/' . $paste->file_path) }}" download class="btn btn-warning">
      Scarica file testo
  </a>
@endif --}}

  </div>
</div>
