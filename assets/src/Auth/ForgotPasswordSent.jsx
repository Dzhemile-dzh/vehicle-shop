import React from "react";
import { Link } from "react-router-dom";

const ForgotPasswordSent = () => {
  return (
    <div className="flex items-center justify-center min-h-screen bg-gradient-to-r from-[#00121C] to-[#013954] px-4">
      <div className="bg-[#2A3B47] text-white p-8 rounded-lg shadow-lg max-w-md w-full">
        <h1 className="text-2xl font-semibold text-center mb-6">Password Reset Email Sent</h1>
        <p className="text-base mb-4">
          If an account matching your email exists, an email was sent with a link to reset your password.
          This link will expire in 1 hour. 
        </p>
        <p className="text-base mb-4">
          If you don't receive an email, please check your spam folder or{" "}
          <Link to="/forgot-password" className="text-amber-400 hover:underline">
            try again
          </Link>.
        </p>
        <div className="flex justify-center mt-6">
          <Link to="/login" className="bg-amber-400 hover:bg-amber-500 text-white font-semibold py-2 px-4 rounded-lg transition duration-200">
            Return to Login
          </Link>
        </div>
      </div>
    </div>
  );
};

export default ForgotPasswordSent;
