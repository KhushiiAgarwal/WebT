
import React from 'react';

const Catalog = ({ books }) => (
  <div className="catalog">
    {books.map(book => (
      <div key={book.id} className="book">
        
        <h3>{book.name}</h3>
        <p>Author: {book.author}</p>
        <p>Price: ${book.price}</p>
      </div>
    ))}
  </div>
);

export default Catalog;
