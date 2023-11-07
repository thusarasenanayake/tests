const WebSocket = require('ws');

const PORT = 9005

const wss = new WebSocket.Server({ port: PORT });


wss.broadcast = function (data, sender) {
    wss.clients.forEach(function (client) {
        if (client !== sender) {
            client.send(data)
        }
    })
}

let id = 1
const connections = {}

wss.on('connection', ws => {

    handleAction("_CONNECT", ws)

    ws.on('message', input => {
        console.log(`input received`);

        try {
            const { action, data } = JSON.parse(input);
            handleAction(action, ws, data)

        } catch (error) {
            // console.error(error);
            ws.send(`error: ${error.message}`);
        }

    });

    ws.on('close', () => {
        handleAction("_DISCONNECT", ws);
    });

    ws.on('error', console.error);

});


/**
 * Handle connection status and user defined messages.
 * @param action
 */
function handleAction(action, ws = null, data = null) {

    switch (action) {
        case "_CONNECT":
            ws.connectionId = id
            connections[id] = ws;
            console.log(`client connected with connectionId: ${id}`);
            id++
            break;

        case "_DISCONNECT":
            const { connectionId } = ws
            delete connections[ws.connectionId];
            console.log(`client disconnected with connectionId: ${connectionId}`);
            break;

        case "ECHO":
            ws.send(data)
            break;

        case "BROADCAST":
            wss.broadcast(data)
            break;

        default:
            break;
    }

}

console.log(`listening on ws://localhost:${PORT}`);
