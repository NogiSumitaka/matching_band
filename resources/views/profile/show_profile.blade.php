<x-app-layout>
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
</x-app-layout>

