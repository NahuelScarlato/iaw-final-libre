<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Threads') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 text-gray-900">
                    <div class="d-grid gap-2">
                        @if ($showCreateForm)
                            @include('components.threads.create-thread-form')
                        @else
                            <a class="btn btn-success bt-lg mb-2" href="/threads?create=true">Crear un nuevo hilo</a>
                        @endif
                    </div>
                    <div>
                        @foreach ($threads as $index => $thread)
                            @include('partials.thread-preview', ['thread' => $thread, 'showCommentsLink' => true])
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
