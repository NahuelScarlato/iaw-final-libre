import React, { useState } from 'react';

const LoginForm = () => {
    const [userData, setUserData] = useState({
        email: '',
        password: ''
    });

    const handleChange = (e) => {
        const { name, value } = e.target;
        setUserData({ ...userData, [name]: value });
    };

    const handleSubmit = (e) => {
        e.preventDefault();
        // Aquí puedes enviar los datos de inicio de sesión del usuario al servidor o realizar cualquier otra lógica necesaria
        console.log(userData);
    };

    return (
        <div className="container mt-5">
            <div className="row justify-content-center">
                <div className="col-lg-8">
                    <h2>Iniciar Sesión</h2>
                    <form onSubmit={handleSubmit}>
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
                        <button type="submit" className="btn btn-primary m-2">Iniciar Sesión</button>
                    </form>
                </div>
            </div>
        </div>
    );
};

export default LoginForm;
