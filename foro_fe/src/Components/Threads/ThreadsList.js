import React, {useEffect, useState} from "react";

import {getAllThreads} from "../../Utils/ApiCalls";
import Thread from "./Thread";
import CreateThreadForm from "./CreateThreadForm";

const ThreadsList = () => {
    const [showCreateForm, setShowCreateForm] = React.useState(false);
    const [threads, setThreads] = useState([])
    const [loading, setLoading] = useState(true)

    const getThreads = async () => {
        const response = await getAllThreads()
        setThreads(response)
    }

    const createdNewThread = () => {
        setShowCreateForm(false)
        setLoading(true)
        getThreads()
        setLoading(false)
    }

    useEffect(()=>{
        getThreads()
        setLoading(false)
    }, [])

    if (loading) return <>Loading...</>

    return <div>
        <div className="d-grid gap-2">
            {showCreateForm
                ? <CreateThreadForm createdNewThread={createdNewThread}/>
                : <button className="btn btn-success bt-lg mb-2" onClick={() => setShowCreateForm(true)}>Crear un nuevo hilo</button>}
        </div>
        <div>
            {threads.map((thread, index) => (
                <Thread key={"thread-"+index} thread={thread}/>
            ))}
        </div>
    </div>
}

export default ThreadsList