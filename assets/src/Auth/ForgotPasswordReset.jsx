// src/components/ForgotPasswordReset.jsx
import React from "react";
import { useNavigate } from "react-router-dom";
import { observer } from "mobx-react-lite";
import forgotPasswordResetStore from "../stores/ForgotPasswordResetStore";

const ForgotPasswordReset = observer(() => {
  const navigate = useNavigate();

  const handleSubmit = async (e) => {
    e.preventDefault();
    await forgotPasswordResetStore.resetPassword(navigate);
  };

  return (
    <div className="flex items-center justify-center min-h-screen bg-gradient-to-r from-[#00121C] to-[#013954] px-4">
      <div className="bg-[#2A3B47] text-white p-8 rounded-lg shadow-lg max-w-md w-full">
        <h1 className="text-2xl font-semibold text-center mb-6">
          Reset your password
        </h1>

        {forgotPasswordResetStore.error && (
          <div
            className="bg-red-500 text-white px-4 py-2 rounded mb-4"
            role="alert"
          >
            {forgotPasswordResetStore.error}
          </div>
        )}

        <form onSubmit={handleSubmit} className="space-y-4">
          <div>
            <label htmlFor="newPassword" className="block text-slate-300 mb-2">
              New Password
            </label>
            <input
              type="password"
              id="newPassword"
              value={forgotPasswordResetStore.newPassword}
              onChange={(e) => forgotPasswordResetStore.setNewPassword(e.target.value)}
              className="w-full rounded-lg bg-cyan-800 text-black py-2 px-4 focus:ring-2 focus:ring-amber-400 focus:outline-none"
              required
            />
          </div>

          <div>
            <label
              htmlFor="confirmPassword"
              className="block text-slate-300 mb-2"
            >
              Confirm Password
            </label>
            <input
              type="password"
              id="confirmPassword"
              value={forgotPasswordResetStore.confirmPassword}
              onChange={(e) => forgotPasswordResetStore.setConfirmPassword(e.target.value)}
              className="w-full rounded-lg bg-cyan-800 text-black py-2 px-4 focus:ring-2 focus:ring-amber-400 focus:outline-none"
              required
            />
          </div>

          <div className="flex justify-end">
            <button
              type="submit"
              className="bg-amber-400 hover:bg-amber-500 text-white font-semibold py-2 px-6 rounded-lg transition duration-200"
            >
              Reset password
            </button>
          </div>
        </form>
      </div>
    </div>
  );
});

export default ForgotPasswordReset;
