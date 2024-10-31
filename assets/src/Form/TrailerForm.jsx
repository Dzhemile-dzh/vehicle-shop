import React from 'react';
import ProductForm from '../Product/ProductForm';

const TrailerForm = () => {
  const trailerFields = [
    { name: 'brand', label: 'Brand', type: 'text' },
    { name: 'model', label: 'Model', type: 'text' },
    { name: 'price', label: 'Price', type: 'number' },
    { name: 'engineKapacityKg', label: 'Engine Capacity', type: 'text' },
  ];

  const handleTrailerSubmit = (formData) => {
    console.log('Trailer Form Data:', formData);
  };

  return <ProductForm title="Create a New Trailer" formFields={trailerFields} onSubmit={handleTrailerSubmit} />;
};

export default TrailerForm;
