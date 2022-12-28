<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-100 leading-tight">
            {{ __('Roles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                @if(session()->has('message'))
                    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4" role="alert">
                        <p class="font-bold">Successful</p>
                        <p>{{ session('message') }}</p>
                    </div>     
                @endif
                <div class="p-6 bg-gray-800 text-gray-200">
                    <livewire:roles />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>