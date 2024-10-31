import React, { useState } from "react";
import { Link, useNavigate } from "react-router-dom";

const Register = () => {
  const navigate = useNavigate();
  const [formData, setFormData] = useState({
    username: "",
    firstName: "",
    email: "",
    password: "",
    confirmPassword: "",
    agreeTerms: false,
  });
  const [errors, setErrors] = useState({});

  const handleChange = (e) => {
    const { name, value, type, checked } = e.target;
    setFormData((prev) => ({
      ...prev,
      [name]: type === "checkbox" ? checked : value,
    }));
  };

  const handleSubmit = (e) => {
    e.preventDefault();

    navigate("/login");
  };

  return (
    <div className="flex items-center justify-center min-h-screen bg-gradient-to-r from-[#00121C] to-[#013954] px-4">
      <div className="space-y-6 mt-5 px-4 lg:px-8">
        <form onSubmit={handleSubmit} className="space-y-6">
          <h1 className="text-2xl font-semibold text-center text-white mb-4">
            Create an account
          </h1>

          {errors.global && (
            <div className="bg-rose-600 text-white p-3 rounded-md text-sm">
              {errors.global}
            </div>
          )}

          <div>
            <label className="block text-slate-300 mb-2">Username</label>
            <input
              type="text"
              name="username"
              value={formData.username}
              onChange={handleChange}
              className="w-full rounded-lg bg-[#2A3B47] text-white py-2 px-4 focus:ring-2 focus:ring-amber-400 focus:outline-none"
              required
            />
          </div>

          <div>
            <label className="block text-slate-300 mb-2">First Name</label>
            <input
              type="text"
              name="firstName"
              value={formData.firstName}
              onChange={handleChange}
              className="w-full rounded-lg bg-[#2A3B47] text-white py-2 px-4 focus:ring-2 focus:ring-amber-400 focus:outline-none"
              required
            />
          </div>

          <div>
            <label className="block text-slate-300 mb-2">Email</label>
            <input
              type="email"
              name="email"
              value={formData.email}
              onChange={handleChange}
              className="w-full rounded-lg bg-[#2A3B47] text-white py-2 px-4 focus:ring-2 focus:ring-amber-400 focus:outline-none"
              required
            />
          </div>

          <div>
            <label className="block text-slate-300 mb-2">Password</label>
            <input
              type="password"
              name="password"
              value={formData.password}
              onChange={handleChange}
              className="w-full rounded-lg bg-[#2A3B47] text-white py-2 px-4 focus:ring-2 focus:ring-amber-400 focus:outline-none"
              required
            />
          </div>

          <div>
            <label className="block text-slate-300 mb-2">Confirm Password</label>
            <input
              type="password"
              name="confirmPassword"
              value={formData.confirmPassword}
              onChange={handleChange}
              className="w-full rounded-lg bg-[#2A3B47] text-white py-2 px-4 focus:ring-2 focus:ring-amber-400 focus:outline-none"
              required
            />
          </div>

          <div className="flex items-center space-x-3">
            <input
              type="checkbox"
              name="agreeTerms"
              checked={formData.agreeTerms}
              onChange={handleChange}
              className="rounded bg-[#2A3B47] text-white focus:ring-amber-400 focus:ring-offset-amber-400"
              required
            />
            <label className="text-slate-300 text-sm">
              I agree to the terms and conditions
            </label>
          </div>

          <div className="flex justify-end">
            <button
              type="submit"
              className="bg-amber-400 hover:bg-amber-500 text-white font-semibold py-2 px-6 rounded-lg transition duration-200"
            >
              Register
            </button>
          </div>
        </form>
        <div className="flex justify-end">
          <Link to="/login" className="text-slate-500 hover:text-blue-600">
            Already have an account? Sign in
          </Link>
        </div>
      </div>
    </div>
  );
};

export default Register;
