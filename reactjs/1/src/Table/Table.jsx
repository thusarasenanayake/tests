import { useState } from "react"
import Row from "./Row"
import { useCallback } from "react";

function Table() {

    const [data, setData] = useState([
        {
            id: 1,
            name: "Mike",
            email: 'mike@gmail.com'
        },
        {
            id: 2,
            name: "John",
            email: 'john@gmail.com'
        },
        {
            id: 3,
            name: "Sarah",
            email: 'sarah@gmail.com'
        }
    ])

    console.log('table');

    // function handleChange(id, value, type) {
    //     console.log('handle change')
    //     if (type === "name") {
    //         setData(prev => prev.map(data => {
    //             if (data.id === id) {
    //                 return { ...data, name: value }
    //             }
    //             return data
    //         }))
    //     }
    //     if (type === "email") {
    //         setData(prev => prev.map(data => {
    //             if (data.id === id) {
    //                 return { ...data, email: value }
    //             }
    //             return data
    //         }))
    //     }

    // }

    const handleChange = useCallback(

        function handleChange(id, value, type) {
            console.log('handle change')
            if (type === "name") {
                setData(prev => prev.map(data => {
                    if (data.id === id) {
                        return { ...data, name: value }
                    }
                    return data
                }))
            }
            if (type === "email") {
                setData(prev => prev.map(data => {
                    if (data.id === id) {
                        return { ...data, email: value }
                    }
                    return data
                }))
            }

        }, []
    )

    return (
        <table>
            <tbody>
                {data.map((row, index) => <Row key={index} id={index + 1} data={row} handleChange={handleChange} />)}
            </tbody>
        </table>
    )

}

export default Table