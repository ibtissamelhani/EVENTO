<x-sidebar-org>
    <div class="grid grid-cols-2 gap-4 mb-4">
        <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
            <p class="text-2xl text-gray-600 font-semibold dark:text-gray-500">
                My Events
            </p>
        </div>
        <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
            <a href="{{ route('organizer.event.create') }}"
                class="text-white bg-blue-800 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                Create New Event
            </a>
        </div>
    </div>
    <div class="grid grid-cols-3 gap-4 mb-4 p-4 bg-gray-50">
        @forelse($orgEvents as $orgEvent)
            <div class="max-w-sm mt-12 rounded-lg bg-white shadow-md dark:bg-gray-600">
                <img class="h-48 w-full rounded-t-lg object-cover object-center"
                    src="{{ $orgEvent->getFirstMediaUrl('images') }}" alt="Photo">
                <div class="p-5">
                    <h5 class="mb-2 text-xl font-medium text-gray-900 dark:text-white">{{ $orgEvent->name }}</h5>
                    @if ($orgEvent->publish_event == 1)
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
                    <p class="text-sm text-gray-500 pt-4">Event date : {{$orgEvent->date}}</p>
                </div>
                <div class="flex justify-end gap-4 pb-5 px-6">
                    <a href="{{ route('organizer.event.show', $orgEvent->id) }}" class="hover:text-blue-500">
                        <span class="material-symbols-outlined hover:text-blue-500">
                            visibility
                        </span>
                    </a>
                    <a href="{{ route('organizer.event.edit', $orgEvent->id) }}" class="hover:text-yellow-500">
                        <span class="material-symbols-outlined hover:text-yellow-500">
                            edit
                        </span>
                    </a>
                    <form action="{{ route('organizer.event.destroy', $orgEvent->id) }}" method="post">
                        @method('DELETE')
                        @csrf
                        <button type="submit">
                            <span class="material-symbols-outlined dark:hover:text-red-500 hover:text-red-500">
                                Delete
                            </span>
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <li>No Event found.</li>
        @endforelse
    </div>
</x-sidebar-org>
