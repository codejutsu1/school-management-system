<div>
    <form class="flex justify-center items-center gap-6" wire:submit.prevent="submit">
        <select wire:model.lazy="classes" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option value="" selected>~ Class ~</option>
            <option value="jss1a">JSS1A</option>
            <option value="JSS1B">JSS1B</option>
        </select>

        <select wire:model.lazy="session" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option value="" selected>~ Session ~</option>
            <option value="2020/2021">2020/2021</option>
            <option value="2021/2022">2021/2022</option>
        </select>
    </form>

    <div class="overflow-x-auto relative mt-10">
        @if($classes and $session)
        <div>
            <p class="mb-5 font-semibold text-xl text-center">{{ $classes }} {{ $subject }} Students for {{ $session }} session</p>
        </div>
        @endif
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                <th scope="col" class="py-3 px-6">
                        S/N
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Name
                    </th>
                    <th scope="col" class="py-3 px-6">
                        1st CA
                    </th>
                    <th scope="col" class="py-3 px-6">
                        2nd CA
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Exam
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Total
                    </th>
                </tr>
            </thead>
            @if($students)
            <tbody>
                @foreach($students as $student)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="py-4 px-6">
                        {{ $loop->iteration }}    
                    </td>
                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <a>
                            {{ $student->user->name }}
                        </a>
                    </th>
                </tr>
                @endforeach
            </tbody>
            @endif
        </table>
    </div>
</div>
