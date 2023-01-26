<div x-data="app()" x-init="[initDate(), getNoOfDays()]" x-cloak   class="relative z-50 flex items-center justify-between w-full group">
    <input type="hidden" name="date" x-ref="date" :value="datepickerValue" class="hidden waktuBayar" placeholder=" " >
    <input type="text" x-on:click="initDate(datepickerValue), showDatepicker = !showDatepicker" x-model="datepickerValue"
        x-on:keydown.escape="showDatepicker = false"
        class="leading-none mix-blend-multiply  form-input z-50 peer bg-white/10 text-white/30 focus:text-dark block w-full appearance-none px-3 border-0 text-left outline-none
        placeholder:!bg-transparent transition duration-150 ease-in-out align-text-bottom sm:text-sm sm:leading-1 focus:border-none focus:outline-none
        focus-visible:ring-0"
        placeholder="Select date" />
    <label class="absolute top-5 -z-10 origin-[0] sm:w-max md:w-max lg:w-max -translate-y-4 scale-80 transform text-sm text-dark duration-300
    peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-10 w-40 break-words text-ellipsis
    peer-focus:scale-75 peer-focus:text-myblue">Tanggal Pembayaran Selanjutnya <i class="fa-solid fa-calendar-day"></i></label>
    <div class="absolute right-0 w-10/12 mr-4 text-right truncate"  x-text="new Date(datepickerValue).toLocaleDateString('default', { weekday: 'long', year: 'numeric', month: 'short', day: 'numeric' })"></div>
    <div class="absolute top-0 left-0 p-4 mt-12 bg-white rounded-lg shadow" style="width: 17rem"
        x-show.transition="showDatepicker" @click.away = "showDatepicker = false">
        <div class="flex items-center justify-between mb-2">
            <div>
                <span x-text="MONTH_NAMES[month]" class="text-lg font-bold text-gray-800"></span>
                <span x-text="year" class="ml-1 text-lg font-normal text-gray-600"></span>
            </div>
            <div>
                <button type="button"
                    class="inline-flex p-1 transition duration-100 ease-in-out rounded-full cursor-pointer focus:outline-none focus:shadow-outline hover:bg-gray-100"
                    @click="if (month == 0) {
                                    year--;
                                    month = 12;
                                } month--; getNoOfDays()">
                    <svg class="inline-flex w-6 h-6 text-gray-400" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
                <button type="button"
                    class="inline-flex p-1 transition duration-100 ease-in-out rounded-full cursor-pointer focus:outline-none focus:shadow-outline hover:bg-gray-100"
                    @click="if (month == 11) {
                                    month = 0;
                                    year++;
                                } else {
                                    month++;
                                } getNoOfDays()">
                    <svg class="inline-flex w-6 h-6 text-gray-400" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5l7 7-7 7" />
                    </svg>
                </button>
            </div>
        </div>

        <div class="flex flex-wrap mb-3 -mx-1">
            <template x-for="(day, index) in DAYS" :key="index">
                <div style="width: 14.26%" class="px-0.5">
                    <div x-text="day" class="text-xs font-medium text-center text-gray-800"></div>
                </div>
            </template>
        </div>

        <div class="flex flex-wrap -mx-1">
            <template x-for="blankday in blankdays">
                <div style="width: 14.28%" class="p-1 text-sm text-center border border-transparent"></div>
            </template>
            <template x-for="(date, dateIndex) in no_of_days" :key="dateIndex">
                <div style="width: 14.28%" class="px-1 mb-1">
                    <div @click="getDateValue(date)" x-text="date"
                        class="text-sm leading-none leading-loose text-center transition duration-100 ease-in-out rounded-full cursor-pointer"
                        :class="{
            'bg-indigo-200': isToday(date) == true,
            'text-gray-600 hover:bg-indigo-200': isToday(date) == false && isSelectedDate(date) == false,
            'bg-indigo-500 text-white hover:bg-opacity-75': isSelectedDate(date) == true
        }"></div>
                </div>
            </template>
        </div>
    </div>

    <script>
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

        function app() {
            return {
                showDatepicker: false,
                datepickerValue: "",
                selectedDate: "",
                dateFormat: "YYYY-MM-DD",
                month: "",
                year: "",
                no_of_days: [],
                blankdays: [],
                initDate(newDate) {
                    let today;
                    if (newDate) {
                        this.selectedDate = newDate;
                        console.log(newDate)
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
            };
        }

    </script>
</div>
