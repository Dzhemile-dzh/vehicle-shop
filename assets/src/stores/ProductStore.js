import { makeAutoObservable, runInAction } from 'mobx';
import axios from 'axios';

class ProductStore {
  vehicles = [];
  vehicle = null;
  loading = true;

  constructor() {
    makeAutoObservable(this);
  }
  
  //All  vehicles
  fetchVehicles = async (type) => {
    this.loading = true;
    try {
      const response = await axios.get(`/${type}`);
      runInAction(() => {
        this.vehicles = response.data;
      });
    } catch (error) {
      console.error("Error fetching vehicles:", error);
    } finally {
      runInAction(() => {
        this.loading = false;
      });
    }
  };

  //Vehicle by id
  fetchVehicleById = async (vehicleType, id) => {
    this.loading = true;
    try {
      const response = await axios.get(`/${vehicleType}/${id}`);
      runInAction(() => {
        this.vehicle = response.data;
      });
    } catch (error) {
      console.error("Error fetching vehicle:", error);
    } finally {
      runInAction(() => {
        this.loading = false;
      });
    }
  };
}

const productStore = new ProductStore();
export default productStore;
