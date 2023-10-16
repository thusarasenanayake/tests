import { memo } from "react";
import Email from "./Email"
import Name from "./Name"

function Row(props) {
    console.log("row - " + props.id);
    return (
        <tr>
            <td>{props.data.name && <Name id={props.data.id} data={props.data.name} handleChange={props.handleChange} />}</td>
            <td>{props.data.email && <Email id={props.data.id} data={props.data.email} handleChange={props.handleChange} />}</td>
        </tr>
    )
}

// export default Row
export default memo(Row)