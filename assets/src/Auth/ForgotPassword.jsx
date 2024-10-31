// src/Auth/ForgotPassword.jsx
import React from "react";
import { useNavigate } from "react-router-dom";
import { observer } from "mobx-react-lite";
import forgotPasswordStore from "../stores/ForgotPasswordStore";

const ForgotPassword = observer(() => {
  const navigate = useNavigate();

  const handleSubmit = async (e) => {
    e.preventDefault();
    await forgotPasswordStore.sendResetEmail(navigate);
  };

  return (
    <div className="flex items-center justify-center min-h-screen bg-gradient-to-r from-[#00121C] to-[#013954] px-4">
      <div className="bg-[#2A3B47] text-white p-8 rounded-lg shadow-lg max-w-md w-full">
        <h1 className="text-2xl font-semibold text-center mb-6">
          Reset your password
        </h1>

        {forgotPasswordStore.error && (
          <div
            className="bg-red-500 text-white px-4 py-2 rounded mb-4"
            role="alert"
          >
            {forgotPasswordStore.error}
          </div>
        )}

        <form onSubmit={handleSubmit} className="space-y-4">
          <div>
            <label htmlFor="email" className="block text-slate-300 mb-2">
              Email
            </label>
            <input
              type="email"
              id="email"
              value={forgotPasswordStore.email}
              onChange={(e) => forgotPasswordStore.setEmail(e.target.value)}
              className="w-full rounded-lg bg-cyan-800 text-black py-2 px-4 focus:ring-2 focus:ring-amber-400 focus:outline-none"
              required
            />
          </div>

          <div>
            <small className="text-slate-300 block mb-4">
              Enter your email address, and we will send you a link to reset
              your password.
            </small>
          </div>

          <div className="flex justify-end">
            <button
              type="submit"
              className="bg-amber-400 hover:bg-amber-500 text-white font-semibold py-2 px-6 rounded-lg transition duration-200"
            >
              Send password reset email
            </button>
          </div>
        </form>
      </div>
    </div>
  );
});

export default ForgotPassword;
