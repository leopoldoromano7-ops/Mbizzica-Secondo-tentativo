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

      @if($paste->file_path)
        <a href="{{ route('paste.download', $paste->id) }}" class="btn btn-warning">
            Scarica file testo
        </a>
    @endif

    @if($paste->visibility == 1)
        <p>Link condivisibile:</p>
        <input type="text" value="{{ url('/paste/'.$paste->url) }}" readonly>
    @endif

    {{-- metodo direttamente con dowload per via del lo sotrage link --}}
{{-- @if($paste->file_path)
  <a href="{{ asset('storage/' . $paste->file_path) }}" download class="btn btn-warning">
      Scarica file testo
  </a>
@endif --}}

  </div>
</div>
