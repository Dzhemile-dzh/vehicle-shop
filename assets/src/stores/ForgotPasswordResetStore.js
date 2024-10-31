import { makeAutoObservable } from "mobx";

class ForgotPasswordResetStore {
  newPassword = "";
  confirmPassword = "";
  error = null;

  constructor() {
    makeAutoObservable(this);
  }

  setNewPassword(value) {
    this.newPassword = value;
  }

  setConfirmPassword(value) {
    this.confirmPassword = value;
  }

  async resetPassword(navigate) {
    if (this.newPassword !== this.confirmPassword) {
      this.error = "Passwords do not match";
      return;
    }

    try {
      const response = await fetch("/reset-password", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({ newPassword: this.newPassword }),
      });

      if (!response.ok) {
        throw new Error("Failed to reset password");
      }

      navigate("/login"); // Redirect to login page after successful reset
    } catch (err) {
      this.error = err.message;
    }
  }
}

export default new ForgotPasswordResetStore();
