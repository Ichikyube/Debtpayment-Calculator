document.addEventListener("alpine:init", () => {
    Alpine.store("userProfile", () => ({
        profile: "",
        user: "",
        update: "",
        validation: [],
        message: "",
        showForm: false,
        showSuccessAlert: false,
        showErrorAlert: false,
        isLoading: false,
        async userData() {
            this.isLoading = true;
            await fetch("http://localhost:8000/api/user", {
                method: "GET",
                headers: {
                    "Content-type": "application/json; charset=UTF-8",
                    Authorization: `Bearer ${localStorage.getItem("token")}`,
                },
            })
                .then((response) => response.json())
                .then((data) => {
                    this.user = data;
                    this.isLoading = false;
                });
        },
        formatTglFull(params) {
            var date = new Date(params);
            var day = date.getDate();

            var mount = date.toLocaleString("default", {
                month: "long",
            });
            var year = date.getFullYear();
            tgl = day + " " + mount + " " + year;
            return tgl;
        },
        insertUpdate(name, email, gender, tempat_lahir, tgl_lahir, alamat) {
            this.update = {
                name: name,
                email: email,
                gender: gender,
                tempat_lahir: tempat_lahir,
                tgl_lahir: tgl_lahir,
                alamat: alamat,
            };
        },
        async updateProfile() {
            const formData = {
                name: this.update.name,
                gender: this.update.gender,
                tempat_lahir: this.update.tempat_lahir,
                tgl_lahir: this.update.tgl_lahir,
                alamat: this.update.alamat,
            };
            this.showForm = false;
            await fetch("http://localhost:8000/api/user-profile", {
                method: "POST",
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
                        this.showErrorAlert = true;
                        this.showSuccessAlert = false;
                    }
                    if (data.success == true) {
                        this.message = data.message;
                        this.showErrorAlert = false;
                        this.showSuccessAlert = true;
                    }
                });
            this.userData();
        },
        setClear() {
            setInterval(() => {
                this.showSuccessAlert = false;
            }, 5000);
            setInterval(() => {
                this.showErrorAlert = false;
            }, 7000);
        }
    }));
});
