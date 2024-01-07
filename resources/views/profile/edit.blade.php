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
                    <a href="/profile" class="text-sm text-gray-700 dark:text-gray-500 underline">Mypage</a>
                </div>
            </div>
            
            <!-- Profile edit form -->
            <div>
                <form action="/profile/{{ $user->id }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div>
                        <p>ユーザー名</p>
                        <input type="text" name="user[name]" value="{{ $user->name }}" placeholder="例）マッチングバンド太郎">
                    </div>
                    <div>
                        <p>好きなジャンル</p>
                        @foreach($genres as $genre)
                            <label>
                                <input type="checkbox" value="{{ $genre->id }}" name="genres_array[]">
                                    {{ $genre->genre }}
                                </input>
                            </label>
                        @endforeach
                    </div>
                    <div>
                        <p>活動場所</p>
                        <select name="prefecture">
                        @foreach($prefectures as $prefecture)
                            <option value="{{ $prefecture->id }}">
                                {{ $prefecture->prefecture }}
                            </option>
                        @endforeach
                        </select>
                    </div>
                    <div>
                        <p>やっている楽器</p>
                        @foreach($insts as $inst)
                            <label>
                                <input type="checkbox" value="{{ $inst->id }}" name="insts_array[]">
                                    {{ $inst->inst }}
                                </input>
                            </label>
                        @endforeach
                    </div> 
                    <div>
                        <p>自己紹介</p>
                        <input type="text" name="user[introduction]" value="{{ $user->introduction }}" placeholder="好きなバンド：　趣味："/>
                    </div>
                    <input type="submit" value="保存"/>
                </form>
            </div>
