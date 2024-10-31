import React, { useState } from "react";
import { Link, useNavigate } from "react-router-dom";
import { observer } from "mobx-react-lite";
import loginStore from "../stores/LoginStore";

const Login = observer(() => {
  const [username, setUsername] = useState("");
  const [password, setPassword] = useState("");
  const navigate = useNavigate();

  const handleSubmit = async (e) => {
    e.preventDefault();
    await loginStore.login(username, password);

    // Check if login was successful
    if (loginStore.isLoggedIn) {
      navigate("/"); // Redirect on success
    }
  };

  return (
    <div className="flex items-center justify-center min-h-screen bg-gradient-to-r from-[#00121C] to-[#013954] px-4">
      <div className="md:flex justify-center space-x-3 mt-5 px-4 lg:px-8">
        <form onSubmit={handleSubmit} className="space-y-6">
          <h1 className="text-2xl font-semibold text-center text-white mb-4">Please sign in</h1>

          {loginStore.error && (
            <div className="bg-rose-600 text-white p-3 rounded-md text-sm">
              {loginStore.error}
            </div>
          )}

          <div>
            <label htmlFor="inputUsername" className="block text-slate-300 mb-2">Username</label>
            <input
              type="text"
              id="inputUsername"
              value={username}
              onChange={(e) => setUsername(e.target.value)}
              className="w-full rounded-lg bg-[#2A3B47] text-white py-2 px-4 focus:ring-2 focus:ring-amber-400 focus:outline-none"
              required
              autoFocus
            />
          </div>

          <div>
            <label htmlFor="inputPassword" className="block text-slate-300 mb-2">Password</label>
            <input
              type="password"
              id="inputPassword"
              value={password}
              onChange={(e) => setPassword(e.target.value)}
              className="w-full rounded-lg bg-[#2A3B47] text-white py-2 px-4 focus:ring-2 focus:ring-amber-400 focus:outline-none"
              required
            />
          </div>

          <div>
            <Link to="/forgot-password">
              <p className="text-slate-500 hover:text-blue-600">Forgot Password?</p>
            </Link>
          </div>

          <div className="flex">
            <button
              type="submit"
              className="bg-amber-400 hover:bg-amber-500 text-white font-semibold py-2 px-6 rounded-lg transition duration-200"
              disabled={loginStore.loading} // Disable the button while loading
            >
              {loginStore.loading ? "Signing in..." : "Sign in"}
            </button>
            <Link
              to="/register"
              className="ml-4 bg-transparent hover:bg-rose-400 text-white font-semibold py-2 px-6 rounded-lg transition duration-200"
            >
              Sign up
            </Link>
          </div>
        </form>
      </div>
    </div>
  );
});

export default Login;
