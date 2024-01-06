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
            <div class="flex flex-row">
                <div class="bg-green-100 pl-2">
                    <a href="{{ url('/create_band') }}">募集作成</a>
                </div>
                <div class="bg-green-100 pl-2">
                    <a href="{{ url('/profile/apply') }}">応募状況</a>
                </div>
                <div class="">
                    <a href="{{ url('/') }}">Matching Band</a>
                </div>
                <div class="">
                    <a href="{{ route('login') }}" class="text-sm text-gray-900 dark:text-gray-500 underline">Log in</a>
                </div>
                <div class="">
                    <a href="{{ url('/profile') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Mypage</a>
                </div>
            </div>
            
            <!-- Profile -->
            <div>
                <div>
                    <div>
                        <p>ユーザー名</p>
                        <p>{{ $user->name }}</p>
                    </div>
                    <div>
                        <p>好きなジャンル</p>
                        <p>{{ $genre->genre }}</p>
                    </div>
                    <div>
                        <p>活動場所</p>
                        <p>{{ $prefecture->prefecture }}</p>
                    </div>
                    <div>
                        <p>やっている楽器</p>
                        <p>{{ $inst->inst }}</p>
                    </div> 
                    <div>
                        <p>自己紹介</p>
                        <p>{{ $user->introduction }}</p>
                    </div>
                    <div><a href="/profile/{{ $user->id }}/edit">編集</a></div>
                </div>
            </div>
