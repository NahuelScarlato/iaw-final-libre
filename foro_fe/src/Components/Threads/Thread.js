import React, {useEffect, useState} from "react"
import ThreadPreview from "./ThreadPreview"
import CommentsList from "../Comments/CommentsList"
import {getThreadByIdWithComments} from "../../Utils/ApiCalls";
import {useParams} from "react-router-dom";

const Thread = () => {
    const [thread, setThread] = useState({})
    const [loading, setLoading] = useState(true)
    const { threadId } = useParams()

    const getFullThread = async () => {
        const response = await getThreadByIdWithComments()
        setThread(response)
    }

    useEffect(()=>{
        getFullThread(threadId)
        setLoading(false)
    },[threadId])

    if (loading) return <>Loading...</>

    return <>
        <ThreadPreview key={"thread-" + thread.id} thread={thread}/>
        <CommentsList threadId={thread.id} comments={thread.comments}/>
    </>
}

export default Thread
