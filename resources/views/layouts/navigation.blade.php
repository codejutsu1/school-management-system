<nav x-data="{ open: false }" class="bg-gray-900 border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-10 w-auto fill-current text-gray-200" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    
                    @can('view school')
                    <x-nav-link>
                        <button id="dropdownDefault" data-dropdown-toggle="dropdown" class="text-gray-400 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center " type="button">
                            School
                            <svg class="ml-2 w-4 h-4" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <!-- Dropdown menu -->
                        <div id="dropdown" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
                            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefault">
                                <li>
                                    <x-drop-link :href="route('students.index')" :active="request()->routeIs('students.index')">
                                        {{ __('Students') }}
                                    </x-drop-link>
                                </li>
                                <li>
                                    <x-drop-link :href="route('parents.index')" :active="request()->routeIs('parents.index')">
                                        {{ __('Parents') }}
                                    </x-drop-link>
                                </li>
                                <li>
                                    <x-drop-link :href="route('teachers.index')" :active="request()->routeIs('teachers.index')">
                                        {{ __('Teachers') }}
                                    </x-drop-link>
                                </li>
                                @can('view principals')
                                <li>
                                    <x-drop-link :href="route('principals.index')" :active="request()->routeIs('principals.index')">
                                        {{ __('Vice Principal') }}
                                    </x-drop-link>
                                </li>
                                @endcan
                            </ul>
                        </div>
                    </x-nav-link>
                    @endcan
                    @can('student information')
                    <x-nav-link :href="route('view.student.info')" :active="request()->routeIs('view.student.info')">
                        {{ __('Student Info') }}
                    </x-nav-link>
                    @endcan

                    @can('teacher information')
                    <x-nav-link :href="route('view.teacher.info')" :active="request()->routeIs('view.student.info')">
                        {{ __('Teacher Info') }}
                    </x-nav-link>
                    @endcan

                    @can('departments')
                        <x-nav-link>
                            <button id="createDropdown" data-dropdown-toggle="createDrop" class="text-gray-400 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center " type="button">
                                Create
                                <svg class="ml-2 w-4 h-4" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <!-- Dropdown menu -->
                            <div id="createDrop" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
                                <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="createDropdown">
                                    <li>
                                        <x-drop-link :href="route('create.departments')" :active="request()->routeIs('create.departments')">
                                            {{ __('Create Department') }}
                                        </x-drop-link>
                                    </li>
                                    <li>
                                        <x-drop-link :href="route('extra.curriculum')" :active="request()->routeIs('extra.curriculum')">
                                            {{ __('Create Extra Curriculum Activities') }}
                                        </x-drop-link>
                                    </li>
                                    <li>
                                        <x-drop-link :href="route('create.house')" :active="request()->routeIs('create.house')">
                                            {{ __('Create House') }}
                                        </x-drop-link>
                                    </li>
                                </ul>
                            </div>
                        </x-nav-link>

                        <x-nav-link>
                            <button id="roleDropdown" data-dropdown-toggle="roleDrop" class="text-gray-400 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center " type="button">
                                Roles and Permission
                                <svg class="ml-2 w-4 h-4" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <!-- Dropdown menu -->
                            <div id="roleDrop" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
                                <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="roleDropdown">
                                    <li>
                                        <x-drop-link :href="route('roles')" :active="request()->routeIs('roles')">
                                            {{ __('Roles') }}
                                        </x-drop-link>
                                    </li>
                                    <li>
                                        <x-drop-link :href="route('permissions')" :active="request()->routeIs('permissions')">
                                            {{ __('Permission') }}
                                        </x-drop-link>
                                    </li>
                                </ul>
                            </div>
                        </x-nav-link>
                    @endcan
                    @role('form teacher')
                        <x-nav-link :href="route('jss1a')" :active="request()->routeIs('jss1a')">
                            {{ __('Form Class') }}
                        </x-nav-link>
                    @endrole
                    @can('list teachers')
                        <x-nav-link :href="route('list.teachers')">
                            {{ __('Teachers') }}
                        </x-nav-link>
                    @endcan
                    @role('house leader')
                        <x-nav-link :href="route('list.house')">
                            {{ __('House Member') }}
                        </x-nav-link>
                    @endrole
                    @role('extra curriculum')
                        <x-nav-link :href="route('curriculum.student')">
                            {{ __('EC Student') }}
                        </x-nav-link>
                    @endrole
                    @role('teacher')
                        <x-nav-link :href="route('show.students')">
                            {{ __('Students') }}
                        </x-nav-link>
                    @endrole
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center text-sm font-medium text-purple-500 hover:text-purple-700 hover:border-purple-300 focus:outline-none focus:text-purple-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
