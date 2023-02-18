<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
</div>
<div>
    <div class="overflow-x-auto relative mt-10">
        <div>
            <p class="mb-5 font-semibold text-xl text-center">{{ $curriculum }} Students</p>
        </div>
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
                        Gender
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Class
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Position
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="py-4 px-6">
                        {{ $loop->iteration }}    
                    </td>
                    <td class="py-4 px-6">
                        {{ $student->user->name }}    
                    </td>
                    <td class="py-4 px-6">
                        NULL
                    </td>
                    <td class="py-4 px-6">
                        {{ $student->class }}    
                    </td>
                    <td class="py-4 px-6">
                        {{ $student->extraCurriculumPrefect ?? 'NULL' }}    
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
