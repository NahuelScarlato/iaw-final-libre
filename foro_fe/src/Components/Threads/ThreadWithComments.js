import React, {useEffect, useState} from "react";

const ThreadWithComments = ({threadId,threadTitle,threadClosed}) => {
    const [likes, setLikes] = useState(0);
    const [dislikes, setDislikes] = useState(0);
    const [comments, setComments] = useState([]);
    const [newComment, setNewComment] = useState('');

    // useEffect(() => {
    //     loadComments()
    // },[])
    //
    // const handleLike = () => {
    //     setLikes(likes + 1);
    // };
    //
    // const handleDislike = () => {
    //     setDislikes(dislikes + 1);
    // };
    //
    // const handleAddComment = () => {
    //     if (newComment.trim() !== '') {
    //         setComments([...comments, newComment]);
    //         setNewComment('');
    //     }
    // };

    return (
        <div className="container mt-4">
            <div className="row">
                {/*<div className="col-md-8">*/}
                {/*    <h2>{title}</h2>*/}
                {/*    <p>{description}</p>*/}
                {/*    <div className="row">*/}
                {/*        {images.map((image, index) => (*/}
                {/*            <div key={index} className="col-md-4 mb-3">*/}
                {/*                <img src={image} alt={`Image ${index}`} className="img-fluid" />*/}
                {/*            </div>*/}
                {/*        ))}*/}
                {/*    </div>*/}
                {/*</div>*/}
                {/*<div className="col-md-4">*/}
                {/*    <div>*/}
                {/*        <button className="btn btn-primary mr-2" onClick={handleLike}>Like ({likes})</button>*/}
                {/*        <button className="btn btn-danger mr-2" onClick={handleDislike}>Dislike ({dislikes})</button>*/}
                {/*        <button className="btn btn-success" onClick={handleAddComment}>Add Comment</button>*/}
                {/*    </div>*/}
                {/*    <div className="mt-3">*/}
                {/*        <h3>Comments</h3>*/}
                {/*        <ul className="list-unstyled">*/}
                {/*            {comments.map((comment, id) => (*/}
                {/*                <li key={"commentId-" + id}>{comment}</li>*/}
                {/*            ))}*/}
                {/*        </ul>*/}
                {/*    </div>*/}
                {/*    <textarea*/}
                {/*        value={newComment}*/}
                {/*        onChange={(e) => setNewComment(e.target.value)}*/}
                {/*        className="form-control mt-3"*/}
                {/*        placeholder="Type your comment here..."*/}
                {/*        rows={4}*/}
                {/*    />*/}
                {/*</div>*/}
            </div>
        </div>
    )
}

export default ThreadWithComments