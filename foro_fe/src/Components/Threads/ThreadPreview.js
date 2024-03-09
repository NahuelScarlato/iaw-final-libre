import React from "react"
import Images from "../../Utils/Images"
import Tags from "../../Utils/Tags"

const ThreadPreview = ({ thread, showCommentsLink}) => {
    return (
        <div className="card mb-2">
            <div className="card-body">
                <h5 className="card-title text-start">{thread.title}</h5>
                <Tags element={thread}/>
                <p className="card-text text-start mt-2">
                    {thread.text}
                </p>
                <Images element={thread}/>
                <p className="card-text text-end">
                    {showCommentsLink &&
                        <a className="mx-2" href={"/thread/" + thread.id}>{thread.comments.length + " comments"}</a>
                    }
                    <button className="btn btn-primary mx-1">{thread.likes.length ?? 0} Likes</button>
                    <button className="btn btn-secondary mx-1">{thread.dislikes.length ?? 0} Dislikes</button>
                    <small className="text-muted mx-1">{ thread.author + " wrote on " + new Date(thread.created_at).toLocaleString()}</small>
                </p>
            </div>
        </div>
    )
}

export default ThreadPreview
