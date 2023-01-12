document.addEventListener("alpine:init", () => {
    // fetch login
    Alpine.store("register", () => ({
        name: "",
        email: "",
        password: "",
        passwordConfirmation: "",
        validation: [],
        messages: [],
        submited() {
            const form = {
                name: this.name,
                email: this.email,
                password: this.password,
                password_confirmation: this.passwordConfirmation,
            };

            fetch("http://127.0.0.1:8000/api/register", {
                method: "POST",
                body: JSON.stringify(form),
                headers: {
                    "Content-type": "application/json; charset=UTF-8",
                },
            })
                .then((reponse) => reponse.json())
                .then((data) => {
                    if (data.success == true) {
                        console.log(data);
                        window.location.replace("http://127.0.0.1:8000/login");
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
        error: [],
        validation: [],
        status: "",
        async getData() {
            await fetch("http://127.0.0.1:8000/api/user", {
                method: "GET",
                headers: {
                    "Content-type": "application/json; charset=UTF-8",
                    Authorization: `Bearer ${localStorage.getItem("token")}`,
                },
            })
                .then((response) => response.json())
                .then((data) => {
                    // localStorage.setItem("user", {data});
                    console.log(data);
                });
        },
        async submited() {
            var data = {
                email: this.email,
                password: this.password,
            };
            await fetch("http://127.0.0.1:8000/api/login", {
                method: "POST",
                body: JSON.stringify(data),
                headers: {
                    "Content-type": "application/json; charset=UTF-8",
                },
            })
                .then((response) => response.json())
                .then(async (data) => {
                    this.status = data.success;
                    // response success == false (gagal Login)
                    if (this.status == false) {
                        this.error = data;
                        this.validation = data.error;
                    }
                    // response seccess = true (Login Berhasil)
                    if (this.status == true) {
                        localStorage.setItem("token", data.access_token);
                        // this.getData();
                    }
                });
        },
    }));
});
