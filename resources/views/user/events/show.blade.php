<x-navbar>
</x-navbar>
<main class="space-y-40 mb-10 mx-auto">


    <div class="flex flex-wrap gap-8 max-w-7xl md:mx-auto pt-28">
        <img src="{{ $event->getFirstMediaUrl('images') }}" class="w-1/2  rounded" alt="">
        <div class="p-4">
            <div class="flow-root rounded-lg border border-gray-100 py-3 shadow-sm">
                <dl class="-my-3 divide-y divide-gray-100 text-sm">
                    <div class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                        <dt class="font-medium text-gray-900">Title</dt>
                        <dd class="text-gray-700 sm:col-span-2">{{ $event->name }}</dd>
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
                        <dd class="text-gray-700 sm:col-span-2">{{ $event->price }} <span class="text-black ml-2">
                                MAD</span>
                        </dd>
                    </div>
                    <div class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                        <dt class="font-medium text-gray-900">Description</dt>
                        <dd class="text-gray-700 sm:col-span-2">
                            {{ $event->description }}
                        </dd>
                    </div>
                    @auth
                        <div class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">

                            <dd class="text-gray-700 sm:col-span-2">
                                <!-- Modal toggle -->
                                <button data-modal-target="crud-modal" data-modal-toggle="crud-modal"
                                    class="text-white bg-purple-700 hover:bg-purple-800 focus:outline-none focus:ring-4 focus:ring-purple-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900"
                                    type="button">
                                    Reserve
                                </button>

                                <!-- Main modal -->
                                <div id="crud-modal" tabindex="-1" aria-hidden="true"
                                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative p-4 w-full max-w-md max-h-full">
                                        <!-- Modal content -->
                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            <!-- Modal header -->
                                            <div
                                                class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                                    reserve your place in <span
                                                        class="text-red-500 ">{{ $event->name }}</span> event
                                                </h3>
                                                <button type="button"
                                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                    data-modal-toggle="crud-modal">
                                                    <svg class="w-3 h-3" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                            </div>
                                            <!-- Modal body -->
                                            <form class="p-4 md:p-5" method="post"
                                                action="{{ route('user.eventUser.store') }}">
                                                @csrf
                                                <input type="hidden" name="user_id"
                                                    value="{{ Auth::check() ? Auth::user()->id : '' }}">
                                                <input type="hidden" name="event_id" value="{{ $event->id }}">
                                                <div class="col-span-2 sm:col-span-1">
                                                    <label for="Number_of_Places"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Number_of_Places</label>
                                                    <div class="flex  py-4">
                                                        <button type="button" id="decrement-btn"
                                                            class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-bold rounded-full text-xl px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">-</button>

                                                        <input type="number" value="1" id="Number_of_Places"
                                                            name="number_place"
                                                            class="bg-gray-50 border mx-2 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            required="">

                                                        <button type="button" id="increment-btn"
                                                            class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-bold rounded-full text-xl px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">+</button>
                                                    </div>
                                                </div>

                                                <button type="submit"
                                                    class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                            d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                    Reserve
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </dd>
                        </div>
                    @else
                        <div class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                            <dd class="text-red-500 font-bold text-lg sm:col-span-2">
                                login to reserve your place in this Event
                            </dd>
                        </div>
                    @endauth
                </dl>
            </div>
        </div>
    </div>

    <script>
        const decrementBtn = document.getElementById("decrement-btn");
        const incrementBtn = document.getElementById("increment-btn");
        const counterDisplay = document.getElementById("Number_of_Places");

        let counter = 0;

        incrementBtn.addEventListener('click', () => {
            counter++;
            counterDisplay.value = counter;
            if (counter >= 5) {
                incrementBtn.disabled = true;
            }
        });

        decrementBtn.addEventListener('click', () => {
            counter--;
            counterDisplay.value = counter;
            if (counter < 2) {
                decrementBtn.disabled = true;
            }
        });
    </script>

    <x-footer>
    </x-footer>
