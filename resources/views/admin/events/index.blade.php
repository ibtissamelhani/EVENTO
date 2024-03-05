<x-app-layout>
    <x-sidebar-admin>
        <div class="grid grid-cols-3 gap-4 mb-4">
            <div class="flex items-center justify-center h-18 rounded bg-red-200 dark:bg-indigo-300">
                <p class="text-2xl text-blue-800 font-bold dark:text-gray-500">
                    <span class="material-symbols-outlined text-2xl text-blue-800 font-bold ">
                        today
                    </span>
                    <span class="flex-1 ms-3 whitespace-nowrap"></span>
                    Pending Events</span>
                </p>
            </div>
            <div class="flex items-center justify-around h-20 rounded bg-gray-50 dark:bg-gray-800 col-span-2">

                <form class="flex items-center max-w-sm" method="GET" action="{{ route('admin.types.search') }}">
                    @csrf
                    <label for="simple-search" class="sr-only">Search</label>
                    <div class="relative w-full">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M3 5v10M3 5a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm0 10a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm12 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm0 0V6a3 3 0 0 0-3-3H9m1.5-2-2 2 2 2" />
                            </svg>
                        </div>
                        <input type="text" id="simple-search" name="keyword"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Search type name..." required />
                    </div>
                    <button type="submit"
                        class="p-2.5 ms-2 text-sm font-medium text-white bg-blue-800 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                        <span class="sr-only">Search</span>
                    </button>
                </form>

            </div>
        </div>
        <div class="grid grid-cols-3 my-4 rounded dark:bg-gray-800">

            <div class="max-w-sm mt-12 rounded-lg bg-white shadow-md dark:bg-gray-600">
                <img class="h-48 w-full rounded-t-lg object-cover object-center" src="" alt="Photo">
                <div class="p-5">
                    <h5 class="mb-2 text-xl font-medium text-gray-900 dark:text-white"></h5>
                    <span>

                    </span>
                </div>
                <div class="flex justify-end gap-4 pb-5 px-6">
                    <a href="" class="dark:hover:text-blue-500">
                        <span class="material-symbols-outlined dark:hover:text-blue-500">
                            visibility
                        </span>
                    </a>
                    <form action="" method="post">
                        @method('delete')
                        @csrf
                        <button>
                            <span class="material-symbols-outlined dark:hover:text-red-500 hover:text-red-500">
                                delete
                            </span>
                        </button>
                    </form>
                </div>
            </div>
            <div class="max-w-sm mt-12 rounded-lg bg-white shadow-md dark:bg-gray-600">
                <img class="h-48 w-full rounded-t-lg object-cover object-center" src="" alt="Photo">
                <div class="p-5">
                    <h5 class="mb-2 text-xl font-medium text-gray-900 dark:text-white"></h5>
                    <span>

                    </span>
                </div>
                <div class="flex justify-end gap-4 pb-5 px-6">
                    <a href="" class="dark:hover:text-blue-500">
                        <span class="material-symbols-outlined dark:hover:text-blue-500">
                            visibility
                        </span>
                    </a>
                    <form action="" method="post">
                        @method('delete')
                        @csrf
                        <button>
                            <span class="material-symbols-outlined dark:hover:text-red-500 hover:text-red-500">
                                delete
                            </span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="flex items-center justify-center h-48 mb-4 rounded bg-gray-50 dark:bg-gray-800">

        </div>
    </x-sidebar-admin>
</x-app-layout>
