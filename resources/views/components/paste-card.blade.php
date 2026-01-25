<div class="card">
  <div class="card-body">
    <h5 class="card-title">{{ $paste->title }}</h5>
    <p class="card-text">{{ $paste->content }}</p>

    @if ($paste->attachment_path)
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


  </div>
</div>
