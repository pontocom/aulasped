var express = require('express');
var mysql = require('mysql');

var connection = mysql.createConnection({
    host     : '127.0.0.1',
    user     : 'root',
    password : '',
    database : 'ped2015'
});

client = mysql.createConnection(connection);

connection.connect(function(err) {
    // connected! (unless `err` is set)
    if(err) {
        console.log("Unable to connect to database" + err);
    }
});


exports.findAll = function(req, res) {
    var query = connection.query('SELECT * FROM contacts', function(err, rows) {
        if(err) {
            res.send({status:"ERR", message:err.message + 'SQL = ' + query.sql});
            throw err;
        } else {
            res.send({status:"OK", contact: rows});
        }
    });
};

exports.findById = function(req, res) {
    var id = req.params.id;

    var query = connection.query('SELECT * FROM contacts WHERE id =' + id, function(err, rows) {
        if(err) {
            res.send({status:"ERR", message:err.message + 'SQL = ' + query.sql});
            throw err;
        } else {
            res.send({status:"OK", contact: rows});
        }
    });
};


exports.addContact = function(req, res) {
    console.log(req.body);

    //var beachname = unescape(req.body.bname);

    var contact  = {
        nome: req.body.nome,
        morada: req.body.morada,
        email: req.body.email
    };

    console.log(contact);

    var query = connection.query('INSERT INTO contacts SET ?', contact, function(err, result, fields) {
        if(err) {
            res.send({status:"ERR", message:err.message + 'SQL = ' + query.sql});
            throw err;
        } else {
            res.send({status:"OK", lastId: result.insertId});
        }
    });
};

exports.deleteContact = function(req, res) {
    var id = req.params.id;
    var query = connection.query('DELETE FROM contacts WHERE id =' + id, function(err) {
        if(err) {
            res.send({status:"ERR", message:err.message + 'SQL = ' + query.sql});
            throw err;
        } else {
            res.send({status:"OK"});
        }
    });
};
