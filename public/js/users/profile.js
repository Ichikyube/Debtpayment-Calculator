document.addEventListener("alpine:init", () => {
    Alpine.store("userProfile", () => ({
        profile: "",
        user: "",
        validation: [],
        message: "",
        showForm: false,
        async userData() {
            await fetch("http://127.0.0.1:8000/api/user", {
                method: "GET",
                headers: {
                    "Content-type": "application/json; charset=UTF-8",
                    Authorization: `Bearer ${localStorage.getItem("token")}`,
                },
            })
                .then((response) => response.json())
                .then((data) => {
                    this.user = data;
                });
        },
        async updateProfile() {
            const formData = {
                name: this.user.name,
                gender: this.user.gender,
                tempat_lahir: this.user.tempat_lahir,
                tgl_lahir: this.user.tgl_lahir,
                alamat: this.user.alamat,
            };
            await fetch("http://127.0.0.1:8000/api/user-profile", {
                method: "POST",
                body: JSON.stringify(formData),
                headers: {
                    "Content-type": "application/json; charset=UTF-8",
                    Authorization: `Bearer ${localStorage.getItem("token")}`,
                },
            })
                .then((response) => response.json())
                .then((data) => {
                    console.log(data);
                    if (data.success == false) {
                        this.validation = data.error;
                    }
                    if (data.success == true) {
                        this.message = data.message;
                    }
                });
        },
    }));
});
