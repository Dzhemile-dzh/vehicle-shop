import React from 'react';
import { Link } from 'react-router-dom';
import followImage from '../images/follow-icon.png';

// Sample data structure for `followedVehicles` to demonstrate rendering
const followedVehicles = [
  {
    type: 'Car',
    route: '/car',
    items: [
      { id: 1, brand: 'Toyota', model: 'Corolla' },
      { id: 2, brand: 'Honda', model: 'Civic' },
    ],
  },

];

const Sidebar = () => {
  const hasVehicles = followedVehicles.some(vehicle => vehicle.items.length > 0);

  return (
    <aside className="pb-8 lg:pb-0 lg:w-[600px] shrink-0 lg:block lg:min-h-screen text-white transition-all overflow-hidden px-8 border-b lg:border-b-0 lg:border-r border-white/20">
      <div className="flex justify-between mt-11 mb-7">
        <h2 className="text-[32px] font-semibold">Followed Vehicles</h2>
      </div>

      <div>
        <div className="flex flex-col space-y-1.5">
          <div className="rounded-2xl py-1 px-3 flex justify-center w-42 items-center" style={{ background: 'rgba(255, 184, 0, .1)' }}>
            <div className="rounded-full h-2 w-2 bg-rose-700 blur-[1px] mr-2"></div>
            <p className="uppercase text-xs">Check Your Favs</p>
          </div>
        </div>

        {hasVehicles ? (
          followedVehicles.map((vehicle) =>
            vehicle.items.map((item) => (
              <Link to={`${vehicle.route}/${item.id}`} key={item.id}>
                <div className="flex mt-4 border-b border-white/20 pb-8 hover:bg-teal-900">
                  <div className="border-r border-white/20 pr-8">
                    <div className="flex justify-center">
                      <img
                        className="max-h-[50px] md:max-h-[50px]"
                        src={followImage} // Ensure this image is in the public directory
                        alt={`${vehicle.type} image`}
                      />
                    </div>
                  </div>
                  <div className="pl-8">
                    <p className="text-slate-400 text-xs">Category</p>
                    <p className="text-xl">{vehicle.type}</p>
                  </div>
                  <div className="pl-8">
                    <p className="text-slate-400 text-xs">Brand</p>
                    <p className="text-xl">{item.brand}</p>
                  </div>
                  <div className="pl-8">
                    <p className="text-slate-400 text-xs">Model</p>
                    <p className="text-xl">{item.model}</p>
                  </div>
                </div>
              </Link>
            ))
          )
        ) : (
          <div className="mt-4">
            <p className="text-slate-400 text-xs">You have no followed vehicles.</p>
          </div>
        )}
      </div>
    </aside>
  );
};

export default Sidebar;
