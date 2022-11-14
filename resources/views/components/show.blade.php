<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-gray-800 text-gray-200 space-y-4"> 
                    <p>ID: 0000{{ $users->user->id }}</p>                                                                                            
                    <p>Name : {{ $users->user->name }}</p>
                    <p>Email : {{ $users->user->email }}</p>
                    @if($users->student)
                    <p>Student: {{ $users->student->user->name }}</p>
                    @endif
                    @if($users->class)
                        <p>Class : {{ $users->class }}</p>
                    @endif
                    @if($users->department)
                        <p>Subject: {{ $users->department }}</p>
                    @endif

                    <div>
                        <p class="text-lg font-semibold">Permissions</p>
                        <ul>
                            @foreach($permissions as $permission)
                            <li class="flex gap-4">
                                <p>{{ $permission->name }}</p>
                                <livewire:toggle-button
                                    :user="$users->user->id"
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
</div>