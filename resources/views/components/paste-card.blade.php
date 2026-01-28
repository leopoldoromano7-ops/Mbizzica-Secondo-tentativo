<div class="card-horizontal">

  @if($paste->attachment_path)
    <img src="{{ asset('storage/' . $paste->attachment_path) }}" alt="Allegato">
  @elseif($paste->file_path)
    <div class="file-placeholder">
      File di testo
    </div>
  @endif

  <div class="card-content">
    <div>
      <h5>{{ $paste->title }}</h5>
      <p>{{ $paste->content }}</p>

      @if($paste->tags->count())
        <p>
          @foreach($paste->tags as $tag)
            <span class="badge-custom">{{ $tag->name }}</span>
          @endforeach
        </p>
      @endif
    </div>

<small class="text-muted">Autore: {{ $paste->user ? $paste->user->name : 'Guest' }}</small>

  @if(!request()->routeIs('paste.show'))
        <a href="{{ route('paste.show', $paste->url) }}" class="btn btn-sm btn-info">Visualizza</a>
  @endif    <div class="btn-group">

      @if($paste->attachment_path)
        <a href="{{ asset('storage/' . $paste->attachment_path) }}" target="_blank" class="btn btn-sm btn-primary">Visualizza Allegato</a>
        <a href="{{ asset('storage/' . $paste->attachment_path) }}" download class="btn btn-sm btn-success">Scarica</a>
      @endif

      @if($paste->file_path)
        <a href="{{ route('paste.download', $paste->id) }}" class="btn btn-sm btn-warning">Scarica testo</a>
      @endif

      <x-paste-comments :paste="$paste" />


      @if(Auth::check()  && Auth::id()  === $paste->user_id)
        <a href="{{ route('paste.edit', $paste->id) }}" class="btn btn-sm btn-primary">Modifica</a>
          <form action="{{ route('paste.destroy', $paste->id) }}" method="POST" class="form-inline confirm-delete">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-sm btn-danger">Elimina</button>
          </form>
      @endif

      @if($paste->visibility == 0 || $paste->visibility == 2)
        <input type="text" value="{{ url('/paste/'.$paste->url) }}" readonly>
        <button type="button" onclick="navigator.clipboard.writeText(this.previousElementSibling.value)" class="btn btn-sm btn-outline-secondary">Copia link</button>
      @endif
    </div>
  </div>
</div>
