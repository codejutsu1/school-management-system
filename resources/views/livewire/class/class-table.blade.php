<div>
    <div class="flex justify-between mb-3">
        <p><b>{{ strtoupper($name->name) }}</b> for <b>2020/2021</b> Session.</p>
        <button
            wire:click="addAllStudents({{ $students }})"
            class="flex items-center justify-between px-2 py-2 text-sm font-semibold leading-5 text-purple-600 rounded-lg dark:text-green-200 dark:bg-green-700 focus:outline-none focus:shadow-outline-gray"
            aria-label="Edit"
        >
            Add all Students
        </button>
    </div>

    @if($remain)
    <div class="mb-3">
        <span class="text-red-500">NB: You have <b>{{ $number }} students</b> needed to be added to your class.</span>
    </div>
    @endif

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
                        House
                    </th>
                    <th scope="col" class="py-3 px-6">
                        ECA
                    </th>
                    <th class="px-4 py-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <a href="#">{{ $student->name }}</a>
                    </th>
                    <td class="py-4 px-6">
                        {{ $student->email }}
                    </td>
                    <td class="py-4 px-6">
                        {{ $student->house ?? 'NULL' }}
                    </td>
                    <td class="py-4 px-6">
                        {{ $student->extraCurriculumActivities ?? 'NULL' }}
                    </td>
                    <td>
                        <div class="flex items-center space-x-4 text-sm">
                            @if(!in_array($student->id, $added_students))
                            <button
                                wire:click="addSingleStudent({{ $student->id }})"
                                class="flex items-center justify-between px-2 py-2 text-sm font-semibold leading-5 text-purple-600 rounded-lg dark:text-green-200 dark:bg-green-700 focus:outline-none focus:shadow-outline-gray"
                                aria-label="Edit"
                            >
                                Add Student
                            </button>
                            @else
                            <button
                                class="flex items-center justify-between px-2 py-2 text-sm font-semibold leading-5 text-purple-600 rounded-lg dark:text-green-200 dark:bg-green-700 focus:outline-none focus:shadow-outline-gray"
                                aria-label="Edit"
                            >
                                Promote
                            </button>
                            @endif
                            <button
                                wire:click="addSingleStudent({{ $student->id }})"
                                class="flex items-center justify-between px-2 py-2 text-sm font-semibold leading-5 text-purple-600 rounded-lg dark:text-green-200 dark:bg-green-700 focus:outline-none focus:shadow-outline-gray"
                                aria-label="Edit"
                            >
                                Add Student
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>    
    </div>
</div>
