var token = '590748562:AAHVXJMYVo67rq7ZfGXAzMyVPfg0dii5cok';

var Bot = require('node-telegram-bot-api'),
    bot = new Bot(token, { polling: true });

console.log('bot server started...');

bot.onText(/\/Conigli/, (msg) => {

bot.sendMessage(msg.chat.id, "La difficoltà EX dei conigli è disponibile: 00:00/05:00/13:00/16:00");

});
