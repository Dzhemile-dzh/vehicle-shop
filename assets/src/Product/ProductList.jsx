import React, { useEffect } from 'react';
import { Link } from 'react-router-dom';
import { observer } from 'mobx-react-lite';
import ProductStore from '../stores/ProductStore';

const ProductList = ({ type }) => {
  useEffect(() => {
    ProductStore.fetchVehicles(type);
  }, [type]);

  if (ProductStore.loading) return <p>Loading...</p>;

  return (
    <main className="flex flex-col lg:flex-row">
      <div className="px-12 pt-10 w-full">
        <div className="flex justify-between items-center mb-8">
          <h1 className="text-4xl font-semibold text-white">
            {`${type.charAt(0).toUpperCase() + type.slice(1)} List`}
          </h1>
          <Link
            to={`/create-${type}`}
            className="inline-block bg-amber-400 text-white font-semibold py-2 px-4 rounded-lg hover:bg-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-400 focus:ring-opacity-50"
          >
            Add New {type.charAt(0).toUpperCase() + type.slice(1)}
          </Link>
        </div>

        <div className="space-y-5">
          {ProductStore.vehicles.map((vehicle) => (
            <div key={vehicle.id} className="bg-[#16202A] rounded-2xl pl-5 py-5 pr-11 flex flex-col min-[1174px]:flex-row min-[1174px]:justify-between">
              <div className="flex justify-center min-[1174px]:justify-start">
                <div className="ml-5">
                  <h4 className="text-[22px] pt-1 font-semibold">
                    <Link to={`/${type}/${vehicle.id}`} className="hover:text-slate-200">
                      {`${vehicle.brand} - ${vehicle.model}`}
                    </Link>
                  </h4>
                </div>
              </div>
              <div className="pl-8 w-[200px]">
                <p className="text-slate-400 text-xs">Colour</p>
                <p className="text-xl">{vehicle.colour}</p>
              </div>
              <div className="pl-8 w-[200px]">
                <p className="text-slate-400 text-xs">Price</p>
                <p className="text-xl">${vehicle.price}</p>
              </div>
              <div className="pl-8 w-[100px]">
                <p className="text-slate-400 text-xs">Quantity</p>
                <p className="text-xl">{vehicle.quantity}</p>
              </div>
            </div>
          ))}
        </div>
      </div>
    </main>
  );
};

export default observer(ProductList);
