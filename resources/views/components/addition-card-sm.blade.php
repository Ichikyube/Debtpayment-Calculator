<div class="h-screen">
    <div class="bg-[#F7D3C2] w-11/12 mx-4 snap-start snap-always block md:hidden lg:hidden h-fit md:ml-4 lg:ml-4 rounded-md lg:rounded-[15px] shadow-sm hover:shadow-lg mb-8 transition-shadow duration-300 ease-in-out">
        <div class="flex flex-row px-5 py-5 align-middle border-b-2">
            <h6 class="ml-5 text-xl font-bold text-blueGray-700">Additional</h6>
        </div>

        <div class="flex flex-row flex-wrap lg:flex-col">
            <!-- Monthly Salary -->
            <div class="flex items-center justify-between px-3 py-4 text-center border-b-2">
                <div class="flex justify-center w-6 mr-2">
                    <i class="fa-solid fa-circle-dollar-to-slot"></i>
                </div>
                <div class="relative flex items-center w-fit">
                    <input x-model="monthlySalary" id="monthlySalary" class="text-transparent bg-transparent focus:text-black/30 form-input z-10 peer block w-full appearance-none px-3 pt-5 placeholder:!bg-transparent transition duration-150 ease-in-out align-text-bottom text-md leading-1 focus:border-none focus:outline-none border-0 text-left outline-none focus-visible:ring-0" type="number" min="0" step="100" placeholder=" ">
                    <label for="monthlySalary" class="absolute break-words text-left text-ellipsis top-3 origin-[0] max-w-[85%] w-max -translate-y-4 scale-80 transform text-md text-dark duration-300 peer-placeholder-shown:-top-2 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-7 peer-focus:w-full peer-focus:scale-75 peer-focus:text-myblue">Monthly Income <span class="text-xs text-green-600">($)</span></label>
                    <div class="mr-4 font-bold text-right" x-money.en-US.USD.decimal="monthlySalary"></div>
                </div>
            </div>
            <!-- Extra Monthly Payment -->
            <div class="flex items-center justify-between px-3 py-4 text-center">
                <div class="flex justify-center w-6 mr-2">
                    <i class="fa-solid fa-money-bill-1-wave"></i>
                </div>
                <div class="relative flex items-center w-fit">
                    <input x-model="extraSalary" class="form-input peer text-transparent focus:text-black/30 z-10 pt-5 align-text-bottom text-left bg-transparent block w-full appearance-none px-3 border-0 outline-none
                    placeholder:!bg-transparent transition duration-150 ease-in-out text-md leading-1 focus:border-none focus:outline-none focus-visible:ring-0" type="number" min="0" step="100" placeholder=" ">
                    <label for="extraSalary" class="absolute break-words leading-none text-ellipsis top-3 origin-[0] max-w-[90%] w-max -translate-y-4 scale-80 transform text-md text-left text-dark duration-300 peer-placeholder-shown:-top-2 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-7 peer-focus:w-full peer-focus:scale-75 peer-focus:text-myblue">Extra Monthly Payment <span class="text-xs text-green-600">($)</span></label>
                    <div class="mr-4 font-bold text-right" x-money.en-US.USD.decimal="extraSalary"></div>
                </div>
            </div>
        </div>
    </div>
</div>
