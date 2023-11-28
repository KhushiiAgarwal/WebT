// Login.js
import React, { useState } from 'react';
import { Link } from 'react-router-dom';
import './Login.css';

function Login({ setUser, history }) {
  const [username, setUsername] = useState('');
  const [password, setPassword] = useState('');

  const handleLogin = () => {
    // Retrieve registered users from local storage
    const registeredUsers = JSON.parse(localStorage.getItem('users')) || [];
    const user = registeredUsers.find((u) => u.username === username && u.password === password);

    if (user) {
      setUser(username);
      history.push('/home');
    } else {
      alert('Invalid credentials');
    }
  };

  return (
    <div className="login-container">
      <h2>Login</h2>
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
      <button onClick={handleLogin}>Login</button>
      <p>
        Don't have an account? <Link to="/register">Register here</Link>.
      </p>
    </div>
  );
}

export default Login;
