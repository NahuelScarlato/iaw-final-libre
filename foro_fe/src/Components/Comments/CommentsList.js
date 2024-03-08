import React, {useState} from "react"
import {getThreadByIdWithComments} from "../../Utils/ApiCalls"
import Comment from "./Comment"
import CreateCommentForm from "./CreateCommentForm"

const CommentsList = ({threadId}) => {
    const [showCreateForm, setShowCreateForm] = useState(false);
    const [comments, setComments] = useState([])

    const getComments = async () => {
        const response = await getThreadByIdWithComments(threadId)
        setComments(response.comments)
    }

    const createdNewComment = () => {
        setShowCreateForm(false)
        getComments()
    }

    return <>
        <div className="d-grid gap-2">
            {showCreateForm
                ? <CreateCommentForm createdNewComment={createdNewComment}/>
                : <button className="btn btn-success bt-lg mb-2" onClick={() => setShowCreateForm(true)}>Agregar comentario</button>}
        </div>
        <div className="card">
            <ul className="list-group list-group-flush">
                {comments.map((comment, index) => (
                    <li className="list-group-item">
                        <Comment key={"comment-" + index} comment={comment}/>
                    </li>
                ))}
            </ul>
        </div>
    </>
}

export default CommentsList