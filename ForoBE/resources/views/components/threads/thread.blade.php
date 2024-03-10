@extends('layouts.app')

@section('template_title')
    Thread
@endsection

@section('content')
    <div class="container mt-5">
        <div class="justify-content-center">
            @if ($loading || empty($thread->comments))
                <div class="">Loading...</div>
            @else
                @include('partials.thread-preview', ['thread' => $thread])
                @include('partials.comments-list', ['threadId' => $thread->id, 'threadComments' => $thread->comments, 'threadClosed' => $thread->closed])
            @endif
        </div>
    </div>
@endsection
