import React from 'react';
import ProductForm from '../Product/ProductForm';

const MotorcycleForm = () => {
  const motorcycleFields = [
    { name: 'brand', label: 'Brand', type: 'text' },
    { name: 'model', label: 'Model', type: 'text' },
    { name: 'price', label: 'Price', type: 'number' },
    { name: 'engineCapacity', label: 'Engine Capacity', type: 'text' },
    { name: 'colour', label: 'Colour', type: 'text' },
  ];

  const handleMotorcycleSubmit = (formData) => {
    console.log('Motorcycle Form Data:', formData);
  };

  return <ProductForm title="Create a New Motorcycle" formFields={motorcycleFields} onSubmit={handleMotorcycleSubmit} />;
};

export default MotorcycleForm;
