import React from "react"

const Thread = ({ thread }) => {
    const renderImages = () => {
        if (!thread.images || thread.images.length === 0) {
            return null
        }

        return (
            <div>
                {Array.isArray(thread.images) && thread.images.map((image, index) => (
                    <div key={'image'+index} className="xs-6 md-4 lg-3">
                        {typeof image === 'string' && (
                            <img
                                className="img-fluid rounded mx-auto d-block"
                                src={image}
                                alt={`cloudinary-${index}`}
                                style="max-width: 500px; max-height: 500px;"
                            />
                        )}
                    </div>
                ))}
            </div>
        );
    };

    const renderTags = () => {
        if (!thread.tags || thread.tags.length === 0) {
            return null
        }

        return (
            <div className="text-start row gx-1 gy-1">
                {Array.isArray(thread.tags) && thread.tags.map((tag, index) => (
                    <div key={'tag'+index} className="col-auto xs-6 md-1 lg-3">
                        {typeof tag === 'string' && (
                            <span className="badge rounded-pill bg-warning">{tag}</span>
                        )}
                    </div>
                ))}
            </div>
        );
    };

    return (
        <div className="card mb-2">
            <div className="card-body">
                <h5 className="card-title text-start">{thread.title}</h5>
                {renderTags()}
                <p className="card-text text-start mt-2">
                    {thread.text}
                </p>
                {renderImages()}
                <p className="card-text text-end">
                    <button className="btn btn-primary fw-bold mx-1">{thread.likes.length ?? 0} Likes</button>
                    <button className="btn btn-secondary fw-bold mx-1">{thread.dislikes.length ?? 0} Dislikes</button>
                    <small className="text-muted mx-1">{ thread.author + " wrote on " + new Date(thread.created_at).toLocaleString()}</small>
                </p>
            </div>
        </div>
    )
}

export default Thread
