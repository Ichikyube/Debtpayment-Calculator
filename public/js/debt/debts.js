document.addEventListener("alpine:init", () => {
    Alpine.store("create", () => ({
        posts: [0],
        profile: null,
        calculated: false,
        dateNormal: "",
        dateSnowball: "",
        monthlySalary: 0,
        extraSalary: 0,
        hasil: [],
        list: [],
        ambilData: [],
        validation: [],
        messages: null,
        isLoading: false,
        idDebt: 0,
        addDebt() {
            this.posts.push("");
            console.log(this.posts);
        },
        removeDebt(index) {
            this.posts.splice(index, 1);
        },
        async hitung() {
            var alert=[]
            var stop = false
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
                if (jmlHutang[i].value === '') {
                    temp += "jumlah hutang, "
                }
                if (bungaHutang[i].value === "") {
                    temp += "bunga hutang, ";
                }
                if (minBayar[i].value === '') {
                    temp += "minmal bayar hutang "
                }
                if (temp !== '') {
                    temp += 'tidak boleh kosong'
                    alert.push(temp)
                    // document.getElementById(`alert${i}`).innerHTML = alert + 'tidak boleh kosong'
                }else{
                    alert.push(temp)
                }
                debtTitle.push(namaHutang[i].value);
                debtAmount.push(parseInt(jmlHutang[i].value));
                datePayment.push(waktuBayar[i].value);
                debtInterest.push(parseInt(bungaHutang[i].value));
                monthlyInstallments.push(parseInt(minBayar[i].value));
            }

            for (let i = 0; i < alert.length; i++){
                if (alert[i] !== '' ) {
                    document.getElementById(`alert${i}`).innerHTML = alert[i]
                    stop = true
                }else{
                    document.getElementById(`alert${i}`).innerHTML = ''
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
                .then((reponse) => reponse.json())
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
                .then(async(reponse) => await reponse.json())
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
                // console.log(this.messages)


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
                .then(async (reponse) => await reponse.json())
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
        async tambahData() {
            this.isLoading = true;
            var form = {
                debtTitle: [],
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
                .then ( async (reponse) =>  await  reponse.json())
                .then((data) => {
                    if (data.status == true) {
                        this.listData();
                        this.calculated = !this.calculated;
                        localStorage.setItem('tab', 'listHitungan');
                        this.listData();

                    }
                    if (data.status == false) {
                        this.validation = data.error;
                        this.isLoading = false;
                    }
                    this.messages = data.message;
                    console.log(this.messages);
                    // console.log(this.messages)
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
                .then(async(reponse) => await reponse.json())
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
                // console.log(this.messages)


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
            .then( async (reponse) => await  reponse.json())
            .then(async (data) => {
                if (data.status == true) {
                    this.listData()
                }
                if (data.status == false) {
                    this.validation = data.error;
                }
                this.messages = data.message;

            });
            this.listData()
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
        calculated: true,
        mountlySalary: null,
        extraSalary: null,
        // ambilData: [],
        html: `<div x-id="['index']" x-bind:id="index ? 'hutang'+ index : ''" class="bg-[#F7D3C2] snap-start snap-always mx-4 mb-8 w-11/12 lg:w-full lg:max-w-full rounded-md lg:rounded-[15px]
        shadow-sm hover:shadow-xl transition-shadow duration-300 ease-in-out"  x-data="{namaHutang:"'alert'+index", jmlHutang:'', bungaHutang:'', minBayar:'', monthlySalary:''}">
        <div class="flex flex-row px-5 py-5 align-middle border-b-2">
            <input :id="$id('id')" x-ref="namaHutang" class="ml-5 text-xl font-bold border-0 appearance-none text-blueGray-700 outline-none
            placeholder:!bg-transparent bg-transparent focus:border-none focus:outline-none
            focus-visible:ring-0" type="text" x-bind:value="ambilData.detail[index].debtTitle">
            <p :id="'alert'+index"></p>
        </div>
        <div class="flex flex-row items-center justify-between w-full px-3 py-4 border-b-2">
            <div class="flex flex-row items-center">
                <div class="flex justify-center w-12 mr-2">
                    <i class="fa-regular fa-calendar-xmark"></i>
                </div>
                <div class="relative tanggalPembayaran flex items-center justify-between w-fit">
                    <input x-model="tanggalPembayaran" x-ref="tanggalPembayaran"  class="namaHutang form-input z-10 peer bg-white/10 text-white/30 focus:text-dark block w-full appearance-none px-3 pt-5  border-0 text-left outline-none
                    placeholder:!bg-transparent transition duration-150 ease-in-out align-text-bottom sm:text-sm sm:leading-1 focus:border-none focus:outline-none
                    focus-visible:ring-0" type="date" placeholder=" " >
                    <label class="absolute top-3 origin-[0] break-words sm:w-max md:w-max lg:w-max -translate-y-4 scale-80 transform text-sm text-dark duration-300
                    peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-4
                    peer-focus:scale-75 peer-focus:text-myblue peer-focus:dark:text-blue-500">Tanggal Pembayaran Selanjutnya</label>
                </div>
            </div>
            <div class="mr-4 text-right"  x-text="new Date(jatuhTemo).toLocaleDateString('default', { weekday: 'long', year: 'numeric', month: 'short', day: 'numeric' })"></div>
        </div>
        <div class="flex items-center justify-between w-full px-3 py-4 border-b-2">
            <div class="flex flex-row items-center">
                <div class="flex justify-center w-12 mr-2">
                    <i class="fa-solid fa-coins"></i>
                </div>
                <div class="relative flex items-center justify-between w-fit">
                    <input :id="$id('id')" x-ref="tanggalPembayaran" class="jmlHutang text-white/30 focus:text-black form-input z-10 peer bg-white/10 block w-full appearance-none px-3 pt-5  border-0 text-left outline-none
                    placeholder:!bg-transparent transition duration-150 ease-in-out align-text-bottom sm:text-sm sm:leading-1 focus:border-none focus:outline-none
                    focus-visible:ring-0" type="number" min="0" max="" step="100" placeholder=" " x-bind:value="ambilData.detail[index].debtAmount">
                    <label class="absolute top-3 origin-[0]  break-word sm:w-max md:w-max lg:w-max -translate-y-4 scale-100 transform text-sm text-dark duration-300
                    peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-125 peer-focus:left-0 peer-focus:-translate-y-4
                    peer-focus:scale-75 peer-focus:text-myblue peer-focus:dark:text-blue-500">Jumlah Hutang <span class="text-xs text-green-600">($)</span>
                    </label>
                </div>
            </div>
            <div class="mr-4 text-right" x-money.en-US.USD.decimal="jmlHutang"></div>
        </div>

        <div class="flex flex-row items-center justify-between w-full px-3 py-4 border-b-2">
            <div class="flex flex-row items-center w-1/2">
                <div class="flex justify-center w-12 mr-2">
                    <i class="fa-solid fa-percent"></i>
                </div>
                <div class="relative flex items-center justify-between w-fit">
                    <input x-model="bungaHutang" x-ref="bungaHutang" class="bungaHutang text-white/30 focus:text-black form-input z-10 peer bg-white/10 block w-full appearance-none pt-5  border-0 text-left outline-none
                    placeholder:!bg-transparent transition duration-150 ease-in-out align-text-bottom sm:text-sm sm:leading-1 focus:border-none focus:outline-none
                    focus-visible:ring-0" x-mask="99" placeholder=" " x-bind:value="ambilData.detail[index].debtInterest">
                    <label class="absolute top-3 truncate origin-[0] sm:w-max md:w-max lg:w-max -translate-y-4 scale-80 transform text-sm text-dark duration-300
                    peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-4
                    peer-focus:scale-75 peer-focus:text-myblue peer-focus:dark:text-blue-500">Suku Bunga Hutang <span class="text-xs text-green-600">(%)</span>
                    </label>
                </div>

                <div class="flex flex-row items-center px-3 py-4 border-b-2">
                    <div class="flex justify-center w-12 mr-2">
                        <img class="invert" src="/img/moneytime.svg" alt="" class="h-5">
                    </div>
                    <div class="relative flex items-center justify-between w-full">
                        <p class="text-base text-dark">Suku Bunga Hutang <span class="text-xs text-gray-400">(%)</span></p>
                        <input class="bungaHutang absolute w-full form-input appearance-none block px-3 border-0 text-right outline-none
                        placeholder:!bg-transparent bg-transparent transition duration-150 ease-in-out sm:text-sm
                        sm:leading-5 focus:border-none focus:outline-none focus-visible:ring-0" type="number" min="0" max="100" placeholder="15" x-bind:value="ambilData.detail[index].debtInterest">
                    </div>
                </div>

                <div class="flex flex-row items-center px-3 py-4">
                    <div class="flex justify-center w-12 mr-2">
                        <img class="invert" src="/img/moneysend.svg" alt="" class="h-5">
                    </div>
                    <div class="relative flex items-center justify-between w-full group">
                        <p class="text-base text-dark">Pembayaran minimum perbulan <span class="text-xs text-gray-400">($)</span></p>
                        <input name="minBayar" id="minBayar" class="minBayar absolute w-full form-input appearance-none block px-3 border-0 text-right outline-none
                        placeholder:!bg-transparent bg-transparent transition duration-150 ease-in-out sm:text-sm
                        sm:leading-5 focus:border-none focus:outline-none focus-visible:ring-0" type="number" min="10" step="100" placeholder="500" x-bind:value="ambilData.detail[index].monthlyInstallments">
                    </div>
                </div>`,
        async ubah(id) {
            fetch("http://127.0.0.1:8000/api/debt/" + id, {
                method: "GET",
                headers: {
                    Authorization: `Bearer ${localStorage.getItem("token")}`,
                    "Content-type": "application/json; charset=UTF-8",
                },
            })
                .then((reponse) => reponse.json())
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
            console.log(this.hasil.hasil.monthlySalary);
            for (let i = 0; i < this.hasil.hutang.length; i++) {
                form.debtTitle.push(this.hasil.hutang[i].debtTitle);
                form.debtAmount.push(this.hasil.hutang[i].debtAmount);
                form.datePayment.push(this.hasil.hutang[i].datePayment);
                form.debtInterest.push(this.hasil.hutang[i].debtInterest);
                form.monthlyInstallments.push(this.hasil.hutang[i].monthlyInstallments);
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
                .then((reponse) => reponse.json())
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
                });
        },
        async hitungedit(id) {
            var alert=[]
            var stop = false
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
            var monthlySalary = document.getElementsByClassName("monthlySalary")[0].value;
            var extraSalary = document.getElementsByClassName("extraSalary")[0].value;


            for (let i = 0; i < namaHutang.length; i++) {

                let temp=''
                if (namaHutang[i].value === '') {
                    temp += "nama hutang, "
                }
                if (jmlHutang[i].value === '') {
                    temp += "jumlah hutang, "
                }
                if (waktuBayar[i].value === "") {
                    temp += "waktu bayar, ";
                }
                if (minBayar[i].value === '') {
                    temp += "minmal bayar hutang "
                }
                if (temp !== '') {
                    temp += 'tidak boleh kosong'
                    alert.push(temp)
                    // document.getElementById(`alert${i}`).innerHTML = alert + 'tidak boleh kosong'
                }else{
                    alert.push(temp)
                }

                debtTitle.push(namaHutang[i].value);
                debtAmount.push(jmlHutang[i].value);
                datePayment.push(waktuBayar[i].value);
                debtInterest.push(bungaHutang[i].value);
                monthlyInstallments.push(minBayar[i].value);
            }

            for (let i = 0; i < alert.length; i++){
                if (alert[i] !== '' ) {
                    document.getElementById(`alert${i}`).innerHTML = alert[i]
                    stop = true
                }else{
                    document.getElementById(`alert${i}`).innerHTML = ''
                }
            }

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
                .then((reponse) => reponse.json())
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
                    // console.log(validation);
                });
        },
    }));
});
