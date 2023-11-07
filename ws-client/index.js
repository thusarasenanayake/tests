const WebSocket = require('ws');
const readline = require('readline');

const WSS_URL = 'http://localhost:9005'
const ws = new WebSocket(WSS_URL);

ws.on('open', () => console.warn('connected'));
ws.on('message', data => console.info(`SERVER: ${data}`));
ws.on('close', () => {
    console.warn('disconnected');
    process.exit();
});

readline.createInterface({
    input: process.stdin,
    output: process.stdout,
}).on('line', data => {
    ws.send(data);
});
