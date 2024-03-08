import './App.css'
import {BrowserRouter, Route, Routes} from "react-router-dom"
import Nav from "./Utils/Nav"
import ProtectedRoutes from "./Utils/ProtectedRoutes"
import MyThreads from "./Components/MyThreads"
import Welcome from "./Components/Auth/Welcome"
import Dashboard from "./Components/Dashboard"
import Thread from "./Components/Threads/Thread"

function App() {
  return (
    <div className="App">
        <BrowserRouter>
            <Nav />
            <Routes>
                <Route path="/" element={ <Welcome/> }/>
                <Route element={ <ProtectedRoutes/> }>
                    <Route path="/dashboard" element={ <Dashboard/> }/>
                    <Route path="/thread/:threadId" element={ <Thread /> }/>
                    <Route path="/my-threads" element={ <MyThreads/> }/>
                </Route>
            </Routes>
        </BrowserRouter>
    </div>
  );
}

export default App;
