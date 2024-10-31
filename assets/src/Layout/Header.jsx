import React from "react";
import { Link } from "react-router-dom";
import { observer } from "mobx-react-lite";
import carshopLogo from '../images/carshop-logo.png';

const Header = observer(() => (
  <header className="h-[114px] shrink-0 flex flex-col sm:flex-row items-center sm:justify-between py-4 sm:py-0 px-6 border-b border-white/20 shadow-md">
    {/* Logo */}
    <Link to="/">
      <img className="h-[42px]" src={carshopLogo} alt="carshop logo" />
    </Link>

    {/* Navigation */}
    <nav className="flex space-x-4 font-semibold">
      <Link to="/cars" className="hover:text-amber-400 pt-2">
        Cars
      </Link>
      <Link to="/motorcycles" className="hover:text-amber-400 pt-2">
        Motorcycles
      </Link>
      <Link to="/trucks" className="hover:text-amber-400 pt-2">
        Trucks
      </Link>
      <Link to="/trailers" className="hover:text-amber-400 pt-2">
        Trailers
      </Link>
    </nav>
  </header>
));

export default Header;
