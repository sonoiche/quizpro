<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <script src="https://cdn.tailwindcss.com"></script>
        <!-- Styles -->
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
        <div class="bg-white text-black/50 dark:bg-black dark:text-white/50">
            <div class="relative min-h-screen flex flex-col items-center justify-center">
                <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                    <header class="flex justify-between items-center gap-2 py-10">
                        <div class="flex lg:justify-left lg:col-start-2">
                            <img src="{{ url('logo.png') }}" style="width: 30%;" />
                        </div>
                        @if (Route::has('login'))
                            <nav class="-mx-3 flex flex-1 justify-end">
                                @auth
                                    <a
                                        href="{{ url('/home') }}"
                                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                    >
                                        Dashboard
                                    </a>
                                @else
                                    <a
                                        href="{{ route('login') }}"
                                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                    >
                                        Log in
                                    </a>

                                    @if (Route::has('register'))
                                        <a
                                            href="{{ route('register') }}"
                                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                        >
                                            Register
                                        </a>
                                    @endif
                                @endauth
                            </nav>
                        @endif
                    </header>

                    <main class="my-[170px]">
                        <div class="grid grid-cols-12 h-fit">
                            <div class="col-span-6 flex flex-col items-center justify-center">
                                <div class="text-center">
                                    <h3 class="text-5xl text-gray-950 font-semibold">Saint Columbian Subject Question Crafting System</h3>
                                    <div class="my-12">
                                        <h4 class="text-3xl text-gray-800 font-medium italic">Innovative Tool for Syncing Questions and Elevating Learning Assessment</h4>
                                    </div>
                                    <a href="{{ route('login') }}" class="bg-red-600 px-7 py-4 rounded-xl text-white uppercase font-semibold text-lg">Get Started</a>
                                </div>
                            </div>
                            <div class="col-span-6">
                                <img src="{{ url('bg.png') }}" alt="">
                            </div>
                        </div>
                    </main>
                </div>
            </div>
        </div>
    </body>
</html>
