<x-app-layout>
    <x-sidebar-admin>
        <a href="{{ route('admin.event.index') }}">
            <svg class="w-6 h-6 hover:text-red-400 text-gray-800 dark:text-white" aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 8 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M7 1 1.3 6.326a.91.91 0 0 0 0 1.348L7 13" />
            </svg>
        </a>
        <div class="flow-root rounded-lg border border-gray-100 py-3 shadow-sm">
            <dl class="-my-3 divide-y divide-gray-100 text-sm">
                <div class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                    <dd class="text-gray-700 sm:col-span-2"><img src="{{ $event->getFirstMediaUrl('images') }}"
                            class="h-64 w-full rounded-xl object-cover  " /></dd>
                </div>
                <div class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                    <dt class="font-medium text-gray-900">Title</dt>
                    <dd class="text-gray-700 sm:col-span-2">{{ $event->name }}</dd>
                </div>
                <div class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                    <dt class="font-medium text-gray-900">Organizer</dt>
                    <dd class="text-red-700 sm:col-span-2">{{ $event->user->name }}</dd>
                </div>
                <div class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                    <dt class="font-medium text-gray-900">institution</dt>
                    <dd class="text-red-700 sm:col-span-2">{{ $event->user->institution->name }}</dd>
                </div>
    
                <div class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                    <dt class="font-medium text-gray-900">Location</dt>
                    <dd class="text-gray-700 sm:col-span-2">{{ $event->location }}</dd>
                </div>
    
                <div class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                    <dt class="font-medium text-gray-900">Date</dt>
                    <dd class="text-gray-700 sm:col-span-2">{{ $event->date }}</dd>
                </div>
                <div class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                    <dt class="font-medium text-gray-900">Event category</dt>
                    <dd class="text-gray-700 sm:col-span-2">{{ $event->category->name }}</dd>
                </div>
                <div class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                    <dt class="font-medium text-gray-900">Capacity</dt>
                    <dd class="text-gray-700 sm:col-span-2">{{ $event->capacity }}</dd>
                </div>
                <div class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                    <dt class="font-medium text-gray-900">Price of one ticket</dt>
                    <dd class="text-gray-700 sm:col-span-2">{{ $event->price }} <span class="text-black ml-2"> MAD</span>
                    </dd>
                </div>
                <div class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                    <dt class="font-medium text-gray-900">Automatic acceptance!</dt>
                    @if ($event->automatic_acceptance == 1)
                        <dd class="text-gray-900 font-semibold sm:col-span-2">Yes</dd>
                    @else
                        <dd class="text-gray-900 font-semibold sm:col-span-2">No</dd>
                    @endif
                </div>
                <div class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                    <dt class="font-medium text-gray-900">Event Published !</dt>
                    <dd class="text-gray-700 sm:col-span-2">
                        @if ($event->publish_event == 1)
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
                    </dd>
                </div>
    
                <div class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                    <dt class="font-medium text-gray-900">Description</dt>
                    <dd class="text-gray-700 sm:col-span-2">
                        {{ $event->description }}
                    </dd>
                </div>
            </dl>
        </div>
    </x-sidebar-admin>
</x-app-layout>
