import React from 'react';

const ALERT_TYPES = {
    success: "alert-success",
    error: "alert-danger",
}

export const Alert = ({ message, alertType }) => {
    return (
        <div className={"mt-4 alert " + (alertType === "success" ? ALERT_TYPES.success : ALERT_TYPES.error)} role="alert">
            {message}
        </div>
    );
};
