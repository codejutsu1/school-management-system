<div>
    <form class="space-y-4 md:space-y-6" wire:submit.prevent="submit">
        <div>
            <label for="site_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Site Name</label>
            <input wire:model.debounce.500ms="site_name" type="text" id="site_name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Site Name" required autofocus>
            @error('site_name') <span class="error text-red-500">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="site_email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Site Email</label>
            <input wire:model.debounce.500ms="site_email" type="text" id="site_email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Site Email" required autofocus>
            @error('site_email') <span class="error text-red-500">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="site_phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Site Phone</label>
            <input wire:model.debounce.500ms="site_phone" type="text" id="site_phone" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Site Phone" required>
            @error('site_phone') <span class="error text-red-500">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="session" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Session</label>
            <input wire:model.debounce.500ms="session" type="text" id="session" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Session" required>
            @error('session') <span class="error text-red-500">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="fees" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">School Fees</label>
            <input wire:model.debounce.500ms="fees" type="text" id="fees" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="School Fees" required>
            @error('fees') <span class="error text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="flex justify-end">
            <button type="submit" class="text-white bg-purple-600 hover:bg-purple-700 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-purple-700 dark:focus:ring-primary-800">Update</button>
        </div>
    </form>
</div>