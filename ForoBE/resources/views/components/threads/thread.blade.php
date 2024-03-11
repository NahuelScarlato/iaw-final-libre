<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Thread ') . " - " . $thread->id . " - " . $thread->title }}
        </h2>
    </x-slot>

    <div class="container mt-5">
        <div class="justify-content-center">
                @include('components.threads.thread-preview', ["showCommentsLink" => false, 'thread' => $thread])
                @include('components.comments.comments-list', ['threadId' => $thread->id, 'threadComments' => $thread->comments, 'threadClosed' => $thread->closed])
        </div>
    </div>
</x-app-layout>
