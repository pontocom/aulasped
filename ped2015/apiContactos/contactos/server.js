var express = require('express'),
    bodyParser = require('body-parser'),
    contact = require('./contact.js');

var app = express();

app.use(bodyParser.urlencoded({
    extended: true
}));
app.use(bodyParser.json());

app.get('/contact', contact.findAll);
app.get('/contact/:id', contact.findById);
app.post('/contact', contact.addContact);
app.delete('/contact/:id', contact.deleteContact);

var server = app.listen(3000, function () {

    var host = server.address().address
    var port = server.address().port

    console.log('Listening at http://%s:%s', host, port)

});
