<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-100 leading-tight">
            Assign classes to {{ $teacher->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-gray-800 text-gray-200 space-y-4"> 
                    <ul class="flex flex-col space-y-5">
                        @foreach($classes as $class)
                            <li>
                                {{  strtoupper($class) }}
                            </li>
                        @endforeach
                    </div>      
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
