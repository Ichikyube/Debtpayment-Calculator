document.addEventListener("alpine:init", () => {
    Alpine.store("create", () => ({
        calculated: true,
        mountlySalary: [],
        dateNormal: '',
        dateSnowball: '',
        html: `
        <div class="bg-[#F7D3C2] w-[600px] rounded-[30px] drop-shadow-md">
            <div class="flex flex-row align-middle border-b-2 px-5 py-5">
                <h6 class="text-xl font-bold text-blueGray-700 ml-5">Hutang</h6>
            </div>

            <div class="flex flex-row items-center border-b-2 py-2 px-3">
                <div class="flex justify-center w-12 mr-2">
                    <img src="/img/1.svg" alt="" class="h-5">
                </div>
                <div class="flex items-center justify-between w-full"><p class="text-base text-gray-400" class="text-base text-gray-400">Nama Hutang</p>
                    <input class="namaHutang form-input appearance-none block px-3 border-0 text-right outline-none placeholder:!bg-transparent bg-transparent transition duration-150 ease-in-out sm:text-sm sm:leading-5focus:border-none focus:outline-none focus-visible:ring-0" type="text" placeholder="Hutang KPR">
                    <p x-text="validation.debtTitle"></p>
                </div>
            </div>
        
            <div class="flex flex-row items-center border-b-2 py-2 px-3">
                <div class="flex justify-center w-12 mr-2">
                    <img src="/img/moneys.svg" alt="" class="h-5">
                </div>
                <div class="flex items-center justify-between w-full">
                    <p class="text-base text-gray-400">Jumlah Hutang</p>
                    <input class="jmlHutang form-input appearance-none block px-3 border-0 text-right outline-none
                    placeholder:!bg-transparent bg-transparent transition duration-150 ease-in-out sm:text-sm sm:leading-5
                    focus:border-none focus:outline-none focus-visible:ring-0" type="number" placeholder="500000">
                    <p x-text="validation.debtAmount"></p>
                </div>
            </div>

            <div class="flex flex-row items-center border-b-2 py-2 px-3">
                <div class="flex justify-center w-12 mr-2">
                    <img src="/img/moneytime.svg" alt="" class="h-5">
                </div>
                <div class="flex justify-between items-center w-full">
                    <p class="text-base text-gray-400">Suku Bunga Hutang</p>
                    <input class="bungaHutang form-input appearance-none block px-3 border-0 text-right outline-none placeholder:!bg-transparent bg-transparent transition duration-150 ease-in-out sm:text-sm sm:leading-5focus:border-none focus:outline-none focus-visible:ring-0" type="number" placeholder="15%">
                    <p x-text="validation.debtInterest"></p>
                </div>
            </div>

            <div class="flex flex-row items-center border-b-2 py-2 px-3">
                <div class="flex justify-center w-12 mr-2">
                    <img src="/img/moneysend.svg" alt="" class="h-5">
                </div>
                <div class="flex justify-between items-center w-full">
                    <p class="text-base text-gray-400">Pembayaran minimum perbulan</p>
                    <input class="minBayar form-input appearance-none block px-3 border-0 text-right outline-none placeholder:!bg-transparent bg-transparent transition duration-150 ease-in-out sm:text-sm sm:leading-5focus:border-none focus:outline-none focus-visible:ring-0" type="number" placeholder="500">
                    <p x-text="validation.monthlyInstallments"></p>
                </div>
            </div>

            <div class="flex justify-between text-center items-center py-3">
                <button @click="posts--" class="text-sm py-4 px-7 ml-4 font-bold text-red-500">
                    Cancel
                </button>
            </div>
        </div>`,
        mountlySalary: null,
        extraSalary: null,
        hasil: [],
        validation: [], 
        async hitung() {
            console.log(this.hasil);
            var debtTitle = [];
            var debtAmount = [];
            var debtInterest = [];
            var monthlyInstallments = [];
            var namaHutang = document.getElementsByClassName('namaHutang');
            var jmlHutang = document.getElementsByClassName('jmlHutang');
            var bungaHutang = document.getElementsByClassName('bungaHutang');
            var minBayar = document.getElementsByClassName('minBayar');
            var pendapatan = this.mountlySalary;
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
                mountlySalary: this.mountlySalary
            }

            // console.log(data);
            fetch("http://127.0.0.1:8000/api/hitung", {
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
                    // console.log(data);
                    this.hasil = data.data;

                    var date = new Date(data.data.hasil.normalCalculator);
                    var mount = date.toLocaleString('default', { month: 'long' });
                    var year = date.getFullYear();
                    this.dateNormal = mount + ', ' + year;

                    var date2 = new Date(data.data.hasil.snowballCalculator);
                    var mount = date2.toLocaleString('default', { month: 'long' });
                    var year = date2.getFullYear();
                    this.dateSnowball = mount + ', ' + year;
                    
                    // Chart
                    const ctx2 = document.getElementById('hasilChart');
        
                    // console.log(pendapatan);
                    new Chart(ctx2, {
                        type: 'doughnut',
                        data: {
                            labels: ['Pendapatan', 'Pembayaran'],
                            datasets: [{
                                label: ['Total Pendapatan', 'Total Min Pembayaran'],
                                data: [this.hasil.hasil.mountlySalary, this.hasil.hasil.totalMinPayment],
                                backgroundColor: [
                                    'rgb(54, 162, 235)',
                                    'rgb(255, 4, 4, 1)'
                                ],
                                borderWidth: 1,
                                borderColor: 'rgb(93, 56, 219)',
                                hoverOffset: 7
                            }]
                        },
                        options: {
                            responsive: true,
                            plugins: {
                                    legend: {
                                        display: true,
                                        maxWidth: 700,
                                        align: 'center',
                                        padding: 25,
                                        labels: {
                                            color: 'rgb(56, 57, 64)',
                                            boxHeight: 10,
                                            boxWidth:10,
                                            padding: 20,
                                            textAlign:'left',
                                            font: {
                                                    size: 14,
                                                    weight: 'bolder'
                                                }
                                        }
                                    }
                                },
                            layout: {
                                autoPadding: true
                            },
                            scales: 50
                        }
                    });
                    
                    this.calculated = false;
                }
                if (data.status == false) {
                    this.validation = data.error;
                }
                this.messages = data.message;
            });


        },
        async tambahData(){
            var form = {
                debtTitle: [],
                debtAmount: [],
                debtInterest: [],
                monthlyInstallments: [],

                totalDebt: this.hasil.hasil.totalDebt,
                totalMinPayment: this.hasil.hasil.totalMinPayment,
                mountlySalary: this.hasil.hasil.mountlySalary,
                extraSalary: this.hasil.hasil.extraSalary,
                normalCalculator: this.hasil.hasil.normalCalculator,
                snowballCalculator: this.hasil.hasil.snowballCalculator,
            }
            for (let i = 0; i < this.hasil.hutang.length; i++) {
                form.debtTitle.push(this.hasil.hutang[i].debtTitle);
                form.debtAmount.push(this.hasil.hutang[i].debtAmount);
                form.debtInterest.push(this.hasil.hutang[i].debtInterest);
                form.monthlyInstallments.push(this.hasil.hutang[i].monthlyInstallments);
            }

            console.log(form);
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
                    window.location.replace("http://127.0.0.1:8001/dashboard");
                }
                if (data.status == false) {
                    this.validation = data.error;
                }
                this.messages = data.message;
            });
        }
    }));
});



