<div class="bg-[#F7D3C2] w-11/12 hidden md:block lg:block h-fit md:ml-4 lg:ml-4 rounded-md lg:rounded-[15px] shadow-sm hover:shadow-md transition-shadow duration-300 ease-in-out">
    <div class="flex flex-row px-5 py-5 align-middle border-b-2">
        <h6 class="ml-5 text-xl font-bold text-blueGray-700">Additional</h6>
    </div>
    <div class="flex flex-row flex-wrap lg:flex-col">
         <!-- Monthly Salary -->
        <div class="flex flex-row items-center justify-between w-full px-3 py-4 border-b-2 group">
            <div class="flex justify-center w-12 mr-2">
                <i class="fa-solid fa-circle-dollar-to-slot"></i>
            </div>
            <div class="relative flex items-center justify-between w-full">
                <input x-model="monthlySalary" id="monthlySalary" class="text-transparent bg-transparent focus:text-black/30 form-input z-10 peer block w-full appearance-none px-3 pt-2 placeholder:!bg-transparent transition duration-150 ease-in-out align-text-bottom sm:text-md sm:leading-1 focus:border-none focus:outline-none border-0 text-left outline-none focus-visible:ring-0" type="number" min="0" step="100" placeholder=" ">
                <label class="absolute break-words text-ellipsis top-2 origin-[0] max-w-[85%] sm:w-max md:w-max lg:w-max -translate-y-4 scale-80 transform text-md font-semibold text-green-800  duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-7 peer-focus:w-full peer-focus:scale-75 peer-focus:text-myblue">Monthly Income <span class="text-xs text-green-600">($)</span></label>
            </div>
            <div x-show="monthlySalary" class="absolute right-0 w-10/12 mr-4 font-bold text-right truncate" x-money.en-US.USD.decimal="monthlySalary"></div>
        </div>
        <!-- Extra Monthly Payment -->
        <div class="flex flex-row items-center justify-between w-full px-3 py-4 group">
            <div class="flex justify-center w-12 mr-2">
                <i class="fa-solid fa-money-bill-1-wave"></i>
            </div>
            <div class="relative flex items-center justify-between w-full">
                <input x-model="extraSalary" class="text-transparent bg-transparent focus:text-black/30 form-input z-10 peer block w-full appearance-none px-3 pt-2 placeholder:!bg-transparent transition duration-150 ease-in-out align-text-bottom sm:text-md sm:leading-1 focus:border-none focus:outline-none border-0 text-left outline-none focus-visible:ring-0" type="number" min="0" step="100" placeholder=" ">
                <label class="absolute break-words text-ellipsis top-3 leading-none origin-[0] max-w-[90%] sm:w-max md:w-max lg:w-max -translate-y-4 scale-80 transform text-md font-semibold text-green-800 duration-300 peer-placeholder-shown:-top-2 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-7 peer-focus:w-full peer-focus:scale-75 peer-focus:text-myblue">Extra Monthly Payment <span class="text-xs text-green-600">($)</span></label>
            </div>
            <div x-show="extraSalary" class="absolute right-0 w-10/12 mr-4 font-bold text-right truncate" x-money.en-US.USD.decimal="extraSalary"></div>
        </div>
    </div>
</div>
