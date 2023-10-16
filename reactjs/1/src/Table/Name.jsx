import { memo } from "react";

function Name(props) {
    console.log("name - " + props.data);

    return (
        <input type="text" name="" id="" value={props.data} onChange={eve => props.handleChange(props.id, eve.target.value, "name")} />
    )
}
// export default Name
export default memo(Name)