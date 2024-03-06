import React, {useEffect, useState} from "react";
import {Link} from "react-router-dom";

import {getAllThreads} from "../../Utils/ApiCalls";
import Thread from "./Thread";

const ThreadsList = () => {
    const [threads, setThreads] = useState([])
    const [loading, setLoading] = useState(true)

    const getThreads = async () => {
        const response = await getAllThreads()
        setThreads(response)
    }

    const createNewThread = () => {

    }

    useEffect(()=>{
        getThreads()
        console.log(threads)
        setLoading(false)
    }, [])

    if (loading) return <>Loading...</>

    return <div>
        <h3>Threads</h3>
        <div className="d-grid gap-2">
            <Link to="/create" className="'bt btn-success bt-lg mt-2 mb-2 text-white">Create New Thread</Link>
        </div>
        <div>
            {threads.map((thread) => (
                <Thread thread={thread}/>
            ))}
        </div>
    </div>
}

export default ThreadsList