<x-guest-layout>
        <section class="relative flex flex-wrap lg:h-screen lg:items-center">
            <div class="w-full px-4 py-12 sm:px-6 sm:py-16 lg:w-1/2 lg:px-8 lg:py-24">
                <a href="/" aria-label="logo" class="flex space-x-2 items-start justify-center mb-16 h-20">
                    <img src="{{ asset('images/logo.png') }}" class="h-16 " alt="">
                </a>
                <div class="mx-auto max-w-lg text-center">
                    <h1 class="text-2xl font-bold sm:text-3xl">Login!</h1>
                    <p class="mt-4 text-gray-500">
                        To access your account, please log in with your username and password!
                    </p>
                </div>
                <x-auth-session-status class="mb-4" :status="session('status')" />
                <form method="POST" action="{{ route('login') }}" class="mx-auto mb-0 mt-8 max-w-md space-y-4">
                    @csrf
                    <div>
                        <label for="email" class="sr-only">Email</label>

                        <div class="relative">
                            <input type="email" name="email"
                                class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm"
                                placeholder="Enter email" required />

                            <span class="absolute inset-y-0 end-0 grid place-content-center px-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-4 text-gray-400" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                </svg>
                            </span>
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div>
                        <label for="password" class="sr-only">Password</label>

                        <div class="relative">
                            <input type="password" name="password" required
                                class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm"
                                placeholder="Enter password" />

                            <span class="absolute inset-y-0 end-0 grid place-content-center px-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-4 text-gray-400" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </span>
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex flex-col gap-4">
                            <p class="text-sm text-gray-500">
                                No account?
                                <a class="underline text-blue-500 hover:text-gray-900"
                                    href="{{ route('register') }}">Sign up</a>
                            </p>
                            @if (Route::has('password.request'))
                                <a class="underline text-sm text-red-600 dark:text-red-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                                    href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif
                        </div>
                        <button type="submit"
                            class="inline-block rounded-lg bg-blue-500 px-5 py-3 text-sm font-medium text-white">
                            Sign in
                        </button>
                    </div>
                </form>
            </div>

            <div class="relative h-64 w-full sm:h-96  lg:h-full lg:w-1/2">
                <img alt="" src="{{ asset('images/event1.jpg') }}"
                    class="absolute inset-0 h-full  w-full object-cover hidden md:block" />
            </div>
        </section>
</x-guest-layout>
