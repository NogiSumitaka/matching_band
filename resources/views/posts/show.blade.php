<x-app-layout>
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
        <button type="button" onclick="location.href='/profile/message'">応募する</button>
    </div>
</x-app-layout>

       