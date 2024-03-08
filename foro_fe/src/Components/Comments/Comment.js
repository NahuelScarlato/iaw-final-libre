import React from "react"

const Comment = ({comment}) => {
    const renderImages = () => {
        if (!comment.images || comment.images.length === 0) {
            return null
        }

        return (
            <div>
                {Array.isArray(comment.images) && comment.images.map((image, index) => (
                    <div key={'image'+index} className="xs-6 md-4 lg-3 m-auto" style={{ maxHeight: '500px'}}>
                        {typeof image === 'string' && (
                            <img
                                className="img-fluid rounded mx-auto d-block"
                                src={image}
                                alt={`cloudinary-${index}`}
                            />
                        )}
                    </div>
                ))}
            </div>
        )
    }

    const renderTags = () => {
        if (!comment.tags || comment.tags.length === 0) {
            return null
        }

        return (
            <div className="text-start row gx-1 gy-1">
                {Array.isArray(comment.tags) && comment.tags.map((tag, index) => (
                    <div key={'tag'+index} className="col-auto xs-6 md-1 lg-3">
                        {typeof tag === 'string' && (
                            <span className="badge rounded-pill bg-warning">{tag}</span>
                        )}
                    </div>
                ))}
            </div>
        )
    }

    return (
        <div className="card mb-2">
            <div className="card-body">
                <p className="card-text text-start mt-2">
                    {comment.text}
                </p>
                {renderTags()}
                {renderImages()}
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