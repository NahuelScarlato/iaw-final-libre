import axios from "axios";
import {sendRequest} from "./ShowAlerts";

window.axios = axios
window.axios.defaults.baseURL = "http://localhost:8000"
window.axios.defaults.headers.common["Accept"] = "application/json"
window.axios.defaults.headers.common["Content-Type"] = "application/json"
window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest"

export const registerUser = async (userData) =>
    await sendRequest("POST", userData,"/api/register", false)

export const loginUser = async (userData) =>
    await sendRequest("POST", userData,"/api/login", false)

export const logoutUser = async () =>
    await sendRequest("GET", null,"/api/logout", true)

export const getAllThreads = async () =>
    await sendRequest("GET", null,"/api/threads", true)