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
            </div>
        </div>
        <div class="grid grid-cols-3 my-4 rounded dark:bg-gray-800">

            @forelse ($pendingEvents as $pendingEvent)
                <div class="max-w-sm mt-12 rounded-lg bg-white shadow-md dark:bg-gray-600">
                    <img class="h-48 w-full rounded-t-lg object-cover object-center"
                        src="{{ $pendingEvent->getFirstMediaUrl('images') }}" alt="Photo">
                    <div class="p-5">
                        <h5 class="mb-2 text-xl font-medium text-gray-900 dark:text-white">Title :
                            {{ $pendingEvent->name }}</h5>
                        @if ($pendingEvent->publish_event == 1)
                            <span
                                class="inline-flex items-center justify-center rounded-full bg-emerald-100 px-2.5 py-0.5 text-emerald-700">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="-ms-1 me-1.5 h-4 w-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>

                                <p class="whitespace-nowrap text-sm">published</p>
                            </span>
                        @else
                            <span
                                class="inline-flex items-center justify-center rounded-full bg-amber-100 px-2.5 py-0.5 text-amber-700">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="-ms-1 me-1.5 h-4 w-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M8.25 9.75h4.875a2.625 2.625 0 010 5.25H12M8.25 9.75L10.5 7.5M8.25 9.75L10.5 12m9-7.243V21.75l-3.75-1.5-3.75 1.5-3.75-1.5-3.75 1.5V4.757c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0c1.1.128 1.907 1.077 1.907 2.185z" />
                                </svg>

                                <p class="whitespace-nowrap text-sm">Pending</p>
                            </span>
                        @endif
                        <p class="text-sm text-gray-500 pt-4">Event date : {{ $pendingEvent->date }}</p>
                    </div>
                    <div class="flex justify-end gap-4 pb-5 px-6">
                        <a href="{{route('admin.event.show', $pendingEvent->id)}}" class="hover:text-blue-500">
                            <span class="material-symbols-outlined hover:text-blue-500">
                                visibility
                            </span>
                        </a>
                        <form action="{{route('admin.event.destroy', $pendingEvent->id)}}" method="post">
                            @method('delete')
                            @csrf
                            <button>
                                <span class="material-symbols-outlined hover:text-red-500 hover:text-red-500">
                                    delete
                                </span>
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <li>No pending Events .</li>
            @endforelse
        </div>
        <div class="relative flex p-10 flex-col items-center gap-4 overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-300  dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            #
                        </th>
                        <th scope="col" class="px-6 py-3">
                            title
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Organizer
                        </th>
                        <th scope="col" class="px-6 py-3">
                            date
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
                    @forelse ($events as $event)
                        <tr
                            class="odd:bg-gray-100 odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $event->id }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $event->name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $event->user->name }}
                            </td>
                            <td class="text-black font-semibold px-6 py-4">
                                {{ $event->date }}
                            </td>
                            <td class="px-6 py-4">
                                @switch($event->publish_event)
                                    @case(1)
                                        <span
                                            class="bg-green-200 text-green-600 py-1 px-3 rounded-full text-xs">Published</span>
                                    @break

                                    @case(0)
                                        <span
                                            class="bg-yellow-200 text-yellow-600 py-1 px-3 rounded-full text-xs">Pending</span>
                                    @break
                                @endswitch
                            </td>
                            <td class="flex gap-4  px-6 py-4">
                                <a href="{{route('admin.event.show', $event->id)}}" class="hover:text-blue-500">
                                    <span class="material-symbols-outlined hover:text-blue-500">
                                        visibility
                                    </span>
                                </a>
                                <form action="{{route('admin.event.destroy', $event->id)}}" method="post">
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
                    {{ $events->links() }}
                </div>

            </div>
        </x-sidebar-admin>
    </x-app-layout>
