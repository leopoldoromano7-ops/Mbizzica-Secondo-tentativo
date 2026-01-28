<div class="card-comments mt-3">
    <h6>Commenti</h6>

    @foreach($paste->comments as $comment)
        <div class="comment mb-2 p-2" style="background:#f5f5f5; border-radius:5px;">
            <strong>{{ $comment->authorName() }}:</strong> {{ $comment->content }}
        </div>
    @endforeach

    <form action="{{ route('paste.comment', $paste->id) }}" method="POST" class="mt-2">
        @csrf
        <div class="input-group">
            <input type="text" name="content" class="form-control form-control-sm" placeholder="Aggiungi un commento...">
            <button type="submit" class="btn btn-sm btn-primary">Invia</button>
        </div>
    </form>
</div>
