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
                    <a href="{{ url('/profile/apply') }}">応募状況</a>
                </div>
                <div class="">
                    <a href="{{ url('/') }}">Matching Band</a>
                </div>
                <div class="">
                    <a href="{{ url('login') }}" class="text-sm text-gray-900 dark:text-gray-500 underline">Log in</a>
                </div>
                <div class="">
                    <a href="{{ url('/profile') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Mypage</a>
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
            
            <!-- Create form -->
            <div>
                <form action="/bands" method="POST">
                    @csrf
                    <div>
                        <p>バンド名</p>
                        <input type="text" name="band[name]" placeholder="例）Matching Band">
                    </div>
                    <div>
                        <p>ジャンル</p>
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
                        <p>募集楽器</p>
                        @foreach($insts as $inst)
                            <label>
                                <input type="checkbox" value="{{ $inst->id }}" name="insts_array[]">
                                    {{ $inst->inst }}
                                </input>
                            </label>
                        @endforeach
                    </div> 
                    <div>
                        <p>募集レベル</p>
                        <input type="number" name="band[level]" placeholder="1~10"/>
                    </div>
                    <div>
                        <p>バンド紹介</p>
                        <input type="text" name="band[introduction]" placeholder="バンドの雰囲気：　やる曲の特徴：　よく使うスタジオ：　求める奏法：..."/>
                    </div>
                    <input type="submit" value="保存"/>
                </form>
            </div>
            