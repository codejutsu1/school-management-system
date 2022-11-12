<x-app-layout>
    <x-slot name="header">
       <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-100 leading-tight">
                {{ __("Parent's Profile") }}
            </h2>
            <div>
                <button type="button" onclick="Livewire.emit('openModal', 'parent-register')" class="bg-purple-600 px-4 text-white rounded-md py-2">Create new parent</button>
            </div>
       </div>
    </x-slot>

    <x-show :$permissions :users="$parent" />
</x-app-layout>
