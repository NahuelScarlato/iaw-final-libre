import './App.css';
import {BrowserRouter, Route, Routes} from "react-router-dom";

import {Welcome} from "./Components/Welcome";

function App() {
  return (
    <div className="App">
        <BrowserRouter>
            <Routes>
                <Route path="/" element={ <Welcome/> }/>
            </Routes>
        </BrowserRouter>
    </div>
  );
}

export default App;
