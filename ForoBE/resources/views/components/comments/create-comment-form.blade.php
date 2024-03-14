<div class="card mb-2">
    <div class="card-body">
        <form action="{{ route('comments.store') }}" method="POST">
            @csrf
            <input
                id="threadId"
                name="threadId"
                value={{ $threadId }}}
                type="hidden"
            />
            <input
                class="form-control mb-2"
                type="text"
                name="tags"
                placeholder="Tags... (ejemplo: TV,Boca Juniors,Ci-fi)"
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
            <button class="btn mx-2" type="submit">Comentar</button>
        </form>
    </div>
</div>
