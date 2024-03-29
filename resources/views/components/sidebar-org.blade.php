<!DOCTYPE html>
<html lang="en" class="astro-FLTEP2YP">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <link rel="icon" type="image/svg+xml" href="/favicon.svg">
    <meta name="generator" content="Astro v1.1.5">
    <meta name="description" content="Template built with tailwindcss using Tailus blocks v2">
    <title>Evento</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-white dark:bg-gray-900">
    <aside id="logo-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
        aria-label="Sidebar">
        
        <div class="flex flex-col  items-center justify-between  h-full px-3 pb-10 overflow-y-auto bg-white dark:bg-gray-800">
            <a href="/" aria-label="logo" class="flex space-x-2 items-center astro-UY3JLCBK">
                <x-application-logo
                    class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
            </a>
            <ul class="space-y-2 font-medium">
                <li>
                    <a href="{{ route('organizer.dashboard') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 22 21">
                            <path
                                d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                            <path
                                d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                        </svg>
                        <span class="ms-3">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('organizer.event.index') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <span
                            class="material-symbols-outlined  flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white">
                            today
                        </span>
                        <span class="flex-1 ms-3 whitespace-nowrap">My Events</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('organizer.request.index') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <span
                            class="material-symbols-outlined  flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white">
                            confirmation_number
                        </span>
                        <span class="flex-1 ms-3 whitespace-nowrap">Resrevations</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('organizer.institution.show', Auth::user()->institution_id)}}"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <span
                            class="material-symbols-outlined flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white">
                            add_business
                        </span>
                        <span class="flex-1 ms-3 whitespace-nowrap">My Institution</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('profile.edit')}}"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <span
                            class="material-symbols-outlined flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white">
                            account_circle
                        </span>
                        <span class="flex-1 ms-3 whitespace-nowrap">Profile</span>
                    </a>
                </li>
            </ul>
            <div class="mt-12 lg:mt-0 ">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="relative flex h-9 w-full items-center justify-center px-4 before:absolute before:inset-0 before:rounded-full before:bg-blue-800 before:transition before:duration-300 hover:before:scale-105 active:duration-75 active:before:scale-95 sm:w-max ">
                        <span class="relative text-sm font-semibold text-white ">Logout
                        </span></button>
                </form>
            </div>
        </div>
    </aside>

    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 ">
            {{ $slot }}
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
