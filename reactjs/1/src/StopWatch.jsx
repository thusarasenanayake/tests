import { useEffect } from "react"
import { useCallback } from "react"
import { useState } from "react"

function StopWatch() {

    const [time, setTime] = useState(0)
    const [running, setRunning] = useState(false)

    const handleStopWatch = function () {
        setRunning((prev) => !prev)
    }

    useEffect(function () {
        let interval = null
        if (running) {
            interval = setInterval(() => {
                setTime(time => time + 100)
            }, 100)

        }
        return () => { console.log('dismounting'); clearInterval(interval) }


    }, [running])

    return (
        <>
            <p>time: {new Date().toLocaleTimeString()}</p>
            <p>watch: {time}</p>
            <button onClick={handleStopWatch} style={{ background: "#c3d3d3" }}>{running ? 'Stop' : 'Start'}</button>
        </>
    )
}

export default StopWatch