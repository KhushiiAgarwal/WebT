import React from 'react';
import { useHistory } from 'react-router-dom';
import './Home.css';

function Home({ user }) {
  const history = useHistory();

  const handleGoToCatalog = () => {
    // Navigate to the Catalog page
    history.push('/catalog');
  };

  return (
    <div className="home-container">
      <h2>Welcome, {user}!</h2>
      <p>Here's some dummy information for the home page.</p>
      <button onClick={handleGoToCatalog}>Go to Catalog</button>
    </div>
  );
}

export default Home;
