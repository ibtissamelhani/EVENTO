<x-app-layout>
    <x-sidebar-admin>
        <div class="grid grid-cols-3 gap-4 mb-4">
            <div class="flex items-center justify-center h-20 rounded bg-indigo-100 dark:bg-indigo-300">
                <p class="text-2xl text-blue-800 font-bold dark:text-gray-500">
                    <span class="material-symbols-outlined text-2xl text-blue-800 font-bold ">
                        group
                    </span>
                    <span class="flex-1 ms-3 whitespace-nowrap"><span class="mr-4">{{ $countUsers }}</span>User
                    </span>
                </p>
            </div>

        </div>
        <div class="my-4 rounded bg-gray-50 dark:bg-gray-800">
            <a href="{{ route('admin.user.index') }}"
                class="text-gray-900 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-10 h-10 m-4 inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </a>

            <form class="flex flex-col items-center" method="POST" action="{{route('admin.user.update', $user->id )}}">
                @csrf
                @method('patch')
                <div class="grid gap-4 mb-6 md:grid-cols-2">
                    <div>
                        <label for="first_name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                        <input type="text" id="first_name" name="name"
                            class="bg-gray-50 border border-gray-300 cursor-not-allowed text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="{{ $user->name }}"  readonly />
                    </div>
                    <div class="mb-6">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email
                            address</label>
                        <input type="email" id="email" name="email"
                            class="bg-gray-50 border border-gray-300 cursor-not-allowed text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="{{ $user->email }}"  readonly />
                    </div>
                   
                    <div class="flex items-center justify-center">status :
                        @switch($user->status)
                            @case(1)
                                <span
                                    class="bg-green-200 text-green-600 py-1 px-3 rounded-full text-xs">{{ $user->getStatus() }}</span>
                            @break

                            @case(2)
                                <span
                                    class="bg-red-200 text-red-600 py-1 px-3 rounded-full text-xs">{{ $user->getStatus() }}</span>
                            @break
                        @endswitch
                    </div>
                    <div>
                        <label for="first_name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role</label>
                        <select class="js-example-basic-multiple select2 " size="2" name="role[]"
                            multiple="multiple">
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}" @if ($user->roles->contains('id', $role->id)) selected @endif>
                                    {{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
            </form>

        </div>


    </x-sidebar-admin>

</x-app-layout>
