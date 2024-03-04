import React, {useEffect, useState} from "react";
import axios from 'axios';
import {Link} from "react-router-dom";

import {Thread} from "./Thread";


const endpoint = "http://localhost:8000/api"

export const ThreadsList = () => {
    const [threads, setThreads] = useState([])

    const getThreads = async () => {
        const response = await axios.get(`${endpoint}/threads`)
        setThreads(response.data)
    }

    const createNewThread = () => {

    }

    useEffect(()=>{
        getThreads()
    }, [])

    return <div>
        <h3>Threads</h3>
        <div className="d-grid gap-2">
            <Link to="/create" className="'bt btn-success bt-lg mt-2 mb-2 text-white">Create New Thread</Link>
        </div>

        <div>
            <Thread threadId="1" threadtitle="Titulo" threadClosed={false}/>
        </div>
    </div>
}