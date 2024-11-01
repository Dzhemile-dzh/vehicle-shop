import React from "react";
import { BrowserRouter as Router, Route, Routes } from "react-router-dom";
import Header from "./Layout/Header";
import Footer from "./Layout/Footer";
import Login from "./Auth/Login";
import Register from "./Auth/Register";
import ForgotPassword from "./Auth/ForgotPassword";
import ForgotPasswordSent from "./Auth/ForgotPasswordSent";
import ForgotPasswordReset from "./Auth/ForgotPasswordReset";
import Homepage from "./Layout/Homepage";
import ProductList from "./Product/ProductList";
import CarForm from './Form/CarForm';
import MotorcycleForm from './Form/MotorcycleForm';
import TruckForm from './Form/TruckForm';
import TrailerForm from './Form/TrailerForm';
import ProductDetail from './Product/ProductDetails';

const App = () => (
  <Router>
    <Header />
    <body class="text-white" id="main-body">
      <div class="flex flex-col justify-between relative">
        <Routes>
          <Route path="/" element={<Homepage />} />
          <Route path="/login" element={<Login />} />
          <Route path="/register" element={<Register />} />
          <Route path="/forgot-password" element={<ForgotPassword />} />
          <Route path="/forgot-password-sent" element={<ForgotPasswordSent />} />
          <Route path="/forgot-password-reset" element={<ForgotPasswordReset />} />
          <Route path="/cars" element={<ProductList type="cars" />} />
          <Route path="/motorcycles" element={<ProductList type="motorcycles" />} />
          <Route path="/trucks" element={<ProductList type="trucks" />} />
          <Route path="/trailers" element={<ProductList type="trailers" />} />
          <Route path="/create-cars" element={<CarForm />} />
          <Route path="/create-motorcycles" element={<MotorcycleForm />} />
          <Route path="/create-trucks" element={<TruckForm />} />
          <Route path="/create-trailers" element={<TrailerForm />} />
          <Route path="/:vehicleType/:id" element={<ProductDetail />} />
        </Routes>
        <Footer />
      </div>
    </body>
  </Router>
);

export default App;
