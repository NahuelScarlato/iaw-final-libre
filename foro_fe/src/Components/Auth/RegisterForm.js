import React, {useState} from 'react'
import {registerUser} from "../../Utils/ApiCalls"
import storage from "../../Storage/storage"

const DEFAULT_USER_DATA = {
    name: '',
    email: '',
    password: '',
    password_confirmation: ''
}

const RegisterForm = ({handleToggleForm}) => {
    const [userData, setUserData] = useState(DEFAULT_USER_DATA)

    const handleChange = (e) => {
        const { name, value } = e.target
        setUserData({ ...userData, [name]: value })
    }

    const register = async (e) => {
        e.preventDefault()
        const res = await registerUser(userData)
        if(res?.status === true) {
            storage.set("authToken", res.token)
            storage.set("authUser", res.user)
            handleToggleForm()
        }
    }

    return (
        <div className="container mt-5">
            <div className="row justify-content-center">
                <div className="col-lg-8">
                    <h2>Registro de Usuario</h2>
                    <form onSubmit={register}>
                        <div className="form-group">
                            <label htmlFor="name">Nombre:</label>
                            <input
                                type="text"
                                className="form-control"
                                id="name"
                                name="name"
                                value={userData.name}
                                onChange={handleChange}
                                required
                            />
                        </div>
                        <div className="form-group">
                            <label htmlFor="email">Correo electrónico:</label>
                            <input
                                type="email"
                                className="form-control"
                                id="email"
                                name="email"
                                value={userData.email}
                                onChange={handleChange}
                                required
                            />
                        </div>
                        <div className="form-group">
                            <label htmlFor="password">Contraseña:</label>
                            <input
                                type="password"
                                className="form-control"
                                id="password"
                                name="password"
                                value={userData.password}
                                onChange={handleChange}
                                required
                            />
                        </div>
                        <div className="form-group">
                            <label htmlFor="password_confirmation">Confirma tu contraseña:</label>
                            <input
                                type="password"
                                className="form-control"
                                id="password_confirmation"
                                name="password_confirmation"
                                value={userData.password_confirmation}
                                onChange={handleChange}
                                required
                            />
                        </div>
                        <button type="submit" className="btn btn-primary m-2">Registrar</button>
                    </form>
                </div>
            </div>
        </div>
    )
}

export default RegisterForm
