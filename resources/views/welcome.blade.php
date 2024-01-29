<x-app-layout>
    <!-- Search Menu -->
    <div class="mt-4 p-2 rounded-lg shadow-md border border-gray-800 bg-white">
        <form method="POST" action="/search" class="flex flex-col items-center">
            @csrf
            <div class="flex justify-center items-center">
                <label for="insts" class="text-lg">募集パート：</label>
                <select name="inst" id="insts">
                @foreach ($insts as $inst)
                    <option value="{{ $inst->id }}">{{ $inst->inst }}</option>
                @endforeach
                </select>
                
                <label for="genres" class="text-lg">ジャンル：</label>
                <select name="genre" id="genres">
                @foreach ($genres as $genre)
                    <option value="{{ $genre->id }}">{{ $genre->genre }}</option>
                @endforeach
                </select>
                
                <label for="prefectures" class="text-lg">活動エリア：</label>
                <select name="prefecture" id="prefectures">
                @foreach ($prefectures as $prefecture)
                    <option value="{{ $prefecture->id }}">{{ $prefecture->prefecture }}</option>
                @endforeach
                </select>
            </div>
            <input type="submit" value="絞り込み検索" class="mt-4 bg-transparent hover:bg-blue-500 text-blue-700 hover:text-white py-1 px-4 border border-blue-500 hover:border-transparent rounded"/>
        </form>
    </div>
    
    <!-- Post -->
    <div class="flex flex-col items-center my-8">
        <h1 class="text-xl font-bold underline">メンバー募集中バンド</h1>
        <div>
            @foreach ($bands as $band)
                <div class="flex flex-col my-2 p-4 rounded-md shadow-md bg-white">
                    <h2 class="text-lg underline">{{ $band->name }}</h2>
                    @foreach ($band->genres as $genre)
                        <p class="body">ジャンル：{{ $genre->genre}}</p>
                    @endforeach
                    @foreach ($band->insts as $inst)
                        <p class="body">募集しているパート：{{ $inst->inst }}</p>
                    @endforeach
                    <p class="body">{{ $band->introduction }}</p>
                    <div class="flex flex-row-reverse"><a href="/index/{{ $band->id}}" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-1 px-4 border border-gray-400 rounded hover:shadow">詳細</a></div>
                </div>
            @endforeach
        </div>
        <div class="w-screen">
            {{ $bands->links() }}
        </div>
    </div>
</x-app-layout>
