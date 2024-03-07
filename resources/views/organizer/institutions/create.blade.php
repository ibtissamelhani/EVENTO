<x-guest-layout>
    <section class="bg-gray-100 h-screen">
        <div class="mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-x-16 gap-y-8 lg:grid-cols-5">
                <div class="lg:col-span-2 lg:py-12">
                    <a href="/" aria-label="logo" class="flex space-x-2 items-start justify-center mb-8 h-20">
                        <img src="{{ asset('images/logo.png') }}" class="h-16 " alt="">
                    </a>
                    <p class="max-w-xl text-lg">
                        Kindly specify the <span class="text-indigo-500">institution affiliated with the event organizer</span>. This could be the <span class="text-indigo-500">name</span> of
                        the company, educational institution, or organization hosting the event. Providing this detail
                        aids us in <span class="text-indigo-500">ensuring seamless coordination and understanding the background</span>  of the event.
                    </p>
                </div>
                <div class="rounded-lg bg-white p-8 shadow-lg lg:col-span-3 lg:p-12">
                    <form action="{{route('organizer.institution.store')}}" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <label class="sr-only" for="name">Name</label>
                            <input class="w-full rounded-lg border-gray-200 p-3 text-sm" placeholder="Institution Name"
                                type="text" name="name" id="name" />
                        </div>

                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                            <div>
                                <label class="sr-only" for="address">Address</label>
                                <input class="w-full rounded-lg border-gray-200 p-3 text-sm"
                                    placeholder="address" type="text" name="address" id="Institution Address" />
                            </div>

                            <div>
                                <label class="sr-only" for="phone">Phone</label>
                                <input class="w-full rounded-lg border-gray-200 p-3 text-sm" placeholder="Institution Phone Number"
                                    type="tel" name="phone" id="phone" />
                            </div>
                        </div>
                        <div>
                            <label class="sr-only" for="institution">Institution Type</label>
                            <select class="w-full rounded-lg border-gray-200 p-3 text-sm" name="type_id" id="institution">
                                <option value="" disabled selected>Select Institution Type</option>
                                @foreach ($types as $type)
                                    <option value="{{$type->id}}" >{{$type->name}}</option>
                                @endforeach
                                
                            </select>
                        </div>
                        <div class="mt-4">
                            <button type="submit"
                                class="inline-block w-full rounded-lg bg-black px-5 py-3 font-medium text-white sm:w-auto hover:bg-gray-900">
                                send request
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>
