let timer;

document.addEventListener("alpine:init", () => {
    Alpine.store("create", () => ({
        posts: [0],
        profile: null,
        calculated: false,
        dateNormal: "",
        dateSnowball: "",
        monthlySalary: 0,
        extraSalary: 0,
        notif: false,
        hasil: [],
        list: [],
        ambilData: [],
        validation: [],
        messages: null,
        isLoading: false,
        idDebt: 0,
        showNotif() {
            if (this.notif) return;
            this.notif = true;
            // reset time to 0 second
            clearTimeout(timer);

            // auto close toast after 5 seconds
            timer = setTimeout(() => {
                this.closeNotif();
            }, 5000);
        },
        closeNotif() {
            this.notif = false;
            this.messages = null;
            localStorage.removeItem("mssg");
        },
        addDebt() {
            this.posts.push("");
            console.log(this.posts);
        },
        removeDebt(index) {
            this.posts.splice(index, 1);
        },
        async hitung() {
            console.log('qwerty');
            this.isLoading = true;
            var alert = [];
            var stop = false;
            var debtTitle = [];
            var debtAmount = [];
            var datePayment = [];
            var debtInterest = [];
            var monthlyInstallments = [];
            var namaHutang = document.getElementsByClassName("namaHutang");
            var jmlHutang = document.getElementsByClassName("jmlHutang");
            var waktuBayar = document.getElementsByClassName("waktuBayar");
            var bungaHutang = document.getElementsByClassName("bungaHutang");
            var minBayar = document.getElementsByClassName("minBayar");
            for (let i = 0; i < namaHutang.length; i++) {
                let temp = "";
                if (namaHutang[i].value === "") {
                    temp += "nama hutang, ";
                }
                if (jmlHutang[i].value === "") {
                    temp += "jumlah hutang, ";
                }
                if (waktuBayar[i].value === "") {
                    temp += "waktu bayar, ";
                }
                if (bungaHutang[i].value === "") {
                    temp += "bunga hutang, ";
                }
                if (minBayar[i].value === "") {
                    temp += "minmal bayar hutang ";
                }
                if (temp !== "") {
                    temp += "tidak boleh kosong";
                    alert.push(temp);
                    // document.getElementById(`alert${i}`).innerHTML = alert + 'tidak boleh kosong'
                } else {
                    alert.push(temp);
                }
                debtTitle.push(namaHutang[i].value);
                debtAmount.push(parseInt(jmlHutang[i].value));
                datePayment.push(waktuBayar[i].value);
                debtInterest.push(parseInt(bungaHutang[i].value));
                monthlyInstallments.push(parseInt(minBayar[i].value));
            }

            for (let i = 0; i < alert.length; i++) {
                if (alert[i] !== "") {
                    document.getElementById(`alert${i}`).innerHTML = alert[i];
                    stop = true;
                } else {
                    document.getElementById(`alert${i}`).innerHTML = "";
                }
            }
            this.isLoading = false;
            if (stop) {
                return;
            }
            const form = {
                debtTitle: debtTitle,
                debtAmount: debtAmount,
                debtInterest: debtInterest,
                datePayment: datePayment,
                monthlyInstallments: monthlyInstallments,
                monthlySalary: this.monthlySalary,
                extraSalary: this.extraSalary,
            };
            await fetch("http://127.0.0.1:8000/api/hitung", {
                method: "POST",
                body: JSON.stringify(form),
                headers: {
                    Authorization: `Bearer ${localStorage.getItem("token")}`,
                    "Content-type": "application/json; charset=UTF-8",
                },
            })
                .then((response) => response.json())
                .then((data) => {
                    if (data.status == true) {
                        this.hasil = data.data;

                        var date = new Date(data.data.hasil.normalCalculator);
                        var mount = date.toLocaleString("default", {
                            month: "long",
                        });
                        var year = date.getFullYear();
                        this.dateNormal = mount + ", " + year;

                        var date2 = new Date(
                            data.data.hasil.snowballCalculator
                        );
                        var month = date2.toLocaleString("default", {
                            month: "long",
                        });
                        var year = date2.getFullYear();
                        this.dateSnowball = month + ", " + year;

                        this.calculated = !this.calculated;
                    }
                    if (data.success == false) {
                        this.validation = data.error;
                        console.log(this.validation);
                    }
                    this.isLoading = false;
                    this.messages = data.message;
                this.notif = true;
                    // console.log(this.messages)
                });
        },
        async charts(pendapatan, pembayaran) {
            const ctx = document.getElementById("hasilChart");

            new Chart(ctx, {
                type: "doughnut",
                data: {
                    labels: ["Pendapatan", "Total Min Bayar"],
                    datasets: [
                        {
                            label: "Perbulan",
                            data: [pendapatan, pembayaran],
                            backgroundColor: [
                                "rgb(42, 124, 151)",
                                "rgb(254, 159, 87)",
                            ],
                            hoverOffset: 7,
                        },
                    ],
                },
            });
        },
        async listData() {
            this.list = [];
            this.isLoading = true;
            this.calculated = true;
            await fetch("http://127.0.0.1:8000/api/debt-payment/list", {
                method: "GET",
                headers: {
                    Authorization: `Bearer ${localStorage.getItem("token")}`,
                    "Content-type": "application/json; charset=UTF-8",
                },
            })
                .then(async (response) => await response.json())
                .then(async (data) => {
                    if (data.success == true) {
                        this.list = await data.data;
                        console.log(this.list);
                    }
                    if (data.status == false) {
                        this.validation = data.error;
                    }
                    this.isLoading = false;
                });
        },
        tambahData() {
            var form = {
                debtTitle: [],
                datePayment: [],
                debtAmount: [],
                debtInterest: [],
                monthlyInstallments: [],

                totalDebt: this.hasil.hasil.totalDebt,
                totalMinPayment: this.hasil.hasil.totalMinPayment,
                monthlySalary: this.hasil.hasil.monthlySalary,
                extraSalary: this.hasil.hasil.extraSalary,
                normalCalculator: this.hasil.hasil.normalCalculator,
                snowballCalculator: this.hasil.hasil.snowballCalculator,
            };
            for (let i = 0; i < this.hasil.hutang.length; i++) {
                form.debtTitle.push(this.hasil.hutang[i].debtTitle);
                form.datePayment.push(this.hasil.hutang[i].datePayment);
                form.debtAmount.push(this.hasil.hutang[i].debtAmount);
                form.debtInterest.push(this.hasil.hutang[i].debtInterest);
                form.monthlyInstallments.push(
                    this.hasil.hutang[i].monthlyInstallments
                );
            }
            this.calculated = true;
            fetch("http://127.0.0.1:8000/api/debt", {
                method: "POST",
                body: JSON.stringify(form),
                headers: {
                    Authorization: `Bearer ${localStorage.getItem("token")}`,
                    "Content-type": "application/json; charset=UTF-8",
                },
            })
            .then( response =>  response.json())
            .then(data => {
                if (data.status == true) {
                    localStorage.setItem("tab", "listHitungan");
                    localStorage.setItem("mssg", data.message);
                }
                if (data.status == false) {
                    this.validation = data.error;
                }
                swal(data.message);
                this.showNotif();


            });

        },
        async deleted() {
            // console.log(this.idDebt);
            fetch("http://127.0.0.1:8000/api/debt/delete/" + this.idDebt, {
                method: "GET",
                headers: {
                    Authorization: `Bearer ${localStorage.getItem("token")}`,
                    "Content-type": "application/json; charset=UTF-8",
                },
            })
                .then(async (response) => await response.json())
                .then(async (data) => {
                    if (data.status == true) {
                        this.listData();
                    }
                    if (data.status == false) {
                        this.validation = data.error;
                    }
                    this.messages = data.message;
                    this.showNotif();
                });
            this.listData();
        },
        formatUang(params) {
            var data = Number(params);
            let USDollar = new Intl.NumberFormat("en-US", {
                style: "currency",
                currency: "USD",
            });
            return USDollar.format(data).replace(/.00$/, "");
        },
        formatTglFull(params) {
            var date = new Date(params);
            var day = date.getDate();

            var mount = date.toLocaleString("default", {
                month: "long",
            });
            var year = date.getFullYear();
            tgl =day + " " + mount + " " + year;
            return tgl;
        },
        formatTgl(params) {
            var date = new Date(params);
            var mount = date.toLocaleString("default", {
                month: "long",
            });
            var year = date.getFullYear();
            tgl = mount + ", " + year;
            return tgl;
        },
        title: [],
        textTitile(params) {
            for (let i = 0; i < params.length; i++) {
                this.title.push(params[0].debtTitle);
            }
            console.log(this.title);
        },
    }));

    Alpine.store("getData", () => ({
        namaHutang:null,
        waktuBayar:null,
        jmlHutang:null,
        bungaHutang:null,
        minBayar:null,
        monthlySalary:null,
        extraSalary:null,
        calculated: true,
        monthlySalary: null,
        extraSalary: null,
        // ambilData: [],
        async ubah(id) {
            fetch("http://127.0.0.1:8000/api/debt/" + id, {
                method: "GET",
                headers: {
                    Authorization: `Bearer ${localStorage.getItem("token")}`,
                    "Content-type": "application/json; charset=UTF-8",
                },
            })
                .then((response) => response.json())
                .then((data) => {
                    if (data.status == true) {
                        this.ambilData = data.data;
                        console.log(this.ambilData);
                        this.posts = data.data.detail.length;
                    }
                    if (data.status == false) {
                        this.validation = data.error;
                    }
                    this.messages = data.message;
                    this.showNotif();
                });
        },
        async editData(id) {
            var form = {
                debtTitle: [],
                debtAmount: [],
                datePayment: [],
                debtInterest: [],
                monthlyInstallments: [],

                totalDebt: this.hasil.hasil.totalDebt,
                totalMinPayment: this.hasil.hasil.totalMinPayment,
                monthlySalary: this.hasil.hasil.monthlySalary,
                extraSalary: this.hasil.hasil.extraSalary,
                normalCalculator: this.hasil.hasil.normalCalculator,
                snowballCalculator: this.hasil.hasil.snowballCalculator,
            };

            for (let i = 0; i < this.hasil.hutang.length; i++) {
                form.debtTitle.push(this.hasil.hutang[i].debtTitle);
                form.debtAmount.push(this.hasil.hutang[i].debtAmount);
                form.datePayment.push(this.hasil.hutang[i].datePayment);
                form.debtInterest.push(this.hasil.hutang[i].debtInterest);
                form.monthlyInstallments.push(this.hasil.hutang[i].monthlyInstallments);
            }
            console.log(form);
            this.calculated = true;
            fetch("http://127.0.0.1:8000/api/debt/update/" + id, {
                method: "POST",
                body: JSON.stringify(form),
                headers: {
                    Authorization: `Bearer ${localStorage.getItem("token")}`,
                    "Content-type": "application/json; charset=UTF-8",
                },
            })
                .then((response) => response.json())
                .then((data) => {
                    if (data.status == true) {
                        console.log(data);
                        this.calculated = !this.calculated;
                        localStorage.setItem("tab", "listHitungan");
                        this.listData();
                    }
                    if (data.status == false) {
                        this.validation = data.error;
                    }
                    this.messages = data.message;
                    this.showNotif();
                });
        },
        async hitungedit(id) {
            console.log(document.getElementById("monthlySalary"));
            var alert = [];
            var stop = false;
            var debtTitle = [];
            var debtAmount = [];
            var datePayment = [];
            var debtInterest = [];
            var monthlyInstallments = [];
            var namaHutang = document.getElementsByClassName("namaHutang");
            var jmlHutang = document.getElementsByClassName("jmlHutang");
            var bungaHutang = document.getElementsByClassName("bungaHutang");
            var waktuBayar = document.getElementsByClassName("waktuBayar");
            var minBayar = document.getElementsByClassName("minBayar");
            var monthlySalary =
                document.getElementById("monthlySalary").value;
            var extraSalary =
                document.getElementById("extraSalary").value;

            for (let i = 0; i < namaHutang.length; i++) {
                let temp = "";
                if (namaHutang[i].value === "") {
                    temp += "nama hutang, ";
                }
                if (jmlHutang[i].value === "") {
                    temp += "jumlah hutang, ";
                }
                if (bungaHutang[i].value === "") {
                    temp += "bunga hutang, ";
                }
                if (waktuBayar[i].value === "") {
                    temp += "waktu bayar, ";
                }
                if (minBayar[i].value === "") {
                    temp += "minmal bayar hutang ";
                }
                if (temp !== "") {
                    temp += "tidak boleh kosong";
                    alert.push(temp);
                    // document.getElementById(`alert${i}`).innerHTML = alert + 'tidak boleh kosong'
                } else {
                    alert.push(temp);
                }

                debtTitle.push(namaHutang[i].value);
                debtAmount.push(jmlHutang[i].value);
                datePayment.push(waktuBayar[i].value);
                debtInterest.push(bungaHutang[i].value);
                monthlyInstallments.push(minBayar[i].value);
            }

            // for (let i = 0; i < alert.length; i++) {
            //     if (alert[i] !== "") {
            //         document.getElementById(`alert${i}`).innerHTML = alert[i];
            //         stop = true;
            //     } else {
            //         document.getElementById(`alert${i}`).innerHTML = "";
            //     }
            // }

            // if (stop) {
            //     return;
            // }

            console.log(datePayment);
            const form = {
                debtTitle: debtTitle,
                debtAmount: debtAmount,
                debtInterest: debtInterest,
                datePayment: datePayment,
                monthlyInstallments: monthlyInstallments,
                monthlySalary: parseInt(monthlySalary),
                extraSalary: parseInt(extraSalary),
            };
            await fetch("http://127.0.0.1:8000/api/hitung", {
                method: "POST",
                body: JSON.stringify(form),
                headers: {
                    Authorization: `Bearer ${localStorage.getItem("token")}`,
                    "Content-type": "application/json; charset=UTF-8",
                },
            })
                .then((response) => response.json())
                .then((data) => {
                    if (data.status == true) {
                        this.hasil = data.data;

                        var date = new Date(data.data.hasil.normalCalculator);
                        var mount = date.toLocaleString("default", {
                            month: "long",
                        });
                        var year = date.getFullYear();
                        this.dateNormal = mount + ", " + year;

                        var date2 = new Date(
                            data.data.hasil.snowballCalculator
                        );
                        var mount = date2.toLocaleString("default", {
                            month: "long",
                        });
                        var year = date2.getFullYear();
                        this.dateSnowball = mount + ", " + year;

                        this.id = id;
                        this.calculated = !this.calculated;
                    }
                    if (data.success == false) {
                        this.validation = data.error;
                    }
                    this.messages = data.message;
                    this.showNotif();
                    // console.log(validation);
                });
        },
    }));
});
