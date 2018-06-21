var token = process.env.TOKEN;

var Bot = require('node-telegram-bot-api');
var bot;

if(process.env.NODE_ENV === 'production') {
  bot = new Bot(token);
  bot.setWebHook(process.env.HEROKU_URL + bot.token);
}
else {
  bot = new Bot(token, { polling: true });
}

console.log('bot server started...');

bot.onText(/\/Conigli/, (msg) => {

bot.sendMessage(msg.chat.id, "La difficoltà EX dei conigli è disponibile: 00:00/05:00/13:00/16:00");

});

module.exports = bot;
