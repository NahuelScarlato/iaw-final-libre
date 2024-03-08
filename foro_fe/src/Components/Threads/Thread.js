import React, {useEffect, useState} from "react"
import ThreadPreview from "./ThreadPreview"
import CommentsList from "../Comments/CommentsList"
import {getThreadByIdWithComments} from "../../Utils/ApiCalls";
import {useParams} from "react-router-dom";

const Thread = () => {
    const [thread, setThread] = useState({})
    const [loading, setLoading] = useState(true)
    const { threadId } = useParams()

    useEffect(() => {
        const getFullThread = async () => {
            try {
                setLoading(true);
                const response = await getThreadByIdWithComments(threadId);
                setThread(response);
                setLoading(false);
            } catch (error) {
                console.error("Error fetching thread:", error);
                setLoading(false);
            }
        };

        getFullThread();
    }, [threadId]);

    if (loading || !thread.comments) return <div className="">Loading...</div>

    return (
        <div className="container mt-5">
            <div className="justify-content-center">
                <ThreadPreview key={"thread-" + thread.id} thread={thread} />
                <CommentsList threadId={thread.id} threadComments={thread.comments}/>
            </div>
        </div>
    )
}

export default Thread
