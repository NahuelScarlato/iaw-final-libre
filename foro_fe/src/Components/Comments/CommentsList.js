import React, {useEffect, useState} from "react"
import {getThreadByIdWithComments} from "../../Utils/ApiCalls"
import Comment from "./Comment"
import CreateCommentForm from "./CreateCommentForm"

const CommentsList = ({threadId, threadComments, threadClosed}) => {
    const [showCreateForm, setShowCreateForm] = useState(false);
    const [comments, setComments] = useState([])

    const getComments = async () => {
        const response = await getThreadByIdWithComments(threadId)
        console.log(response)
        setComments(response.comments)
    }

    const createdNewComment = () => {
        getComments()

        setShowCreateForm(false)
    }

    useEffect(()=> {
        setComments(threadComments)
    },[threadComments])

    return <>
        <div className="grid d-grid">
            {showCreateForm
                ? <CreateCommentForm createdNewComment={createdNewComment} threadId={threadId}/>
                : <button className="btn btn-success bt-lg mb-2" disabled={threadClosed} onClick={() => setShowCreateForm(true)}>Agregar comentario</button>}
        </div>
        <ul className="list-group">
            {comments.map((comment, index) => (
                <li key={"comment-" + index} className="list-unstyled">
                    <Comment comment={comment}/>
                </li>
            ))}
        </ul>
    </>
}

export default CommentsList