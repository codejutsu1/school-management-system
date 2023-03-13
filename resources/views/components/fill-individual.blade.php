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
                            <label for="gender" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gender</label>
                            <select wire:model.lazy="gender" id="gender" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                <option value="" selected="selected" disabled>~ Gender ~</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select> 
                            @error('gender') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label for="dob" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date of Birth</label>
                            <input wire:model.debounce.500ms="dob" type="date" id="dob" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="First Name" required autofocus>
                            @error('dob') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label for="lga" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">State</label>
                            <select wire:model.lazy="state" id="class" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                <option value="" selected="selected" disabled>~ State of Origin ~</option>
                                @foreach($states as $state)
                                    <option value="{{ $state->name }}">{{ $state->name }}</option>
                                @endforeach
                            </select>
                            @error('state') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label for="lga" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">LGA</label>
                            <select wire:model.lazy="lga" id="class" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                <option value="" selected="selected" disabled>~ LGA ~</option>
                                @foreach($lgas as $lg)
                                    @foreach($lg->lgas as $lga)
                                        <option value="{{ $lga }}">{{ $lga }}</option>
                                    @endforeach
                                @endforeach
                            </select>
                            @error('lga') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label for="religion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Religion</label>
                            <input wire:model.debounce.500ms="religion" type="text" id="religion" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Religion" required="">
                            @error('religion') <span class="error">{{ $message }}</span> @enderror
                        </div>            
                        <div>
                            <label for="curriculum" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Extra Curriculum Activity</label>
                            <select wire:model.lazy="curricula" id="curriculum" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                <option value="" selected="selected" disabled>~ Choose one ~</option>
                                @foreach($curriculum as $curricula)
                                    <option value="{{ $curricula }}">{{ $curricula }}</option>
                                @endforeach
                            </select>
                            @error('curriculum') <span class="error">{{ $message }}</span> @enderror
                        </div>            
                        <button type="submit" class="w-full text-white bg-purple-600 hover:bg-purple-700 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-purple-700 dark:focus:ring-primary-800">Update Info</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
