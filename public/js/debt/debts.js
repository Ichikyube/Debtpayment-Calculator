let timer;
const MONTH_NAMES = [
    "January",
    "February",
    "March",
    "April",
    "May",
    "June",
    "July",
    "August",
    "September",
    "October",
    "November",
    "December",
];
const MONTH_SHORT_NAMES = [
    "Jan",
    "Feb",
    "Mar",
    "Apr",
    "May",
    "Jun",
    "Jul",
    "Aug",
    "Sep",
    "Oct",
    "Nov",
    "Dec",
];
const DAYS = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];
document.addEventListener("alpine:init", () => {
    Alpine.store("create", () => ({
        posts: [0],
        alert: [],
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
        showMiniErrorAlert: false,
        showErrorAlert: false,
        statusCode: 0,
        showDatepicker: false,
        datepickerValue:"",
        selectedDate: "",
        dateFormat: "YYYY-MM-DD",
        month: "",
        year: "",
        no_of_days: [],
        blankdays: [],
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
        },
        removeDebt(index) {
            this.posts.splice(index, 1);
        },
        async hitung() {
            // this.isLoading = true;
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
                if (namaHutang[i].value === "") {
                    document.getElementsByClassName("nama")[i].innerHTML = "nama hutang tidak boleh kosong";
                    stop = true;
                }else{
                    document.getElementsByClassName("nama")[i].innerHTML = "";
                }
                if (jmlHutang[i].value === "") {
                    document.getElementsByClassName("jml")[i].innerHTML = "nama hutang tidak boleh kosong";
                    stop = true;
                }else{
                    document.getElementsByClassName("jml")[i].innerHTML = "";
                }
                if (bungaHutang[i].value === "") {
                    document.getElementsByClassName("bunga")[i].innerHTML = "bunga hutang tidak boleh kosong";
                    stop = true;
                }else{
                    document.getElementsByClassName("bunga")[i].innerHTML = "";
                }
                if (waktuBayar[i].value === "") {
                    document.getElementsByClassName("waktu")[i].innerHTML = "tanggal hutang tidak boleh kosong";
                    stop = true;
                }else{
                    document.getElementsByClassName("waktu")[i].innerHTML = "";
                }
                if (minBayar[i].value === "") {
                    document.getElementsByClassName("min")[i].innerHTML = "tanggal hutang tidak boleh kosong";
                    stop = true;
                }else{
                    document.getElementsByClassName("min")[i].innerHTML = "";
                }

                debtTitle.push(namaHutang[i].value);
                debtAmount.push(jmlHutang[i].value);
                datePayment.push(waktuBayar[i].value);
                debtInterest.push(bungaHutang[i].value);
                monthlyInstallments.push(minBayar[i].value);
            }

            // for (let i = 0; i < this.alert.length; i++) {
            //     if (this.alert[i] !== "") {
            //         // document.getElementById(`alert${i}`).innerHTML =
            //         //     this.alert[i];
            //         stop = true;
            //     } else {
            //         // document.getElementById(`alert${i}`).innerHTML = "";
            //     }
            // }
            // this.isLoading = false;
            // if (stop) {
            //     return;
            // }
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
                .then(async (response) => {
                    this.statusCode = response.status;
                    return response.json();
                })
                .then(async (data) => {
                    if (data.status == true) {
                        this.showMinierrrorAlert = false;
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
                    if (this.statusCode == 400) {
                        this.messages = data.message;
                        this.showErrorAlert = true;
                        this.validation = data.error;
                    }
                    if (this.statusCode == 500) {
                        this.messages = data.message;
                        this.showMiniErrorAlert = true;
                    }
                    this.isLoading = false;
                    this.messages = data.message;
                    // this.notif = true;
                    this.showNotif();
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
                        if(this.list.length == 0) swal("Tidak ditemukan perhitungan.  Silahkan melakukan perhitungan terlebih dahulu!")
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
                .then((response) => response.json())
                .then((data) => {
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
        formatTglAja(params) {
            var date = new Date(params);
            var day = date.getDate();
            return day;
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
        pembanding(params) {
            var date = new Date(params);
            var day = date.getDate();

            var mount = date.getMonth() + 1;

            var year = date.getFullYear();
            tgl = day + "-" + mount + "-" + year;
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
        },
        initDate(newDate) {
            let today;
            if (newDate) {
                this.selectedDate = newDate;
                // console.log(newDate)
            }
            if (this.selectedDate) {
                today = new Date(this.selectedDate.replace(/-/g, "/"));
            } else {
                today = new Date();
            }
            this.month = today.getMonth();
            this.year = today.getFullYear();
            this.datepickerValue = this.formatDateForDisplay(
                today
            );
        },
        formatDateForDisplay(date) {
            let formattedDay = DAYS[date.getDay()];
            let formattedDate = ("0" + date.getDate()).slice(
                -2
            ); // appends 0 (zero) in single digit date
            let formattedMonth = MONTH_NAMES[date.getMonth()];
            let formattedMonthShortName =
                MONTH_SHORT_NAMES[date.getMonth()];
            let formattedMonthInNumber = (
                "0" +
                (parseInt(date.getMonth()) + 1)
            ).slice(-2);
            let formattedYear = date.getFullYear();
            if (this.dateFormat === "DD-MM-YYYY") {
                return `${formattedDate}-${formattedMonthInNumber}-${formattedYear}`; // 02-04-2021
            }
            if (this.dateFormat === "YYYY-MM-DD") {
                return `${formattedYear}-${formattedMonthInNumber}-${formattedDate}`; // 2021-04-02
            }
            if (this.dateFormat === "D d M, Y") {
                return `${formattedDay} ${formattedDate} ${formattedMonthShortName} ${formattedYear}`; // Tue 02 Mar 2021
            }
            return `${formattedDay} ${formattedDate} ${formattedMonth} ${formattedYear}`;
        },
        isSelectedDate(date) {
            const d = new Date(this.year, this.month, date);
            return this.datepickerValue ===
                this.formatDateForDisplay(d) ?
                true :
                false;
        },
        isToday(date) {
            const today = new Date();
            const d = new Date(this.year, this.month, date);
            return today.toDateString() === d.toDateString() ?
                true :
                false;
        },
        getDateValue(date) {
            let selectedDate = new Date(
                this.year,
                this.month,
                date
            );
            this.datepickerValue = this.formatDateForDisplay(
                selectedDate
            );
            // this.$refs.date.value = selectedDate.getFullYear() + "-" + ('0' + formattedMonthInNumber).slice(-2) + "-" + ('0' + selectedDate.getDate()).slice(-2);
            this.isSelectedDate(date);
            this.showDatepicker = false;
        },
        getNoOfDays() {
            let daysInMonth = new Date(
                this.year,
                this.month + 1,
                0
            ).getDate();
            // find where to start calendar day of week
            let dayOfWeek = new Date(
                this.year,
                this.month
            ).getDay();
            let blankdaysArray = [];
            for (var i = 1; i <= dayOfWeek; i++) {
                blankdaysArray.push(i);
            }
            let daysArray = [];
            for (var i = 1; i <= daysInMonth; i++) {
                daysArray.push(i);
            }
            this.blankdays = blankdaysArray;
            this.no_of_days = daysArray;
        },
    }));

    Alpine.store("getData", () => ({
        namaHutang: null,
        waktuBayar: null,
        jmlHutang: null,
        bungaHutang: null,
        minBayar: null,
        monthlySalary: null,
        extraSalary: null,
        calculated: true,
        messages: null,
        monthlySalary: null,
        extraSalary: null,
        showMinierrrorAlert: false,
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
                        this.posts = data.data.detail;
                        // console.log( this.posts)
                    }
                    if (data.status == false) {
                        this.validation = data.error;
                    }
                    // this.messages = data.message;
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
                form.monthlyInstallments.push(
                    this.hasil.hutang[i].monthlyInstallments
                );
            }
            this.calculated = true;
            fetch("http://127.0.0.1:8000/api/debt/update/" + id, {
                method: "POST",
                body: JSON.stringify(form),
                headers: {
                    Authorization: `Bearer ${localStorage.getItem("token")}`,
                    "Content-type": "application/json; charset=UTF-8",
                },
            })
                .then(async (response) => await response.json())
                .then(async (data) => {
                    if (data.status == true) {
                        this.calculated = !this.calculated;
                        localStorage.setItem("tab", "listHitungan");
                       await this.listData();
                       if (id) {
                        window.location.reload();
                    }
                    }
                    if (data.status == false) {
                        this.validation = data.error;
                    }
                    this.messages = data.message;
                    this.showNotif();
                });

        },
        async hitungedit(id) {
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
                document.getElementsByClassName("monthlySalary")[0].value;
            var extraSalary =
                document.getElementsByClassName("extraSalary")[0].value;

            for (let i = 0; i < namaHutang.length; i++) {
                if (namaHutang[i].value === "") {
                    document.getElementsByClassName("nama")[i].innerHTML = "nama hutang tidak boleh kosong";
                    stop = true;
                }else{
                    document.getElementsByClassName("nama")[i].innerHTML = "";
                }
                if (jmlHutang[i].value === "") {
                    document.getElementsByClassName("jml")[i].innerHTML = "nama hutang tidak boleh kosong";
                    stop = true;
                }else{
                    document.getElementsByClassName("jml")[i].innerHTML = "";
                }
                if (bungaHutang[i].value === "") {
                    document.getElementsByClassName("bunga")[i].innerHTML = "bunga hutang tidak boleh kosong";
                    stop = true;
                }else{
                    document.getElementsByClassName("bunga")[i].innerHTML = "";
                }
                if (waktuBayar[i].value === "") {
                    document.getElementsByClassName("waktu")[i].innerHTML = "tanggal hutang tidak boleh kosong";
                    stop = true;
                }else{
                    document.getElementsByClassName("waktu")[i].innerHTML = "";
                }
                if (minBayar[i].value === "") {
                    document.getElementsByClassName("min")[i].innerHTML = "tanggal hutang tidak boleh kosong";
                    stop = true;
                }else{
                    document.getElementsByClassName("min")[i].innerHTML = "";
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

            if (stop) {
                return;
            }

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
                        this.showMinierrrorAlert = false;
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
                    if (data.status == false) {
                        this.messages = data.message;
                        this.validation = data.error;
                        this.showMinierrrorAlert = true;
                    }
                    this.isLoading = false;
                    this.messages = data.message;
                    this.showNotif();
                });
        },
    }));
});
