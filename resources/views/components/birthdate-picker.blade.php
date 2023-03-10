@props([
    'ddate' => '',
    'dateFormat'=> 'YYYY-MM-DD'
])

<div x-data="{
    showDatepicker: false,
    selectedDate: '',
    dateFormat: '{{$dateFormat}}',
    month: '',
    year: '',
    day: '',
    maxYear: new Date().getFullYear(),
    maxMonth: new Date().getMonth(),
    maxDate: new Date().getDate(),
    today:'',
    no_of_days: [],
    blankdays: [],
    targetDate: '{{ $ddate }}',
    }" x-init="[getNoOfDays(), initDate({{$ddate}}), today = maxYear + '-' + maxMonth + '-' + maxDate ]" x-cloak x-id="['date-input']"  class="relative z-50 flex items-center justify-between w-full group">
    <input type="hidden" name="date" x-ref="dateBirth" :value="targetDate" class="hidden" placeholder=" " >
    <div x-text="console.log(today)"></div>
    <input type="date" max="today" x-on:click="initDate(targetDate), showDatepicker = !showDatepicker, {{ $ddate }} = $refs.dateBirth.value" x-model="targetDate"
        x-on:keydown.escape="showDatepicker = false"
        class="leading-none mix-blend-multiply form-input z-50 peer bg-transparent text-transparent focus:text-dark block w-full appearance-none px-3 border-0 text-left outline-none
        placeholder:!bg-transparent transition duration-150 ease-in-out align-text-bottom sm:text-sm sm:leading-1 focus:border-none focus:outline-none
        focus-visible:ring-0"
        placeholder="Select date" />
    <label class="absolute top-3 origin-[0] break-word sm:w-max md:w-max lg:w-max -translate-y-6 scale-75 transform text-lg
        bg-main text-dark duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0
        peer-focus:-translate-y-4 peer-focus:scale-75 peer-focus:text-myblue peer-focus:dark:text-blue-500">Date of Birth</label>

    {{-- alert --}}
    <div class="waktu"></div>
    <div class="absolute right-0 inline-block w-10/12 mr-4 font-bold text-right truncate align-text-bottom group-focus-within:text-transparent" x-text="new Date(targetDate).toLocaleDateString('default', { weekday: 'long', year: 'numeric', month: 'short', day: 'numeric' })"></div>
    <div :id="$id('date-input')" class="absolute top-0 left-0 p-4 mt-12 bg-white rounded-lg shadow" style="width: 17rem"
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
                            } month--;
                            getNoOfDays()">
                    <svg class="inline-flex w-6 h-6 text-gray-400" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
                <button type="button"
                    class="inline-flex p-1 transition duration-100 ease-in-out rounded-full cursor-pointer focus:outline-none focus:shadow-outline hover:bg-gray-100"
                    @click="
                                if (year == maxYear && month > (maxMonth)) {
                                    month = maxMonth;
                                }
                                if (month == 11) {
                                    month = 0;
                                    if(year<maxYear){
                                        year++;
                                    }
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
                        class="text-sm leading-loose text-center transition duration-100 ease-in-out rounded-full cursor-pointer"
                        :class="{
            'bg-indigo-200': isToday(date) == true,
            'text-gray-600 hover:bg-indigo-200': isToday(date) == false && isSelectedDate(date) == false,
            'bg-indigo-500 text-white hover:bg-opacity-75': isSelectedDate(date) == true
        }"></div>
                </div>
            </template>
        </div>
    </div>

</div>
