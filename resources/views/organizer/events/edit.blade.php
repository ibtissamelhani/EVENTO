<x-sidebar-org>

    <a href="{{ route('organizer.event.index') }}">
        <svg class="w-6 h-6 hover:text-red-400 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 8 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 1 1.3 6.326a.91.91 0 0 0 0 1.348L7 13"/>
        </svg>
    </a>
        <div class="rounded-lg bg-white p-8 shadow-lg lg:col-span-3 lg:p-12">
            <form action="{{ route('organizer.event.update', $event->id) }}" method="POST" enctype="multipart/form-data"
                class="space-y-4">
                @method('put')
                @csrf
                <div class="col-span-2 flex flex-col items-center justify-center">
                    <label for="image-input" class="cursor-pointer">
                        <img id="preview-image" class=" h-32 w-60  shadow-xl border-2 border-gray-400"
                            src="{{ $event->getFirstMediaUrl('images') }}" alt="image">
                    </label>
                    <input type="file" id="image-input" name="image" class="hidden" onchange="previewImage(event)">
                    <x-input-error :messages="$errors->get('image')" class="mt-2" />
                </div>
                <div>
                    <input class="w-full rounded-lg border-gray-200 p-3 text-sm" name="user_id" type="hidden"
                        value="{{ Auth::user()->id }}" id="user_id" />
                </div>
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <div>
                        <label for="name" class="text-blue-700 font-semibold">Title</label>
                        <input class="w-full rounded-lg border-gray-200 p-3 text-sm" name="name" placeholder="Title"
                            type="text" id="name" value="{{ old('name', $event->name) }}" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div>
                        <label for="location" class="text-blue-700 font-semibold">Location</label>
                        <input class="w-full rounded-lg border-gray-200 p-3 text-sm" name="location"
                            placeholder="Event location" type="text"
                            value="{{ old('location', $event->location) }}" id="location" />
                        <x-input-error :messages="$errors->get('location')" class="mt-2" />
                    </div>
                </div>
                <div class="grid grid-cols-1 gap-4 text-center sm:grid-cols-3">
                    <div>
                        <label for="date" class="text-blue-700 font-semibold">Event Date</label>
                        <input id="date" type="date"
                            class="w-full rounded-lg border border-gray-200 p-3 text-sm" name="date"
                            placeholder="Date" value="{{ old('date', $event->date) }}"
                            min="{{ \Carbon\Carbon::now()->toDateString() }}" />
                        <x-input-error :messages="$errors->get('date')" class="mt-2" />
                    </div>

                    <div>
                        <label for="price" class="text-blue-700 font-semibold">Ticket Price</label>
                        <input id="price" type="number"
                            class="w-full rounded-lg border border-gray-200 p-3 text-sm" name="price"
                            placeholder="Price" value="{{ old('price', $event->price) }}" />
                        <x-input-error :messages="$errors->get('price')" class="mt-2" />
                    </div>

                    <div>
                        <label for="capacity" class="text-blue-700 font-semibold">Capacity</label>
                        <input id="capacity" type="number"
                            class="w-full rounded-lg border border-gray-200 p-3 text-sm" name="capacity"
                            placeholder="Capacity" value="{{ old('capacity', $event->capacity) }}" />
                        <x-input-error :messages="$errors->get('capacity')" class="mt-2" />
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-4 text-center sm:grid-cols-3">
                    <div>
                        <select id="automatic_acceptance" name="automatic_acceptance"
                            class="w-full rounded-lg border-gray-200 p-3 text-sm">
                            <option value="1" {{ $event->automatic_acceptance == '1' ? 'selected' : '' }}>
                                Automatic Acceptance</option>
                            <option value="0" {{ $event->automatic_acceptance == '0' ? 'selected' : '' }}>Manual
                                Acceptance</option>
                        </select>
                        <x-input-error :messages="$errors->get('automatic_acceptance')" class="mt-2" />
                    </div>

                    <div>
                        <select id="category_id" name="category_id"
                            class="w-full rounded-lg border-gray-200 p-3 text-sm">
                            <option value="" disabled selected>Select event category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ $event->category_id == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                    </div>


                </div>

                <div>
                    <label class="sr-only" for="message">Description</label>

                    <textarea class="w-full rounded-lg border-gray-200 p-3 text-sm" name="description" placeholder="Event Description"
                        rows="8" id="message">{{ old('description', $event->description) }}</textarea>
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />

                </div>
                <div class="mt-4">
                    <button type="submit"
                        class="inline-block w-full rounded-lg bg-black px-5 py-3 font-medium text-white sm:w-auto">
                        update Event
                    </button>
                </div>
            </form>
        </div>
    
    <script>
        function previewImage(event) {
            const input = event.target;
            const preview = document.getElementById('preview-image');

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</x-sidebar-org>
