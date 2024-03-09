import React from "react"
import Images from "../../Utils/Images"
import Tags from "../../Utils/Tags"

const Comment = ({comment}) => {
    return (
        <div className="card mb-2">
            <div className="card-body">
                <p className="card-text text-start mt-2">
                    {comment.text}
                </p>
                <Tags element={comment}/>
                <Images element={comment}/>
                <p className="card-text text-end">
                    <button className="btn btn-primary mx-1">{comment.likes.length ?? 0} Likes</button>
                    <button className="btn btn-secondary mx-1">{comment.dislikes.length ?? 0} Dislikes</button>
                    <small className="text-muted mx-1">{ comment.author + " wrote on " + new Date(comment.created_at).toLocaleString()}</small>
                </p>
            </div>
        </div>
    )
}

export default Comment