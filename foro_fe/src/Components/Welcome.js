import React from 'react';
import LoginForm from './Auth/LoginForm';
import RegisterForm from './Auth/RegisterForm';

export const Welcome = () => {
    const [showLogin, setShowLogin] = React.useState(false);

    const handleToggleForm = () => {
        setShowLogin(!showLogin);
    };

    return (
        <div className="container mt-5">
            <div className="row justify-content-center">
                <div className="col-md-6">
                    <h2>Bienvenido a Roddut</h2>
                    <div className="text-center">
                        {showLogin ? <LoginForm /> : <RegisterForm />}
                        <button className="btn btn-primary m-2" onClick={handleToggleForm}>
                            {
                                showLogin
                                ? "Si aun no estas registrado regístrate aquí"
                                : "Si ya estas registrado ingresa aquí"
                            }
                        </button>
                    </div>
                </div>
            </div>
        </div>
    );
};
