import React, { useState } from 'react';

// Sample structure for form fields to replicate `form` fields in Twig
const sampleFormFields = [
  { name: 'brand', label: 'Brand', type: 'text' },
  { name: 'model', label: 'Model', type: 'text' },
  { name: 'price', label: 'Price', type: 'number' },
  { name: 'quantity', label: 'quantity', type: 'number' },
];

const ProductForm = ({ title, formFields = sampleFormFields, onSubmit }) => {
  // Initialize form state with empty values for each field
  const [formData, setFormData] = useState(
    formFields.reduce((acc, field) => ({ ...acc, [field.name]: '' }), {})
  );

  // Handle field changes
  const handleChange = (e) => {
    const { name, value } = e.target;
    setFormData((prevData) => ({ ...prevData, [name]: value }));
  };

  // Handle form submission
  const handleSubmit = (e) => {
    e.preventDefault();
    onSubmit(formData); // Pass formData to the onSubmit function
  };

  return (
    <div className="max-w-2xl mx-auto mt-10 p-6 bg-white/10 rounded-lg shadow-md">
      <h1 className="text-3xl font-semibold mb-6 text-center text-white">
        {title}
      </h1>

      <form onSubmit={handleSubmit} className="space-y-4">
        {formFields.map((field) => (
          <div key={field.name} className="flex flex-col">
            <label
              htmlFor={field.name}
              className="text-white font-medium mb-1"
            >
              {field.label}
            </label>
            <input
              id={field.name}
              name={field.name}
              type={field.type}
              value={formData[field.name]}
              onChange={handleChange}
              className="form-input bg-white/5 border border-white/20 rounded-lg py-2 px-4 focus:outline-none focus:ring-2 focus:ring-amber-400"
            />
          </div>
        ))}

        <div className="text-center mt-6">
          <button
            type="submit"
            className="w-full sm:w-auto bg-amber-400 text-white font-semibold py-2 px-4 rounded-lg hover:bg-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-400 focus:ring-opacity-50"
          >
            Create
          </button>
        </div>
      </form>
    </div>
  );
};

export default ProductForm;
