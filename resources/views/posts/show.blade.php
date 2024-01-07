<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <title>Matching Band</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased">
        <div　class="relative min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            <!-- Header -->
            <div class="flex flex-row-reverse">
                <div class="bg-green-100 pl-2">
                    <a href="{{ url('/create_band') }}">募集作成</a>
                </div>
                <div class="">
                    <a href="{{ url('/mypage/apply') }}">応募状況</a>
                </div>
                <div class="">
                    <a href="{{ url('/') }}">Matching Band</a>
                </div>
                <div class="">
                    <a href="{{ url('/login') }}" class="text-sm text-gray-900 dark:text-gray-500 underline">Log in</a>
                </div>
                <div class="">
                    <a href="{{ url('/mypage') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Mypage</a>
                </div>
                　　<!-- @if (Route::has('login'))
                　　      <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                　　          @auth
                　　          <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                　　          @else
                                   <a href="{{ route('login') }}" class="text-sm text-gray-900 dark:text-gray-500 underline">Log in</a>
                　　              @if (Route::has('register'))
                　　                 <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                　　              @endif
                　　          @endauth
                　　      </div>
                　　@endif -->
            </div>
            
            <!-- Post -->
            <div>
                <h1>メンバー募集</h1>
                <div class="post">
                    <h2 class="name">{{ $band->name }}</h2>
                    @foreach ($band->genres as $genre)
                        <p class="body">ジャンル：{{ $genre->genre}}</p>
                    @endforeach
                    @foreach ($band->prefectures as $prefecture)
                        <p class="body">活動場所：{{ $prefecture->prefecture }}</p>
                    @endforeach
                    @foreach ($band->insts as $inst)
                        <p class="body">募集しているパート：{{ $inst->inst }}</p>
                    @endforeach
                    <p class="body">演奏レベル:{{ $band->level }}</p>
                    <p class="body">{{ $band->introduction }}</p>
                </div>
                <button type="button">応募する</button>
            </div>
        </div>
    </body>
</html>