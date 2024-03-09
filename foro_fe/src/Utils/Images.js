import React from "react";

const Images = ({element}) => {
    if (!element.images || element.images.length === 0) {
        return null
    }

    return (
        <div>
            {Array.isArray(element.images) && element.images.map((image, index) => (
                <div key={'image'+index} className="xs-6 lg-3 m-auto">
                    {typeof image === 'string' && (
                        <img
                            className="xs-6 lg-3 img-fluid rounded mt-1 mb-2 mr-2"
                            src={image}
                            alt={`cloudinary-${index}`}
                        />
                    )}
                </div>
            ))}
        </div>
    )
}

export default Images