<div class="grid d-grid">
    @if (!$threadClosed)
        @include('components.comments.create-comment-form', ['threadId' => $threadId])
    @endif
</div>

<ul class="list-group">
    @foreach ($threadComments as $comment)
        <li class="list-unstyled">
            @include('components.comments.comment', ['comment' => json_decode(json_encode($comment))])
        </li>
    @endforeach
</ul>
