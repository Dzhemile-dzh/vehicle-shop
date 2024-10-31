import { makeAutoObservable } from "mobx";

class ForgotPasswordStore {
  email = "";
  error = null;

  constructor() {
    makeAutoObservable(this);
  }

  setEmail(email) {
    this.email = email;
  }
async sendResetEmail(navigate) {
    this.error = null;
  
    try {
      const response = await fetch("/forgot-password", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({ email: this.email }),
      });
  
      if (!response.ok) {
        throw new Error("Failed to send reset email");
      }
  
      navigate("/forgot-password-email");
    } catch (err) {
      this.error = err.message;
    }
  }
  
}

const forgotPasswordStore = new ForgotPasswordStore();
export default forgotPasswordStore;
