import { memo } from "react";

function Email(props) {
    console.log("email - " + props.data);


    return (
        <input type="email" name="" value={props.data} id="" onChange={eve => props.handleChange(props.id, eve.target.value, "email")} />
    )
}

// export default Email
export default memo(Email)