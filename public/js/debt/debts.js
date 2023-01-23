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
        isLoading: false,
        addDebt() {
            this.posts.push('');
            console.log(this.posts)
        },
        removeDebt(index) {
            this.posts.splice(index, 1);
        },
        async cekInput(val){
            i
        },
        async hitung() {
            var alert=''
            var debtTitle = [];
            var debtAmount = [];
            var debtInterest = [];
            var monthlyInstallments = [];
            var namaHutang = document.getElementsByClassName("namaHutang");
            var jmlHutang = document.getElementsByClassName("jmlHutang");
            var bungaHutang = document.getElementsByClassName("bungaHutang");
            var minBayar = document.getElementsByClassName("minBayar");
            for (let i = 0; i < namaHutang.length; i++) {
                if (namaHutang[i].value === '') {
                    alert += "nama hutang, "
                }
                if (jmlHutang[i].value === '') {
                    alert += "jumlah hutang, "                   
                }
                if (bungaHutang[i].value === '') {
                    alert += "bunga hutang, "
                }
                if (minBayar[i].value === '') {
                    alert += "minmal bayar hutang "                   
                }
                if (alert !== '') {
                    document.getElementById(`alert${i}`).innerHTML = alert + 'tidak boleh kosong'
                    return;
                }else{
                    document.getElementById(`alert${i}`).innerHTML = ""
                }

                debtTitle.push(namaHutang[i].value);
                debtAmount.push(parseInt(jmlHutang[i].value));
                debtInterest.push(parseInt(bungaHutang[i].value));
                monthlyInstallments.push(parseInt(minBayar[i].value));
            }

            const form = {
                debtTitle: debtTitle,
                debtAmount: debtAmount,
                debtInterest: debtInterest,
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
                    this.messages = data.message;
                    console.log(this.messages)
                });
        },
        async charts (pendapatan, pembayaran){
            const ctx = document.getElementById('hasilChart');

            new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ['Pendapatan', 'Total Min Bayar'],
                    datasets: [{
                        label: 'Perbulan',
                        data: [pendapatan,pembayaran],
                        backgroundColor: [
                            'rgb(42, 124, 151)',
                            'rgb(254, 159, 87)'
                        ],
                        hoverOffset: 7
                    }],
                },
            });
        },
        async tambahData() {
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
                .then((reponse) => reponse.json())
                .then((data) => {
                    if (data.status == true) {
                        console.log(data);
                        window.location.replace(
                            "http://127.0.0.1:8001/dashboard"
                        );
                        localStorage.setItem('tab', 'listHitungan');
                    }
                    if (data.status == false) {
                        this.validation = data.error;
                    }
                    this.messages = data.message;
                });
        },
        async listData() {
            this.isLoading = true;

            this.calculated = true;
            fetch("http://127.0.0.1:8000/api/debt-payment/list", {
                method: "GET",
                headers: {
                    Authorization: `Bearer ${localStorage.getItem("token")}`,
                    "Content-type": "application/json; charset=UTF-8",
                },
            })
                .then((reponse) => reponse.json())
                .then((data) => {
                    if (data.success == true) {
                        this.list = data.data;
                        //console.log(this.list);
                    }
                    if (data.status == false) {
                        this.validation = data.error;
                    }
                    this.messages = data.message;
                    this.isLoading = false;
                });

        },
        async deleted(id) {
            console.log(id);
            fetch("http://127.0.0.1:8000/api/debt/delete/" + id, {
                method: "GET",
                headers: {
                    Authorization: `Bearer ${localStorage.getItem("token")}`,
                    "Content-type": "application/json; charset=UTF-8",
                },
            })
            .then((reponse) => reponse.json())
            .then((data) => {
                if (data.status == true) {
                    window.location.reload();
                }
                if (data.status == false) {
                    this.validation = data.error;
                }
                this.messages = data.message;
            });
        },
        formatUang(params) {

            var data = Number (params)
            let USDollar = new Intl.NumberFormat('en-US', {
                style: 'currency',
                currency: 'USD',
            });
            return USDollar.format(data).replace(/.00$/, '');
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
        textTitile (params){
            for (let i = 0; i < params.length; i++) {
                this.title.push(params[0].debtTitle)
            }
            console.log(this.title);
        }
    }));

    Alpine.store("getData", () => ({
        calculated: true,
        mountlySalary: null,
        extraSalary: null,
        // ambilData: [],
        html: `

                <div class="flex flex-row px-5 py-5 align-middle border-b-2">
                    <h6 class="ml-5 text-xl font-bold text-blueGray-700">Hutang <span x-text="index+1"></span></h6>
                </div>
                <div class="flex flex-row items-center px-3 py-4 border-b-2">
                    <div class="flex justify-center w-12 mr-2">
                        <img class="invert" src="/img/1.svg" alt="" class="h-5">
                    </div>
                    <div class="relative flex items-center justify-between w-full"><p class="text-base text-dark">Nama Hutang</p>
                        <input class="namaHutang form-input w-full absolute appearance-none inline border-0 text-right outline-none placeholder:!bg-transparent bg-transparent transition
                        duration-150 ease-in-out sm:text-sm sm:leading-5 focus:border-none focus:outline-none focus-visible:ring-0" type="text" placeholder="KPR" x-bind:value="ambilData.detail[index].debtTitle">
                    </div>
                </div>
                <div class="flex flex-row items-center px-3 py-4 border-b-2">
                    <div class="flex justify-center w-12 mr-2">
                        <img class="invert" src="/img/moneys.svg" alt="" class="h-5">
                    </div>
                    <div class="relative flex items-center justify-between w-full">
                        <p class="text-base text-dark">Jumlah Hutang <span class="text-xs text-gray-400">($)</span></p>
                        <input class="jmlHutang form-input w-full absolute appearance-none inline border-0 outline-none
                        placeholder:!bg-transparent bg-transparent transition duration-150 ease-in-out sm:text-sm sm:leading-5
                        focus:border-none focus:outline-none text-right focus-visible:ring-0" type="number" min="0" max="" step="100" placeholder="500000" x-bind:value="ambilData.detail[index].debtAmount">
                    </div>
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
                .then((reponse) => reponse.json())
                .then((data) => {
                    if (data.status == true) {
                        console.log(data);
                        localStorage.setItem("tab", "listHitungan");
                        window.location.replace(
                            "http://127.0.0.1:8001/dashboard"
                        );
                    }
                    if (data.status == false) {
                        this.validation = data.error;
                    }
                    this.messages = data.message;
                });
        },
        async hitungedit(id) {
            
            var debtTitle = [];
            var debtAmount = [];
            var debtInterest = [];
            var monthlyInstallments = [];
            var namaHutang = document.getElementsByClassName("namaHutang");
            var jmlHutang = document.getElementsByClassName("jmlHutang");
            var bungaHutang = document.getElementsByClassName("bungaHutang");
            var minBayar = document.getElementsByClassName("minBayar");
            var monthlySalary = document.getElementsByClassName("monthlySalary")[0].value;            
            var extraSalary = document.getElementsByClassName("extraSalary")[0].value;
            

            for (let i = 0; i < namaHutang.length; i++) {
                
                debtTitle.push(namaHutang[i].value);
                debtAmount.push(jmlHutang[i].value);
                debtInterest.push(bungaHutang[i].value);
                monthlyInstallments.push(minBayar[i].value);
            }

            const form = {
                debtTitle: debtTitle,
                debtAmount: debtAmount,
                debtInterest: debtInterest,
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
