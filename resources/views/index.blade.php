<x-app-layout>
    <!-- Search Menu -->
    <div>
        <form method="POST" action="/search" class="flex flex-col items-center">
            @csrf
            <div class="flex">
                <label for="insts">募集パート：</label>
                <select name="inst" id="insts">
                @foreach ($insts as $inst)
                    <option value="{{ $inst->id }}">{{ $inst->inst }}</option>
                @endforeach
                </select>
                
                <label for="genres">ジャンル：</label>
                <select name="genre" id="genres">
                @foreach ($genres as $genre)
                    <option value="{{ $genre->id }}">{{ $genre->genre }}</option>
                @endforeach
                </select>
                
                <label for="prefectures">活動エリア：</label>
                <select name="prefecture" id="prefectures">
                @foreach ($prefectures as $prefecture)
                    <option value="{{ $prefecture->id }}">{{ $prefecture->prefecture }}</option>
                @endforeach
                </select>
            </div>
            <input type="submit" value="絞り込み検索"/>
        </form>
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
                    <div><a href="/index/{{ $band->id }}">詳細</a></div>
                </div>
            @endforeach
        </div>
        <div class="paginate">
            {{ $bands->links() }}
        </div>
    </div>
</x-app-layout>
            
 