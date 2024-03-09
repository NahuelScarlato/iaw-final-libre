import React from "react";

const Tags = ({element}) => {
    if (!element.tags || element.tags.length === 0) {
        return null
    }

    return (
        <div className="text-start row gx-1 gy-1">
            {Array.isArray(element.tags) && element.tags.map((tag, index) => (
                <div key={'tag'+index} className="col-auto xs-6 md-1 lg-3">
                    {typeof tag === 'string' && (
                        <span className="badge rounded-pill bg-warning">{tag}</span>
                    )}
                </div>
            ))}
        </div>
    )
}

export default Tags