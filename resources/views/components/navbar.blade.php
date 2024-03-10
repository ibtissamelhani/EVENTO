<!DOCTYPE html>
<html lang="en" class="astro-FLTEP2YP">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <link rel="icon" type="image/svg+xml" href="/favicon.svg">
    <meta name="generator" content="Astro v1.1.5">
    <meta name="description" content="Template built with tailwindcss using Tailus blocks v2">
    <title>Tailus astro theme</title>

    <link href="https://fonts.googleapis.com/css2?family=Urbanist:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="bg-white dark:bg-gray-900 astro-FLTEP2YP">
    <header class="astro-UY3JLCBK">
        <nav class="z-10 w-full absolute astro-UY3JLCBK">
            <div class="max-w-7xl mx-auto px-6 md:px-12 xl:px-6">
                <div
                    class="flex flex-wrap items-center justify-between py-2 gap-6 md:py-4 md:gap-0 relative astro-UY3JLCBK">
                    <input aria-hidden="true" type="checkbox" name="toggle_nav" id="toggle_nav"
                        class="hidden peer astro-UY3JLCBK">
                    <div class="relative z-20 w-full flex justify-between lg:w-max md:px-0 astro-UY3JLCBK">
                        <a href="/" aria-label="logo" class="flex space-x-2 items-center astro-UY3JLCBK">
                            <x-application-logo
                                class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                        </a>

                        <div class="relative flex items-center lg:hidden max-h-10 astro-UY3JLCBK">
                            <label role="button" for="toggle_nav" aria-label="humburger" id="hamburger"
                                class="relative  p-6 -mr-6 astro-UY3JLCBK">
                                <div aria-hidden="true" id="line"
                                    class="m-auto h-0.5 w-5 rounded bg-sky-900 dark:bg-gray-300 transition duration-300 astro-UY3JLCBK">
                                </div>
                                <div aria-hidden="true" id="line2"
                                    class="m-auto mt-2 h-0.5 w-5 rounded bg-sky-900 dark:bg-gray-300 transition duration-300 astro-UY3JLCBK">
                                </div>
                            </label>
                        </div>
                    </div>
                    <div aria-hidden="true"
                        class="fixed z-10 inset-0 h-screen w-screen bg-white/70 backdrop-blur-2xl origin-bottom scale-y-0 transition duration-500 peer-checked:origin-top peer-checked:scale-y-100 lg:hidden dark:bg-gray-900/70 astro-UY3JLCBK">
                    </div>
                    <div
                        class="flex-col z-20 flex-wrap gap-6 p-8 rounded-3xl border border-gray-100 bg-white shadow-2xl shadow-gray-600/10 justify-end w-full invisible opacity-0 translate-y-1  absolute top-full left-0 transition-all duration-300 scale-95 origin-top 
                            lg:relative lg:scale-100 lg:peer-checked:translate-y-0 lg:translate-y-0 lg:flex lg:flex-row lg:items-center lg:gap-0 lg:p-0 lg:bg-transparent lg:w-7/12 lg:visible lg:opacity-100 lg:border-none
                            peer-checked:scale-100 peer-checked:opacity-100 peer-checked:visible lg:shadow-none 
                            dark:shadow-none dark:bg-gray-800 dark:border-gray-700 ">

                        <div class="text-gray-600 dark:text-gray-300 lg:pr-4 lg:w-auto w-full lg:pt-0 ">
                            <ul class="tracking-wide font-medium lg:text-sm flex-col flex lg:flex-row gap-6 lg:gap-0 ">
                                @auth
                                    <li class="">
                                        <a href="{{route('organizer.dashboard')}}"
                                            class="block md:px-4 transition hover:text-indigo-500 hover:text-base ">
                                            <span class="">Dashboard</span>
                                        </a>
                                    </li>
                                    <li class="{{ route('profile.edit') }}">
                                        <a href="#"
                                            class="block md:px-4 transition hover:text-indigo-500 hover:text-base ">
                                            <span class="">Profile</span>
                                        </a>
                                    </li>
                                @else
                                    <li class="">
                                        <a href="{{ route('login') }}"
                                            class="block md:px-4 transition underline hover:text-indigo-500 hover:text-base ">
                                            <span class="">login</span>
                                        </a>
                                    </li>
                                </ul>
                            @endauth
                        </div>
                        @auth
                            <div class="mt-12 lg:mt-0 ">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit"
                                        class="relative flex h-9 w-full items-center justify-center px-4 before:absolute before:inset-0 before:rounded-full before:bg-blue-800 before:transition before:duration-300 hover:before:scale-105 active:duration-75 active:before:scale-95 sm:w-max ">
                                        <span class="relative text-sm font-semibold text-white ">Logout
                                        </span></button>
                                </form>
                            </div>
                        @else
                            <div class="mt-12 lg:mt-0 ">
                                <a href="{{ route('register') }}"
                                    class="relative flex h-9 w-full items-center justify-center px-4 before:absolute before:inset-0 before:rounded-full before:bg-blue-800 before:transition before:duration-300 hover:before:scale-105 active:duration-75 active:before:scale-95 sm:w-max ">
                                    <span class="relative text-sm font-semibold text-white ">Get
                                        Started</span>
                                </a>
                            </div>
                        @endauth
                    </div>
                </div>
            </div>
        </nav>
    </header>
