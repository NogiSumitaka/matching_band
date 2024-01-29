<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="relative min-h-screen bg-gray-100">
            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto p-4 sm:px-6 lg:px-8">
                    <div class="flex">
                        <div class="flex grow">
                            <div>
                                <a href="/index" class="text-xl font-semibold text-center">Matching Band</a>
                            </div>
                            <div class="flex items-center ml-4">
                                <a href="/create_band" class="hover:underline hover:font-semibold">メンバー募集</a>
                            </div>
                            <div class="flex items-center ml-4">
                                <a href="/index" class="hover:underline hover:font-semibold">バンドを探す</a>
                            </div>
                        </div>
                        <div class="flex grow place-content-end">
                            <div class="flex items-center ">
                                <a href="{{ route('login') }}" class="px-3 py-1 mx-2 border border-gray-800 rounded-full hover:border-none hover:bg-sky-400 hover:text-white hover:font-semibold hover:shadow">ログイン</a>
                            </div>
                            <div class="flex items-center ">
                                <a href="{{ route('register')}}" class="px-3 py-1 mx-2 border border-gray-800 rounded-full hover:border-none hover:bg-red-400 hover:text-white hover:font-semibold hover:shadow">会員登録</a>
                            </div>
                            <!--<div class="">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Log out</button>
                                </form>
                            </div>-->
                            <div class="flex items-center object-right ml-4">
                                <button type="button" class="text-gray-700 dark:text-gray-500 underline hover:text-black hover:font-semibold" id="menu">Menu</button>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            
            <!-- hidden menu -->
            <div class="absolute right-full p-1 bg-white" id="hidden_menu">
                <ul>
                    <li class=""><a href="/profile">プロフィール編集</a></li>
                    <li><a href="/create_band">メンバー募集作成</a></li>
                    <li><a href="/profile/bands">メンバー募集編集</a></li>
                    <li><a href="/apply">応募状況</a></li>
                    <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Log out</button>
                    </form>
                    </li>
                </ul>
            </div>
            
            <!-- contents -->
            <main>
                {{ $slot }}
            </main>
        </div>
        <script>
            const menu = document.querySelector('#menu');
            const nav = document.querySelector('#hidden_menu');
            
            menu.addEventListener('click', function () {
                nav.classList.toggle('right-full');
                nav.classList.toggle('right-0');
            
            });
        </script>
    </body>
</html>
