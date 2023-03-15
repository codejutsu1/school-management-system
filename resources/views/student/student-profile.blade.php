<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-100 leading-tight">
            {{ __('Your Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-center p-6 bg-gray-800 text-gray-200">
                    <ul>
                        <li class="flex justify-between space-x-10">
                            <span>Name : </span>
                            <span>{{ ucfirst($student->name) }}</span>
                        </li>
                        <li class="flex justify-between space-x-4">
                            <span>Email : </span>
                            <span>{{ $student->email }}</span>
                        </li>
                        <li class="flex justify-between space-x-4">
                            <span>Gender : </span>
                            <span>{{ $student->gender }}</span>
                        </li>
                        <li class="flex justify-between space-x-4">
                            <span>Date of Birth : </span>
                            <span>{{ $student->dob }}</span>
                        </li>
                        <li class="flex justify-between space-x-4">
                            <span>Class : </span>
                            <span>{{ $student->class }}</span>
                        </li>
                        <li class="flex justify-between space-x-4">
                            <span>EC Activities : </span>
                            <span>{{ $student->extraCurriculumActivities }}</span>
                        </li>
                        <li class="flex justify-between space-x-4">
                            <span>House : </span>
                            <span>{{ $student->house }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>