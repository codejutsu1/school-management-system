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
                    
                    <div class="flex space-around">
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
                        <div>
                            <p class="text-lg font-semibold">Roles</p>
                            <ul>
                                @foreach($roles as $role)
                                <li class="flex gap-4">
                                    <p>{{ $role->name }}</p>
                                    <livewire:role-button :user="$users->user->id" :field="$role->name" key="{{ $role->key }}" />
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="flex justify-between">
                        <div>
                            <h1>JSS1</h1>
                            <div>
                                <input type="checkbox" name="jss1a" value="jss1a">
                                <label for="jss1a">JSS1A</label>
                            </div>
                            <div>
                                <input type="checkbox"  name="classes" value="jss1b">
                                <label for="jss1b">JSS1B</label>
                            </div>
                            <div>
                                <input type="checkbox"  name="classes" value="jss1c">
                                <label for="jss1c">JSS1C</label>
                            </div>
                            <div>
                                <input type="checkbox"  name="classes" value="jss1d">
                                <label for="jss1d">JSS1D</label>
                            </div>
                        </div>
                        <div>
                            <h1>JSS2</h1>
                        </div>
                        <div>
                            <h1>JSS3</h1>
                        </div>
                        <div>
                            <h1>SSS1</h1>
                        </div>
                        <div>
                            <h1>SSS2</h1>
                        </div>
                        <div>
                            <h1>SSS3</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>