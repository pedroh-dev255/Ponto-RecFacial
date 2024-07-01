const express = require('express');
const bodyParser = require('body-parser');
const mysql = require('mysql');
const path = require('path');
const dotenv = require('dotenv');


const app = express();
dotenv.config();

const port = 3000 || process.env.PORT;



// Configuração do banco de dados
const db = mysql.createConnection({
  host: process.env.DBHOST,
  user: process.env.DBUSER,
  password: process.env.DBPASS,
  database: process.env.DBDB
});

db.connect(err => {
  if (err) {
    throw err;
  }
  console.log('MySQL conectado...');
});

// Middleware
app.use(bodyParser.json());
app.use(express.static(path.join(__dirname, 'public')));

// Rota para servir o HTML
app.get('/', (req, res) => {
  res.sendFile(path.join(__dirname, 'index.html'));
});

// Endpoint para registrar usuário
app.post('/registrar_usuario', (req, res) => {
  const { nome, imagem_rosto } = req.body;
  const sql = 'INSERT INTO usuarios (nome, imagem_rosto) VALUES (?, ?)';
  db.query(sql, [nome, imagem_rosto], (err, result) => {
    if (err) {
      return res.status(500).json({ success: false, error: err.message });
    }
    res.json({ success: true });
  });
});

// Endpoint para obter usuários registrados
app.get('/obter_usuarios', (req, res) => {
  const sql = 'SELECT * FROM usuarios';
  db.query(sql, (err, results) => {
    if (err) {
      return res.status(500).json({ success: false, error: err.message });
    }
    res.json(results);
  });
});

app.listen(port, () => {
  console.log(`Servidor rodando na porta ${port}`);
});
