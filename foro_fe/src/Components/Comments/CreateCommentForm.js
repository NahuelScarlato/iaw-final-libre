import React, {useState} from 'react'
import {createComment} from "../../Utils/ApiCalls"
import ImageUploader from "../../Utils/ImageUploader"
import storage from "../../Storage/storage"

const INITIAL_STATE = {
    text: '',
    images: [],
    tags: [],
    author: ''
}

const CreateCommentForm = ({createdNewComment, threadId}) => {
    const [formData, setFormData] = useState(INITIAL_STATE)

    const handleChange = (e) => {
        const { name, value } = e.target
        setFormData({ ...formData, [name]: value })
    }

    const handleTags = (e) => {
        const tags = e.target.value.split(",").map(name => name.trim())
        setFormData({ ...formData, tags: tags })
    }

    const setImageInThread = (imageSrc) => {
        let data = formData.images
        data.push(imageSrc)
        setFormData({...formData, images: data})
    }

    const handleSubmit = (e) => {
        e.preventDefault()
        const commentData = {...formData, threadId: threadId, author: storage.get("authUser").id}
        createComment(commentData)
        setFormData(INITIAL_STATE)
        createdNewComment()
    }

    return (
        <div className="card mb-2">
            <div className="card-body">
                <form onSubmit={handleSubmit}>
                    <input
                        className="form-control mb-2"
                        type="text"
                        name="tag"
                        onChange={handleTags}
                        placeholder="Tags... (ejemplo: TV,Boca Juniors,Ci-fi)"
                    />
                    <textarea
                        className="form-control mb-2"
                        name="text"
                        value={formData.text}
                        onChange={handleChange}
                        placeholder="Texto..."
                        required
                    />
                    <ImageUploader setImageInThread={setImageInThread}/>
                    <button className="btn btn-primary mx-2" type="submit">Comentar</button>
                    <button className="btn btn-secondary mx-2" onClick={() => createdNewComment()}>Cancelar</button>
                </form>
            </div>
        </div>
    )
}

export default CreateCommentForm
