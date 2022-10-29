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
                    Role
                </th>
                <th scope="col" class="py-3 px-6">
                    Created At
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $student)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $student->name }}
                </th>
                <td class="py-4 px-6">
                    {{ $student->email }}
                </td>
                <td class="py-4 px-6">
                    {{ $student->role }}
                </td>
                <td class="py-4 px-6">
                    {{ $student->created_at }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

</div>
