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
                    <div class="card mb-2">
                        <div class="card-body">
                            <form action="{{ route('threads.store') }}" method="POST">
                                @csrf
                                <input
                                    class="form-control mb-2"
                                    type="text"
                                    name="title"
                                    placeholder="Titulo..."
                                    required
                                />
                                <input
                                    class="form-control mb-2"
                                    type="text"
                                    name="tags"
                                    placeholder="Tags... (ejemplo: TV,Boca Juniors,Whisky)"
                                />
                                <textarea
                                    class="form-control mb-2"
                                    name="text"
                                    placeholder="Texto..."
                                    required
                                ></textarea>
                                <input
                                    id="images"
                                    name="images"
                                    value=""
                                    type="hidden"
                                >
                                @include('components.partials.image-uploader')
                                <button class="btn btn-primary mx-2" type="submit">Publicar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
