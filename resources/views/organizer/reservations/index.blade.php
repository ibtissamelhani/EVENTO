<x-sidebar-org>
    @if (session('error'))
        <div id="alert-3"
            class="flex fixed top-32 right-32 items-center p-4 mb-4 z-50 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
            role="alert">
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Error</span>
            <div class="ms-3 text-sm font-medium">
                {{ session('error') }}
            </div>
            <button type="button"
                class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"
                data-dismiss-target="#alert-3" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
        </div>
    @endif
    @if (session('success'))
        <div id="alert-3"
            class="flex fixed top-32 right-32 items-center p-4 mb-4 z-50 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
            role="alert">
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Error</span>
            <div class="ms-3 text-sm font-medium">
                {{ session('success') }}
            </div>
            <button type="button"
                class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"
                data-dismiss-target="#alert-3" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
        </div>
    @endif
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
                            Event
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Attendee name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            User Email
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
                                        <span class="bg-red-200 text-red-600 py-1 px-3 rounded-full text-xs">pending</span>
                                    @break
                                @endswitch
                            </td>
                            <td class="flex gap-4  px-6 py-4">

                                <form action="{{ route('organizer.request.destroy', $eventUser->id) }}" method="POST">
                                    @method('delete')
                                    @csrf
                                    <button title="Refuse request">
                                        <span
                                            class="material-symbols-outlined dark:hover:text-red-500  hover:text-red-500 text-2xl">
                                            block
                                        </span>
                                    </button>
                                </form>

                                <form action="{{ route('organizer.request.update', $eventUser->id) }}" method="POST">
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
