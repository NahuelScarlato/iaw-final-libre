import React from 'react';
import LoginForm from './LoginForm';
import RegisterForm from './RegisterForm';

const Welcome = () => {
    const [showLogin, setShowLogin] = React.useState(true);

    const handleToggleForm = () => {
        setShowLogin(!showLogin);
    };

    return (
        <div className="container mt-5">
            <div className="row justify-content-center">
                <div className="col-md-6">
                    <h2>Bienvenido a Roddut</h2>
                    <div className="text-center">
                        {showLogin ? <LoginForm /> : <RegisterForm handleToggleForm={handleToggleForm}/>}
                        <button className="btn btn-link text-decoration-none" onClick={handleToggleForm}>
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
    )
}

export default Welcome
