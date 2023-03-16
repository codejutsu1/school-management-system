<div>
    <form class="flex justify-center items-center gap-6" wire:submit.prevent="submit">
        <select wire:model.lazy="student_class" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option value="" selected>~ Class ~</option>
            <option value="jss1">JSS1</option>
            <option value="jss2">JSS2</option>
            <option value="jss3">JSS3</option>
        </select>

        <select wire:model.lazy="session" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option value="" selected>~ Session ~</option>
            <option value="2020/2021">2020/2021</option>
            <option value="2021/2022">2021/2022</option>
        </select>
    </form>

    <div>
        @if($student_class && $session)
        <div class="flex justify-center">
            <ul class="flex flex-col mt-10">
                <li class="flex space-x-16">
                    <span>Name:</span> <span>{{ $user->name }}</span>
                </li>
                <li class="flex space-x-8">
                    <span>Email:</span> <span>{{ $user->email }}</span>
                </li>
                <li class="flex space-x-8">
                    <span>Amount:</span> <span>&#8358;{{ number_format($amount,2) }}</span>
                </li>
                <li class="flex space-x-8">
                    <span>Description:</span> <span>{{ strtoupper($student_class) }} School Fees</span>
                </li>    
            </ul>   
        </div>
        <div class="flex justify-center">
            <button wire:click="initialize()" class="text-white bg-purple-600 hover:bg-purple-700 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-purple-700 dark:focus:ring-primary-800">
                Pay
            </button>
        </div>
        @endif
    </div>
</div>