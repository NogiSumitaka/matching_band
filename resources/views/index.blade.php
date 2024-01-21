<x-app-layout>
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
                    <div><a href="/index/{{ $band->id }}">詳細</a></div>
                </div>
            @endforeach
        </div>
        <div class="paginate">
            {{ $bands->links() }}
        </div>
    </div>
</x-app-layout>
            
 