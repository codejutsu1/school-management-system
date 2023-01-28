<div>
    <div class="overflow-x-auto relative">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="py-3 px-6">
                        Name
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Email
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Subject
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Class
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($teachers as $teacher)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <a href="{{ route('show.list.teacher', $teacher->user->slug) }}">
                            {{ $teacher->user->name }}
                        </a>
                    </th>
                    <td class="py-4 px-6">
                        {{ $teacher->user->email }}
                    </td>
                    <td class="py-4 px-6">
                        {{ $teacher->department }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
