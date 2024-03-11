<div class="card mb-2">
    <div class="card-body">
        <form action="{{ route('comments.store') }}" method="POST">
            @csrf
            <input
                class="form-control mb-2"
                type="text"
                name="tag"
                placeholder="Tags... (ejemplo: TV,Boca Juniors,Ci-fi)"
            />
            <textarea
                class="form-control mb-2"
                name="text"
                placeholder="Texto..."
                required
            ></textarea>
            {{-- Aquí deberías incluir el componente ImageUploader como lo haces en React --}}
            <button class="btn mx-2" type="submit">Comentar</button>
        </form>
    </div>
</div>
