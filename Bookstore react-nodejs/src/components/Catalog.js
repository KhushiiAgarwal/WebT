// Catalog.js
import React, { useState, useEffect } from 'react';
import { Link } from 'react-router-dom';
import './Catalog.css';

function Catalog() {
  const [books, setBooks] = useState([]);

  useEffect(() => {
    // Dummy data for the catalog
    const dummyBooks = [
      {
        id: 1,
        title: 'Book 1',
        author: 'Author 1',
        price: 19.99,
        description: 'A wonderful book about something interesting.',
        image: 'https://placekitten.com/150/200', // Example image URL
      },
      {
        id: 2,
        title: 'Book 2',
        author: 'Author 2',
        price: 29.99,
        description: 'An exciting book that will keep you on the edge of your seat.',
        image: 'https://placekitten.com/150/201', // Example image URL
      },
      {
        id: 3,
        title: 'Book 3',
        author: 'Author 3',
        price: 14.99,
        description: 'A captivating book that you won\'t be able to put down.',
        image: 'https://placekitten.com/150/202', // Example image URL
      },
    ];

    setBooks(dummyBooks);
  }, []);

  return (
    <div>
      {/* Navbar */}
      <nav className="navbar">
        <ul>
          <li>
            <Link to="/home">Home</Link>
          </li>
          <li>
            <Link to="/catalog" className="active">
              Catalog
            </Link>
          </li>
          <li>
            <Link to="/login">Login</Link>
          </li>
        </ul>
      </nav>

      {/* Catalog */}
      <div className="catalog-container">
        <h2>Catalog</h2>
        <div className="book-list">
          {books.map((book) => (
            <div key={book.id} className="book-card">
              <img src={book.image} alt={book.title} />
              <h3>{book.title}</h3>
              <p>Author: {book.author}</p>
              <p>Price: ${book.price}</p>
              <p>{book.description}</p>
              <button>Add to Cart</button>
            </div>
          ))}
        </div>
      </div>
    </div>
  );
}

export default Catalog;
