import React from 'react';
import ThreadsList from "./Threads/ThreadsList"

const Dashboard = () => {
    return (
        <div className="container mt-5">
            <div className="row justify-content-center">
                <div className="col-md-6">
                    <ThreadsList></ThreadsList>
                </div>
            </div>
        </div>
    )
}

export default Dashboard
