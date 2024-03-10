<div class="grid d-grid">
    @if ($showCreateForm)
        @include('create-comment-form', ['threadId' => $threadId])
    @else
        <button class="btn btn-success bt-lg mb-2" {{ $threadClosed ? 'disabled' : '' }} onclick="setShowCreateForm(true)">Agregar comentario</button>
    @endif
</div>

<ul class="list-group">
    @foreach ($comments as $comment)
        <li class="list-unstyled">
            @include('comment', ['comment' => $comment])
        </li>
    @endforeach
</ul>
