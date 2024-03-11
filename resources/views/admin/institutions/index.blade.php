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
