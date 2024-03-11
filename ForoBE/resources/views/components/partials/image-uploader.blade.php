<div class="row align-items-center">
    <div class="col-10">
        <input onchange="handleImageChange(event)" class="form-control" type="file" name="image" accept="image/*" id="imageInput">
    </div>
    <div class="col-2">
        <button id="uploadButton" onclick="handleImageUpload(event)" class="btn btn-outline-primary" disabled>
            Subir Archivo
        </button>
    </div>
    <div>
        <img id="imageSource" class="my-4" src="" alt="" style="min-height: 150px; max-height: 400px; min-width: 150px; max-width: 400px;">
    </div>
</div>

<script>
    const imageInput = document.getElementById('images');
    const image = document.getElementById('imageSource');
    const button = document.getElementById('uploadButton');

    function handleImageChange(event) {
        event.preventDefault();
        const reader = new FileReader();

        reader.onload = function(onLoadEvent) {
            image.src = onLoadEvent.target.result;
            button.disabled = false;
            button.innerText = 'Subir Archivo';
        }
        reader.readAsDataURL(event.target.files[0]);
    }

    async function handleImageUpload(event) {
        event.preventDefault();
        const formData = new FormData();
        formData.append('file', document.getElementById('imageInput').files[0]);

        formData.append('upload_preset', 'iaw_foro');

        try {
            const response = await fetch('https://api.cloudinary.com/v1_1/nahuelcloudiaw/image/upload', {
                method: 'POST',
                body: formData
            });
            const data = await response.json();
            imageInput.value += data.secure_url + " ";
            image.src = undefined;
            button.innerText = 'Subido';
            button.disabled = false;
        } catch (error) { console.log("Error on file upload"); }
    }
</script>
