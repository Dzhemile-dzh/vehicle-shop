import { makeAutoObservable, runInAction } from 'mobx';
import axios from 'axios';

class ProductStore {
  vehicles = [];
  loading = true;

  constructor() {
    makeAutoObservable(this);
  }

  async fetchVehicles(type) {
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
  }
}

const productStore = new ProductStore();
export default productStore;
