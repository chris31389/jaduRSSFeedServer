var express = require('express'),
    bodyParser = require('body-parser'),
    busboy = require('connect-busboy');

var app = express();
var router = express.Router();

app.use(busboy());
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({
    extended: true
}));

app.use('/', express.static(__dirname + '/client/'));

// Handle 404
app.use(function(req, res) {
	res.redirect('/');
});

// Handle 500
app.use(function(error, req, res, next) {
	res.send('500: Internal Server Error', 500);
});

var server = app.listen(3000, function () {
	var host = server.address().address
	var port = server.address().port
	console.log('Example app listening at http://%s:%s', host, port)
})