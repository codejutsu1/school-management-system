<div>
    <section class="bg-gray-50 dark:bg-gray-900">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl text-center font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Complete your profile
                    </h1>
                    <form class="space-y-4 md:space-y-6" wire:submit.prevent="submit">
                        <div>
                            <label for="dob" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date of Birth</label>
                            <input wire:model.debounce.500ms="firstName" type="date" id="dob" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="First Name" required autofocus>
                            @error('firstName') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label for="lga" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">State</label>
                            <select wire:model.lazy="state" id="class" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                <option value="" selected="selected" disabled>~ State of Origin ~</option>
                                <option value="jss1">Alabama</option>
                                <option value="jss2">Ohio</option>
                                <option value="jss3">California</option>
                                <option value="sss1">Texas</option>
                                <option value="sss2">Florida</option>
                                <option value="sss3">Las Vegas</option>
                            </select>
                            @error('middleName') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label for="lga" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">LGA</label>
                            <select wire:model.lazy="lga" id="class" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                <option value="" selected="selected" disabled>~ LGA ~</option>
                                <option value="jss1">North Alabama</option>
                                <option value="jss2">East Ohio</option>
                                <option value="jss3">West California</option>
                                <option value="sss1">South Texas</option>
                                <option value="sss2">North Florida</option>
                                <option value="sss3">East Las Vegas</option>
                            </select>
                            @error('middleName') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label for="religion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Religion</label>
                            <input wire:model.debounce.500ms="lastName" type="text" id="religion" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Last Name" required="">
                            @error('lastName') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        
                        <button type="submit" class="w-full text-white bg-purple-600 hover:bg-purple-700 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-purple-700 dark:focus:ring-primary-800">Create Student</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
