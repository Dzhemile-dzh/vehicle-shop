import React from 'react';
import Sidebar from './Sidebar'; 
import ProductCard from '../Product/ProductCard'; 
import carImage from '../images/car.png';
import motorcycleImage from '../images/motorcycle.png'; 
import truckImage from '../images/truck.png';        
import trailerImage from '../images/trailer.png'; 

const Homepage = ({ userRole }) => {
  return (
    <main className="flex flex-col lg:flex-row">
        <Sidebar />
      {userRole === 'ROLE_BUYER' && <Sidebar />}
      <div className="px-12 pt-2 w-full">
        <h2 className="text-4xl font-semibold mb-6">The Best Vehicle Shop Ever - Categories:</h2>
        <div className="space-y-5">
          <ProductCard
            imageSrc={carImage}
            category="Cars"
            categoryPath="/cars" 
            className="Cars"
          />
          <ProductCard
            imageSrc={motorcycleImage}
            category="Motorcycles"
            categoryPath="/motorcycles" 
            className="Motorcycles"
          />
          <ProductCard
            imageSrc={truckImage}
            category="Trucks"
            categoryPath="/trucks" 
            className="Truck"
          />
          <ProductCard
        imageSrc={trailerImage}
            category="Trailers"
            categoryPath="/trailers"
            className="Trailers"
          />
        </div>
      </div>
    </main>
  );
};

export default Homepage;
