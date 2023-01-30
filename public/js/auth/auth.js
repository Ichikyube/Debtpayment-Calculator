document.addEventListener("alpine:init", () => {
    // fetch register
    Alpine.store("register", () => ({
        name: "",
        email: "",
        password: "",
        passwordConfirmation: "",
        validation: [],
        messages: [],
        async submited() {
            const form = {
                name: this.name,
                email: this.email,
                password: this.password,
                password_confirmation: this.passwordConfirmation,
            };

            await fetch("https://debt-repayment-be.fly.dev/api/register", {
                method: "POST",
                body: JSON.stringify(form),
                headers: {
                    "Content-type": "application/json; charset=UTF-8",
                },
            })
                .then((response) => response.json())
                .then((data) => {
                    if (data.success == true) {
                        localStorage.setItem("messages", data.message);
                        window.location.replace("http://localhost:8001/login");
                    }
                    if (data.success == false) {
                        this.validation = data.error;
                    }
                    this.messages = data.message;
                });
        },
    }));

    // fetch login
    Alpine.store("login", () => ({
        email: "",
        password: "",
        messages: null,
        error: [],
        validation: [],
        status: "",
        closeNotif() {
            this.notif = false;
            this.messages = null;
            localStorage.removeItem("mssg");
        },
        async getMessages() {
            this.messages = localStorage.getItem("messages");
            localStorage.removeItem("messages");
        },
        async getData() {
            await fetch("https://debt-repayment-be.fly.dev/api/user", {
                method: "GET",
                headers: {
                    "Content-type": "application/json; charset=UTF-8",
                    Authorization: `Bearer ${localStorage.getItem("token")}`,
                },
            })
                .then(async (response) => await response.json())
                .then((data) => {
                    // localStorage.setItem("user", {data});
                });
        },
        async submited() {
            var data = {
                email: this.email,
                password: this.password,
            };
            await fetch("https://debt-repayment-be.fly.dev/api/login", {
                method: "POST",
                body: JSON.stringify(data),
                headers: {
                    "Content-type": "application/json; charset=UTF-8",
                },
            })
                .then(async (response) => await response.json())
                .then(async (data) => {
                    this.status = data.success;
                    // response success == false (gagal Login)
                    if (this.status == false) {
                        this.error = data;
                        if (data.message) {
                            localStorage.setItem("messages", data.message);
                        }
                        this.validation = data.error;
                        this.getMessages();
                    }
                    // response seccess = true (Login Berhasil)
                    if (this.status == true) {
                        localStorage.setItem("token", data.access_token);

                        window.location.replace(
                            "http://localhost:8001/dashboard"
                        );
                        localStorage.setItem("tab", "kalkulator");
                        // this.getData();
                    }
                });
        },
    }));

    Alpine.store("logout", () => ({
        showWarningAlert: false,
        async logout() {
            await fetch("https://debt-repayment-be.fly.dev/api/logout", {
                method: "GET",
                headers: {
                    "Content-type": "application/json; charset=UTF-8",
                    Authorization: `Bearer ${localStorage.getItem("token")}`,
                },
            })
                .then((response) => response.json())
                .then((data) => {
                    localStorage.setItem("messages", "You have successfully Log Out");
                    localStorage.removeItem("token");
                    localStorage.removeItem("tab");
                    window.location.replace("http://localhost:8001/login");
                });
        },
    }));
});
