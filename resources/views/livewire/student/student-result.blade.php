<div>
    <form class="flex justify-center items-center gap-6" wire:submit.prevent="submit">
        <select wire:model.lazy="student_class" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option value="" selected>~ Class ~</option>
            @foreach($classes as $class)
                <option value="{{ $class }}">{{ strtoupper($class) }}</option>
            @endforeach
        </select>

        <select wire:model.lazy="session" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option value="" selected>~ Session ~</option>
            <option value="2020/2021">2020/2021</option>
            <option value="2021/2022">2021/2022</option>
        </select>
    </form>

    <div class="overflow-x-auto relative mt-10">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="py-3 px-6">
                        Subject
                    </th>
                    <th scope="col" class="py-3 px-6">
                        1st CA (15)
                    </th>
                    <th scope="col" class="py-3 px-6">
                        2nd CA (15)
                    </th>
                    <th scope="col" class="py-3 px-6">
                        exam (70)
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Total (100)
                    </th>
                    <th class="px-4 py-3">
                        Grade
                    </th>
                    <th class="px-4 py-3">
                        Position
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($final_results as $result)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="py-4 px-6">
                            {{ $result['subject'] }}
                        </td>
                        <td class="py-4 px-6">
                            {{ $result['first_ca'] ?? 0 }}
                        </td>
                        <td class="py-4 px-6">
                            {{ $result['second_ca'] ?? 0 }}
                        </td>
                        <td class="py-4 px-6">
                            {{ $result['exam'] ?? 0 }}
                        </td>
                        <td class="py-4 px-6">
                            {{ $result['total'] ?? 0 }}
                        </td>
                        <td class="py-4 px-6">
                            {{ grade($result['total']) }}
                        </td>
                        <td class="py-4 px-6">
                            {{ superscript($result['position'])  }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>    
    </div>
</div>