<div>
    <div class="flex justify-between mb-3">
        <p>{{ $user->name }} Result Booklet for First Term</p>
    </div>

    <div class="overflow-x-auto relative">
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
                @foreach($results as $result)
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
                            {{ $result['position'] ?? 0 }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>    
    </div>
</div>
