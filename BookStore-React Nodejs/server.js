const express = require('express');
const bodyParser = require('body-parser');
const fs = require('fs');

const app = express();
const port = 3001;

app.use(bodyParser.json());

// Read data from the JSON file
const dataPath = './data.json';
let data = JSON.parse(fs.readFileSync(dataPath, 'utf8'));

// API endpoints

// Register a new user
app.post('/api/register', (req, res) => {
  const { username, password } = req.body;
  data.users.push({ username, password });
  updateData();
  res.json({ success: true, message: 'User registered successfully.' });
});

// Login
app.post('/api/login', (req, res) => {
  const { username, password } = req.body;
  const user = data.users.find(u => u.username === username && u.password === password);
  if (user) {
    res.json({ success: true, message: 'Login successful.' });
  } else {
    res.json({ success: false, message: 'Invalid credentials.' });
  }
});

// Get book catalog
app.get('/api/books', (req, res) => {
  res.json(data.books);
});

// Update the JSON file with the latest data
function updateData() {
  fs.writeFileSync(dataPath, JSON.stringify(data, null, 2), 'utf8');
}

app.listen(port, () => {
  console.log(`Server is running on port ${port}`);
});
