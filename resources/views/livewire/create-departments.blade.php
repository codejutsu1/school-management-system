<div>
   <div>
       <form class="space-y-4 md:space-y-6" wire:submit.prevent="submit">
            <div>
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Department</label>
                <input wire:model.debounce.500ms="name" type="text" id="department" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="First Name" required autofocus>
                @error('name') <span class="text-red-800">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="w-full text-white bg-purple-600 hover:bg-purple-700 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-purple-700 dark:focus:ring-primary-800">Create</button>
       </form>
   </div>

   <div class="overflow-x-auto relative mt-10">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="py-3 px-6">
                        id
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Name
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Created At
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($allDepartments as $department)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="py-4 px-6">
                        {{ $loop->iteration }}
                    </td>
                    <td class="py-4 px-6">
                        {{ $department->name }}
                    </td>
                    <td class="py-4 px-6">
                        {{ $department->created_at }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div>
            {{ $allDepartments->withQueryString()->links() }}
        </div>
    </div>
</div>
