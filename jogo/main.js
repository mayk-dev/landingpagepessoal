const socket = io();

const canvas = document.getElementById('gameCanvas');
const context = canvas.getContext('2d');

canvas.width = window.innerWidth;
canvas.height = window.innerHeight;

socket.on('state', (players) => {
    context.clearRect(0, 0, canvas.width, canvas.height);

    for (const id in players) {
        const player = players[id];
        context.beginPath();
        context.arc(player.x, player.y, player.radius, 0, Math.PI * 2);
        context.fillStyle = player.color;
        context.fill();
    }
});

canvas.addEventListener('mousemove', (event) => {
    const rect = canvas.getBoundingClientRect();
    const x = event.clientX - rect.left;
    const y = event.clientY - rect.top;
    socket.emit('mousemove', { x, y });
});
