<x-app-layout>
    <!-- Profile edit form -->
    <div>
        <h1>プロフィール編集</h1>
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
</x-app-layout>

