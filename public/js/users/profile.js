document.addEventListener("alpine:init", () => {
    Alpine.store("userProfile", () => ({
        user: "",
        nama: "",
        gender: "",
        tempat_lahir: "",
        tgl_lahir: "",
        alamat: "",
        validation: [],
        message: "",
        async userData() {
            await fetch("http://127.0.0.1:8000/api/user-profile", {
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
                name: this.nama,
                gender: this.gender,
                tempat_lahir: this.tempat_lahir,
                tgl_lahir: this.tgl_lahir,
                alamat: this.alamat,
            };
            await fetch("http://127.0.0.1:8000/api/user-profile", {
                method: "GET",
                body: JSON.stringify(formData),
                headers: {
                    "Content-type": "application/json; charset=UTF-8",
                    Authorization: `Bearer ${localStorage.getItem("token")}`,
                },
            })
                .then((response) => response.json())
                .then((data) => {
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
