import React from "react";

function Thread({ thread }) {
    return (
        <div>
            <h2>Posts</h2>
            <ul>
                <li key={thread.id}>
                    <h3>{thread.title}</h3>
                    <p>{thread.text}</p>
                    <p>Tags: {JSON.parse(thread.tags).join(', ')}</p>
                    <p>Likes: {JSON.parse(thread.likes).length}</p>
                    <p>Dislikes: {JSON.parse(thread.dislikes).length}</p>
                    <p>Author: {thread.author}</p>
                    <p>Created At: {new Date(thread.created_at).toLocaleString()}</p>
                    <p>Updated At: {new Date(thread.updated_at).toLocaleString()}</p>
                </li>
            </ul>
        </div>
    );
}

export default Thread
