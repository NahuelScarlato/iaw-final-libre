import Swal from "sweetalert2"
import storage from "../Storage/storage"
import axios from "axios"

export const show_alert = (msj,icon) => {
    Swal.fire({title:msj, icon:icon,buttonsStyling:true})
}

export const sendRequest = async (method,params,url,token=true) => {
    if(token) {
        const authToken = storage.get("authToken")
        axios.defaults.headers.common["Authorization"] = "Bearer " + authToken
    }
    let res
    try {
        const response = await axios({ method: method, url: url, data: params });
        if (response?.data?.message) {
            show_alert(response.data.message, "success");
        }

        return response.data
    } catch (error) {
        res = error.response.data.message;
        show_alert(res, "error");
    }
}

export default show_alert