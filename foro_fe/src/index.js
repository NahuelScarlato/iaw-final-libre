import React from 'react'
import ReactDOM from 'react-dom/client'
import './index.css'
import App from './App'
import * as serviceWorkerRegistration from "./serviceWorkerRegistration"

import 'bootstrap/dist/css/bootstrap.min.css'
import 'bootstrap/dist/js/bootstrap.min.js'

const root = ReactDOM.createRoot(document.getElementById('root'));
root.render(
  <React.StrictMode>
    <App />
  </React.StrictMode>
);

serviceWorkerRegistration.register({
    onUpdate: async (registration) => {
        if (registration && registration.waiting) {
            await registration.unregister();
            registration.waiting.postMessage({ type: "SKIP_WAITING" });
            window.location.reload();
        }
    },
});