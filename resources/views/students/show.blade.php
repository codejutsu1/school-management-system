<x-app-layout>
    <x-slot name="header">
       <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-100 leading-tight">
                {{ __('Students Profile') }}
            </h2>
            <div>
                <button type="button" onclick="Livewire.emit('openModal', 'student-register')" class="bg-purple-600 px-4 text-white rounded-md py-2">Create new Student</button>
            </div>
       </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-gray-800 text-gray-200 space-y-4"> 
                    <p>ID: 0000{{ $student->user->id }}</p>                                                                                            
                    <p>Name : {{ $student->user->name }}</p>
                    <p>Email : {{ $student->user->email }}</p>
                    <p>Class : {{ $student->class }}</p>

                    <div>
                        <p class="text-lg font-semibold">Permissions</p>
                        <ul>
                            @foreach($permissions as $permission)
                            <li class="flex gap-4">
                                <p>{{ $permission->name }}</p>
                                <livewire:toggle-button
                                    :user="$student->user->id"
                                    :field="$permission->name"
                                    key="{{ $permission->key }}"
                                />
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
