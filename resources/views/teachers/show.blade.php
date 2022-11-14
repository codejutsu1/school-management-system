<x-app-layout>
    <x-slot name="header">
       <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-100 leading-tight">
                {{ __("Teacher's Profile") }}
            </h2>
       </div>
    </x-slot>

    <x-show :$permissions :users="$teacher" />
</x-app-layout>
