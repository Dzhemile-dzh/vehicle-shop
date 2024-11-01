import { makeAutoObservable, runInAction } from "mobx";
import axios from "axios";

class LoginStore {
  isLoggedIn = false;
  loading = false;
  error = null;

  constructor() {
    makeAutoObservable(this);
  }

  async login(username, password) {
    this.loading = true;
    this.error = null;
    
    try {
      const response = await axios.post("/login", { username, password });
      
      // Simulate checking the response for a success flag or token
      if (response.data.success) {
        runInAction(() => {
          this.isLoggedIn = true;
          this.error = null;
        });
      } else {
        throw new Error("Login failed.");
      }
    } catch (error) {
      runInAction(() => {
        this.error = "Invalid username or password.";
      });
    } finally {
      runInAction(() => {
        this.loading = false;
      });
    }
  }

  logout() {
    this.isLoggedIn = false;
  }
}

const loginStore = new LoginStore();
export default loginStore;
