import React, { useState, useEffect } from 'react';
import './App.css';
import Catalog from './catalog'; // Import the Catalog component

function App() {
  const [books, setBooks] = useState([]);

  useEffect(() => {
    // Replace the API endpoint with the actual endpoint from your backend
    fetch('/api/books')
      .then(response => response.json())
      .then(data => setBooks(data));
  }, []);

  return (
    <div className="App">
      <h1>Bookstore</h1>
      {/* Use the Catalog component to display books in a catalog layout */}
      <Catalog books={books} />
    </div>
  );
}

export default App;
