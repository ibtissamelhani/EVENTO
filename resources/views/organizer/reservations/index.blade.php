<x-sidebar-org>
    <div class="grid grid-cols-2 gap-4 mb-4">
        <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
            <p class="text-2xl text-gray-600 font-semibold dark:text-gray-500">
                Requests
            </p>
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

                        </th>
                        <th scope="col" class="px-6 py-3">
                            Event
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Attendee name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            User Email
                        </th>
                        <th scope="col" class="px-6 py-3">
                            action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($eventUsers as $eventUser)
                        <tr
                            class="odd:bg-gray-100 odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $eventUser->id }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $eventUser->event->name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $eventUser->user->name }}
                            </td>
                            <td class="text-black font-semibold px-6 py-4">
                                {{ $eventUser->user->email }}
                            </td>
                            <td class="px-6 py-4">
                                @switch($eventUser->status)
                                    @case(0)
                                        <span
                                            class="bg-red-200 text-red-600 py-1 px-3 rounded-full text-xs">pending</span>
                                    @break
                                @endswitch
                            </td>
                            <td class="flex gap-4  px-6 py-4">
                               
                                    <form action="{{route('organizer.request.destroy',$eventUser->id)}}" method="POST">
                                        @method('delete')
                                        @csrf
                                        <button title="Refuse request">
                                            <span
                                                class="material-symbols-outlined dark:hover:text-red-500  hover:text-red-500 text-2xl">
                                                block
                                            </span>
                                        </button>
                                    </form>
                                
                                    <form action="{{route('organizer.request.update', $eventUser->id)}}" method="POST">
                                        @method('put')
                                        @csrf
                                        <button title="Accept Request">
                                            <span
                                                class="material-symbols-outlined dark:hover:text-green-500  hover:text-green-500 text-2xl">
                                                task_alt
                                            </span>
                                        </button>
                                    </form>
                                
                            </td>
                        </tr>

                        @empty
                            <tr>
                                No Pending Requests
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>

        </div>
    </x-sidebar-org>
