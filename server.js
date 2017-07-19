var socket  = require( './node_modules/socket.io' );
var app = require('express')();
var http = require('http').createServer(app);
var io = require('socket.io').listen(http);

http.listen(3000);

io.on('connection', function(socket) {
	socket.on('message', function(message) {
		io.emit('message', message);
	});

	socket.on('join', function(user) {
		io.emit('join', user);
	});
});


































// var socket  = require( './node_modules/socket.io' );
// var express = require('./node_modules/express'); //http support for NodeJS
// var app     = express();
// var server  = require('http').createServer(app); //Create an http server
// var io      = require('socket.io').listen(server);
// // var io      = socket.listen( server ); //socket should listen to the http server we just created
// //var port    = process.env.PORT || 3000; //Setup a port where the server should listen for data
// // var users = []; //an array to keep track of online users

// server.listen(3002);

// server.listen(function () {
//   console.log('Server listening');
// });

// io.on('connection', function (socket) {

//     socket.on('newUser', function(username, room, userid) {
//         socket.username = username;
//         socket.room = room;
//         socket.userid = userid;
//         io.emit('newUser', username, room, userid);
//     });

//     socket.on('newMessage', function(msg, room, username) {
//         io.emit('push_message', msg, username, room);
//     });

//     socket.on('disconnect', function() {
//         io.emit('leave', socket.username, socket.room, socket.userid);
//     });

//     socket.on('report', function() {
//         io.emit('checkReport');
//     })

// });