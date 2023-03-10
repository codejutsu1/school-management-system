<div>
    <section class="bg-gray-50 dark:bg-gray-900 border-red-300">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl text-center font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Edit <b>{{ $name }}'s</b> Details
                    </h1>
                    <form class="space-y-4 md:space-y-6" wire:submit.prevent="submit">
                        <div>
                            <label for="fullName" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Full Name</label>
                            <input wire:model.debounce.500ms="fullName" type="text" id="firstName" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="First Name" required autofocus>
                            @error('fullName') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ $individual }}'s Email</label>
                            <input wire:model.debounce.500ms="email" type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@email.com" required="">
                            @error('email') <span class="text-red-600 font-bold">{{ $message }}</span> @enderror
                        </div>
                        @if($value == 'student')
                        <div>
                            <label for="class" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Class</label>
                            <select wire:model.lazy="class" id="class" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                <option value="" selected="selected" disabled>~ Select Class ~</option>
                                @foreach($classes as $class)
                                    <option value="{{ $class }}">{{ strtoupper($class) }}</option>
                                @endforeach
                            </select>
                            @error('class') <span class="text-red-600">{{ $message }}</span> @enderror
                        </div>
                        @endif
                        @if($value == 'teacher')
                            <div>
                                <label for="class" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Subject</label>
                                <select wire:model.lazy="department" id="class" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                    <option value="" selected="selected" disabled>~ Select Department ~</option>
                                        @foreach($departments as $department)
                                            <option value="{{ $department }}">{{ $department }}</option>
                                        @endforeach
                                </select>
                                @error('department') <span class="text-red-600">{{ $message }}</span> @enderror
                            </div>
                        @endif
                        <button type="submit" class="w-full text-white bg-purple-600 hover:bg-purple-700 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-purple-700 dark:focus:ring-primary-800">Update {{ $individual }}</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>