<x-sidebar-org>
    <div class="grid grid-cols-2 gap-4 mb-4">
        <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
            <p class="text-2xl text-gray-600 font-semibold dark:text-gray-500">
                My Events 
            </p>
        </div>
        <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
            <a href="{{route('organizer.MyEvents.create')}}" class="text-white bg-blue-800 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                Create New Event
            </a>
        </div>
    </div>
    <div class="grid grid-cols-3 gap-4 mb-4 p-4 bg-gray-50">
        @forelse($orgEvents as $orgEvent)
        <div class="max-w-sm mt-12 rounded-lg bg-white shadow-md dark:bg-gray-600">
            <img class="h-48 w-full rounded-t-lg object-cover object-center"
                src="{{$orgEvent->getFirstMediaUrl('images')}}" alt="Photo">
            <div class="p-5">
                <h5 class="mb-2 text-xl font-medium text-gray-900 dark:text-white">{{$orgEvent->name}}</h5>
                {{-- <span
                    class="inline-flex items-center justify-center w-3 h-3 py-3 px-10 ms-3 text-sm font-medium 
                @if ($project->status == 1) text-blue-800 bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-300
                @elseif ($project->status == 2)
                    text-green-800 bg-green-100 rounded-full dark:bg-green-900 dark:text-green-300
                @else
                    text-red-800 bg-red-100 rounded-full dark:bg-red-900 dark:text-red-300 @endif">
                    @foreach ($STATUS_RADIO as $key => $value)
                        @if ($project->status == $key)
                            {{ $value }}
                        @endif
                    @endforeach
                </span> --}}
            </div>
            <div class="flex justify-end gap-4 pb-5 px-6">
                <a href="" class="dark:hover:text-blue-500">
                    <span class="material-symbols-outlined dark:hover:text-blue-500">
                        visibility
                    </span>
                </a>
                <a href="" class="dark:hover:text-yellow-500">
                    <span class="material-symbols-outlined dark:hover:text-yellow-500">
                        edit
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
        @empty
        <li>No Event found.</li>
    @endforelse
    </div>
    <div class="px-8 flex py-2">
        {{ $orgEvents->links() }}
    </div>
</x-sidebar-org>
