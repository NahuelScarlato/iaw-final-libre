import React, {useEffect} from "react"
import {Link, useNavigate} from "react-router-dom"
import storage from "../Storage/storage"
import {logoutUser} from "./ApiCalls"

const Nav = () => {
    const [isReadyForInstall, setIsReadyForInstall] = React.useState(false)

    useEffect(() => {
        window.addEventListener("beforeinstallprompt", (event) => {
            event.preventDefault();
            console.log("👍", "beforeinstallprompt", event);
            window.deferredPrompt = event;
            setIsReadyForInstall(true);
        });
    }, []);

    async function downloadApp() {
        console.log("👍", "butInstall-clicked");
        const promptEvent = window.deferredPrompt;
        if (!promptEvent) {
            // The deferred prompt isn't available.
            console.log("oops, no prompt event guardado en window");
            return;
        }
        promptEvent.prompt();
        const result = await promptEvent.userChoice;
        console.log("👍", "userChoice", result);
        window.deferredPrompt = null;
        setIsReadyForInstall(false);
    }

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
                            {isReadyForInstall && (
                                <li className="nav-item px-lg-5">
                                    <button className="btn btn-danger" onClick={downloadApp}>Descargar PWA</button>
                                </li>
                            )}
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