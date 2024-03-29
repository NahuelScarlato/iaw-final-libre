<div class="card mb-2">
    <form method="post" action="{{ route('comments.delete', $comment->id) }}" class="p-6">
        @csrf
        @method('delete')
        <x-danger-button class="ms-3">
            {{ __('Delete') }}
        </x-danger-button>
    </form>
    <div class="card-body">
        <p class="card-text text-start mt-2">
            {{ $comment->text }}
        </p>
        @include('components.partials.tags', ['element' => $comment])
        @include('components.partials.images', ['element' => $comment])
        <p class="card-text text-end">
            <button class="btn btn-primary mx-1">{{ count($comment->likes) ?? 0 }} Likes</button>
            <button class="btn btn-secondary mx-1">{{ count($comment->dislikes) ?? 0 }} Dislikes</button>
            <small class="text-muted mx-1">{{ $comment->author }} wrote on {{ $comment->created_at }}</small>
        </p>
    </div>
</div>
