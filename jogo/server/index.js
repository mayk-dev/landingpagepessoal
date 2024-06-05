const express = require('express');
const http = require('http');
const socketIo = require('socket.io');
const gameLogic = require('./gameLogic');

const app = express();
const server = http.createServer(app);
const io = socketIo(server);

app.use(express.static('client'));

io.on('connection', (socket) => {
    gameLogic.addPlayer(socket.id);

    socket.on('mousemove', (data) => {
        gameLogic.updatePlayer(socket.id, data);
    });

    socket.on('disconnect', () => {
        gameLogic.removePlayer(socket.id);
    });
});

setInterval(() => {
    io.sockets.emit('state', gameLogic.getGameState());
}, 1000 / 60);

const PORT = process.env.PORT || 3000;
server.listen(PORT, () => {
    console.log(`Server is running on port ${PORT}`);
});
