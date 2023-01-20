document.addEventListener("alpine:init", () => {
    Alpine.store("userProfile", () => ({
        profile: "",
        user: "",
        update: "",
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
                    // console.log(this.update)
                });
                
        },
         insertUpdate(name,email,gender,tempat_lahir,tgl_lahir,alamat){
            this.update ={
                name:name,
                email:email,
                gender:gender,
                tempat_lahir:tempat_lahir,
                tgl_lahir:tgl_lahir,
                alamat:alamat
            }
            console.log(this.update)
        }
        ,
        async updateProfile() {
            const formData = {
                name: this.update.name,
                gender: this.update.gender,
                tempat_lahir: this.update.tempat_lahir,
                tgl_lahir: this.update.tgl_lahir,
                alamat: this.update.alamat,
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
            this.userData();
        },
    }));
});
