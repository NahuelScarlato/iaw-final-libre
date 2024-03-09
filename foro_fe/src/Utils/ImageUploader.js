import {useRef, useState} from "react"

const ImageUploader = ({setImageInThread}) => {
    const [imageSrc, setImageSrc] = useState()
    const [uploaded, setUploaded] = useState(false)
    const fileInputRef = useRef(null)

    function handleImageChange(changeEvent) {
        changeEvent.preventDefault()
        const reader = new FileReader()

        reader.onload = function(onLoadEvent) {
            setImageSrc(onLoadEvent.target.result)
        }

        reader.readAsDataURL(changeEvent.target.files[0])
        setUploaded(false)
    }

    async function handleImageUpload() {
        setUploaded(true)
        const formData = new FormData()
        formData.append('file', fileInputRef.current.files[0])

        formData.append('upload_preset', 'iaw_foro')

        const data = await fetch('https://api.cloudinary.com/v1_1/nahuelcloudiaw/image/upload', {
            method: 'POST',
            body: formData
        }).then(r => r.json()
        ).catch(e => setUploaded(false))

        setImageInThread(data.secure_url)
        setImageSrc(undefined)
        setUploaded(false)
    }

    return (

        <div className="row align-items-center">
            <div className="col-10">
                <input
                    onChange={handleImageChange}
                    ref={fileInputRef}
                    className="form-control"
                    type="file"
                    name="image"
                    accept="image/*"
                    id="imageInput"
                    disabled={uploaded}
                />
            </div>
            <div className="col-2">
                <button
                    onClick={handleImageUpload}
                    className="btn btn-outline-primary"
                    disabled={!imageSrc || uploaded}
                >
                    {uploaded ? "Subido" : "Subir Archivo"}
                </button>
            </div>
            <div>
                <img
                    className="my-4"
                    src={imageSrc}
                    alt={imageSrc}
                    style={{
                        minHeight: '150px',
                        maxHeight: '400px',
                        minWidth: '150px',
                        maxWidth: '400px'
                    }}
                />
            </div>
        </div>
    )
}

export default ImageUploader