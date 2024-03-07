<x-sidebar-org>
    <div class="">
        <div class="rounded-lg bg-white p-8 shadow-lg lg:col-span-3 lg:p-12">
            <form action="{{ route('organizer.MyEvents.store') }}" method="POST" enctype="multipart/form-data"
                class="space-y-4">
                @csrf
                <div class="col-span-2 flex flex-col items-center justify-center">
                    <label for="image-input" class="cursor-pointer">
                        <img id="preview-image" class=" h-32 w-60  shadow-xl border-2 border-gray-400"
                            src="{{ asset('images/pic.png') }}" alt="image">
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
                            type="text" id="name" value="{{ old('name') }}" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div>
                        <label for="location" class="text-blue-700 font-semibold">Location</label>
                        <input class="w-full rounded-lg border-gray-200 p-3 text-sm" name="location"
                            placeholder="Event location" type="text" value="{{ old('location') }}" id="location" />
                        <x-input-error :messages="$errors->get('location')" class="mt-2" />
                    </div>
                </div>
                <div class="grid grid-cols-1 gap-4 text-center sm:grid-cols-3">
                    <div>
                        <label for="date" class="text-blue-700 font-semibold">Event Date</label>
                        <input id="date" type="date"
                            class="w-full rounded-lg border border-gray-200 p-3 text-sm" name="date"
                            placeholder="Date" value="{{ old('date') }}"
                            min="{{ \Carbon\Carbon::now()->toDateString() }}" />
                        <x-input-error :messages="$errors->get('date')" class="mt-2" />
                    </div>

                    <div>
                        <label for="price" class="text-blue-700 font-semibold">Ticket Price</label>
                        <input id="price" type="number"
                            class="w-full rounded-lg border border-gray-200 p-3 text-sm" name="price"
                            placeholder="Price" value="{{ old('price') }}" />
                        <x-input-error :messages="$errors->get('price')" class="mt-2" />
                    </div>

                    <div>
                        <label for="capacity" class="text-blue-700 font-semibold">Capacity</label>
                        <input id="capacity" type="number"
                            class="w-full rounded-lg border border-gray-200 p-3 text-sm" name="capacity"
                            placeholder="Capacity" value="{{ old('price') }}" />
                        <x-input-error :messages="$errors->get('capacity')" class="mt-2" />
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-4 text-center sm:grid-cols-3">
                    <div>
                        <label for="Option1"
                            class="block w-full cursor-pointer rounded-lg border border-gray-200 p-3 text-gray-600 hover:border-black has-[:checked]:border-black has-[:checked]:bg-black has-[:checked]:text-white"
                            tabindex="0">
                            <input class="sr-only" id="Option1" type="radio" tabindex="-1" value="1"
                                name="automatic_acceptence" required
                                {{ old('automatic_acceptence') == '1' ? 'checked' : '' }} />

                            <span class="text-sm"> Automatic acceptence </span>
                        </label>
                        <x-input-error :messages="$errors->get('automatic_acceptence')" class="mt-2" />
                    </div>

                    <div>
                        <label for="Option2"
                            class="block w-full cursor-pointer rounded-lg border border-gray-200 p-3 text-gray-600 hover:border-black has-[:checked]:border-black has-[:checked]:bg-black has-[:checked]:text-white"
                            tabindex="0">
                            <input class="sr-only" id="Option2" type="radio" tabindex="-1" value="0"
                                name="automatic_acceptence" required
                                {{ old('automatic_acceptence') == '2' ? 'checked' : '' }} />

                            <span class="text-sm"> Manuelle acceptence </span>
                        </label>
                        <x-input-error :messages="$errors->get('automatic_acceptence')" class="mt-2" />
                    </div>

                    <div>
                        <select id="category_id" name="category_id"
                            class="w-full rounded-lg border border-gray-200 p-3 text-sm">
                            <option value="" disabled selected>Select event category</option>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{$category->name}}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                    </div>


                </div>

                <div>
                    <label class="sr-only" for="message">Description</label>

                    <textarea class="w-full rounded-lg border-gray-200 p-3 text-sm" name="description" placeholder="Event Description"
                        rows="8" id="message">{{ old('description') }}</textarea>
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />

                </div>
                <div class="mt-4">
                    <button type="submit"
                        class="inline-block w-full rounded-lg bg-black px-5 py-3 font-medium text-white sm:w-auto">
                        Create Event
                    </button>
                </div>
            </form>
        </div>
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
