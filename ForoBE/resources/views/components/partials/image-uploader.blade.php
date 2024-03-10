<div class="row align-items-center">
    <div class="col-10">
        <input
            onchange="handleImageChange(event)"
            ref="fileInputRef"
            class="form-control"
            type="file"
            name="image"
            accept="image/*"
            id="imageInput"
            {{ $disabled ? 'disabled' : '' }}
        />
    </div>
    <div class="col-2">
        <button
            onclick="handleImageUpload()"
            class="btn btn-outline-primary"
            {{ !$imageSrc || $uploaded ? 'disabled' : '' }}
        >
            {{ $uploaded ? "Subido" : "Subir Archivo" }}
        </button>
    </div>
    <div>
        @if ($imageSrc)
            <img
                class="my-4"
                src="{{ $imageSrc }}"
                alt="{{ $imageSrc }}"
                style="min-height: 150px; max-height: 400px; min-width: 150px; max-width: 400px"
            />
        @endif
    </div>
</div>
