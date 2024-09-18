const dotenv = require('dotenv').config();
if (dotenv.error) {
    console.error('Errore nel caricamento di dotenv:', dotenv.error);
}

var express = require('express');
var router = express.Router();

/* GET home page. */
router.get('/', function(req, res, next) {
  res.render('index', { title: 'Express' });
});

module.exports = router;
