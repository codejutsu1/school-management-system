<div>
    <section class="bg-gray-50 dark:bg-gray-900">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl text-center font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Create a new Student
                    </h1>
                    <form class="space-y-4 md:space-y-6" wire:submit.prevent="submit">
                        <div>
                            <label for="firstName" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First Name</label>
                            <input wire:model.debounce.500ms="firstName" type="text" id="firstName" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="First Name" required autofocus>
                            @error('firstName') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label for="middleName" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Middle Name</label>
                            <input wire:model.debounce.500ms="middleName" type="text" id="middleName" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Last Name" required="">
                            @error('middleName') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label for="lastName" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last Name (Surname)</label>
                            <input wire:model.debounce.500ms="lastName" type="text" id="lastName" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Last Name" required="">
                            @error('lastName') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Student's Email</label>
                            <input wire:model.debounce.500ms="email" type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@email.com" required="">
                            @error('email') <span class="text-red-600 font-bold">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label for="class" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Class</label>
                            <select wire:model.lazy="class" id="class" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                <option value="" selected="selected" disabled>~ Select Class ~</option>
                                <option value="jss1">JSS 1</option>
                                <option value="jss2">JSS 2</option>
                                <option value="jss3">JSS 3</option>
                                <option value="sss1">SSS 1</option>
                                <option value="sss2">SSS 2</option>
                                <option value="sss3">SSS 3</option>
                            </select>
                            @error('class') <span class="text-red-600">{{ $message }}</span> @enderror
                        </div>
                        <button type="submit" class="w-full text-white bg-purple-600 hover:bg-purple-700 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-purple-700 dark:focus:ring-primary-800">Create Student</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
