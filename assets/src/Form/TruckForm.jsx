import React from 'react';
import ProductForm from '../Product/ProductForm';

const TruckForm = () => {
  const truckFields = [
    { name: 'brand', label: 'Brand', type: 'text' },
    { name: 'model', label: 'Model', type: 'text' },
    { name: 'price', label: 'Price', type: 'number' },
    { name: 'engineCapacity', label: 'Engine Capacity', type: 'text' },
    { name: 'bedNumbers', label: 'Number of beds', type: 'number' },
  ];

  const handleTruckSubmit = (formData) => {
    console.log('Truck Form Data:', formData);
  };

  return <ProductForm title="Create a New Truck" formFields={truckFields} onSubmit={handleTruckSubmit} />;
};

export default TruckForm;
