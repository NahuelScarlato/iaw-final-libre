import React from 'react'
import ThreadsList from "./Threads/ThreadsList"

const Dashboard = () => {
    return (
        <div className="container mt-5">
            <div className="row justify-content-center">
                <ThreadsList />
            </div>
        </div>
    )
}

export default Dashboard
