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
            
            <!-- Search Menu -->
            <div class="flex justify-center">
                <div>
                    <label for="inst_selecter">楽器:</label>
                    <select name="楽器" id="inst_selecter">
                        <option value="guitar">guitar</option>
                        <option value="bass">bass</option>
                        <option value="drum">drum</option>
                        <option value="vocal">vocal</option>
                        <option value="keyboard">keyboard</option>
                    </select>
                </div>
                <div>
                    <label for="genre_selecter">ジャンル:</label>
                    <select name="ジャンル" id="genre_selecter">
                        <option value="pop">pop</option>
                        <option value="rock">rock</option>
                        <option value="jazz">jazz</option>
                        <option value="R＆B">R＆B</option>
                        <option value="altanative">altanative</option>
                    </select>
                </div>
                <div>
                    <label for="prefecture_selecter">活動場所:</label>
                    <select name="活動場所" id="prefecture_selecter">
                        <option value="tokyo">東京</option>
                        <option value="osaka">大阪</option>
                        <option value="nagoya">名古屋</option>
                        <option value="kitakyusyu">北九州</option>
                        <option value="sendai">仙台</option>
                    </select>
                </div>
                <div>
                    <button type="submit">絞り込み検索</button>
                </div>
            </div>
            
            <!-- Post -->
            <div>
                <h1>メンバー募集</h1>
                <div class="posts">
                    @foreach ($bands as $band)
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
                            <div><a href="/welcome/{{ $band->id}}">詳細</a></div>
                        </div>
                    @endforeach
                </div>
                <div class="paginate">
                    {{ $bands->links() }}
                </div>
            </div>
        </div>
    </body>
</html>
