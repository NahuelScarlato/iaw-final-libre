import React from "react"
import {Link, useNavigate} from "react-router-dom"
import storage from "../Storage/storage"
import {logoutUser} from "./ApiCalls"

const Nav = () => {
    const go = useNavigate()
    const logout = async() => {
        await logoutUser()
        storage.remove("authToken")
        storage.remove("authUser")
        go("/")
    }
    return (
        <nav className="navbar navbar-expand-lg navbar-light bg-light">
            <div className="container-fluid">
                <a className="navbar-brand" href="/">Roddut</a>
                <button className="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                        aria-label="Toggle navigation">
                    <span className="navbar-toggler-icon"></span>
                </button>
                { storage.get("authUser") && (
                    <div className="collapse navbar-collapse" id="navbarNav">
                        <ul className="navbar-nav me-auto mb-2 mb-lg-0">
                            <li className="nav-item px-lg-2">
                                <Link to="/dashboard" className="nav-link active">Home</Link>
                            </li>
                            <li className="nav-item px-lg-2">
                                <Link to="/my-threads" className="nav-link active">Mis Hilos</Link>
                            </li>
                        </ul>
                        <ul className="navbar-nav">
                            <li className="nav-item px-lg-5">
                                <button className="btn btn-info" onClick={logout}>Logout</button>
                            </li>
                        </ul>
                    </div>
                )}
            </div>
        </nav>
    )
}

export default Nav