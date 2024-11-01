import React, { useEffect } from 'react';
import { useParams, Link } from 'react-router-dom';
import { observer } from 'mobx-react-lite';
import productStore from '../stores/ProductStore';

const ProductDetail = observer(() => {
  const { vehicleType, id } = useParams();
  const { vehicle, loading, fetchVehicleById } = productStore;

  useEffect(() => {
    fetchVehicleById(vehicleType, id);
  }, [vehicleType, id, fetchVehicleById]);

  if (loading) return <p>Loading...</p>;
  if (!vehicle) return <p>Vehicle not found.</p>;

  const renderVehicleDetails = () => {
    switch (vehicleType) {
      case 'car':
        return (
          <>
            <h4 className="text-xs text-slate-300 font-semibold mt-2 uppercase">Engine Capacity</h4>
            <p className="text-[22px] font-semibold">{vehicle.engineCapacity} L</p>
            <h4 className="text-xs text-slate-300 font-semibold mt-2 uppercase">Colour</h4>
            <p className="text-[22px] font-semibold">{vehicle.colour}</p>
            <h4 className="text-xs text-slate-300 font-semibold mt-2 uppercase">Number of Doors</h4>
            <p className="text-[22px] font-semibold">{vehicle.doorNumbers}</p>
            <h4 className="text-xs text-slate-300 font-semibold mt-2 uppercase">Car Category</h4>
            <p className="text-[22px] font-semibold">{vehicle.carCategory}</p>
          </>
        );
      case 'truck':
        return (
          <>
            <h4 className="text-xs text-slate-300 font-semibold mt-2 uppercase">Engine Capacity</h4>
            <p className="text-[22px] font-semibold">{vehicle.engineCapacity} L</p>
            <h4 className="text-xs text-slate-300 font-semibold mt-2 uppercase">Colour</h4>
            <p className="text-[22px] font-semibold">{vehicle.colour}</p>
            <h4 className="text-xs text-slate-300 font-semibold mt-2 uppercase">Number of Beds</h4>
            <p className="text-[22px] font-semibold">{vehicle.bedNumbers}</p>
          </>
        );
      case 'motorcycle':
        return (
          <>
            <h4 className="text-xs text-slate-300 font-semibold mt-2 uppercase">Engine Capacity</h4>
            <p className="text-[22px] font-semibold">{vehicle.engineCapacity} L</p>
            <h4 className="text-xs text-slate-300 font-semibold mt-2 uppercase">Colour</h4>
            <p className="text-[22px] font-semibold">{vehicle.colour}</p>
          </>
        );
      case 'trailer':
        return (
          <>
            <h4 className="text-xs text-slate-300 font-semibold mt-2 uppercase">Load Capacity</h4>
            <p className="text-[22px] font-semibold">{vehicle.loadKapacityKg} KG</p>
            <h4 className="text-xs text-slate-300 font-semibold mt-2 uppercase">Number of Axles</h4>
            <p className="text-[22px] font-semibold">{vehicle.axlesNumber}</p>
          </>
        );
      default:
        return null;
    }
  };

  return (
    <div className="my-4 px-8">
      <Link to="/" className="bg-white hover:bg-gray-200 rounded-xl p-2 text-black inline-flex items-center">
        <svg className="inline text-black" xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512">
          <path fill="#000" d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/>
        </svg>
        Back
      </Link>

      <div className="md:flex justify-center space-x-3 mt-5 px-4 lg:px-8">
        <div className="flex justify-center">
          <img className="h-[483px] w-[484px]" src={`/images/${vehicleType}.png`} alt={`${vehicleType} image`} />
        </div>
        
        <div className="space-y-5">
          <div className="mt-8 max-w-xl mx-auto">
            <div className="px-8 pt-8">
              <h1 className="text-[32px] font-semibold border-b border-white/10 pb-5 mb-5">
                {vehicle.brand} - {vehicle.model}
              </h1>
              <div className="vehicle-info mt-4">
                <h4 className="text-xs text-slate-300 font-semibold mt-2 uppercase">Price</h4>
                <p className="text-[22px] font-semibold">${vehicle.price}</p>
                <h4 className="text-xs text-slate-300 font-semibold mt-2 uppercase">Quantity</h4>
                <p className="text-[22px] font-semibold">{vehicle.quantity}</p>
                {renderVehicleDetails()}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
});

export default ProductDetail;
