import React, {useState} from 'react'
import {createThread} from "../../Utils/ApiCalls";
import storage from "../../Storage/storage";
import {get} from "axios";

const INITIAL_STATE = {
    title: '',
    text: '',
    images: [],
    comments: [],
    tags: [],
    author: ''
};

const CreateThreadForm = ({ createdNewThread }) => {
    const [formData, setFormData] = useState(INITIAL_STATE)

    const handleChange = (e) => {
        const { name, value } = e.target
        setFormData({ ...formData, [name]: value })
    };

    const handleTags = (e) => {
        const tags = e.target.value.split(",").map(name => name.trim())
        setFormData({ ...formData, tags: tags })
    };

    const handleFileChange = () => {
        setFormData({...formData, images: [formData.image]});
    };

    const handleSubmit = (e) => {
        e.preventDefault()
        const threadData = {...formData, author: storage.get("authUser").id}
        createThread(threadData)
        setFormData(INITIAL_STATE)
        createdNewThread()
    };

    return (
        <div className="card mb-2">
            <div className="card-body">
                <form onSubmit={handleSubmit}>
                    <input
                        className="form-control mb-2"
                        type="text"
                        name="title"
                        value={formData.title}
                        onChange={handleChange}
                        placeholder="Titulo..."
                        required
                    />
                    <input
                        className="form-control mb-2"
                        type="text"
                        name="tag"
                        onChange={handleTags}
                        placeholder="Tags... (ejemplo: TV,Boca Juniors,Whisky)"
                    />
                    <textarea
                        className="form-control mb-2"
                        name="text"
                        value={formData.text}
                        onChange={handleChange}
                        placeholder="Texto..."
                        required
                    />
                    <input
                        className="form-control mb-2"
                        type="file"
                        name="image"
                        accept="image/*"
                        id="imageInput"
                        onChange={handleFileChange}
                    />
                    <button className="btn btn-primary mx-2" type="submit">Publicar</button>
                    <button className="btn btn-secondary mx-2" onClick={() => createdNewThread()}>Cancelar</button>
                </form>
            </div>
        </div>
    );
};

export default CreateThreadForm
