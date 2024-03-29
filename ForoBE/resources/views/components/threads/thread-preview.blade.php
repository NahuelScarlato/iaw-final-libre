<div class="card mb-2">
    <form method="post" action="{{ route('threads.close', $thread->id) }}" class="p-6">
        @csrf
        @method('patch')
        <x-danger-button class="ms-3">
            {{ __('Close') }}
        </x-danger-button>
    </form>
    <div class="card-body">
        <h5 class="card-title text-start">{{ $thread->title }}</h5>
        @include('components.partials.tags', ['element' => $thread])
        <p class="card-text text-start mt-2">
            {{ $thread->text }}
        </p>
        @include('components.partials.images', ['element' => $thread])
        <p class="card-text text-end">
            @if($showCommentsLink)
                <a class="mx-2" href="/thread/{{ $thread->id }}">{{ count($thread->comments) }} comments</a>
            @endif
            <button class="btn btn-primary mx-1">{{ count($thread->likes) ?? 0 }} Likes</button>
            <button class="btn btn-secondary mx-1">{{ count($thread->dislikes) ?? 0 }} Dislikes</button>
            <small class="text-muted mx-1">{{ $thread->author }} wrote on {{ $thread->created_at }}</small>
        </p>
    </div>
</div>
