import React from 'react';
import ProductForm from '../Product/ProductForm';

const CarForm = () => {
  const carFields = [
    { name: 'brand', label: 'Brand', type: 'text' },
    { name: 'model', label: 'Model', type: 'text' },
    { name: 'price', label: 'Price', type: 'number' },
    { name: 'engineCapacity', label: 'Engine Capacity', type: 'text' },
    { name: 'doorNumbers', label: 'Number of Doors', type: 'number' },
    { name: 'carCategory', label: 'Car Category', type: 'text' },
    { name: 'colour', label: 'Colour', type: 'text' },

  ];

  const handleCarSubmit = (formData) => {
    console.log('Car Form Data:', formData);
  };

  return <ProductForm title="Create a New Car" formFields={carFields} onSubmit={handleCarSubmit} />;
};

export default CarForm;
