import React, {useState} from 'react';
import {useNavigate} from "react-router-dom";
import {registerUser} from "./ApiCalls";
import {Alert} from "../Alert"

const DEFAULT_ALERT_VALUE = {
    message: '',
    alertType: '',
    show: false
}

const RegisterForm = () => {
    const [userData, setUserData] = useState({
        name: '',
        email: '',
        password: '',
        confirmPassword: ''
    });
    const [formAlert, setFormAlert] = useState(DEFAULT_ALERT_VALUE)

    const showAlert = (message, alertType) => {
        setFormAlert({
            message: message,
            alertType: alertType,
            show: true
            }
        )
    }

    const handleChange = (e) => {
        const { name, value } = e.target;
        setUserData({ ...userData, [name]: value });
    };

    const navigate = useNavigate()

    const handleSubmit = (e) => {
        e.preventDefault()
        setFormAlert(DEFAULT_ALERT_VALUE)

        registerUser(userData).then(() =>
            navigate("/dashboard")
        ).catch((e) =>
            showAlert("Error al registrar un nuevo usuario. " + e.message, "error")
        )
    };

    return (
        <div className="container mt-5">
            <div className="row justify-content-center">
                <div className="col-lg-8">
                    <h2>Registro de Usuario</h2>
                    <form onSubmit={handleSubmit}>
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
                            <label htmlFor="confirmPassword">Confirma tu contraseña:</label>
                            <input
                                type="password"
                                className="form-control"
                                id="confirmPassword"
                                name="confirmPassword"
                                value={userData.confirmPassword}
                                onChange={handleChange}
                                required
                            />
                        </div>
                        {formAlert.show ? <Alert message={formAlert.message} alertType={formAlert.alertType}/> : null}
                        <button type="submit" className="btn btn-primary m-2">Registrar</button>
                    </form>
                </div>
            </div>
        </div>
    );
};

export default RegisterForm;
