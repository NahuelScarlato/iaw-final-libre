import axios from "axios";

const baseUrl = "http://localhost:8000"

export const registerUser = async (data) =>
    await axios.post(baseUrl + "/register", data)

export const getUserToken = async (data) =>
    await axios.get(baseUrl + "/sanctum-csrf-cookie", data)