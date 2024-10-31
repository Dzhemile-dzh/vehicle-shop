import React from 'react';
import { Link } from 'react-router-dom';

const ProductCard = ({ imageSrc, category, categoryPath, className }) => {
  return (
    <div className="bg-gradient-to-r from-[#00121C] to-[#013954] rounded-2xl pl-5 py-5 pr-11 flex flex-col min-[1174px]:flex-row min-[1174px]:justify-between">
      <div className="flex justify-center min-[1174px]:justify-start">
        <img className="h-[83px] w-[84px]" src={imageSrc} alt={category} />
        <div className="ml-5">
          <div className="rounded-2xl py-1 px-3 flex justify-center w-32 items-center bg-amber-400/10">
            <div className="rounded-full h-2 w-2 bg-amber-400 blur-[1px] mr-2"></div>
            <p className="uppercase text-xs text-nowrap">{category}</p>
          </div>
          <h4 className="text-[22px] pt-1 font-semibold">
            <Link className="hover:bg-amber-400" to={categoryPath}>
              View All {category}
            </Link>
          </h4>
        </div>
      </div>
      <div className="flex justify-center min-[1174px]:justify-start mt-2 min-[1174px]:mt-0 shrink-0">
        <div className="pl-8 w-[100px] border-l border-white/20">
          <p className="text-slate-400 text-xs">Category</p>
          <p className="text-xl">{className}</p>
        </div>
      </div>
    </div>
  );
};

export default ProductCard;
