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
        postAdded: false,
        alert: [],
        profile: null,
        calculated: false,
        dateNormal: "",
        dateSnowball: "",
        monthlySalary: 0,
        extraPayment: 0,
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
        async hitung() {
            // this.isLoading = true;
            var stop = false;

            // initiate variable debt detail
            var debtName = [];
            var debtAmount = [];
            var paymentDate = [];
            var interestRate = [];
            var monthlyPayment = [];

            // get value by class name
            var namaHutang = document.getElementsByClassName("namaHutang");
            var jmlHutang = document.getElementsByClassName("jmlHutang");
            var waktuBayar = document.getElementsByClassName("waktuBayar");
            var bungaHutang = document.getElementsByClassName("bungaHutang");
            var minBayar = document.getElementsByClassName("minBayar");

            for (let i = 0; i < namaHutang.length; i++) {

                // check value form
                if (namaHutang[i].value === "") {
                    document.getElementsByClassName("nama")[i].innerHTML = `<div class="bottom2 bg-red-600">Debt name cannot be empty<i></i></div>`;
                    stop = true;
                }else{
                    document.getElementsByClassName("nama")[i].innerHTML = "";
                }
                if (jmlHutang[i].value === "") {
                    document.getElementsByClassName("jml")[i].innerHTML = `<div class="bottom2 bg-red-600">Debt amount cannot be empty<i></i></div>`;
                    stop = true;
                }else{
                    document.getElementsByClassName("jml")[i].innerHTML = "";
                }
                if (bungaHutang[i].value === "") {
                    document.getElementsByClassName("bunga")[i].innerHTML = `<div class="bottom2 bg-red-600">Debt interest cannot be empty<i></i></div>`;
                    stop = true;
                }else{
                    document.getElementsByClassName("bunga")[i].innerHTML = "";
                }
                if (waktuBayar[i].value === "") {
                    document.getElementsByClassName("waktu")[i].innerHTML = `<div class="bottom2 bg-red-600">Payment date cannot be empty<i></i></div>`;
                    stop = true;
                }else{
                    document.getElementsByClassName("waktu")[i].innerHTML = "";
                }
                if (minBayar[i].value === "") {
                    document.getElementsByClassName("min")[i].innerHTML = `<div class="bottom2 bg-red-600">Min payment cannot be empty<i></i></div>`;
                    stop = true;
                }else{
                    document.getElementsByClassName("min")[i].innerHTML = "";
                }

                // push value to variable array debt detail
                debtName.push(namaHutang[i].value);
                debtAmount.push(jmlHutang[i].value);
                paymentDate.push(waktuBayar[i].value);
                interestRate.push(bungaHutang[i].value);
                monthlyPayment.push(minBayar[i].value);
                this.autoCloseValidation(i);
            }

            // check value if any null value then stop it
            if (stop) {
                return;
            }

            // insert variable to form variable
            const form = {
                debt_name: debtName,
                debt_amount: debtAmount,
                interest_rate: interestRate,
                payment_date: paymentDate,
                monthly_payment: monthlyPayment,
                monthly_salary: this.monthlySalary,
                extra_payment: this.extraPayment,
            };

            // fetching to calculate debt with sending form variable using post method
            await fetch("http://127.0.0.1:8000/api/debt/hitung", {
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
                // if success
                if (data.status == true) {
                    this.showMinierrrorAlert = false;

                    // get data calculation result and input it to hasil varibale
                    this.hasil = data.data;

                    this.calculated = !this.calculated;
                }
                if (this.statusCode == 400) {
                    this.messages = data.message;
                    this.showErrorAlert = true;
                    setTimeout(() => {
                        this.showErrorAlert = false;
                    }, 4700);
                    this.validation = data.error;
                }
                if (this.statusCode == 500) {
                    this.messages = data.message;
                    this.showMiniErrorAlert = true;
                }
                this.isLoading = false;
                this.messages = data.message;
                this.timeNotif();
            });
        },
        tambahData() {
            var form = {
                // initiate variable debt detail
                debt_name: [],
                payment_date: [],
                debt_amount: [],
                interest_rate: [],
                monthly_payment: [],

                // initiate varibale debt calculation result
                debt_total: this.hasil.hasil.debt_total,
                total_min_payment: this.hasil.hasil.total_min_payment,
                monthly_salary: this.hasil.hasil.monthly_salary,
                extra_payment: this.hasil.hasil.extra_payment,
                normal_method: this.hasil.hasil.normal_method,
                snowball_method: this.hasil.hasil.snowball_method,
            };

            // looping to insert debt detail data to variable
            for (let i = 0; i < this.hasil.hutang.length; i++) {
                form.debt_name.push(this.hasil.hutang[i].debt_name);
                form.payment_date.push(this.hasil.hutang[i].payment_date);
                form.debt_amount.push(this.hasil.hutang[i].debt_amount);
                form.interest_rate.push(this.hasil.hutang[i].interest_rate);
                form.monthly_payment.push(
                    this.hasil.hutang[i].monthly_payment
                );
            }

            this.calculated = true;
            this.isLoading = true;
            this.messages = null;
            // fetching data to create new debt with sending form variable using post method
            fetch("http://127.0.0.1:8000/api/debt/create", {
                method: "POST",
                body: JSON.stringify(form),
                headers: {
                    Authorization: `Bearer ${localStorage.getItem("token")}`,
                    "Content-type": "application/json; charset=UTF-8",
                },
            })
            .then((response) => response.json())
            .then( (data) => {
                if (data.status == true) {
                    this.messages = data.message;
                    swal("Saved", data.message,"success");
                    localStorage.setItem("tab", "listHitungan");
                    this.isLoading = false;
                    this.timeNotif();

                }
                if (data.status == false) {
                    this.validation = data.error;
                }

            });
        },
        async listData() {
            // set list to null before get data
            this.list = [];
            this.isLoading = true;
            this.calculated = true;
            // fetching data to get debt list
            await fetch("http://127.0.0.1:8000/api/debt/list", {
                method: "GET",
                headers: {
                    Authorization: `Bearer ${localStorage.getItem("token")}`,
                    "Content-type": "application/json; charset=UTF-8",
                },
            })
            .then(async (response) => await response.json())
            .then( (data) => {
                if (data.success == true) {
                    this.list =  data.data;
                    // set sweet alert if debt not found
                    if(this.list.length == 0) {
                        swal("No Calculation", "You have to make the calculation first to see something appear in this page!", "info");
                        this.closeNotif();
                        clearTimeout(timer);
                        timer = setTimeout(() => {
                            this.tab = 'kalkulator';
                            localStorage.setItem('tab', 'kalkulator');
                        }, 100);


                    }
                }
                if (data.status == false) {
                    this.validation = data.error;
                }
                this.isLoading = false;
            });
        },
        async deleted() {

            // fetching data to delete debt when have equal id
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
                this.timeNotif();
            });
            this.listData();
        },
        /*
        ** Show / Close
        ** Notification
        */
        timeNotif() {
            // reset time to 0 second
            clearTimeout(timer);

            // auto close toast after 5 seconds
            timer = setTimeout(() => {
                this.closeNotif();
            }, 5000);
        },
        closeNotif() {
            this.messages = null;
        },
        autoCloseValidation(i) {
            clearTimeout(timer);
            // auto close after 5 seconds
            timer = setTimeout(() => {
                document.getElementsByClassName("nama")[i].innerHTML = "";
                document.getElementsByClassName("jml")[i].innerHTML = "";
                document.getElementsByClassName("bunga")[i].innerHTML = "";
                document.getElementsByClassName("waktu")[i].innerHTML = "";
                document.getElementsByClassName("min")[i].innerHTML = "";
            }, 5000);
        },
        /*
        ** Add / Cancel Debt card button
        **
        */
        addDebt() {
            this.postAdded = true;
            this.posts.push("");

            // reset time to 0 second
            clearTimeout(timer);

            // auto close toast after 5 seconds
            timer = setTimeout(() => {
                this.postAdded = false;
            }, 5000);
        },
        removeDebt(index) {
            this.posts.splice(index, 1);
        },
        /*
        ** Display Chart
        **
        */
        async charts(pendapatan, pembayaran) {
            const ctx = document.getElementById("hasilChart");

            new Chart(ctx, {
                type: "doughnut",
                data: {
                    labels: ["Income", "Total Min Payment"],
                    datasets: [
                        {
                            label: "Monthly",
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
        /*
        ** Display format
        **
        */
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
        /*
        ** Date Picker
        */
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
            this.waktuBayar = this.formatDateForDisplay(
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
            return this.waktuBayar ===
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
            this.waktuBayar = this.formatDateForDisplay(
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

    Alpine.store("edit", () => ({
        namaHutang: null,
        waktuBayar: null,
        jmlHutang: null,
        bungaHutang: null,
        minBayar: null,
        monthlySalary: null,
        extraPayment: null,
        calculated: true,
        messages: null,
        monthlySalary: null,
        extraPayment: null,
        showMinierrrorAlert: false,
        // ambilData: [],
        async ubah(id) {
            this.isLoading = true;
            localStorage.setItem("tab", "editHitungan");

            // fetching debt with id
            await fetch("http://127.0.0.1:8000/api/debt/show/" + id, {
                method: "GET",
                headers: {
                    Authorization: `Bearer ${localStorage.getItem("token")}`,
                    "Content-type": "application/json; charset=UTF-8",
                },
            })
            .then((response) => response.json())
            .then((data) => {
                if (data.status == true) {
                    // get data from response JSON
                    this.ambilData = data.data;
                    this.posts = data.data.detail;
                    this.isLoading = false;
                }
                if (data.status == false) {
                    // if fetching failed send message error
                    this.validation = data.error;
                }
                this.messages = data.message;
                this.timeNotif();
            });
        },
        async editData(id) {
            // initiate variable form to contain debt data
            var form = {
                debt_name: [],
                debt_amount: [],
                payment_date: [],
                interest_rate: [],
                monthly_payment: [],

                debt_total: this.hasil.hasil.debt_total,
                total_min_payment: this.hasil.hasil.total_min_payment,
                monthly_salary: this.hasil.hasil.monthly_salary,
                extra_payment: this.hasil.hasil.extra_payment,
                normal_method: this.hasil.hasil.normal_method,
                snowball_method: this.hasil.hasil.snowball_method,
            };

            // get debt detail and put it to form variable
            for (let i = 0; i < this.hasil.hutang.length; i++) {
                form.debt_name.push(this.hasil.hutang[i].debt_name);
                form.debt_amount.push(this.hasil.hutang[i].debt_amount);
                form.payment_date.push(this.hasil.hutang[i].payment_date);
                form.interest_rate.push(this.hasil.hutang[i].interest_rate);
                form.monthly_payment.push(
                    this.hasil.hutang[i].monthly_payment
                );
            }

            this.calculated = true;
            this.isLoading = true;

            // fetching and sending form with post request
            fetch("http://127.0.0.1:8000/api/debt/update/" + id, {
                method: "POST",
                body: JSON.stringify(form),
                headers: {
                    Authorization: `Bearer ${localStorage.getItem("token")}`,
                    "Content-type": "application/json; charset=UTF-8",
                },
            })
            .then(async (response) => await response.json())
            .then( (data) => {
                if (data.status == true) {
                    this.calculated = !this.calculated;

                    // change to show list hitungan
                    localStorage.setItem("tab", "listHitungan");
                    this.listData();
                    this.isLoading = false;
                }
                if (data.status == false) {
                    // if fetching failed send message error
                    this.validation = data.error;
                }

                // send message if have
                this.messages = data.message;
                this.timeNotif();
            });
        },
        async hitungedit(id) {
            var alert = [];
            var stop = false;

            // initiate array to contain debt detail
            var debtName = [];
            var debtAmount = [];
            var paymentDate = [];
            var interestRate = [];
            var monthlyPayment = [];

            // get data using class name
            var namaHutang = document.getElementsByClassName("namaHutang");
            var jmlHutang = document.getElementsByClassName("jmlHutang");
            var bungaHutang = document.getElementsByClassName("bungaHutang");
            var waktuBayar = document.getElementsByClassName("waktuBayar");
            var minBayar = document.getElementsByClassName("minBayar");
            var monthlySalary = document.getElementsByClassName("monthlySalary")[0].value;
            var extraPayment = document.getElementsByClassName("extraPayment")[0].value;

            // looping debt detail
            for (let i = 0; i < namaHutang.length; i++) {

                // check form if have null value
                if (namaHutang[i].value === "") {
                    document.getElementsByClassName("nama")[i].innerHTML = `<div class="bottom2">Debt name cannot be empty<i></i></div>`;
                    stop = true;
                }else{
                    document.getElementsByClassName("nama")[i].innerHTML = "";
                }
                if (jmlHutang[i].value === "") {
                    document.getElementsByClassName("jml")[i].innerHTML = `<div class="bottom2">Debt Amount cannot be empty<i></i></div>`;
                    stop = true;
                }else{
                    document.getElementsByClassName("jml")[i].innerHTML = "";
                }
                if (bungaHutang[i].value === "") {
                    document.getElementsByClassName("bunga")[i].innerHTML = `<div class="bottom2">Debt interest cannot be empty<i></i></div>`;
                    stop = true;
                }else{
                    document.getElementsByClassName("bunga")[i].innerHTML = "";
                }
                if (waktuBayar[i].value === "") {
                    document.getElementsByClassName("waktu")[i].innerHTML = `<div class="bottom2">Due date cannot be empty<i></i></div>`;
                    stop = true;
                }else{
                    document.getElementsByClassName("waktu")[i].innerHTML = "";
                }
                if (minBayar[i].value === "") {
                    document.getElementsByClassName("min")[i].innerHTML = `<div class="bottom2">tanggal hutang tidak boleh kosong<i></i></div>`;
                    stop = true;
                }else{
                    document.getElementsByClassName("min")[i].innerHTML = "";
                }
                // push data to variable array
                debtName.push(namaHutang[i].value);
                debtAmount.push(jmlHutang[i].value);
                paymentDate.push(waktuBayar[i].value);
                interestRate.push(bungaHutang[i].value);
                monthlyPayment.push(minBayar[i].value);
                this.autoCloseValidation(i);

            }

            // if form have null value then stop
            if (stop) {
                return;
            }

            // put variable array debt data to varible form
            const form = {
                debt_name: debtName,
                debt_amount: debtAmount,
                interest_rate: interestRate,
                payment_date: paymentDate,
                monthly_payment: monthlyPayment,
                monthly_salary: parseInt(monthlySalary),
                extra_payment: parseInt(extraPayment),
            };

            // fetching and sending form with post request
            await fetch("http://127.0.0.1:8000/api/debt/hitung", {
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

                    // contain response JSON to hasil
                    this.hasil = data.data;

                    this.id = id;
                    this.calculated = !this.calculated;
                }
                if (data.status == false) {

                    // get message failed fetching
                    this.messages = data.message;
                    this.validation = data.error;
                    this.showMinierrrorAlert = true;
                    setTimeout(() => {
                        this.showMinierrrorAlert = false;
                    }, 4500);
                }
                this.isLoading = false;
                this.messages = data.message;
                this.timeNotif();
            });
        },
    }));
});
