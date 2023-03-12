<div>
    <form class="flex justify-center items-center gap-6" wire:submit.prevent="submit">
        <select wire:model.lazy="student_subject" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option value="" selected>~ Subject ~</option>
            @foreach($subjects as $subject)
                <option value="{{ $subject }}">{{ $subject }}</option>
            @endforeach
        </select>

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
        @if($student_subject and $session)
        <div class="mb-5">
            <p class="font-semibold text-xl text-center">{{ strtoupper($student_class) }} {{ $student_subject }} Result for {{ $session }} session</p>
        </div>
        @endif
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 mt-5">
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
                    <th scope="col" class="py-3 px-6">
                        Grade
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Position
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Teacher
                    </th>
                </tr>
            </thead>
            @if($final_results)
            <tbody>
                @foreach($final_results as $student)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="py-4 px-6">
                        {{ $loop->iteration }}    
                    </td>
                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <a>
                            {{ $student->user->name }}
                        </a>
                    </th>
                    <td class="py-4 px-6">
                        {{ $student->first_ca ?? 0 }}
                    </td>
                    <td class="py-4 px-6">
                        {{ $student->second_ca ?? 0 }}
                    </td>
                    <td class="py-4 px-6">
                        {{ $student->exam ?? 0 }}
                    </td>
                    <td class="py-4 px-6 text-gray-300 font-semibold">
                        {{ $student->total ?? 0 }}   
                    </td>
                    <td class="py-4 px-6">
                        {{ grade($student->total)  }}
                    </td>
                    <td class="py-4 px-6">
                        {{ $student->position ?? 0 }}
                    </td>
                    <td class="py-4 px-6 text-gray-300 font-semibold">
                        {{ $student->teachers_name }}
                    </td>
                </tr>
                @endforeach 
            </tbody>
            @endif 
        </table>
    </div>
</div>
