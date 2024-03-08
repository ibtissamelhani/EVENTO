<x-app-layout>
    <x-sidebar-admin>
        <div class="grid grid-cols-3 gap-4 mb-4">
            <div class="flex items-center justify-center h-20 rounded bg-indigo-100 dark:bg-indigo-300">
                <p class="text-2xl text-blue-800 font-bold dark:text-gray-500">
                    <span class="material-symbols-outlined text-2xl text-blue-800 font-bold ">
                        group
                    </span>
                    <span class="flex-1 ms-3 whitespace-nowrap"><span class="mr-4">{{ $countInst }}</span>Institution
                    </span>
                </p>
            </div>
            <div class="flex items-center justify-end pr-8 h-20 rounded bg-gray-50 dark:bg-gray-800 col-span-2">

                <form class="flex items-center max-w-sm" method="GET" action="">
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
                                address
                            </th>
                            <th scope="col" class="px-6 py-3">
                                phone
                            </th>
                            <th scope="col" class="px-6 py-3">
                                type
                            </th>
                            <th scope="col" class="px-6 py-3">
                                action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                            @forelse ($institutions as $institution)
                                <tr
                                    class="odd:bg-gray-100 odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $institution->id }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $institution->name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $institution->address }}
                                    </td>
                                    <td class="text-black font-semibold px-6 py-4">
                                       {{$institution->phone}}
                                    </td>
                                    <td class="px-6 py-4">
                                       {{$institution->type->name}}
                                    </td>
                                    <td class="flex gap-4  px-6 py-4">
                                        <form action="{{route('admin.institution.destroy', $institution->id)}}" method="post">
                                            @method('delete')
                                            @csrf
                                            <button>
                                                <span class="material-symbols-outlined hover:text-red-500 hover:text-red-500">
                                                    delete
                                                </span>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <li>No Event found.</li>
                                @endforelse 
                    </tbody>
                </table>
                <div class="px-8 flex py-2">
                    {{ $institutions->links() }}
                </div>

            </div>

        </div>
    </x-sidebar-admin>
</x-app-layout>
