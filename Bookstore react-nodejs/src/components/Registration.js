// Registration.js
import React, { useState } from 'react';
import './Registration.css';

function Registration({ history }) {
  const [username, setUsername] = useState('');
  const [password, setPassword] = useState('');

  const handleRegister = () => {
    // Check if the user already exists in local storage
    const existingUsers = JSON.parse(localStorage.getItem('users')) || [];
    const isUserExists = existingUsers.some((user) => user.username === username);

    if (isUserExists) {
      alert('Username already exists. Please choose a different username.');
    } else {
      // Add the new user to local storage
      const newUser = { username, password };
      const updatedUsers = [...existingUsers, newUser];
      localStorage.setItem('users', JSON.stringify(updatedUsers));

      alert(`Registration successful for ${username}!`);
      history.push('/login'); // Redirect to the login page after successful registration
    }
  };

  return (
    <div className="registration-container">
      <h2>Registration</h2>
      <label>
        Username:
        <input type="text" value={username} onChange={(e) => setUsername(e.target.value)} />
      </label>
      <br />
      <label>
        Password:
        <input type="password" value={password} onChange={(e) => setPassword(e.target.value)} />
      </label>
      <br />
      <button onClick={handleRegister}>Register</button>
    </div>
  );
}

export default Registration;
