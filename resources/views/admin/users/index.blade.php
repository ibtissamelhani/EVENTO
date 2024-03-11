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
            <div class="flex items-center justify-end pr-8 h-20 rounded bg-gray-50 dark:bg-gray-800 col-span-2">

                <form class="flex items-center max-w-sm" method="GET" action="{{ route('admin.user.search') }}">
                    @csrf
                    <label for="simple-search" class="sr-only">Search</label>
                    <div class="relative w-full">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 5v10M3 5a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm0 10a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm12 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm0 0V6a3 3 0 0 0-3-3H9m1.5-2-2 2 2 2" />
                            </svg>
                        </div>
                        <input type="text" id="simple-search" name="keyword"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Search user..." required />
                    </div>
                    <button type="submit"
                        class="p-2.5 ms-2 text-sm font-medium text-white bg-blue-800 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                        <span class="sr-only">Search</span>
                    </button>
                </form>
                

            </div>
        </div>
        <div class="my-4 rounded bg-gray-50 dark:bg-gray-800">
            <div class="relative flex p-10 flex-col items-center gap-4 overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-300  dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                #
                            </th>
                            <th scope="col" class="px-6 py-3">
                                name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                email
                            </th>
                            <th scope="col" class="px-6 py-3">
                                roles
                            </th>
                            <th scope="col" class="px-6 py-3">
                                status
                            </th>
                            <th scope="col" class="px-6 py-3">
                                action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($users) > 0)
                            @foreach ($users as $user)
                                <tr
                                    class="odd:bg-gray-100 odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $user->id }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $user->name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $user->email }}
                                    </td>
                                    <td class="text-black font-semibold px-6 py-4">
                                        @foreach ($user->roles as $role)
                                            {{ $role->name }}
                                            @unless ($loop->last)
                                                /
                                            @endunless
                                        @endforeach
                                    </td>
                                    <td class="px-6 py-4">
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
                                    </td>
                                    <td class="flex gap-4  px-6 py-4">
                                        <a href="{{ route('admin.user.edit', $user->id)}}" class="hover:text-yellow-500" title="Edit">
                                            <span class="material-symbols-outlined hover:text-yellow-500 text-2xl">
                                                edit
                                            </span>
                                        </a>
                                        @if ($user->status == 1)
                                            <form action="{{ route('admin.user.banne', $user) }}" method="POST">
                                                @csrf
                                                <button title="Block User">
                                                    <span
                                                        class="material-symbols-outlined dark:hover:text-red-500  hover:text-red-500 text-2xl">
                                                        block
                                                    </span>
                                                </button>
                                            </form>
                                        @else
                                            <form action="{{ route('admin.user.unbanne', $user) }}" method="POST">
                                                @csrf
                                                <button title="Unblock User">
                                                    <span
                                                        class="material-symbols-outlined dark:hover:text-green-500  hover:text-green-500 text-2xl">
                                                        task_alt
                                                    </span>
                                                </button>
                                            </form>
                                        @endif
                                        <form action="{{ route('admin.user.destroy', $user->id) }}"
                                            method="post">
                                            @method('delete')
                                            @csrf
                                            <button>
                                                <span
                                                    class="material-symbols-outlined dark:hover:text-red-500  hover:text-red-500 text-2xl">
                                                    delete
                                                </span>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                no data found
                            </tr>
                        @endif
                    </tbody>
                </table>
                <div class="px-8 flex py-2">
                    {{ $users->links() }}
                </div>

            </div>

        </div>
    </x-sidebar-admin>
</x-app-layout>
